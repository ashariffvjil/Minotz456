function gettextbox_properties(obj,type)
{
	var id=obj.id;
	var name=obj.name;
	if(type=='text')
		$('#trid_placeholder').show();
	else
		$('#trid_placeholder').hide();
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
    var placeholder_val=$('#'+id).attr('placeholder');  
	if ( $('#'+id).is('[readonly]') ) {
		$('#rdo_readonlyS').prop("checked",true); 
	}else{ $('#rdo_readonlyN').prop("checked",true);  }
	//Assigning the values to text boxes			
	$('#id_tposition').val(parseInt(top_pos));
	$('#id_lposition').val(parseInt(left_pos));
	$('#id_width').val(ele_width);
	$('#id_height').val(ele_height);
	$('#id_fname').val(name);
	$('#id_cid').text(id);
	$('#id_placeholder').val(placeholder_val);  
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