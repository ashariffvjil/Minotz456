function gettextbox_properties(obj,type)
{
	$("#properties").css('display',"");
	var id=obj.id;
	var name=obj.name;
	var cntrl_type=obj.type;
	var containerPos = $('.panel-body1').offset();
	var inputPos = $('#'+id).offset();
	relativeOffset = { 
		top: inputPos.top - containerPos.top,
		left: inputPos.left - containerPos.left 
	};
	var left_pos = relativeOffset.left;
	var top_pos = relativeOffset.top;
	var ele_width = document.getElementById(id).offsetWidth;
	var ele_height = document.getElementById(id).offsetHeight;
	var caption=$('#'+id).html();
	var placeholder_val=$('#'+id).attr('placeholder'); 
	//element.getAttribute(attributeName);
	var maxdate=document.getElementById(id).getAttribute('maxdate');
	
	//alert(maxdate);
	/*$('#trid_leftpos').hide();
	$('#trid_toppos').hide();
	$('#trid_width').hide();
	$('#trid_height').hide();*/
	
	$('#trid_required').hide();
	$('#trid_name').hide();
	$('#trid_placeholder').hide();
	$('#trid_readonly').hide();
	$('#trid_multiline').hide();
	$('#trid_maxlength').hide();
	$('#trid_minlength').hide();
	$('#trid_fontstyle').hide();
	$('#trid_fontsize').hide();
	$('#trid_mintime').hide();
	$('#trid_maxtime').hide();
	$('#trid_maxdate').hide();
	$('#trid_image').hide();
	$('#trid_entries').hide();
	
	if(type=='header')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
	}
	else if(type=='subheader')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		$('#trid_fontstyle').show();
		$('#trid_fontsize').show();
		
	}
	else if(type=='label')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		//$('#trid_fontstyle').show();
		//$('#trid_fontsize').show();
		
	}
	else if(type=='text')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_placeholder').val(placeholder_val);  
		$('#id_caption').val(caption);
		$('#trid_placeholder').show();
		$('#trid_readonly').show();
		$('#trid_required').show();
		
		$('#trid_maxlength').show();
		$('#trid_minlength').show();
	}
	else if(type=='Number')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_placeholder').val(placeholder_val);  
		$('#id_caption').val(caption);
		$('#trid_placeholder').show();
		$('#trid_readonly').show();
		$('#trid_required').show();
		$('#trid_maxlength').show();
		$('#trid_minlength').show();
	}
	else if(type=='checkbox')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		$('#trid_required').show();
	}
	else if(type=='Radio-buttons')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		$('#trid_required').show();
		$('#trid_entries').show();
		//$('#trid_name').show();
		//$('#id_fname').val(name);
	}
	else if(type=='Drop-down list')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		$('#trid_required').show();
		$('#trid_entries').show();
	}
	else if(type=='sketch')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		$('#trid_required').show();
	}
	else if(type=='Textarea')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		$('#trid_required').show();
	}
	else if(type=='Date')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_placeholder').val(placeholder_val);  
		$('#id_caption').val(caption);
		$('#trid_required').show();
		$('#trid_placeholder').show();
		$('#trid_maxdate').show();
		$('#id_maxdate').val(maxdate);
	}
	else if(type=='Time')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		$('#trid_required').show();
		$('#trid_mintime').show();
		$('#trid_maxtime').show();
		$('#trid_placeholder').show();
		$('#id_placeholder').val(placeholder_val);  
		
		var maxtime=document.getElementById(id).getAttribute('maxtime');
		var mintime=document.getElementById(id).getAttribute('mintime');
		if(maxtime!='' && maxtime!= null )
		{
			//alert(maxtime);
			var min_hh=mintime.substr(0,2);
			var min_mm=mintime.substr(3,2);
			var max_hh=maxtime.substr(0,2);
			var max_mm=maxtime.substr(3,2);
			$('#id_mintime_hh').val(min_hh);
			$('#id_mintime_mm').val(min_mm);
			$('#id_maxtime_hh').val(max_hh);
			$('#id_maxtime_mm').val(max_mm);
		} 
	}
	else if(type=='Image')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#id_caption').val(caption);
		$('#trid_required').show();
		$('#trid_image').show();
		
	}
	else if(type=='line')
	{
		$('#tdid_type').text(type);
		$('#id_tposition').val(parseInt(top_pos));
		$('#id_lposition').val(parseInt(left_pos));
		$('#id_width').val(ele_width);
		$('#id_height').val(ele_height);
		$('#id_cid').text(id);
		$('#trid_caption').hide();
		
		
	}
	/*else {
	
	if(type=='text')
		$('#trid_placeholder').show();
	else
		$('#trid_placeholder').hide();
	if ( $('#'+id).is('[readonly]') ) {
		$('#rdo_readonlyS').prop("checked",true); 
	}else{ $('#rdo_readonlyN').prop("checked",true);  }
	
	//Assigning the values to text boxes
	$('#tdid_type').text(type);
	$('#id_tposition').val(parseInt(top_pos));
	$('#id_lposition').val(parseInt(left_pos));
	$('#id_width').val(ele_width);
	$('#id_height').val(ele_height);
	$('#id_fname').val(name);
	$('#id_cid').text(id);
	$('#id_placeholder').val(placeholder_val);  
	$('#id_caption').val(caption);
	} */
}
function setposition(top,left,id_cid,width,height)
{
	var ptop=document.getElementById(top).value;
	var pleft=document.getElementById(left).value;
	var cwidth=document.getElementById(width).value;
	var cheight=document.getElementById(height).value;
	var act_id=document.getElementById(id_cid).innerHTML;
	var cntrlid=document.getElementById(act_id);
	var containerPos = $('#panel-body1').offset();
	if(ptop<0 || ptop>408)
	{
		alert('Top position range should be(0-408)');
		document.getElementById(top).value='';
		document.getElementById(top).focus();
		return false;
	}
	if(pleft<0 || pleft>477)
	{
		alert('Left position range should be(0-477)');
		document.getElementById(left).value='';
		document.getElementById(left).focus();
		return false;
	}
	cntrlid.style.position = 'relative';  
	cntrlid.style.left = (pleft)+'px';
	cntrlid.style.top = (ptop)+'px';  
	cntrlid.style.width = (cwidth)+'px';  
	cntrlid.style.height = (cheight)+'px';  
}
function setplaceholder(obj,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	var val=obj.value;
	$('#'+act_id).attr('placeholder',val);
}
function setcaption(obj,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	var val=obj.value;
	$('#'+act_id).text(val);
}
function getreadonlystatus(obj,id_cid)
{
	var readonly_status=$('#rdo_readonlyS').is(':checked')?$('#rdo_readonlyS').val():$('#rdo_readonlyN').val();
	var act_id=document.getElementById(id_cid).innerHTML;
	if(readonly_status=='Yes')
	{
		$('#'+act_id).attr('readonly', 'true');
	}
	else{
		$('#'+act_id).removeAttr('readonly');
	}
}
function gethidestatus(obj,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	if(obj.checked==true)
	{
		$('#'+act_id).css('visibility', 'hidden');
	}else{
		$('#'+act_id).css('visibility', '');
	}
}
function getfontstyle_change(type,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	if(type=='bold')
		$('#'+act_id).css('font-weight', 'bold');
	else if(type=='regular')
		$('#'+act_id).css('font-weight', 'normal');

} 
function getfontsize_change(type,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	if(type=='large')
		$('#'+act_id).css('font-size', '30px');
	else if(type=='medium')
		$('#'+act_id).css('font-size', '20px');
	else if(type=='small')
		$('#'+act_id).css('font-size', '10px');
}
function setlengths(minlen,maxlen,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	var cntrlid=document.getElementById(act_id);
	var minlength=document.getElementById(minlen).value;
	var maxlength=document.getElementById(maxlen).value;
	if(maxlength!='')
	{
		var min_len=minlength>0 ? parseInt(minlength):0;
		var max_len=maxlength>0? parseInt(maxlength):0;
		if(min_len>max_len)
		{
			alert('Minimum length should be less than or equal to Maxlength');
			document.getElementById(minlen).value='';
			document.getElementById(minlen).focus();
			return false;
		}
		cntrlid.setAttribute('minlength', min_len);
		cntrlid.setAttribute('maxlength', max_len);
	}
}
function getrequired(obj,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	if(obj.checked==true)
	{
		$('#'+act_id).attr('required', 'true');
	}else{
		$('#'+act_id).removeAttr('required');
	}
}
function setmin_maxtimes(min_hh,min_mm,max_hh,max_mm,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	var cntrlid=document.getElementById(act_id);
	var mintime=(parseInt(document.getElementById(min_hh).value)*60)+parseInt(document.getElementById(min_mm).value);
	var maxtime=(parseInt(document.getElementById(max_hh).value)*60)+parseInt(document.getElementById(max_mm).value);
	//alert(mintime+'----afaasf----'+maxtime);
	if(mintime>maxtime)
	{
		alert('Max Time should be greater than Min Time');
		document.getElementById(max_hh).value='';
		document.getElementById(max_mm).value='';
		document.getElementById(max_hh).focus();
		return false;
	}
	var min_time=document.getElementById(min_hh).value+':'+document.getElementById(min_mm).value;
	var max_time=document.getElementById(max_hh).value+':'+document.getElementById(max_mm).value;
	cntrlid.setAttribute('mintime', min_time);
	cntrlid.setAttribute('maxtime', max_time);
	
}
function getuploadimg(obj,id_cid)
{
	 var url = './application/views/minotz/uploads/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

}
function setaddoptions(obj,id_cid){
	var act_id=document.getElementById(id_cid).innerHTML;
	var res=obj.value.split(' ');
	var TheOptions="<option value=''>Select</option>";
	res.forEach(function(entry) {
		TheOptions += "<option value='"+entry.trim()+"'>"+entry.trim()+"</option>";
	});
	$('#'+act_id).html(TheOptions);
}
