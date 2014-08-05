
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Logx name</h3>
			</div>
			<div id="validation-error" ></div>
			<div class="panel-body">
			 <?php 
				print_r($results);
			// echo form_open('logx/newlogx', array('id'=>'frm')); ?>
				<fieldset>
					<div class="form-group">
						<table border=1 width=100%>
							<tr><th>Module Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						<?php 
						
						foreach($results as $data):?>
							<tr><td> <?php echo $data->name?></td>
								<td><img src='<?php echo base_url() ?>Images/edit.jpg' width="20" height="20" onclick="document.location='logx/logx_edit.html?logxid=<?php echo $data->logx_id?>';return false;"></td><td></td></tr>
							<?php endforeach;?>
						</table>
					</div>
						
						<!-- Change this to a button or input when using this as a form 
						<button  type="submit"class="btn btn-lg btn-primary btn-block">Create a new Logx</button>-->
				</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

	