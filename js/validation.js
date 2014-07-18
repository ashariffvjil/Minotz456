function validatepos()
{
	
	if($("#positions").val() == 'What is the purpose of this position?' || $("#positions").val() ==  'To increase sales and take our software to market...' || $("#positions").val() == ''){
		
		$("#positions_t").addClass("input_error");
		$("#positions_icon").attr("class","spritIcon_error");
		$("#positions").val($("#positions").attr('title'));
		$("#positions_r").hide();
		$('#positions_t').show();
	}else
	{
		$("#positions_t").removeClass("input_error");
		$('#positions_r').show();
		$('#positions_t').hide();
	}
	
}
function validatejobs()
{	
	
	if($("#jobtitles").val() ==  'Title' || $("#jobtitles").val() ==  'search or select' || $("#jobtitles").val() ==  '' || $("#jobtitles_id").val() == ""){ 
		//$("#jobtitles_t").addClass("input_error");
		//$("#jobtitles_icon").attr("class","spritIcon_error");
		$("#jobtitles").val($("#jobtitles").attr('title'));
		$("#jobtitles_r").hide();
		$('#jobtitles_t').show();
	}else
		{
		//$("#jobtitles_t").removeClass("input_error");
		$('#jobtitles_r').show();
		$("#jobtitles_t").hide();
	}
}
function validatezip()
{
	if($("#cityzip").val() ==  'Zip Code or City' || $("#cityzip").val() ==  'city or zip code' || $("#cityzip").val() ==  '' || $("#cityzip_id").val() ==  ''){
			//$("#cityzip_t").addClass("input_error");
			//$("#cityzip_icon").attr("class","spritIcon_error");
			$("#cityzip").val($("#cityzip").attr('title'));
			$("#cityzip_r").hide();
			$('#cityzip_t').show();
	}else
		{
		//$("#cityzip_t").removeClass("input_error");
		$('#cityzip_r').show();
		$("#cityzip_t").hide();
	}

}

function validatedept()
{
	if($("#departments").val() ==  'search or select' || $("#departments").val() ==  ''){
		
		$("#departments_t").addClass("input_error");
		$("#departments_icon").attr("class","spritIcon_error");
		$("#departments").val($("#departments").attr('title'));
		$("#departments_r").hide();
		$('#departments_t').show();
	}else
		{
		$("#departments_t").removeClass("input_error");
		$('#departments_r').show();
		$("#departments_t").hide();
	}
}

function validategrowth()
{
	if($("#growthplan").val() ==  'Where is this job going?' || $("#growthplan").val() ==  ''){
		$("#growthplan_t").addClass("input_error");
		$("#growthplan_icon").attr("class","spritIcon_error");
		$("#growthplan").val($("#growthplan").attr('title'));
		$("#growthplan_r").hide();
	$('#growthplan_t').show();
	}else
		{
		$("#growthplan_t").removeClass("input_error");
		$('#growthplan_r').show();
		$("#growthplan_t").hide();
	}
	
	
}
function validateins()
{
	if($("#industries").val() ==  'Industry' || $("#industries").val() ==  'search or select' || $("#industries").val() == "" || $("#industries_id").val() == ''){
	$("#industries").val($("#industries").attr('title'));
	$("#industries_r").hide();
	$('#industries_t').show();	
	}
	else
	{
		$('#industries_r').show();
		$("#industries_t").hide();
	}
}
function validatemax()
{
	
	if($("#maxcommute2").val() ==  ''){
			$("#maxcommute_t").addClass("input_error");
			$("#maxcommute_r").hide();
		}
		else
			{
		$("#maxcommute_t").removeClass("input_error");
		
	}
			
}

function validatebenefits()
{
		if(!($("#benefits").val())){			
			//$("#benefits_t").addClass("input_error");				
			$("#benefits_r").hide();
		}
		else
			$("#benefits_t").removeClass("input_error");
		
}
function validatetr()
{
	if($("#travelreq2").val() ==''){
		$("#travelreq_t").addClass("input_error");
		$("#travelreq_r").hide();
	}
	else
		$("#travelreq_t").removeClass("input_error");	
		$("#travelreq_r").show();
}

