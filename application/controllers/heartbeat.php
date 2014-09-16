<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Heartbeat extends CI_Controller {

	public $currentUser;

	public function __construct(){
		parent::__construct();
		
		$this->currentUser=unserialize($this->session->userdata("current_user"));
	}

	function index(){
		redirect("dashboard");
	}

	//call from heartbeat.js
	function manager(){

		//SESSION
		$response["time"]=time();
		$response["session"]=$this->calc_user_session();

		$response["messages"]= array();

		if (!$response["session"]["go_login"] || !$response["session"]["go_lock"] ) {
		
			if (isset($_POST["last_path"]) && strlen($_POST["last_path"])>0) {
				$this->currentUser->last_path=$_POST["last_path"];
				$this->session->set_userdata("current_user",serialize($this->currentUser));
			}
		}	

		echo json_encode($response);
		exit;
	}

	function calc_user_session(){
		$zengo_config = $this->config->item('zengo');

		$response["go_login"]=false;
		$response["go_lock"]=false;
        
        $response['site_base_url'] = (array_key_exists('HTTPS', $_SERVER)) ? 'https://' : 'http://';
        $response['site_base_url'] .= $_SERVER['SERVER_NAME'];

		if (!$this->currentUser || !isset($this->currentUser->user_id) ||$this->currentUser->user_id==0) {
			$response["go_login"]=true;
			return $response;
		}else if($this->currentUser->is_locked){
			$response["go_lock"]=true;
			return $response;
		} else if (!$this->currentUser->is_active) {
          	$response["go_login"]=true;
          	return $response;
        }

        $remaining=time()-$this->session->userdata('last_activity');

        $response["last_activity"]=$this->session->userdata('last_activity');
		$response["user_id"]=$this->currentUser->user_id;
		$response["session_exp"]=$this->session->sess_expiration;
		$response["remaining_time"]= $remaining;
		$response["alert_time"]=$zengo_config['show_session_alert_before_expiration'];
		$response["lock_time"]=$zengo_config['lock_user_before_session_expiration'];

		return $response;
	}

	function user_keep_alive(){
		$this->session->set_userdata('last_activity',time());
	}


	function send_chat_message(){
		if(array_key_exists("message", $_POST) && array_key_exists("user_id", $_POST)){
			$response["succes"]=true;
			$chat=new Chat();
			$chat->from_user_id=$this->currentUser->user_id;
			$chat->to_user_id=$_POST["user_id"];
			$chat->message=$_POST["message"];
			$chat->send=time();
			$chat->read=0;

			$this->chat_model->insert_message($chat);
			$this->chat_model->read_messages($_POST["user_id"],$this->currentUser->user_id);

			$this->session->set_userdata('last_activity',time());
		}else{
			$response["succes"]=false;
		}

		echo json_encode($response);
		exit;
	}

	function read_chat_message(){
		if (array_key_exists("user_id", $_POST)) {
			$this->chat_model->read_messages($_POST["user_id"],$this->currentUser->user_id);
		}

	}


	function save_menu_size(){
		if (isset($_POST["size"])) {
			$this->session->set_userdata("menu_size",$_POST["size"]);
		}
		exit;
	}


	public function save_redirect_location(){
	  $response["success"]=false;
	  if (isset($_POST["location"])) {
	    $location=str_replace("index.php", "", $_POST["location"]);
	    $location=str_replace("//", "/", $location);
	    $this->session->set_userdata( array("redirect_location"=>$location) );
	    $response["success"]=true;
	  }
	  echo json_encode($response);
	  exit;
	}

}