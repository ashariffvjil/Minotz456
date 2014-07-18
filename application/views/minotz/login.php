





<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
										<div id="validation-error" ></div>


                    <div class="panel-body">
                      <?php print_r($_SESSION); echo form_open('login/check', array('id'=>'frm')); ?>
                            <fieldset>
                                <div class="form-group">
                                 <input class="form-control" placeholder="User name" name="username" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button  type="submit"class="btn btn-lg btn-primary btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	<script type="text/javascript">
		$(document).ready(function() {
$('#frm').submit(function(){
	
	$.post($('#frm').attr('action'), $('#frm').serialize(), function( data ) {
	if(data.st == 0)
		{
		 $('#validation-error').html(data.msg).addClass('alert alert-danger');
		}
				
		if(data.st == 1)
		{
		  window.location.href='home.html';
		}
				
	}, 'json');
	return false;			
   });

	
});
</script>