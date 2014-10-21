<form action="invoice/save_invoice" method="post">
<input type="hidden" name="project_id" value="{$project_id}">


<div class="row">
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Új számla rögzítése</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="form-label"><strong>Cég, Vállalkozó</strong></label>
                                    <span class="tips"></span>
                                    <div class="controls">
                                                <select class="form-control" id="company_selector" data-style="input-sm btn-default" name="invoice_company">
                                                        {foreach $company_list as $company}
                                                        <option value="{$company->companyId}">{$company->companyName}</option>
                                                    {/foreach}        
                                        </select>
                                    </div>  
                                </div>      
                        </div>
                        
                    </div>    
        <!-- SZÁMLA TÖRZSADATOK -->                    	
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                <label class="form-label"><strong>Számla száma</strong></label>
                                <span class="tips"></span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="invoice_identifier">
                                </div>
                            </div>
                        </div>	
                        <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                <label class="form-label"><strong>Számla dátuma</strong></label>
                                <span class="tips"></span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="invoice_date">
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                <label class="form-label"><strong>Számla értéke</strong></label>
                                <span class="tips"></span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="invoice_value">
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                <label class="form-label"><strong>Fizetési határidő</strong></label>
                                <span class="tips"></span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="invoice_deadline">
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- SZÁLLÍTÓLEVELEK -->										
                    <div class="row border-top m-t-10 p-t-10">			

                                        

                   </div>
        <!-- MENTÉS -->
                    <div class="row border-top m-t-10 p-t-10">	
                        <div class="text-center">
                                <button type="submit" class="btn btn-success">Mentés</button>
                        </div>	
                    </div>	
                </div>
       </div>                	
</div>

</form>