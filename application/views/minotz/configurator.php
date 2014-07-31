<?php 
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";


?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/textbox.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/validchar.js"></script>
<!-------- color picker
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>js/jpicker/css/jpicker-1.1.6.min.css" />
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>js/jpicker/jPicker.css" />
	<script src="<?php echo base_url() ?>js/jpicker/jquery-1.4.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>js/jpicker/jpicker-1.1.6.min.js" type="text/javascript"></script> ---------->
<!--------End color picker ---------->
<script type="text/javascript">
 /* $(document).ready(
    function()
    {
      $('#Expandable').jPicker(
        {
          window:{expandable: true  }
        });
    });
	function getcolor(){
		var hexclr=$(".jPicker tr.Hex td.Text input.Hex").val();
		$(".panel-body1").css('background-color','#'+hexclr);
	}
	*/
	//Json function
	function json_encode(e){var t,n=this.window.JSON;try{if(typeof n==="object"&&typeof n.stringify==="function"){t=n.stringify(e);if(t===undefined){throw new SyntaxError("json_encode")}return t}var r=e;var i=function(e){var t=/[\\\"\u0000-\u001f\u007f-\u009f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;var n={"\b":"\\b","	":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"};t.lastIndex=0;return t.test(e)?'"'+e.replace(t,function(e){var t=n[e];return typeof t==="string"?t:"\\u"+("0000"+e.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+e+'"'};var s=function(e,t){var n="";var r="    ";var o=0;var u="";var a="";var f=0;var l=n;var c=[];var h=t[e];if(h&&typeof h==="object"&&typeof h.toJSON==="function"){h=h.toJSON(e)}switch(typeof h){case"string":return i(h);case"number":return isFinite(h)?String(h):"null";case"boolean":case"null":return String(h);case"object":if(!h){return"null"}if(this.PHPJS_Resource&&h instanceof this.PHPJS_Resource||window.PHPJS_Resource&&h instanceof window.PHPJS_Resource){throw new SyntaxError("json_encode")}n+=r;c=[];if(Object.prototype.toString.apply(h)==="[object Array]"){f=h.length;for(o=0;o<f;o+=1){c[o]=s(o,h)||"null"}a=c.length===0?"[]":n?"[\n"+n+c.join(",\n"+n)+"\n"+l+"]":"["+c.join(",")+"]";n=l;return a}for(u in h){if(Object.hasOwnProperty.call(h,u)){a=s(u,h);if(a){c.push(i(u)+(n?": ":":")+a)}}}a=c.length===0?"{}":n?"{\n"+n+c.join(",\n"+n)+"\n"+l+"}":"{"+c.join(",")+"}";n=l;return a;case"undefined":case"function":default:throw new SyntaxError("json_encode")}};return s("",{"":r})}catch(o){if(!(o instanceof SyntaxError)){throw new Error("Unexpected error type in json_encode()")}this.php_js=this.php_js||{};this.php_js.last_error_json=4;return null}}
	//STORING A JSON  INTO A HIDDEN FIELD
	function getvalues(divid)
	{
		var ele = document.getElementById(divid).children;
		var arr_elements = new Array();
		var total_elements = fillArray(ele,arr_elements);
		if(total_elements!='[]'){
			document.getElementById('id_description').value = total_elements;
			document.getElementById('val').innerHTML = total_elements;
			}
	}
	//STORING ALL CONTROLS/ELEMENTS ATTRIBUTES IN A JSON
	function fillArray(e1,a1)
	{
		for(var i =0;i<e1.length;i++)
		{
			if(e1[i].id.indexOf('frmdiv') != 0)
			var leftposition = parseInt(($('#'+e1[i].id).offset().left) -($('#frmdiv').offset().left));
			var topposition =parseInt(($('#'+e1[i].id).offset().top) - ($('#frmdiv').offset().top));
			var element_width=document.getElementById(e1[i].id).offsetWidth;
			var element_height=document.getElementById(e1[i].id).offsetHeight;
			var placeholder=$('#'+e1[i].id).attr('placeholder');
			var readonly_status=$('#'+e1[i].id).attr('readonly');
			a1.push({'id' : e1[i].id,'type' : e1[i].type, 'name':e1[i].name,'value':e1[i].val,'attribute':{'leftposition':leftposition,'topposition':topposition,'element_width':element_width,'element_height':element_height,'placeholder':placeholder,'readonly':readonly_status}});
		}
		var resultset=json_encode(a1);
		return resultset;
	}
	//DELETING A PERTICULAR CONTROL/ELEMENT
	function cntrl_deleted(id_cid)
	{
		var active_ctrlid=document.getElementById(id_cid).innerHTML;
		$('#'+active_ctrlid).remove();
	}
</script>
<script>
$(function () {
$("#properties").css('display',"none");

    $(".panel-tool li").draggable({
        appendTo: "body",
        helper: "clone"
    });
	var i=0;var j=0;k=0;l=0;m=0;n=0;p=0;q=0;r=0;s=0;t=0;
	var dropPositionY=0;var dropPositionX=0;
    $(".panel-body1").droppable({
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        accept: ":not(.ui-sortable-helper)",
        drop: function (event, ui) {
			$("#properties").css('display',"");
			var curr_elementid=document.activeElement.id;
		    var currentelement=document.activeElement.type;
			var currentobj=(currentelement=='' || currentelement==undefined )?ui.draggable.text().toLowerCase():currentelement;
		    // ADDING A TEXT BOX DYNAMICALLY AT RUN TIME
			if(ui.draggable.text()=='Text'){
				var $ctrl = $('<input/>').attr({ type: 'text', id:'id_textbox_'+i, name:'textbox_'+i, value:'',placeholder:'textbox'+i,onblur:'gettextbox_properties(this,"text")'}).addClass("text");
				$(this).append($ctrl);
				
				
			   /* dropPositionX = parseInt(event.pageX) - parseInt($(this).offset().left);
				 dropPositionY = parseInt(event.pageY) - parseInt($(this).offset().top);
				$('#id_textbox_'+i).css({left : dropPositionX+'px'});
				$('#id_textbox_'+i).css({top : dropPositionY+'px'});
			
				$('#id_lposition').val(parseFloat(dropPositionX));
				$('#id_tposition').val(parseFloat(dropPositionY));
				 dropPositionX =0;
				 dropPositionY =0; */
				$("#id_textbox_"+i).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'text');
					},
				 scroll: false, cancel: null  });
				i++;
			}
			// ADDING A CHECK BOX DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Check box'){
				var val='Checkbox';
				var $ctrl = $('<input/>').attr({ type: 'checkbox', id:'id_chk_'+j, name:'checkbox_'+j,onblur:'gettextbox_properties(this,"checkbox")'}).addClass("chk");
				// $(this).append ( "<span id='id_chk_" + j +"'><label for='id_chk_" + j + "'>" + val + "</label>&nbsp<input id='id_chk_" + j + "' type='checkbox' value='" + val + "' /></span>" );
				//var $ctrl_lbl=$('<label />', { 'for': 'id_chk_'+j, text: 'checkbox' }).appendTo("panel-body1");
				$(this).append($ctrl);
				$("#id_chk_"+j).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'checkbox');
					},
					scroll: false, cancel: null  
				});
				j++;
			}
			// ADDING A RADIO BUTTION DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Radio button'){
				var $ctrl = $('<input/>').attr({ type: 'radio',id:'id_rdo_'+k, name:'radio_'+k,onblur:'gettextbox_properties(this,"radio")'}).addClass("rad");
				$(this).append($ctrl);
				$("#id_rdo_"+k).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'radio');
					},
					scroll: false, cancel: null  
				});
				k++;
			}
			// ADDING A DROPDOWNLIST DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Dropdown list'){
				var $ctrl = $('<select/>').attr({id:'id_dropdown_'+l , name:'dropdown_'+l,onblur:'gettextbox_properties(this,"dropdown")'}).addClass("select");
				var $ctrloptn=$('<option />', {value: '', text: 'Select'}).appendTo($ctrl);
				$(this).append($ctrl);
				$("#id_dropdown_"+l).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'dropdown');
					},
					scroll: false, cancel: null  
				});
				l++;
			}
			// ADDING A HEADER DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Header'){
				var lbl = prompt ("Enter Text","");
				var $ctrl=$('<label/>').attr({id:'id_header_'+m , name:'header_'+m,onblur:'gettextbox_properties(this,"header")'}).append(lbl);
				$(this).append($ctrl);
				$("#id_header_"+m).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'header');
					},
					scroll: false, cancel: null  
				});
				m++;
			}
			// ADDING A BUTTON DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Button'){
				var $ctrl = $('<input/>').attr({ type: 'button',id:'id_button_'+n, name:'button_'+n,value:'Button',onblur:'gettextbox_properties(this,"button")'}).addClass("button");
				$(this).append($ctrl);
				$("#id_button_"+n).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'button');
					},
					scroll: false, cancel: null  
				});
				n++;
			}
			// ADDING A SUBHEADER DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Subheader'){
				var lbl = prompt ("Enter Text","");
				var $ctrl=$('<label/>').attr({id:'id_subhead_'+p,name:'Subheader_'+p,onblur:'gettextbox_properties(this,"subheader")'}).append(lbl);
				$(this).append($ctrl);
				$("#id_subhead_"+p).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'subheader');
					},
					scroll: false, cancel: null  
				});
				p++;
			}
			// ADDING A LABEL DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Label'){
				var lbl = prompt ("Enter Text","");
				var $ctrl=$('<label/>').attr({id:'id_label_'+q,name:'Label_'+q,onblur:'gettextbox_properties(this,"label")'}).append("<b>"+lbl+"</b>");
				$(this).append($ctrl);
				$("#id_label_"+q).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'label');
					},
					scroll: false, cancel: null 
				});
				q++;
			}
			// ADDING A  PAGE BREAK DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Page break'){
				var $ctrl=$('<hr/>').attr({id:'id_pagebrk_'+r,name:'pagebreak_'+r,onblur:'gettextbox_properties(this,"Pagebreak")'}).addClass("page_break");
				$(this).append($ctrl);
				$(".page_break").css('background-color','blue');
				$(".page_break").height(2);
				$("#id_pagebrk_"+r).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'Pagebreak');
					},
					scroll: false, cancel: null  
				});
				 r++;
			}
			// ADDING A LINE DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Line'){
			var $ctrl=$('<hr />').attr({id:'id_line_'+s, name:'line_'+s,onblur:'gettextbox_properties(this,"line")'}).addClass("line");
				$(this).append($ctrl);
				$(".line").css('background-color','red');
				$(".line").width(200).height(2);
				$("#id_line_"+s).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'line');
					},
				 scroll: false, cancel: null  });
				 s++;
			}
			// ADDING A SKETCH DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Sketch'){
				var $ctrl=$('<div ></div>').attr({ 'id': 'id_sketch_'+t, name:'sketh_'+t,onblur:'gettextbox_properties(this,"sketh")'}).addClass("sketch");
				$(this).append($ctrl);
				$(".sketch").width(200).height(70);
				$(".sketch").css('background-color','grey');
				$("#id_sketch_"+t).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'sketh');
					},
					scroll: false, cancel: null  
				});
				t++;
			}
        }
    }).sortable();
});
</script>
<?php 
//print_r($_COOKIE['modulename']);

