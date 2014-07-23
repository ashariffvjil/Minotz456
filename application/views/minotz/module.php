
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Create Module</h3>
			</div>
			<div id="validation-error" ></div>
			<div class="panel-body">
			 <?php echo form_open('module/configurator', array('id'=>'frm')); ?>
					<fieldset>
						<div class="form-group">
						 <?php echo form_error('module_name', '<div class="error">', '</div>'); ?>
						 <input class="form-control" placeholder="Name of the module" name="module_name" type="text" autofocus="">
						</div>
						
						<!-- Change this to a button or input when using this as a form -->
						<button  type="submit"class="btn btn-lg btn-primary btn-block">Create Module</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
/*$(document).ready(function() {
	$('#frm').submit(function(){
		$.post($('#frm').attr('action'), $('#frm').serialize(), function( data ) {
			if(data.st == 0)
			{
				$('#validation-error').html(data.msg).addClass('alert alert-danger');
			}
		}, 'json');
		return false;			
	});
}); */
</script>
	