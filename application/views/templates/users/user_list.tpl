<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-gray">
                            <h3 class="panel-title"><strong>Felhasználók</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-gray">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-dynamic">
                                        <thead>
                                            <tr>
                                                <th>Felhasználónév</th>
                                                <th>Teljes név</th>
                                                <th>Utoljára bejelentkezett</th>
                                                <th>Aktív</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	{foreach $user_list as $user}
                                            <tr>
                                                <td>{$user->nickname}</td>
                                                <td>{$user->full_name}</td>
                                                <td>{if $user->last_login>0} {$user->last_login|zengo_date_short} {else}never{/if}</td>
                                                <td><input type="checkbox" class="switch is_user_active" {if $user->is_active }checked{/if} {if $user->user_id == $current_user->user_id or $user->is_super_user or ( $user->is_user_manager and !$user_manager_edit_user_manager and !$current_user->is_super_user ) }readonly{/if} data-size="small" value="{$user->user_id}"></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-default"
                                                            {if ($user->is_super_user && !$current_user->is_super_user) || ($user->is_super_user && $user->user_id != $current_user->user_id && !$super_edit_super) || ($user->is_user_manager && !$user_manager_edit_user_manager && !$current_user->is_super_user && $user->user_id != $current_user->user_id) }
                                                                disabled
                                                            {else}
                                                                onclick="location.href='users/edit_user/{$user->user_id}'"
                                                            {/if}
                                                            ><i class="fa fa-gears"></i> Módosítás</button>
                                                </td>
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