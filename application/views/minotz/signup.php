



<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign Up !!</h3>
                    </div>
					<div id="validation-error" ></div>
                    <div class="panel-body">
                       <?php echo form_open('login/save_signup', array('id'=>'frm')); ?>
                    
					        <fieldset>
                                <div class="form-group">
                                  <?php echo form_error('username', '<div class="error">', '</div>'); ?>
								 <input class="form-control" placeholder="User Name" value="<?php echo set_value('username'); ?>" name="username" type="text" autofocus="">
                                </div>
								  <div class="form-group">
                                 <input class="form-control" placeholder="Email Address" value="<?php echo set_value('email'); ?>" name="email" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" name="password" type="password" value="">
                                </div>
							    <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" value="<?php echo set_value('re-password'); ?>" name="re-password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button  type="submit"class="btn btn-lg btn-primary btn-block">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<script type="text/javascript">
/*		$(document).ready(function() {
$('#frm').submit(function(){
	
	$.post($('#frm').attr('action'), $('#frm').serialize(), function( data ) {
	if(data.st == 0)
		{
		 $('#validation-error').html(data.msg).addClass('alert alert-danger');
		}
				
		if(data.st == 1)
		{
		  window.location.href='../login.html';
		}
				
	}, 'json');
	return false;			
   });

	
});*/
</script>
