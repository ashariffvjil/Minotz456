<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
<link type="text/css" href="<?php echo base_url() ?>themes/minotz/css/ui-lightness/jquery-ui-1.8.19.custom.css" rel="stylesheet" />

<div class="row">
 <div class="col-md-8 col-md-offset-2">
	
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Appointment Creation</h3>
			</div>
			<div id="validation-error" ></div>
			<div class="panel-body">
			 <?php echo form_open('appointment/newappointment', array('id'=>'frm','name'=>'frm')); ?>
					<fieldset>
					<div class="col-md-6 col-xs-12"> 
						<div class="form-group">
							<label for="patient_name">*Patient Name</label>
							<?php  $array['']='Select Patient';
								 foreach($patients as $row )    $array[$row->patient_id] = $row->first_name;
           						 echo form_dropdown('patient_name',  $array,'','class="form-control"');?>
                        </div>
						<div class="form-group">
						
							<label for="doctor_name">*Doctor Name</label>
                                 <?php  $arr_doctors['']='Select Doctor';
								 foreach($doctors as $row )    $arr_doctors[$row->users_profile_id] = $row->first_name;
           						 echo form_dropdown('doctor_name',  $arr_doctors,'','class="form-control"');?>
						</div>
						<div class="form-group">
							<label for="logx_name">*Logx Name</label>
							 <?php  $arr_logx['']='Select Logx';
								 foreach($logx as $row )    $arr_logx[$row->logx_id] = $row->name;
           						 echo form_dropdown('logx_name',  $arr_logx,'','class="form-control"');?>
                        </div>
					</div>
					<div class="col-md-6 col-xs-12"> 
						<div class="form-group">
							<label for="txt_doa">*Date of Appointment</label><br>
							<input class="form-control" placeholder="Date of Appointment" name="txt_doa" id="id_doa" type="text" value="">
						</div>
						<div class="form-group">
							<label for="txt_userid">*Appointment Created By</label>
							<input class="form-control" placeholder="Appointment Created By" name="txt_userid" type="text" value="">
						</div>
					</div>
					<div class="form-group">
							<label for="txt_note">*Note</label>
							<input class="form-control" placeholder="Note" name="txt_note" type="text" value="">
					</div>
						<!-- Change this to a button or input when using this as a form -->
						<button  type="submit" class="btn btn-lg btn-primary btn-block">Create Appointment</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
 $(function() {
//$("#id_doa").datepicker({ dateFormat: 'd MM, yy' });
 $("#id_doa").datepicker({
        minDate: 0,
        onSelect: function(theDate) {
            $("#dataEnd").datepicker('option', 'mindate', new Date());
        },
        beforeShow: function() {
            $('#ui-datepicker-div').css('z-index', 9999);
        },
        dateFormat:'d MM, yy'
    });
});
 $(document).ready(function() {
	$('#frm').submit(function(){
		$.post($('#frm').attr('action'), $('#frm').serialize(), function( data ) {
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
	