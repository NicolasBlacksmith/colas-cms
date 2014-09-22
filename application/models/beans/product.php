<?php
/**
* Product
* Egy adott termék reprezentálására szolgál
*/

class Product
{
	
	public $productId;
	public $productName;
	public $unit;
	public $companyId;

	function __construct()
	{
		$this->productName="Default product";
		$this->productId=0;
		$this->companyId=0;

		$this->unit = new Unit();

	}
}
?>