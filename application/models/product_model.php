<?php


class Product_model extends CI_Model{

  function __construct()
  {
    parent::__construct();

    $this->load->model("user_model");

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

  public function get_report_list_by_user($user){
    
    $this->db->where("daily_reports.user_id",$user->user_id);
    $this->db->order_by("created_time");
    $query=$this->db->get("daily_reports");

    $report_list=new ArrayObject();

    if( $query->num_rows()!=0 ){
        foreach ($query->result() as $row)
        {
          $dailyReport=new DailyReport(); 

          $dailyReport->set_attributes_by_db_object($row);
          $dailyReport->user=$this->user_model->get_user_by_id($row->user_id);
          $dailyReport->company=$this->get_report_company($dailyReport);
          $dailyReport->items=$this->get_report_products($dailyReport);
          $report_list->append($dailyReport);
        }
    }     

    return $report_list;
  }

  public function get_report_company(DailyReport $dailyReport){
    $this->db->select("subcontractors.*");
    $this->db->join("products", "products.subcontractor_id=subcontractors.id");
    $this->db->join("report_details", "report_details.product_id=products.id");
    $this->db->where("report_details.report_id",$dailyReport->reportId);
    $this->db->limit(1);  
    $query=$this->db->get("subcontractors");

    $company=new Company();
    if( $query->num_rows()!=0 ){
          foreach ($query->result() as $row)
          { 
            $company->set_attributes_by_db_object($row);
          }  
    }

    return $company;
  }

  public function get_report_products(DailyReport $dailyReport, $project_id=0){
      if ($project_id!=0) {
        $this->db->select("products.*, units.unit, project_products.total_amount, project_products.unit_price, report_details.quantity");
      }else{
        $this->db->select("products.*, units.unit");
      }
      $this->db->join("units", "products.unit_id=units.id");
      $this->db->join("report_details", "report_details.product_id=products.id");
      
      if ($project_id!=0) {
        $this->db->join("project_products", "project_products.product_id=products.id");
        $this->db->where("project_products.project_id",$project_id);
      }
      
      $this->db->where("report_details.report_id",$dailyReport->reportId);
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

  public function get_all_reports_in_projcet($project_id){
    $this->db->where("daily_reports.project_id",$project_id);
    $this->db->order_by("created_time");
    $query=$this->db->get("daily_reports");

    $report_list=new ArrayObject();

    if( $query->num_rows()!=0 ){
        foreach ($query->result() as $row)
        {
          $dailyReport=new DailyReport(); 

          $dailyReport->set_attributes_by_db_object($row);
          $dailyReport->user=$this->user_model->get_user_by_id($row->user_id);
          $dailyReport->company=$this->get_report_company($dailyReport);
          $dailyReport->items=$this->get_report_products($dailyReport,$project_id);

          $report_list->append($dailyReport);
        }
    }     

    return $report_list;
  }

  public function get_reports_by_project_id_company_id($project_id,$company_id) {
    $this->db->select("daily_reports.*");
    $this->db->join("report_details", "report_details.product_id=products.id");
    $this->db->join("products", "products.id=report_details.product_id");
    $this->db->where("daily_reports.project_id",$project_id);
    $this->db->where("products.subcontractor_id",$company_id);
    $this->db->order_by("created_time");
    
    $query=$this->db->get("daily_reports");

    $report_list=new ArrayObject();
      
    if( $query->num_rows()!=0 ){
        foreach ($query->result() as $row)
        {
          $dailyReport=new DailyReport(); 

          $dailyReport->set_attributes_by_db_object($row);
          $dailyReport->user=$this->user_model->get_user_by_id($row->user_id);
          $dailyReport->company=$this->get_report_company($dailyReport);
          $dailyReport->items=$this->get_report_products($dailyReport,$project_id);

          $report_list->append($dailyReport);
        }
    }     
    return $report_list; 
      
  }


}