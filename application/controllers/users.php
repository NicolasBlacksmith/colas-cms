<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("MY_Controller.php");

class Users extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->controller_display_name="Felhasználók";
		$this->currentMenu=MenuItems::USERS;


		$this->load->model('user_model');
    $this->load->model('user_session_model');
	}

	public function index(){
		
		$this->user_list();
	}

	public function user_list(){
        if (!$this->currentUser->is_user_manager && !$this->currentUser->is_super_user) {
            redirect("dashboard");
        }
      
		$this->currentSubMenu=UserSubMenuItems::USERLIST;
		
		$user_list=$this->user_model->get_user_list();

		$this->parseTemplateStaticSections();
		$this->template->add_css("assets/plugins/datatables/dataTables.css");
		$this->template->add_css("assets/plugins/datatables/dataTables.tableTools.css");

		$this->template->add_js("assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js");
		$this->template->add_js("assets/plugins/datatables/dynamic/jquery.dataTables.min.js");
		$this->template->add_js("assets/plugins/datatables/dataTables.bootstrap.js");
		$this->template->add_js("assets/plugins/datatables/dataTables.tableTools.js");
		$this->template->add_js("assets/plugins/datatables/table.editable.js");
		$this->template->add_js("assets/js/table_dynamic.js");
		$this->template->add_js("assets/plugins/icheck/custom.js");
		$this->template->add_js("assets/plugins/bootstrap-switch/bootstrap-switch.js");
        
        $this->template->add_js('js/user_list.js');

        $zengo_config = $this->config->item('zengo');

        $this->template->parse_view('content','users/user_list.tpl',array("user_list"=>$user_list, 'current_user' => $this->currentUser, 'super_edit_super' => $zengo_config['super_edit_super'], 'user_manager_edit_user_manager' => $zengo_config['user_manager_edit_user_manager']));
        $this->template->render();
	}

	public function edit_user($user_id=0){
    $success_operation = false;
    $original_pw = '';
    
    // szerkesztés művelet esetén jogosultságok ellenőrzése
    $check_user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : $user_id;
    if ($check_user_id != 0) {
      $user         = $this->user_model->get_user_by_id($check_user_id);
      $zengo_config = $this->config->item('zengo');
      $original_pw  = $user->password;

      //    egy super usert egy nem super user akar szerkeszteni , super user-t egy másik super user akar szerkeszteni de nincs engedélyezve 
      if (($user->is_super_user && !$this->currentUser->is_super_user) ||
          ($this->currentUser->is_super_user && $user->is_super_user && !$zengo_config['super_edit_super'] && $this->currentUser->user_id != $user->user_id )) {
        redirect("dashboard");
      }
      //  user-t probál egy nem user manager vagy nem super user szerkeszteni
      if ($this->currentUser->user_id != $user->user_id && !$this->currentUser->is_user_manager && !$this->currentUser->is_super_user) {
        redirect("dashboard");
      }
      // user manager akar szerkeszteni másik user managert, de nncs engedélyezve
      if ($user->is_user_manager && $this->currentUser->is_user_manager && $user->user_id != $this->currentUser->user_id && !$zengo_config['user_manager_edit_user_manager'] && !$this->currentUser->is_super_user) {
        redirect("dashboard");
      }
    }
    else if (!$this->currentUser->is_user_manager && !$this->currentUser->is_super_user) {
      redirect("dashboard");
    }

    if (isset($_POST["user_id"])) {
                
        $user=new User();
        $user->set_base_attributes_by_array($_POST);
        
        // validalasok arra az esetre ha kliens oldalon trukkoznek
        if (empty($user->nickname)
            || (strlen($user->nickname) < 3)
            || !$this->user_model->check_unique_nickname($user->user_id, $user->nickname)
            || (!empty($_POST['password']) && (strlen($_POST['password']) < 4))
            || (!empty($_POST['password']) && ($_POST['password'] != $_POST['passwordre']))
            || !$this->user_model->check_unique_email($user->user_id, $user->email)
            || ($user->user_id > 0 && !empty($_POST['password']) && (!array_key_exists('old_password', $_POST) || !$this->user_model->check_password($user->user_id, $_POST['old_password'])) && !$this->currentUser->is_user_manager && !$this->currentUser->is_super_user)) {
          redirect('dashboard');
        }
        // validalasok vege
        
        // modositas eseten ha nincs uj jelszo akkor nem bantjuk a jelenlegit
        if ($user->user_id > 0 && empty($user->password)) {
          $user->password = $original_pw;
        }
        
        if ($user->user_id==0) {
              $user->user_id=$this->user_model->insert_user($user);
              $success_operation = 'new';
        }else{
              $this->user_model->update_user($user);
              $success_operation = 'modify';
        }

        if ($this->currentUser->is_super_user) {
             $this->user_model->update_user_base_authority($user,array_key_exists("is_foreman", $_POST),array_key_exists("is_economic", $_POST));
        }

        $user=$this->user_model->get_user_by_id($user->user_id); 
        
        // user sessionjeinek frissitese
        if ($user->user_id > 0) {
            $this->user_session_model->update_user_sessions($user);
        }
    }else{
      //NEM érkezett adat, új szerkesztés
        if ($user_id==0) {
          $user=new User();
          $this->currentSubMenu=UserSubMenuItems::NEWUSER;
        }else{
          $user=$this->user_model->get_user_by_id($user_id);
        }
    }

    $this->parseTemplateStaticSections();

		// $this->template->add_js('assets/plugins/parsley/parsley.js');
    $this->template->add_js("js/parsley.remote.js");
		$this->template->add_js('assets/plugins/parsley/parsley.extend.js');

    $this->template->add_js("js/edit_user.js");
    $this->template->parse_view('content','users/edit_user.tpl',array('user'=>$user, 'current_user' => $this->currentUser,  'success_operation' => $success_operation ));
    $this->template->render();

	}

	public function check_unique_nickname(){
    $result["response"]="error";

    if (array_key_exists("nickname", $_POST) && array_key_exists("user_id", $_POST)) {
      $result["nickname"]=$_POST["nickname"];
      $result["user_id"]=$_POST["user_id"];
      $result["is_unique"]=$this->user_model->check_unique_nickname($_POST["user_id"],$_POST["nickname"]);
      $result["response"]="ok";
    }

    echo json_encode($result);
    exit;
	}

  public function check_unique_email(){
    $result["response"]="error";

    if (array_key_exists("email", $_POST) && array_key_exists("user_id", $_POST)) {
      $result["email"]=$_POST["email"];
      $result["user_id"]=$_POST["user_id"];
      $result["is_unique"]=$this->user_model->check_unique_email($_POST["user_id"],$_POST["email"]);
      $result["response"]="ok";
    }

    echo json_encode($result);
    exit;
  }  

  public function check_password() {
    $result['response'] = 'error';

    if (array_key_exists('old_password', $_POST) && array_key_exists('user_id', $_POST)) {
      $result['user_id']    = $_POST['user_id'];
      $result['correct_pw'] = $this->user_model->check_password($_POST['user_id'], $_POST['old_password']);
      $result['response']   = 'ok';
    }

    echo json_encode($result);
    exit;
  }

  public function set_active() {

      // csak adminisztrator es su kezelheti
      if (!$this->currentUser->is_user_manager && !$this->currentUser->is_super_user) {
        echo json_encode(array(
          'response' => 'error',
          'details'  => 'nincs jogosultsag',
        ));
        exit;
      }


      $is_active = ($_POST['is_active'] === 'true') ? TRUE : FALSE;
      $user_id   = (int) $_POST['user_id'];
      $user = ($user_id > 0) ? $this->user_model->get_user_by_id($user_id) : new User();

      // nemletezo felhasznalo kiszurese
      if ($user->user_id == 0) {
        echo json_encode(array(
          'response' => 'error',
          'details'  => 'nincs ilyen user',
        ));
        exit;
      }

      
      // sajat magat ne tilthassa
      if ($user->user_id == $this->currentUser->user_id) {
        echo json_encode(array(
          'response' => 'error',
          'details'  => 'sajat magunkat nem tilthatjuk',
        ));
        exit;
      }
      
      
      // superusert ne tilthassa
      if ($user->is_super_user) {
        echo json_encode(array(
          'response' => 'error',
          'details'  => 'super usert senki nem tilthat',
        ));
        exit;
      }
      
      
      // adminisztrator tilthat-e adminisztratort (superuser mindig)
      $zengo_config = $this->config->item('zengo');
      
      if ($user->is_user_manager && $zengo_config['user_manager_edit_user_manager'] !== TRUE && !$this->currentUser->is_super_user) {
        echo json_encode(array(
          'response' => 'error',
          'details'  => 'admin nem tilthat admint (kiveve ha super user)',
        ));
        exit;
      }
      
      
      // is_active mentese db-be
      $user->is_active = ($is_active) ? 1 : 0;
      $this->user_model->update_user($user);
      
      // user sessionjeinek frissitese
      $this->user_session_model->update_user_sessions($user);

      echo json_encode(array(
        'response' => 'success',
        'details'  => $user->nickname . ' has been ' . (($user->is_active) ? 'activated' : 'inactivated'),
      ));
      exit;

    }

}