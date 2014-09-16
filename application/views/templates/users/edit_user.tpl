 <div class="row ">
                <div class="col-md-12 m-20">
                    <form action="users/edit_user" method="post"  class="form-horizontal" role="form" id="settings">
                            <div class="panel">
                                    <div class="space20"></div>
                                    <div class="m-20" id="general_settings">
                                        <div class="row profile">
                                            <div class="col-md-12">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-12 profile-info">
                                                                    {if $user->user_id ==0}
                                                                        <h1>Új felhsználó</h1>
                                                                    {else}
                                                                        <h1>{$user->full_name|upper}</h1>
                                                                        <h4>Member since: {$user->reg_date|zengo_date_short}</h4>
                                                                    {/if}

                                                                    <input type="hidden" name="user_id" value="{$user->user_id}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-info c-gray m-r-10"></i> ADATOK</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Felhasználónév:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"  name="nickname" value="{$user->nickname}" id="nickname" />
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Teljes név:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="full_name" value="{$user->full_name}"></div>

                                                                </div>
                                                                {if $user->user_id>0 && $current_user->user_id==$user->user_id}
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Régi jelszó:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="password" class="form-control"  name="old_password" value="" id="old_password"></div>

                                                                </div>
                                                                {/if}
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Új jelszó:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="password" class="form-control"  name="password" value="" id="first_password"></div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Jelszó mégegyszer:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="password" class="form-control"  name="passwordre" value="" id="second_password"></div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row profile-classic">
                                                    <div class="col-md-12 m-t-20">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-phone c-gray m-r-10"></i> ELÉRHETŐSÉG</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Email:</div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="email" value="{$user->email}" id="email" >
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Telefonszám:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"  name="phone_number" value="{$user->phone_number}">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-group c-gray m-r-10"></i> AVATAR</div>
                                                            </div>
                                                            <div class="panel-body">
															{literal}
															<style>
																.edit_user_avatar {display: inline-block;height:70px; width:100px; float:left;}
																.edit_user_avatar .iradio_flat-blue{position: relative !important;
																			display: inline-block;
																			left: 25px;
																			top: -10px;}
															</style>
                                                             {/literal}   
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar1" type="radio"  name="avatar_id" value="1" {if $user->avatar_id == 1}checked{/if}/>
                                                                        <label for="avatar1"><img src="assets/img/avatars/avatar1.png" /></label>
                                                                      </div>    
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar2" type="radio"  name="avatar_id" value="2" {if $user->avatar_id == 2}checked{/if}/>
                                                                        <label for="avatar2"><img src="assets/img/avatars/avatar2.png" /></label>
                                                                      </div>   
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar3" type="radio"  name="avatar_id" value="3"  {if $user->avatar_id == 3}checked{/if}/>
                                                                        <label for="avatar3"><img src="assets/img/avatars/avatar3.png" /></label>
                                                                      </div>       
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar4" type="radio"  name="avatar_id" value="4"  {if $user->avatar_id == 4}checked{/if}/>
                                                                        <label for="avatar4"><img src="assets/img/avatars/avatar4.png" /></label>
                                                                      </div>        
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar5" type="radio"  name="avatar_id" value="5"  {if $user->avatar_id == 5}checked{/if}/>
                                                                        <label for="avatar5"><img src="assets/img/avatars/avatar5.png" /></label>
                                                                      </div>       
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar6" type="radio"  name="avatar_id" value="6"  {if $user->avatar_id == 6}checked{/if}/>
                                                                        <label for="avatar6"><img src="assets/img/avatars/avatar6.png" /></label>
                                                                      </div>      
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar7" type="radio"  name="avatar_id" value="7"  {if $user->avatar_id == 7}checked{/if}/>
                                                                        <label for="avatar7"><img src="assets/img/avatars/avatar7.png" /></label>
                                                                      </div>      
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar8" type="radio"  name="avatar_id" value="8"  {if $user->avatar_id == 8}checked{/if}/>
                                                                        <label for="avatar8"><img src="assets/img/avatars/avatar8.png" /></label>
                                                                      </div>    
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar9" type="radio"  name="avatar_id" value="9"  {if $user->avatar_id == 9}checked{/if}/>
                                                                        <label for="avatar9"><img src="assets/img/avatars/avatar9.png" /></label>
                                                                      </div>   
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar10" type="radio"  name="avatar_id" value="10"  {if $user->avatar_id == 10}checked{/if}/>
                                                                        <label for="avatar10"><img src="assets/img/avatars/avatar10.png" /></label>
                                                                      </div>       
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar11" type="radio"  name="avatar_id" value="11"  {if $user->avatar_id == 11}checked{/if}/>
                                                                        <label for="avatar11"><img src="assets/img/avatars/avatar11.png" /></label>
                                                                     </div>   
  
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar12" type="radio"  name="avatar_id" value="12"  {if $user->avatar_id == 12}checked{/if}/>
                                                                        <label for="avatar12"><img src="assets/img/avatars/avatar12.png" /></label>
                                                                      </div>    
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar13" type="radio"  name="avatar_id" value="13"  {if $user->avatar_id == 13}checked{/if}/>
                                                                        <label for="avatar13"><img src="assets/img/avatars/avatar13.png" /></label>
                                                                      </div>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {if $current_user->is_super_user }
                                                 <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-phone c-gray m-r-10"></i> JOGOSULTSÁG</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                     <div class="form-group">
                                                                            <div class="skin-section">
                                                                                <ul class="list">
                                                                                    <li>
                                                                                         <div class="row-fluid">
                                                                                        <label for="is_foreman">
                                                                                                    <input type="checkbox" id="is_foreman" {if $user->is_foreman}checked{/if} data-size="small" name="is_foreman">
                                                                                                    Művezető
                                                                                        </label>
                                                                                         </div>
                                                                                    </li>
                                                                                    <li>
                                                                                         <div class="row-fluid">
                                                                                        <label for="is_economic">
                                                                                                    <input type="checkbox" id="is_economic" {if $user->is_economic}checked{/if} data-size="small" name="is_economic">
                                                                                                    Gazdasági ügyintéző
                                                                                        </label>
                                                                                         </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                            </div>    
                                                       </div> 
                                                    </div>      
                                                </div> 
                                                {/if}           




                                                <div class="col-sm-12">
                                                    <div class="align-center">
                                                        <button class="btn btn-primary m-r-20" id="submit1">Mentés</button>
                                                        {*<button type="reset" class="btn btn-default">Mégse</button>*}
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                 
                             </div>           
                        </form>
                </div>
            </div>
{if $success_operation !== false }
    <script type="text/javascript">
        $(function() {
            {if $success_operation == "new" }
                show_success_notification("The new user created");
            {elseif $success_operation == "modify" }
                show_success_notification("The profile has been modified successfully");
            {/if}
        });
    </script>
{/if}
<script src="assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
 
