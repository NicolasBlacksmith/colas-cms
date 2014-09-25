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

	function __construct()
	{
		$this->productName="Default product";
		$this->productId=0;

		$this->unit = new Unit();
	}


	public function set_attributes_by_db_object ($db_object){
		$this->productId=$db_object->id;
		$this->productName=$db_object->product_name;
		
		$this->unit=new Unit();
		$this->unit->unitId=$db_object->unit_id;
		$this->unit->unit=$db_object->unit;


	}	
}
?>