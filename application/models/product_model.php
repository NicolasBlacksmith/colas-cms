<?php


class Product_model extends CI_Model{

  function __construct()
  {
    parent::__construct();
  }

  public function get_subcontractors_in_project($project_id){
  	$this->db->select("subcontractors.*");
  	$this->db->join("products","products.subcontractor_id=subcontractors.id");
  	$this->db->join("project_products","products.id=project_products.product_id");
  	$this->db->where("project_id",$project_id);
    $this->db->distinct();
  	$query=$this->db->get("subcontractors");

    $companyList=new ArrayObject();

  	if( $query->num_rows()!=0 ){
        foreach ($query->result() as $row)
        {
          $company=new Company();
          $company->set_attributes_by_db_object($row);
        	$companyList->append($company);
    	   }
    }      	

    return $companyList;
  }

  public function get_products_in_project_by_company_id($project_id, $company_id){
    $this->db->select("products.*, units.unit");
    $this->db->join("units", "products.unit_id=units.id");
    $this->db->join("project_products", "products.id=project_products.product_id");
    $this->db->where("products.subcontractor_id",$company_id);
    $this->db->where("project_products.project_id",$project_id);
    $this->db->distinct();
    $query=$this->db->get("products");

    $productList=new ArrayObject();

    if( $query->num_rows()!=0 ){
        foreach ($query->result() as $row)
        {
          $product=new Product();
          $product->set_attributes_by_db_object($row);
          $productList->append($product);
         }
    }       

    return $productList;
  }

  public function insert_daily_report(DailyReport $dailyReport){
    $this->db->insert("daily_reports",array(
          'project_id' => $dailyReport->projectId,
          'user_id' => $dailyReport->user->user_id,
          'created_time'=> $dailyReport->createdTime,
          'debit_day_time' => $dailyReport->debitDayTime,
          'waybill_identifier' => $dailyReport->wayBillIdentifier
        ));

    return $this->db->insert_id();
  }

  public function insert_daily_report_product(DailyReport $dailyReport, Product $product){
    $this->db->insert("report_details", array(
        "report_id" => $dailyReport->reportId,
        "product_id" => $product->productId,
        "quantity" => $product->quantity
      ));

  }




}