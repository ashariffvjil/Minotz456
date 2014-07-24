
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">My Modules</h3>
			</div>
			<div id="validation-error" ></div>
			<div class="panel-body">
			 <?php echo form_open('module/newmodule', array('id'=>'frm','name'=>'frm')); ?>
					<fieldset>
						<div class="form-group">
						
							<?php foreach($results as $data):?>
								<?php echo $data->modules_id?> - <?php echo $data->module_name?><br />
								<?php endforeach;?>
							
							
							
						
						</div>
						
						<!-- Change this to a button or input when using this as a form -->
						<button  type="submit"class="btn btn-lg btn-primary btn-block">Create New Module</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
/* $(document).ready(function() {
	$('#frm').submit(function(){
		$.post($('#frm').attr('action'), $('#frm').serialize(), function( data ) {
			if(data.st == 0)
			{
				$('#validation-error').html(data.msg).addClass('alert alert-danger');
			}
			if(data.st == 1)
			{
			//$.post( "module/configurator.html", { module_name: data.modules_name} );
			$.ajax({
				type: "POST",
				url: 'configurator.html',
				data: data.modules_name,
				});
				
				window.location.href='module/configurator.html';//?data='+data.modules_name;
			}
		}, 'json');
		return false;			
	});
});  */
</script>
	