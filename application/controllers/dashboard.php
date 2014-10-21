<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("MY_Controller.php");

class Dashboard extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->controller_display_name="Dashboard";
		$this->currentMenu=MenuItems::DASHBOARD;
                
	}
        

	public function index()
	{

		
	$this->parseTemplateStaticSections();
        $this->template->parse_view('content','dashboard/dashboard.tpl',array());
        $this->template->render();
        
        }	
        
        
}	