 <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                         {if $user->avatar_id ==1}<img src="assets/img/avatars/avatar1_big.png"/>
                        {elseif $user->avatar_id ==2}<img src="assets/img/avatars/avatar2_big.png"/>
                        {elseif $user->avatar_id ==3}<img src="assets/img/avatars/avatar3_big.png"/>
                        {elseif $user->avatar_id ==4}<img src="assets/img/avatars/avatar4_big.png"/>
                        {elseif $user->avatar_id ==5}<img src="assets/img/avatars/avatar5_big.png"/>
                        {elseif $user->avatar_id ==6}<img src="assets/img/avatars/avatar6_big.png"/>
                        {elseif $user->avatar_id ==7}<img src="assets/img/avatars/avatar7_big.png"/>
                        {elseif $user->avatar_id ==8}<img src="assets/img/avatars/avatar8_big.png"/>
                        {elseif $user->avatar_id ==9}<img src="assets/img/avatars/avatar9_big.png"/>
                        {elseif $user->avatar_id ==10}<img src="assets/img/avatars/avatar10_big.png"/>
                        {elseif $user->avatar_id ==11}<img src="assets/img/avatars/avatar11_big.png"/>
                        {elseif $user->avatar_id ==12}<img src="assets/img/avatars/avatar12_big.png"/>
                        {elseif $user->avatar_id ==13}<img src="assets/img/avatars/avatar13_big.png"/>{/if}

                    </div>
                    <div>
                        <i class="glyph-icon flaticon-padlock23"></i>
                    </div>
                    <h3>{$user->nickname}</h3>
                    <hr />
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div {if $show_error}class="alert alert-danger"{else}class="alert alert-danger hide"{/if}>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Wrong password. Please try again.
                        </div>
                        <!-- END ERROR BOX -->
                        <form action="login/lockscreen" method="post">
                            <div class="col-md-12 form-input">
                                <input type="hidden" name="last_path" value="{$user->last_path}">
                                <input type="hidden" name="name" value="{$user->nickname}">
                                <input type="password" name="password" class="input-field form-control width-100p password" placeholder="Password" required/>
                            </div>
                            <button type="submit" class="btn btn-login btn-reset">Unlock</button>
                        </form>
                        
                        <div class="login-links">
                            <a href="login/index">Sign in using another account</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