$module_name='FORM';//$_REQUEST['data'];
//var_dump($this->input->cookie('modulename'));
//echo '----'. $cookieData = $this->input->get_cookie("modulename");
 ?>
<div id="container">
	<h1>Configurator</h1>

	<div id="body">
	 <?php echo form_open('module/save_module', array('id'=>'frm','name'=>'frm')); ?>
		<div class="row">
		<div id="validation-error" ></div>
		<!---------- Start the Tools panel-------------->
			<div class="col-lg-2">
				<div class="panel panel-success">
					<div class="panel-heading"> Tools </div>
					<div class="panel-tool">
						<ul>
							<li>Header</li>
							<li>Subheader</li>
							<li>Text</li>
							<li>Check box</li>
							<li>Radio button</li>
							<li>Dropdown list</li>
							<li>Label</li>
							<li>Page break</li>
							<li>Line</li>
							<li>Sketch</li>
						</ul>
					</div>
					
				</div>
			</div>
			<!----------  Create the form-------------->
			<div class="col-lg-7">
				<div class="panel panel-primary" >
					<div class="panel-heading"> <?php echo strtoupper($module_name) ?><input type='hidden' name='hid_modulename' value=<?php echo strtoupper($module_name) ?>> </div>
					<div class="panel-body1" id="frmdiv">
					</div>
				</div>
			</div>
			<!---------- Start the Properties panel-------------->
			<div class="col-lg-3">
				<div class="panel panel-info">
					<div class="panel-heading"> Properties  <input type="button" name="btn_del" id="id_del" value="Delete" onclick="cntrl_deleted('id_cid')"></div>
					<div class="panel-properties">
						<div id="properties">
							<table width='100%'>
								<tr>
									<td>Name</td>
									<td><input type='text' name='txt_fname' id='id_fname' class='textprop'></td>
								</tr>
								<tr><td id='lblid'>ID:</td><td id='id_cid'></td></tr>	
								<tr>
									<td>Left-position</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_lposition' id='id_lposition' onkeypress='return onlynumbers(event)' maxlength=3 class='textprop' onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
								</tr>
								<tr>
									<td>Top-position</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_tposition' id='id_tposition' onkeypress='return onlynumbers(event)' maxlength=3 class='textprop' onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
								</tr>
								<tr>
									<td>Width</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_width' id='id_width' class='textprop' onkeypress='return onlynumbers(event)' maxlength=3 onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
								</tr>
								<tr>
									<td>Height</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_height' id='id_height' class='textprop' onkeypress='return onlynumbers(event)' maxlength=3 onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
								</tr>
								<tr id="trid_placeholder">
									<td>Placeholder</td>
									<td><input type='text' name='txt_placeholder' id='id_placeholder' class='textprop' onchange='setplaceholder(this,"id_cid")' ></td>
								</tr>
								<tr>
									<td>Readonly</td>
									<td><input type='radio' name='rdo_readonly' id='rdo_readonlyS' value='Yes' onclick='getreadonlystatus(this,"id_cid")' >YES
										<input type='radio' name='rdo_readonly' id='rdo_readonlyN' value='No' onclick='getreadonlystatus(this,"id_cid")' >NO
									</td>
								</tr>
								<!--<tr id="trid_caption">
									<td>Caption</td>
									<td><input type='text' name='txt_caption' id='id_caption' class='textprop' onchange='setplaceholder(this,"id_cid")' ></td>
								</tr>
								<tr>
									<td>font</td>
									<td><input type='text' name='txt_placeholder' id='id_placeholder' class='textprop' onchange='setplaceholder(this,"id_cid")' ></td>
								</tr>
								<tr>
									<td>Form color</td>
									<td><span id="Expandable"></span></td>
								</tr> -->
							</table>
						</div>
					</div>
				</div>
			</div>
			<center>
			<input type="submit" value='Create' name="btn_create" id="id_btncreate" onclick="getvalues('frmdiv')"></center>
			<input type="text" name="txt_description" id="id_description" ><div id='val'></div>
		</div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#frm').submit(function(){
	//alert('ssssssssss');
		$.post($('#frm').attr('action'), $('#frm').serialize(), function( data ) {
			if(data.st == 0)
			{
				$('#validation-error').html(data.msg).addClass('alert alert-danger');
			}
				if(data.st == 1)
			{
				window.location.href='home.html';
			}
		}, 'json');
		return false;			
	});
}); 
</script>