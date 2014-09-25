<?php

/**
* Company class
* Egy alvállalkozó reprezentálására szolgál
*/
class Company
{
	
	public $companyId;
	public $companyName;
	public $companyShortName;


	function __construct()
	{
		$this->companyName="Default company Ltd.";
		$this->companyShortName="DC Ltd.";
		$this->companyId=0;

	}


	public function set_attributes_by_db_object ($db_object){
		$this->companyId=$db_object->id;
		$this->companyName=$db_object->company_name;
		$this->companyShortName=$db_object->short_name;


	}



}


?>