<?php
/**
* DailyReport
* Napi jelentéseket reprezentál
*/

class DailyReport
{
	
	public $reportId;
	public $projectId;
	public $user;
	public $createdTime;
	public $debitDayTime;
	public $wayBillIdentifier;


	function __construct()
	{
		$this->reportId=0;
		$this->projectId=0;

		$this->user=new User();
		
		$this->createdTime=0;
		$this->debitDayTime=0;
		$this->wayBillIdentifier=0;

	}




}


?>