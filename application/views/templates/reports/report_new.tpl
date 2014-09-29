<script>
{literal}
function remove_product(item){
	console.log(item);
	$(item).parent().parent().parent().remove();

}

function add_new_product(){

	var form_row=$('#product_container').children().last().clone();
	$("#product_container").append(form_row);
	console.log(form_row);
}

$(function() {
    $("#company_selector").change(function(){
				var company_id=$("#company_selector").val();
				var project_id=$('input[name="project_id"]').val();
				$.post("reports/get_products",{company_id:company_id, project_id:project_id},function(data){
					if(data.success){
						$("#product_container").html(data.template);
						$("#plus_product").show();
					}
				},"json");
	});

	$("#plus_product").hide();
});
{/literal}

</script>

<form action="reports/save_report" method="post">
<input type="hidden" name="project_id" value="{$project_id}">


<div class="row">
	
			<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Új szállítmány rögzítése</strong></h3>
                        </div>
                        <div class="panel-body">


<!-- CÉG KIVÁLASZTÁS, SZÁLLÍTÓLEVÉL -->                    	
			                            <div class="row">
			                            			<div class="col-md-3 col-sm-12 col-xs-12">
			                            				<div class="form-group">
					                                        <label class="form-label"><strong>Szállítólevél azonosító</strong></label>
					                                        <span class="tips"></span>
					                                        <div class="controls">
					                                            <input type="text" class="form-control" name="waybill_identifier">
					                                        </div>
					                                    </div>

			                            			</div>	
				                            		<div class="col-md-3 col-sm-12 col-xs-12">
				                            			<div class="form-group">
					                                        <label class="form-label"><strong>Cég, Vállalkozó</strong></label>
					                                        <span class="tips"></span>
					                                        <div class="controls">
																<select class="form-control" id="company_selector" data-style="input-sm btn-default" name="company">
																	{foreach $company_list as $company}
																        <option value="{$company->companyId}">{$company->companyName}</option>
																    {/foreach}        
														        </select>
														    </div>  
														</div>      
													</div>

													<div class="col-md-3 col-md-offset-3 col-sm-6 col-sm-offset-6 col-xs-8 col-sm-offset-4">
														<!-- div class="pull-right m-t-20">
															<button type="button" class="btn btn-primary">
																<i class="fa fa-plus"></i> Anyagok felvétele
															</button>
														</div -->	
													</div>	


										</div>
<!-- TERMÉKEK -->										
										<div class="row border-top m-t-10 p-t-10">			

											<div id="product_container" class="col-md-11 col-md-offset-1">
													
											</div>
											<div id="plus_product" class="col-md-4 col-md-offset-8">
														<div class="pull-right m-t-20">
															<button type="button" class="btn btn-sm btn-primary" onClick="javascript:add_new_product();">
																<i class="fa fa-plus"></i> 
															</button>
														</div>
												</div>

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