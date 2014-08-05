
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
							<table border=1 width=100%>
								<tr><th>Module-Id</th>
									<th>Module Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							<?php 
							//print_r($results);
							foreach($results as $data):?>
								<tr><td><?php echo $data->modules_id?></td><td> <?php echo $data->module_name?></td>
									<td>&nbsp;</td><td></td></tr>
								<?php endforeach;?>
							</table>
						</div>
						
						<!-- Change this to a button or input when using this as a form -->
						<button  type="submit"class="btn btn-lg btn-primary btn-block">Create New Module</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
	