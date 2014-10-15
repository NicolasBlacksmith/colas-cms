<style>
{literal}
    #DataTables_Table_0_filter{
        float: right;
    }
{/literal}
</style>

<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-blue">
                            <h3 class="panel-title"><strong>Összesítő</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-gray">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-dynamic">
                                        <thead>
                                            <tr>
                                                <th>Szállítólevél</th>
                                                <th>Dátum</th>
                                                <th>Rögzítette</th>
                                                <th>Cég</th>
                                                <th>Termék</th>
                                                <th>Mennyiség</th>
                                                <th>Egységár</th>
                                                <th>Ár</th>
                                                <th>Hányad</th>    
                                            </tr>
                                        </thead>
                                        <tbody>
                                    	{foreach $list as $dailyreport}
                                            <tr>
                                                <td rowspan="{$dailyreport->getNumberOfItems()}">{$dailyreport->wayBillIdentifier}</td>
                                                <td rowspan="{$dailyreport->getNumberOfItems()}">{$dailyreport->createdTime|zengo_date_long}</td>
                                                <td rowspan="{$dailyreport->getNumberOfItems()}">{$dailyreport->user->full_name}</td>
                                                <td rowspan="{$dailyreport->getNumberOfItems()}">{$dailyreport->company->companyName}</td>

                                               {foreach $dailyreport->items as $product} 
                                               {if $product@first} 
                                                    <td>{$product->productName}</td>
                                                    <td>{$product->quantity} {$product->unit->unit}</td>
                                                    <td>{$product->unitPrice}</td>
                                                    <td>{$product->unitPrice*$product->quantity}</td>
                                                    <td>{$product->getConsumptionRate()}</td>
                                                {else}
                                                    {break}
                                                {/if}     
                                               {/foreach}

                                           </tr>
                                           {foreach $dailyreport->items as $product}
                                               {if !$product@first} 
                                                <td>{$product->productName}</td>
                                                <td>{$product->quantity} {$product->unit->unit}</td>
                                                <td>{$product->unitPrice}</td>
                                                <td>{$product->unitPrice*$product->quantity}</td>
                                                <td>{$product->getConsumptionRate()}</td>
                                                {/if} 
                                           {/foreach}
                                        {/foreach}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>