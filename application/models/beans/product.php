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
	public $quantity;

	public $unitPrice;
	public $totalAmount;

	function __construct()
	{
		$this->productName="Default product";
		$this->productId=0;
		$this->quantity=0;

		$this->unit = new Unit();

		$this->unitPrice=0;
		$this->totalAmount=0;

	}


	public function set_attributes_by_db_object ($db_object){
		$this->productId=$db_object->id;
		$this->productName=$db_object->product_name;
		
		$this->unit=new Unit();
		$this->unit->unitId=$db_object->unit_id;
		$this->unit->unit=$db_object->unit;

		if (property_exists($db_object, "quantity") ) {
			$this->quantity=$db_object->quantity;
		}

		if (property_exists($db_object, "unit_price") ) {
			$this->unitPrice=$db_object->unit_price;
		}
		if (property_exists($db_object, "total_amount") ) {
			$this->totalAmount=$db_object->total_amount;
		}

	}	

	public function getConsumptionRate(){
		return $this->quantity/$this->totalAmount*100;
	}



}
?>