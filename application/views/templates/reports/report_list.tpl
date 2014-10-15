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
                        <div class="panel-heading bg-gray">
                            <h3 class="panel-title"><strong>Jelentések listája</strong></h3>
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
                                                <th>Termékek száma</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            	{foreach $list as $dailyreport}
                                                    <tr>
                                                        <td>{$dailyreport->wayBillIdentifier}</td>
                                                        <td>{$dailyreport->createdTime|zengo_date_long}</td>
                                                        <td>{$dailyreport->user->full_name}</td>
                                                        <td>{$dailyreport->company->companyName}</td>
                                                        <td>{$dailyreport->getNumberOfItems()}</td>
                                                    </tr>
                                                {/foreach}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>