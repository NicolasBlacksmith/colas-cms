<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("MY_Controller.php");

class Reports extends MY_Controller{
	

	public function __construct(){
		parent::__construct();

		$this->controller_display_name="Jelentések";
		$this->currentMenu=MenuItems::DAILYREPORTS;

		$this->load->model("product_model");

	}

	public function newreport(){
		$this->currentSubMenu=DailyReportsbMenuItems::NEWREPORT;
		$this->parseTemplateStaticSections();

		$company_list=$this->product_model->get_subcontractors_in_project(1);
		$product_list=$this->product_model->get_products_in_project_by_company_id(1,2);

		$send_to_template = array(
			'company_list' => $company_list, 
			'product_list' => $product_list,
			'project_id'   =>1
			);

        $this->template->parse_view('content','reports/report_new.tpl',$send_to_template);
        $this->template->render();
	}

	public function get_products(){
		$response["success"]=false;
		if (array_key_exists("company_id", $_POST) && array_key_exists("project_id", $_POST) ) {
			$product_list=$this->product_model->get_products_in_project_by_company_id($_POST["project_id"],$_POST["company_id"]);	

			$response["template"]=$this->mysmarty->parse("reports/products_form_row.tpl",array('product_list' => $product_list ),true);
			$response["success"]=true;
		}
		echo json_encode($response);
		exit;
	}


	public function myreports(){
		$this->currentSubMenu=DailyReportsbMenuItems::REPORTLIST;
		$this->parseTemplateStaticSections();

        $this->template->parse_view('content','reports/report_list.tpl',array());
        $this->template->render();
	}








}