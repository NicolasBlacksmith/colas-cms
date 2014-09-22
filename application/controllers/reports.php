<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("MY_Controller.php");

class Reports extends MY_Controller{
	

	public function __construct(){
		parent::__construct();

		$this->controller_display_name="Jelentések";
		$this->currentMenu=MenuItems::DAILYREPORTS;

	}

	public function newreport(){
		$this->currentSubMenu=DailyReportsbMenuItems::NEWREPORT;
		$this->parseTemplateStaticSections();


        $this->template->parse_view('content','reports/report_new.tpl',array());
        $this->template->render();
	}

	public function myreports(){
		$this->currentSubMenu=DailyReportsbMenuItems::REPORTLIST;
		$this->parseTemplateStaticSections();

        $this->template->parse_view('content','reports/report_list.tpl',array());
        $this->template->render();
	}





}