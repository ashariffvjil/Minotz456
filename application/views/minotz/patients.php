<?php echo $error;?>
<div class="row">
 <div class="col-md-8 col-md-offset-2">
	
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Patients</h3>
			</div>
			<div id="validation-error" ></div>
			<div class="panel-body">
			 <?php $attributes = array('name' => 'frm1','id'=>'id_frm');
				echo form_open_multipart('patients/newpatient',$attributes); ?>
				<fieldset>
					<div class="col-md-6 col-xs-12"> 
						<div class="form-group">
							<label for="first_name">*First Name</label>
							<input class="form-control" placeholder="First Name" value="" name="txt_firstname" type="text" autofocus="">
                        </div>
						<div class="form-group">
							<label for="last_name">*Last Name</label>
							<input class="form-control" placeholder="Last Name" value="" name="txt_lastname" type="text" autofocus="">
                        </div>
						<div class="form-group">
							<label for="txt_dob">*Date of Birth</label><br>
							<?php
								echo $birth_date_day;
								echo $birth_date_month;
								echo $birth_date_year;
							?>
							<!--<input class="form-control" placeholder="Date of Birth" name="txt_dob" type="text" value="">-->
						</div>
						<div class="form-group">
							<label for="id_gender">*Gender</label>
							<?php  $arr_gender['']='Select Gender';
								   $arr_gender['male'] = Male;
								   $arr_gender['female'] = Female;
           						 echo form_dropdown('id_gender',  $arr_gender,'','class="form-control"');?>
						</div>	
						<div class="form-group">
							<label for="txt_hos_mrn">*Hospital MRN</label>
							<input class="form-control" placeholder="Hospital MRN" name="txt_hos_mrn" type="text" value="">
						</div>
						<div class="form-group">
							<label for="txt_nhs">*NHS Number</label>
							<input class="form-control" placeholder="NHS Number" name="txt_nhs" type="text" value="">
						</div>	
						<div class="form-group">
							<label for="txt_info">*Short Info</label>
							<input class="form-control" placeholder="Short Info" name="txt_info" type="text" value="">
						</div>							
						
					</div>
					<div class="col-md-6 col-xs-12"> 
						<div class="form-group">
							<label for="txt_address">*Address</label>
							<input class="form-control" placeholder="Address" name="txt_address" type="text" value="">
						</div>
						<div class="form-group">
						<label for="txt_address1">*Address1</label>
							<input class="form-control" placeholder="Address1" name="txt_address1" type="text" value="">
						</div>
						<div class="form-group">
							<label for="txt_city">*City</label>
							<input class="form-control" placeholder="City" name="txt_city" type="text" value="">
						</div>
						<div class="form-group">
							<label for="txt_state">*State</label>
							<input class="form-control" placeholder="State" name="txt_state" type="text" value="">
						</div>
						<div class="form-group">
							  <label for="zipcode">*Postal Code</label>
                                 <input class="form-control" placeholder="Postal Code" value="" name="txt_zipcode" type="text" autofocus="">
                                </div>
						<div class="form-group">
						
							<label for="country_id">*Country of Residence</label>
                                 <?php  $array['']='Select Country';
								 foreach($countries as $row )    $array[$row->country_id] = $row->name;
           						 echo form_dropdown('country_id',  $array,'','class="form-control"');?>
						</div>
						<div class="form-group">
							<label for="txt_phone">*Phone Number</label>
							<input class="form-control" placeholder="Phone Number" name="txt_phone" type="text" value="">
						</div>
						<div class="form-group">
							<label for="txt_image">*Photo</label>
							<input type="file" name="userfile" size="20" multiple="true" />
							<!--<input class="form-control" placeholder="Photo" name="txt_photo" type="text" value="">-->
						</div>
					</div>	
					<!-- Change this to a button or input when using this as a form -->
					<button  type="submit"class="btn btn-lg btn-primary btn-block">Create Patient</button>
				</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
 $(document).ready(function() {
	 $('#id_frm').submit(function(){
		$.post($('#id_frm').attr('action'), $('#id_frm').serialize(), function( data ) {
			if(data.st == 0)
			{
				$('#validation-error').html(data.msg).addClass('alert alert-danger');
			}
			if(data.st == 1)
			{
				window.location.href='appointment/index';
			}
		}, 'json');
		return false;		
	});
});  
</script> 
	