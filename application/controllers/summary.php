<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("MY_Controller.php");

class Summary extends MY_Controller{
	

	public function __construct(){
		parent::__construct();

		$this->controller_display_name="Összesítő";
		$this->currentMenu=MenuItems::SUMMARY;

		$this->load->model("product_model");

	}


	public function index(){

		$this->parseTemplateStaticSections();

		$list=$this->product_model->get_all_reports_in_projcet(1);

        $this->template->parse_view('content','summary/summary.tpl',array("list"=>$list));
        $this->template->render();

	}


}