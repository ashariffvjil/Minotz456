function gettextbox_properties(obj,type)
{
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
	
	//$('#trid_leftpos').hide();
	//$('#trid_toppos').hide();
	//$('#trid_width').hide();
	//$('#trid_height').hide();
	
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
		$('#trid_multiline').show();
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
		$('#id_caption').val(caption);
		$('#trid_required').show();
		$('#trid_placeholder').show();
		//$('#trid_maxlength').show();
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
	}
	else {
	
	if(type=='text')
		$('#trid_placeholder').show();
	else
		$('#trid_placeholder').hide();
		
		//alert(type+'----------'+cntrl_type);
	
     
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
	}
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
function getmultiline_status(obj,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	if(obj.checked==true)
	{
		$('#'+act_id).css('multiline', 'true');
	}else{
		$('#'+act_id).css('multiline', 'false');
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
