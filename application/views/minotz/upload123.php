<?php echo $error;?>
<br/>
<?php //echo form_open_multipart('upload123/do_upload');?>

<!--<input type="file" name="userfile" size="20" multiple="true" />

<br /><br />

<input type="submit" value="upload" />

</form> -->

<?php //echo $error;?>
 <div class="row">
<div class="col-md-8 col-md-offset-2">
	
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Patients</h3>
			</div>
			<div id="validation-error" ></div>
			<div class="panel-body">
			 <?php $attributes = array('name' => 'frm1','id'=>'id_frm');
				echo form_open_multipart('upload123/do_upload',$attributes); ?>
				<fieldset>
					<div class="col-md-6 col-xs-12">  
						<div class="form-group">
							<label for="txt_image">*Photo</label>
							<input type="file" name="userfile" size="20" multiple="true" />

							
						</div>
					</div>	
					<button type="submit" class="btn btn-lg btn-primary btn-block">Create Patient</button>
				</fieldset>
				</form>
			</div>
		</div> 
	</div>
</div>


	