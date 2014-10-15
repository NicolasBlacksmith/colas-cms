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

	public $company;
	public $items;

	function __construct()
	{
		$this->reportId=0;
		$this->projectId=0;

		$this->user=new User();
		
		$this->createdTime=0;
		$this->debitDayTime=0;
		$this->wayBillIdentifier=0;

		$this->company = new Company();
		$this->items = new ArrayObject();

	}


	public function set_attributes_by_db_object($object){

		$this->reportId=$object->id;
		$this->projectId=$object->project_id;
		
		$this->createdTime=$object->created_time;
		$this->debitDayTime=$object->debit_day_time;
		$this->wayBillIdentifier=$object->waybill_identifier;
	}


	public function getNumberOfItems(){
		return $this->items->count();
	}
	

}


?>