function validateculture()
{
	if($("#culture2").val() ==  ''){
		$("#culture_t").addClass("input_error");	
		$("#culture_r").hide();
	}
	else
		$("#culture_t").removeClass("input_error");	
		$("#culture_r").show();
}

function validatevalstmt()
{
	if($("#valstmt2").val() == ''){
		$("#valstmt_t").addClass("input_error");
		$("#valstmt_r").hide();
	}
	else
		$("#valstmt_t").removeClass("input_error");

}
function validate()
{
		validatepos();
		validateins();
		validatedept();
		validatejobs();
		validategrowth();
		validatezip();
		validatemax();
		validatebenefits();
		validatetr();
}

function validatefields1()
{
		var counter = 0;	
		var pay_range = $("#Slider1").val();
		pay_range = pay_range.split(";");
		if(pay_range[0] == pay_range[1]){
			//$(".fieldfull2").addClass("input_error");
			counter++;
		}
		else
		{
			//$(".fieldfull2").removeClass("input_error");
		}
		if($("#positions").val() ==  'What is the purpose of this position?' || $("#positions").val() ==  'To increase sales and take our software to market...'|| $("#positions").val() ==  ''){
			//$("#positions_t").addClass("input_error");	
			$("#positions_r").hide();
			counter++;
			
			}	
		if($("#industries").val() ==  'Industry' || $("#industries").val() ==  'search or select' || $("#industries").val() ==  '' || $("#industries_id").val() ==  ''){
			//$("#industries_t").addClass("input_error");
			$("#industries_r").hide();
			counter++;
			}
		if($("#departments").val() ==  'search or select' || $("#departments").val() ==  ''){
			//$("#departments_t").addClass("input_error");
			$("#departments_r").hide();
			counter++;
			}
		if($("#jobtitles").val() ==  'Title' || $("#jobtitles").val() ==  'search or select' || $("#jobtitles").val() ==  ''){
			//$("#jobtitles_t").addClass("input_error");
			$("#jobtitles_r").hide();
			counter++;
			}
		if($("#growthplan").val() ==  'Where is this job going?' || $("#growthplan").val() ==  ''){
			//$("#growthplan_t").addClass("input_error");
			$("#growthplan_r").hide();
			counter++;
			}
		if($("#cityzip").val() ==  'Zip Code or City' || $("#cityzip").val() ==  'search by zip or city' || $("#cityzip").val() ==  ''){
			//$("#cityzip_t").addClass("input_error");
			$("#cityzip_r").hide();
			counter++;
			}
		if($("#maxcommute2").val() ==  ''){
			//$("#maxcommute_t").addClass("input_error");
			counter++;
			}else{
			$("#maxcommute_t").removeClass("input_error");
			}
		if($("#benefits_count").val() ==  0 && $("#no").parent().attr("class") == 'no_benefits')	
		{
		//$("#benefits_t").addClass("input_error");				
		}
		else{
		$("#benefits_t").removeClass("input_error");
		}
		if($("#travelreq2").val() ==  ''){
			//$("#travelreq_t").addClass("input_error");
			counter++;
			}else{
			$("#travelreq_t").removeClass("input_error");
			}
		if($("#culture_count").val() != 5){
			//$("#culture_t").addClass("input_error");
			counter++;
			}else{
			$("#culture_t").removeClass("input_error");
			}		
		if($("#valstmt_count").val() ==  0){
			//$("#valstmt_t").addClass("input_error");	
			counter++;
			}else{
			$("#valstmt_t").removeClass("input_error");
			}
			
		if(counter == 0)return true;
		return false;
	}
	
	function validate_blur(){
		//alert(validatefields1());
		if(validatefields1())
		{
			$('.rightarrow_right_job').attr("id","submit_icon");
			/*$(".selectd:nth-child(2)").html("<a href='kpi'>&nbsp;</a>");
			$(".selectd:nth-child(2)").addClass("prevpage");				*/
		}
		else
		{	
			/*$(".prevpage").html("");
			$(".prevpage").removeClass("prevpage");*/
			$('.rightarrow_right_job').attr("id","");
		}
	}
	

