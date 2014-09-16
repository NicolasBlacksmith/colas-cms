<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("MY_Controller.php");

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model('user_session_model');
	}

	public function index(){
		$show_error=FALSE;
		$error_msg="";
		if (array_key_exists("name",$_POST) && array_key_exists("password",$_POST) ) {
				
			$user=$this->user_model->get_user_by_name_password($_POST["name"],$_POST["password"]);
			if ($user->user_id!=0) {
              //Succes login
                
              if ($user->is_active) {
                $this->session->set_userdata('current_user', serialize($user));
                $this->user_model->update_last_login($user);
                
                // userhez tartozó többi session törlése
                $this->user_session_model->clean_sessions($user);
                
                redirect("dashboard");
              }
              else {
                $show_error = TRUE;
				$error_msg = 'Inaktív user!';
              }
              
			}else{
				$show_error=TRUE;
				$error_msg="Hibás felhasználónév és jelszó!";
			}
		}

		$this->template->set_template("login");
		$this->template->write('type',"login");
		$this->template->write('baseurl', base_url());
		$this->template->write('title', 'Colas CMS - Bejelentkezés');
		$this->template->parse_view('content','login/login.tpl',array("show_error"=>$show_error, "error_msg"=>$error_msg));

		$this->template->render();
	}


	public function logout(){

		$this->session->sess_destroy();
		redirect("login/index");
	}

	public function lockscreen(){
		$show_error=FALSE;

		if (array_key_exists("name",$_POST) && array_key_exists("password",$_POST) ) {
				
			$user=$this->user_model->get_user_by_name_password($_POST["name"],$_POST["password"]);
			if ($user->user_id!=0) {
				//Succes login
				$this->session->set_userdata('last_activity',time());
				$this->session->set_userdata('current_user', serialize($user));

				if (array_key_exists("last_path", $_POST) && strlen($_POST["last_path"])>0 ) {
					$path=str_replace("index.php", "", $_POST["last_path"]);
					redirect($path);
				}else{
					redirect("dashboard");
				}
				
			}else{
				$show_error=TRUE;
			}
		}	

		$user=unserialize($this->session->userdata("current_user"));
		if (!$user || $user->user_id==0) {
			redirect("login/index");
		}else{
			$user->is_locked=TRUE;
			$this->session->set_userdata('current_user', serialize($user));
		}

		$this->template->set_template("login");
		$this->template->write('type',"lock");
		$this->template->write('baseurl', base_url());
		$this->template->write('title', 'Colas CMS - Fiók zárolva');
		$this->template->parse_view('content','login/lockscreen.tpl',array('user'=>$user,"show_error"=>$show_error));

		$this->template->render();
	}

}	