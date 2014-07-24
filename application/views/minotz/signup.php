



<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign Up !!</h3>
                    </div>
					<div id="validation-error" ></div>
                    
					<div class="panel-body">
                      
					   <?php echo form_open('login/save_signup', array('id'=>'frm')); ?>
                    
					        <fieldset>
                            <div class="col-md-6 col-xs-12"> 
							   <div class="form-group">
                                  <label for="first_name">*First Name</label>
								  <input class="form-control" placeholder="First Name" value="<?php echo set_value('first_name'); ?>" name="first_name" type="text" autofocus="">
                                </div>
								  <div class="form-group">
                                 <label for="last_name">*Last Name</label>
								 <input class="form-control" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>" name="last_name" type="text" autofocus="">
                                </div>
								<div class="form-group">
								<label for="country_id">*Country of Residence</label>
                                 <?php  $array['']='Select Country';
								 foreach($countries as $row )    $array[$row->country_id] = $row->name;
           						 echo form_dropdown('country_id',  $array,'','class="form-control"');?>
								 </div>
								<div class="form-group">
								<label for="email">*Email Address</label>
                                 	<div class="input-group">
								 		<div class="input-group-addon">@</div>
								 <input class="form-control" placeholder="Email Address" value="<?php echo set_value('email'); ?>" name="email" type="text" autofocus="">
                                	</div>
								</div>
								<div class="form-group">
								<label for="username">*User Name</label>
                                  <input class="form-control" placeholder="User Name" value="<?php echo set_value('username'); ?>" name="username" type="text" autofocus="">
                                </div>
								</div>
								<div class="col-md-6 col-xs-12">  
								<div class="form-group">
								  <label for="password">*Password</label>
                                    <input class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" name="password" type="password">
                                </div>
								
							    <div class="form-group">
								<label for="re-password">*Confirm Password</label>
                                    <input class="form-control" placeholder="Confirm Password" value="<?php echo set_value('re-password'); ?>" name="re-password" type="password">
								 </div>
                              <div class="form-group">
							  <label for="zipcode">*Work Zip/Postal Code</label>
                                 <input class="form-control" placeholder="Work Zip/Postal Code" value="<?php echo set_value('zipcode'); ?>" name="zipcode" type="text" autofocus="">
                                </div>
							   <div class="form-group">
							   <label for="occupation_id">*Occupation</label>
                                 <?php  $sarray['']='Select Occupation';
								 foreach($occupations as $row )    $sarray[$row->occupation_id] = $row->name;
           						 echo form_dropdown('occupation_id',  $sarray,'','class="form-control"');?>
								 </div>
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
		$(document).ready(function() {
$('#frm').submit(function(){
	
	$.post($('#frm').attr('action'), $('#frm').serialize(), function( data ) {
	if(data.st == 0)
		{
		 $('#validation-error').html(data.msg).addClass('alert alert-danger');
		}
				
		if(data.st == 1)
		{
		  window.location.href='login.html';
		}
				
	}, 'json');
	return false;			
   });

	
});
</script>
