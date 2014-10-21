<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("MY_Controller.php");

class Invoice extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $this->controller_display_name="Számlák";
        $this->currentMenu=MenuItems::ECONOMIC;

        $this->load->model("product_model");
    }

    public function newinvoice(){
        $this->currentSubMenu=EconomicSubMenuItems::NEWINVOICE;
	$this->parseTemplateStaticSections();
        
        $company_list=$this->product_model->get_subcontractors_in_project(1);
        
        $send_to_template = array(
                        'company_list' => $company_list,
			'project_id'   =>1
			);

        $this->template->parse_view('content','invoice/invoice_new.tpl',$send_to_template);
        $this->template->render();
    }
    
    
    
    public function invoicelist(){
        $this->currentSubMenu=EconomicSubMenuItems::INVOICELIST;
	$this->parseTemplateStaticSections();
        
    }
    
    
}