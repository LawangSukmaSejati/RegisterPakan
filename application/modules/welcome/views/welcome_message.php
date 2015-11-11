<!--div class="jumbotron">
	<h1><?php echo "Welcome to sisinfo";//lang('welcome_to_codeigniter'); ?></h1>
	<p><?php //echo lang('generated_by_codeigniter'); ?></p>
	
</div-->

<div class="row">
	<div class="col-md-3"></div>
	
	<div class="col-md-6">
		<div class="modal" style="position: relative;  display: block;">
            <div class="modal-dialog" style="width:auto;" >
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="login">
                    <div class="modal-header">
                        <h3 class="modal-title">Welcome to KKP System</h3>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username" class="control-label col-sm-3">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" id="username" value="" class="form-control">
                            </div>
                        </div>
						<div class="form-group">
							<label for="password" class="control-label col-sm-3">Password</label>
							<div class="col-sm-9">
								<input type="password" name="password" id="password" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" value="1">
										Remember Me                             </label>
								</div>
							</div>
						</div>
					</div>
						
					<div class="modal-footer">                    
						<center><div id="loading"></div></center>
						<input type="submit" name="login-button" value="Login" onclick="logins(this);" id="login-button" class="btn-primary btn btn-large">
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-3"></div>
</div>

<script type="text/javascript">
var url = "<?php echo site_url(); ?>";
function logins(){
    $('#login').validate({
        rules: {
            username: {            
                required: true
            },
            password: {
                required: true
            },
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element
            .text('OK!').addClass('valid')
            .closest('.control-group').removeClass('error').addClass('success');
        },
        submitHandler: function(form){
            $.ajax({
                url: url+'authorize/login_is_ajax',
                type: "POST",
                dataType:"json",
                data: $("#login").serialize(),
                beforeSend: function(){
                    $("#loading").html('Loading . . . '); 
                },
                success:function(data){
                    if(data.rescode ==0){
						$("#loading").hide();
                        $.pnotify({
                            title: 'Login success',
                            //text: 'Post Created',
                            animation: {
                                effect_in: 'show',
                                effect_out: 'slide'
                            },
                            type : "success",
                        });
                            
                        setInterval(function() {
                            
                            window.location.reload();
                        }, 1000);
                    }else{
						 $("#loading").hide();
                        $.pnotify({
                            title: 'Login Failed',
                            text: 'Login Failed',
                            animation: {
                                effect_in: 'show',
                                effect_out: 'slide'
                            },
                            type : "danger",
                        });
                    }
                },
                error: function(){
                    $("#msg").slideDown();
                }
            }); 
        },          
        debug:true
    });
}
</script>
<style type="text/css">
    label.valid {
        width: 24px;
        height: 24px;
        display: inline-block;
        text-indent: -9999px;
    }
    label.error {
        font-weight: bold;
        color: red;
        padding: 2px 8px;
        margin-top: 2px;
    }
</style>