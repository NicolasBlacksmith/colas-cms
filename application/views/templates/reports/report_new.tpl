<script>

function start_add_products(){


}

</script>

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
					                                            <input type="text" class="form-control">
					                                        </div>
					                                    </div>

			                            			</div>	
				                            		<div class="col-md-3 col-sm-12 col-xs-12">
				                            			<div class="form-group">
					                                        <label class="form-label"><strong>Cég, Vállalkozó</strong></label>
					                                        <span class="tips"></span>
					                                        <div class="controls">
																<select class="form-control" data-style="input-sm btn-default">
																	{foreach $company_list as $company}
																            <option>{$company->companyName}</option>
																    {/foreach}        
														        </select>
														    </div>  
														</div>      
													</div>

													<div class="col-md-3 col-md-offset-3 col-sm-6 col-sm-offset-6 col-xs-8 col-sm-offset-4">
														<div class="pull-right m-t-20">
															<button type="button" class="btn btn-primary">
																<i class="fa fa-plus"></i> Anyagok felvétele
															</button>
														</div>	
													</div>	


										</div>
<!-- TERMÉKEK -->										
										<div class="row border-top m-t-10 p-t-10">			

											<div id="product_container" class="col-md-11 col-md-offset-1">
												<div class="row">
																<div class="col-md-6 col-sm-6 col-xs-4">
																	<div class="form-group">
								                                        <label class="form-label"><strong>Termék, anyag</strong></label>
								                                        <span class="tips"></span>
								                                        <div class="controls">
																				<select class="form-control" data-style="input-sm btn-default">
																					{foreach $product_list as $product}
																				            <option>{$product->productName}</option>
																				    {/foreach}        
																		        </select>
																		</div>
																	</div>	        
																</div>	
																<div class="col-md-5 col-sm-5 col-xs-4">
																	<div class="form-group">
								                                        <label class="form-label"><strong>Mennyiség</strong> </label>
								                                        <span class="tips"></span>
								                                        <div class="controls">
								                                            <input type="text" class="form-control"> 
								                                        </div>
								                                    </div>
																</div>	

																<div class="col-md-1 col-sm-1 col-xs-2 p-t-20">
																	<div class="pull-right">
																		<button type="button" class="btn btn-sm btn-danger">
																			<i class="fa fa-minus"></i> 
																		</button>
																	</div>	

																</div>	

												</div>
												<div class="row">
														<div class="pull-right m-t-20">
															<button type="button" class="btn btn-sm btn-primary">
																<i class="fa fa-plus"></i> 
															</button>
														</div>
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