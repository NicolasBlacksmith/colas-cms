<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


abstract class MenuItems
{
    const DASHBOARD = 0;
    const USERS = 1;
    const SITES = 2;
    const ARTICLE_LIST = 3;
    const PHOTOS = 4;
    const PUBLISH =5;
}

abstract class UserSubMenuItems
{
	const USERLIST =0;
	const NEWUSER =1;
}


class MY_Controller extends CI_Controller {

	public $controller_display_name;
	public $currentMenu;
	public $currentSubMenu;
	public $currentUser;

	public $menu_size;


	public function __construct(){
		parent::__construct();

		$this->controller_display_name="Base controller";
		$this->currentMenu=MenuItems::DASHBOARD;

		$this->load->model('user_session_model');
		$this->load->model('user_model');

		//Check user is logged in or locked
		$this->currentUser=unserialize($this->session->userdata("current_user"));
		if (!$this->currentUser || !$this->currentUser->user_id || $this->currentUser->user_id==0) {
			redirect("login/index");
		}else if($this->currentUser->is_locked){
			redirect("login/lockscreen");
		} else if (!$this->currentUser->is_active) {
          redirect("login/index");
        }

        $this->menu_size=$this->session->userdata("menu_size");

        $this->session->set_userdata('last_activity',time());

		$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}

	/*
	 * Layout-ban a <title> -be
	 */
	public function getControllerLayoutTitle(){
		return "Colas CMS - ".$this->controller_display_name;
	}

	public function parseTemplateStaticSections(){

		$this->template->write('title', $this->getControllerLayoutTitle());
        $this->template->write('baseurl', base_url());
        $this->template->parse_view('topbar', 'topbar.tpl', array('displayName' => $this->controller_display_name, 'currentUser'=>$this->currentUser ));
        $this->template->parse_view('menu', 'menu.tpl', array(
        												'menu_size'=>$this->menu_size,
        												'currentMenu'=>$this->currentMenu,
        												'currentSubMenu'=>$this->currentSubMenu,
        												'currentUser'=>$this->currentUser)
        							);

        $this->template->parse_view('chat', 'chat.tpl', array());
        
        $this->template->add_js("js/main.js");
	}
	
}