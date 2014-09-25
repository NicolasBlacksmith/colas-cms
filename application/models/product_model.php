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




}