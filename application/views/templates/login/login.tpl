<div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                         <img src="assets/img/account/login-logo.png" alt="Company Logo">
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div {if $show_error}class="alert alert-danger"{else}class="alert alert-danger hide"{/if}>
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error!</h4>
                            {$error_msg}
                        </div>
                        <!-- END ERROR BOX -->
                        <form action="login/index" method="post">
                            <input type="text" name="name" placeholder="Username" class="input-field form-control user" />
                            <input type="password" name="password" placeholder="Password" class="input-field form-control password" />
                            <button type="submit" class="btn btn-login">Login</button>
                        </form>
                        
                    </div>
                </div>
               
            </div>
        </div>
</div>
<script type="text/javascript">
    var ls = window.localStorage;
    
    if (ls) {
        ls.clear();
    }
</script>
