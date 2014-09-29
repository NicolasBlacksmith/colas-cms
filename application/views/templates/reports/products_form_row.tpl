<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-4">
					<div class="form-group">
                        <label class="form-label"><strong>Termék, anyag</strong></label>
                        <span class="tips"></span>
                        <div class="controls">
								<select class="form-control" data-style="input-sm btn-default" name="product[]">
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
                            <input type="text" class="form-control" name="quantity[]"> 
                        </div>
                    </div>
				</div>	

				<div class="col-md-1 col-sm-1 col-xs-2 p-t-20">
					<div class="pull-right">
						<button type="button" class="btn btn-sm btn-danger" onClick="javascript:remove_product(this);">
							<i class="fa fa-minus"></i> 
						</button>
					</div>	

				</div>	

</div>
												