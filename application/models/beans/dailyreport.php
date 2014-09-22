<?php
/**
* DailyReport
* Napi jelentéseket reprezentál
*/

class DailyReport
{
	
	public $reportId;
	public $user;
	public $createdTime;
	public $debitDayTime;
	public $product;
	public $quantity;
	public $wayBillIdentifier;


	function __construct()
	{
		$this->reportId=0;
		$this->user=new User();
		$this->createdTime=0;
		$this->debitDayTime=0;
		$this->product= new Product();
		$this->quantity = 0;
		$this->wayBillIdentifier=0;

	}
}


?>