<?php

/**
* Company class
* Egy alvállalkozó reprezentálására szolgál
*/
class Company
{
	
	public $companyId;
	public $companyName;


	function __construct()
	{
		$this->companyName="Default company Ltd.";
		$this->companyId=0;

	}
}


?>