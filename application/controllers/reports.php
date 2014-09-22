<?php

class Reports extends MY_Controller{
	

	public function __construct(){
		parent::__construct();

		$this->controller_display_name="Jelentések";
		$this->currentMenu=MenuItems::DAILYREPORTS;

	}

	public function newreport(){
		$this->$currentSubMenu=DailyReportsbMenuItems::NEWREPORT;

	}

	public function myreports(){
		$this->$currentSubMenu=DailyReportsbMenuItems::REPORTLIST;

	}





}