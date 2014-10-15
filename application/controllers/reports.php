<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("MY_Controller.php");

class Reports extends MY_Controller{
	

	public function __construct(){
		parent::__construct();

		$this->controller_display_name="Jelentések";
		$this->currentMenu=MenuItems::DAILYREPORTS;

		$this->load->model("product_model");

	}


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
*   NAPI JELENTÉSEK
*/
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

	public function save_report(){

		if (array_key_exists("project_id", $_POST) && array_key_exists("waybill_identifier", $_POST) && array_key_exists("quantity", $_POST) ) {
			$dailyReport = new DailyReport();

			$dailyReport->user=$this->currentUser;
			$dailyReport->createdTime=time();
			$dailyReport->debitDayTime=time();

			$dailyReport->projectId=$_POST["project_id"];
			$dailyReport->wayBillIdentifier=$_POST["waybill_identifier"];

			$dailyReport->reportId=$this->product_model->insert_daily_report($dailyReport);

			foreach ($_POST["product"] as $key => $value) {
				$product = new Product();
				$product->productId=$_POST["product"][$key];
				$product->quantity=$_POST["quantity"][$key];

				$this->product_model->insert_daily_report_product($dailyReport, $product );
			}

		}

		redirect("reports/myreports");
	}


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
*  JELENTÉSEK LISTÁJA
*/
	public function myreports(){
		$this->currentSubMenu=DailyReportsbMenuItems::REPORTLIST;
		$this->parseTemplateStaticSections();

		$report_list=$this->product_model->get_report_list_by_user($this->currentUser);

        $this->template->parse_view('content','reports/report_list.tpl',array("list"=>$report_list));
        $this->template->render();
	}








}