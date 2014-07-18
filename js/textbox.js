function gettextbox_properties(obj,type)
{
//alert('ssss');
	//var name=document.activeElement.name;
	var id=obj.id;
	var name=obj.name;
	var containerPos = $('.panel-body1').offset();
	var inputPos = $('#'+id).offset();
	relativeOffset = { 
		top: inputPos.top - containerPos.top,
		left: inputPos.left - containerPos.left 
	};
	var xPos = relativeOffset.left;
	var yPos = relativeOffset.top;
	var tbwidth = document.getElementById(id).offsetWidth;
	var tbheight = document.getElementById(id).offsetHeight;
               
				
	$('#id_tposition').val(parseInt(yPos));
	$('#id_lposition').val(parseInt(xPos));
	$('#id_width').val(tbwidth);
	$('#id_height').val(tbheight);
	$('#id_fname').val(name);
	$('#id_cid').text(id);



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
	cntrlid.style.position = 'relative';  // position it
	cntrlid.style.left = (pleft)+'px';
	cntrlid.style.top = (ptop)+'px';  
	cntrlid.style.width = (cwidth)+'px';  
	cntrlid.style.height = (cheight)+'px';  

	//activeid.style.position['top'] = ptop+'px';
 //alert(act_id);

}
function setplaceholder(obj,id_cid)
{
	var act_id=document.getElementById(id_cid).innerHTML;
	var cntrlid=document.getElementById(act_id);
	var val=obj.value;
	//alert(act_id+'----'+cntrlid+'---'+val);
	$('#'+act_id).attr('placeholder',val);


}