<?php 
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";


?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/textbox.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/validchar.js"></script>
<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>themes/minotz/css/onoffswitch.css" />
<link type="text/css" href="<?php echo base_url() ?>themes/minotz/css/ui-lightness/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
 <script type="text/javascript" src="<?php echo base_url() ?>themes/minotz/css/jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>themes/minotz/css/jquery.timepicker.css" />
  <script src="<?php echo base_url() ?>js/jquery.fileupload.js"></script>
<!-------- color picker
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>js/jpicker/css/jpicker-1.1.6.min.css" />
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>js/jpicker/jPicker.css" />
	<script src="<?php echo base_url() ?>js/jpicker/jquery-1.4.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>js/jpicker/jpicker-1.1.6.min.js" type="text/javascript"></script> ---------->
<!--------End color picker ---------->
<style>
@media screen {
	.page_break	{ height:10px; background:url(page-break.gif) 0 center repeat-x; border-top:1px dotted #999; margin-bottom:13px; }
}	
</style>
<script>
$(function () {
$("#properties").css('display',"none");

    $(".panel-tool li").draggable({
        appendTo: "body",
        helper: "clone"
    });
	var i=0;var j=0;k=0;l=0;m=0;n=0;p=0;q=0;r=0;s=0;t=0;u=0;v=0;w=0;x=0;y=0;
	var dropPositionY=0;var dropPositionX=0;
    $(".panel-body1").droppable({
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        accept: ":not(.ui-sortable-helper)",
        drop: function (event, ui) {
			
			//$("#properties").css('display',"");
			//gettextbox_properties(this,ui.draggable.text());
			var curr_elementid=document.activeElement.id;
		    var currentelement=document.activeElement.type;
			var currentobj=(currentelement=='' || currentelement==undefined )?ui.draggable.text().toLowerCase():currentelement;
			var lbl = "Enter Here";
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
				var $ctrl = $('<input/>').attr({ type: 'radio',id:'id_rdo_'+k, name:'radio_buttons',onblur:'gettextbox_properties(this,"Radio-buttons")'}).addClass("rad");
				$(this).append($ctrl);
				$("#id_rdo_"+k).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'Radio-buttons');
					},
					scroll: false, cancel: null  
				});
				k++;
			}
			// ADDING A DROPDOWNLIST DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Dropdown list'){
				var $ctrl = $('<select/>').attr({id:'id_dropdown_'+l , name:'dropdown_'+l,onblur:'gettextbox_properties(this,"Drop-down list")'}).addClass("select");
				var $ctrloptn=$('<option />', {value: '', text: 'Select'}).appendTo($ctrl);
				$(this).append($ctrl);
				$("#id_dropdown_"+l).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'Drop-down list');
					},
					scroll: false, cancel: null  
				});
				l++;
			}
			// ADDING A HEADER DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Header'){
				var $ctrl=$('<label/>').attr({id:'id_header_'+m , name:'header_'+m,onblur:'gettextbox_properties(this,"header")'}).append(lbl);
				$(this).append($ctrl);
				$('#id_header_'+m).css('font-weight', 'bold');
				$('#id_header_'+m).css('font-size', '30px');
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
				var lbl = "Enter Here";
				var $ctrl=$('<label/>').attr({id:'id_label_'+q,name:'Label_'+q,onblur:'gettextbox_properties(this,"label")'}).append(lbl);
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
				//$(".page_break").css('background-color','blue');
				//$(".page_break").height(2);
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
				$(".line").css('background-color','block');
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
				var $ctrl=$('<div ></div>').attr({ 'id': 'id_sketch_'+t, name:'sketh_'+t,onblur:'gettextbox_properties(this,"sketch")'}).addClass("sketch");
				$(this).append($ctrl);
				$(".sketch").width(200).height(70);
				$(".sketch").css('background-color','grey');
				$("#id_sketch_"+t).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'sketch');
					},
					scroll: false, cancel: null  
				});
				t++;
			}// ADDING A TEXTAREA DYNAMICALLY AT RUN TIME
			else if(ui.draggable.text()=='Textarea'){
				var $ctrl = $('<textarea/>').attr({ type: 'text', id:'id_textarea_'+u, name:'textarea_'+u, placeholder:'textarea'+u,onblur:'gettextbox_properties(this,"Textarea")'}).addClass("textarea");
				$(this).append($ctrl);
				$("#id_textarea_"+u).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'Textarea');
					},
				 scroll: false, cancel: null  });
				u++;
			}
			else if(ui.draggable.text()=='Date'){
				var $ctrl = $('<input/>').attr({ type: 'text', id:'id_textdate_'+v, name:'textdate_'+v, placeholder:'dd/mm/yyyy',onblur:'gettextbox_properties(this,"Date")'}).addClass("date");
				//var $ctrl = $('<input/>').attr({ type: 'date', id:'id_date_'+v, name:'date_'+v, placeholder:'Date'+v,onblur:'gettextbox_properties(this,"Date")'}).addClass("date");
				$(this).append($ctrl);
				//$("#id_textdate_"+v).datepicker({ dateFormat: 'dd/mm/yy' });
				 var date=$.datepicker.formatDate('dd/mm/yy', new Date())
				$("#id_textdate_"+v).datepicker({ 
					minDate: date, 
					maxDate: $.datepicker.formatDate('mm/dd/yy',new Date($("#id_maxdate").val())), 
					dateFormat: "dd/mm/yy", 
					//defaultDate: "+1w", 
					changeMonth: true, 
					numberOfMonths: 1 
				}); 
				$("#id_textdate_"+v).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'Date');
					},
				 scroll: false, cancel: null  });
				v++;
			}
			else if(ui.draggable.text()=='Time'){
				var $ctrl = $('<input/>').attr({ type: 'text', id:'id_texttime_'+w, name:'texttime_'+w, placeholder:'HH:MM', onblur:'gettextbox_properties(this,"Time")'}).addClass("time");
				//var $ctrl = $('<input/>').attr({ type: 'time', id:'id_time_'+w, name:'time_'+w, placeholder:'time'+w, onblur:'gettextbox_properties(this,"Time")'}).addClass("time");
				$(this).append($ctrl);
				$('#id_texttime_'+w).timepicker({ 'scrollDefault': 'now' });
				$("#id_texttime_"+w).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'Time');
					},
				 scroll: false, cancel: null  });
				w++;
			}
			else if(ui.draggable.text()=='Image'){
				var $ctrl = $('<img/>').attr({ id:'id_image_'+x, name:'img_image'+x, src:'', onblur:'gettextbox_properties(this,"Image")'}).addClass("image");
				$(this).append($ctrl);
				$("#id_image_"+x).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'Image');
					},
				 scroll: false, cancel: null  });
				x++;
			}
			else if(ui.draggable.text()=='Number')
			{
				var $ctrl = $('<input/>').attr({ type: 'text', id:'id_number_'+y, name:'number_'+y, value:'',placeholder:'Numer'+y,onkeypress:'return onlynumbers(event)',onblur:'gettextbox_properties(this,"Number")'}).addClass("number");
				$(this).append($ctrl);
				$("#id_number_"+y).draggable({ containment: ".panel-body1",
				    drag: function(){
						gettextbox_properties(this,'Number');
					},
				scroll: false, cancel: null  });
				y++;
			}
        }
    }).sortable();
});
</script>
<script type="text/javascript">
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
			var required_status=$('#'+e1[i].id).attr('required');
			var caption=$('#'+e1[i].id).text();
			var curr_con=document.getElementById(e1[i].id);
			var fontsize=e1[i].style.fontSize;
			var fontweight= e1[i].style.fontWeight;
			var visibility= e1[i].style.visibility;
			var maxdate=$('#'+e1[i].id).attr('maxdate');
			var maxlength=$('#'+e1[i].id).attr('maxlength');
			var minlength=$('#'+e1[i].id).attr('minlength');
			var maxtime=$('#'+e1[i].id).attr('maxtime');
			var mintime=$('#'+e1[i].id).attr('mintime');
			var imgsrc=$('#'+e1[i].id).attr('src');
			a1.push({'id' : e1[i].id,'type' : e1[i].type, 'name':e1[i].name,'value':caption,
			'attribute':{'leftposition':leftposition,'topposition':topposition,'element_width':element_width,'element_height':element_height,
			'placeholder':placeholder,'required':required_status,'readonly':readonly_status,'maxlength':maxlength,'minlength':minlength,
			'font-size': fontsize,'font-weight':fontweight,'visibility': visibility,'maxdate': maxdate,'mintime':mintime,'maxtime':maxtime,'src':imgsrc}});
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
	function changeImage() {
    document.getElementById("newavatar").src = document.getElementById("input-file").value;
}
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
							<li>Number</li>
							<li>Check box</li>
							<li>Radio button</li>
							<li>Dropdown list</li>
							<li>Label</li>
							<li>Page break</li>
							<li>Line</li>
							<li>Sketch</li>
							<li>Textarea</li>
							<li>Date</li>
							<li>Time</li>
							<li>Image</li>
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
							<table width=100%  >
								<tr>
									<td>Type</td>
									<td id='tdid_type'></td>
								</tr>
								<tr id='trid_caption' >
									<td>Caption</td>
									<td><input type='text' name='txt_caption' id='id_caption' class='textprop' onchange='setcaption(this,"id_cid")' ></td>
								</tr>
								<tr>
									<td>Hide</td>
									<td><div class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" onclick='gethidestatus(this,"id_cid")' id="myonoffswitch" checked>
											<label class="onoffswitch-label" for="myonoffswitch">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
											</label>
										</div>
									</td>
								</tr>
								<tr id='trid_name' >
									<td>Name</td>
									<td><input type='text' name='txt_fname' id='id_fname' class='textprop'></td>
								</tr>
								<tr><td id='lblid'>ID:</td><td id='id_cid'></td></tr>
								<tr id='trid_minlength'>
									<td>Min Length</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_minlength' id='id_minlength' onkeypress='return onlynumbers(event)' maxlength=3 class='textprop' onchange='return setlengths("id_minlength","id_maxlength","id_cid")'></td>
								</tr>
								<tr id='trid_maxlength'>
									<td>Max Length</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_maxlength' id='id_maxlength' onkeypress='return onlynumbers(event)' maxlength=3 class='textprop' onchange='return setlengths("id_minlength","id_maxlength","id_cid")'></td>
								</tr>
								<tr id='trid_multiline'>
									<td>Multi-line</td>
									<td><div class="onoffswitch">
											<input type="checkbox" name="onoff_multiline" class="onoffswitch-checkbox" onclick='getmultiline_status(this,"id_cid")'  id="id_onoff_multiline" checked>
											<label class="onoffswitch-label" for="id_onoff_multiline">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
											</label>
										</div>
									</td>
								</tr>
								<tr id='trid_required'>
									<td>Required</td>
									<td><div class="onoffswitch">
											<input type="checkbox" name="onoff_required" class="onoffswitch-checkbox" onclick='getrequired(this,"id_cid")'  id="id_onoff_required" checked>
											<label class="onoffswitch-label" for="id_onoff_required">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
											</label>
										</div>
									</td>
								</tr>
								<tr id='trid_leftpos' >
									<td>Left-position</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_lposition' id='id_lposition' onkeypress='return onlynumbers(event)' maxlength=3 class='textprop' onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
								</tr>
								<tr id='trid_toppos' >
									<td>Top-position</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_tposition' id='id_tposition' onkeypress='return onlynumbers(event)' maxlength=3 class='textprop' onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
								</tr>
								<tr id='trid_width' >
									<td>Width</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;" name='txt_width' id='id_width' class='textprop' onkeypress='return onlynumbers(event)' maxlength=3 onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
								</tr>
								<tr id='trid_height' >
									<td>Height</td>
									<td><input type='text' onDrop="return false;" onPaste="return false;"  name='txt_height' id='id_height' class='textprop' onkeypress='return onlynumbers(event)' maxlength=3 onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
								</tr>
								<tr id="trid_fontstyle">
									<td>Font style</td>
									<td><a href='#' id='idfnt_regular' onclick='getfontstyle_change("regular","id_cid")' >Regular</a>/<a href='#' id='idfnt_bold' onclick='getfontstyle_change("bold","id_cid")'>Bold</a></td>
								</tr>
								<tr id="trid_fontsize">
									<td>Font size</td>
									<td><a href='#' onclick='getfontsize_change("large","id_cid")' >Large</a>/
										<a href='#' onclick='getfontsize_change("medium","id_cid")' >Medium</a>/
										<a href='#' onclick='getfontsize_change("small","id_cid")' >Small</a></td>
								</tr> 
								<tr id="trid_placeholder">
									<td>Placeholder</td>
									<td><input type='text' name='txt_placeholder' id='id_placeholder' class='textprop' onchange='setplaceholder(this,"id_cid")' ></td>
								</tr>
								<tr id="trid_readonly" >
									<td>Readonly</td>
									<td><input type='radio' name='rdo_readonly' id='rdo_readonlyS' value='Yes' onclick='getreadonlystatus(this,"id_cid")' >YES
										<input type='radio' name='rdo_readonly' id='rdo_readonlyN' value='No' onclick='getreadonlystatus(this,"id_cid")' >NO
									</td>
								</tr>
								<tr id="trid_maxdate">
									<td>Max Date</td>
									<td><input type='text' name='txt_maxdate' id='id_maxdate' class='textprop' placeholder='Max date' maxlength='10' readonly='readonly' ></td>
								</tr>
								<tr id="trid_mintime">
									<td>Min Time</td>
									<td><input type='text' name='txt_mintime_hh' id='id_mintime_hh' style='width:30px' placeholder='HH' maxlength=2 onchange='setmin_maxtimes("id_mintime_hh","id_mintime_mm","id_maxtime_hh","id_maxtime_mm","id_cid")' >:
										<input type='text' name='txt_mintime_mm' id='id_mintime_mm' style='width:30px' placeholder='MM' maxlength=2 onchange='setmin_maxtimes("id_mintime_hh","id_mintime_mm","id_maxtime_hh","id_maxtime_mm","id_cid")' >
									</td>
								</tr>
								<tr id="trid_maxtime">
									<td>Max Time</td>
									<td><input type='text' name='txt_maxtime_hh' id='id_maxtime_hh' style='width:30px' placeholder='HH' maxlength=2  onchange='setmin_maxtimes("id_mintime_hh","id_mintime_mm","id_maxtime_hh","id_maxtime_mm","id_cid")' >:
										<input type='text' name='txt_maxtime_mm' id='id_maxtime_mm' style='width:30px' placeholder='MM' maxlength=2  onchange='setmin_maxtimes("id_mintime_hh","id_mintime_mm","id_maxtime_hh","id_maxtime_mm","id_cid")' >
									</td>
								</tr>
								<tr id="trid_image">
									<td>Image</td>
									<td>
										<input type='file' name='txt_image' id='id_file' >
										<!--<input type='submit' name='btnsubmit' value='Upload'>
										<input id="id_file" class="upload-image" onchange="changeImage()" type="file"    name="avatar" accept="image/jpeg, image/png">
									
										<div id="files" class="files"></div>-->
									</td>
								</tr>
								<tr id="trid_entries">
									<td>Entries</td>
									<td><textarea name='txt_entries' id='id_entries' class='textprop' onchange='setaddoptions(this,"id_cid")' ></textarea></td>
								</tr>
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

$("#id_maxdate").datepicker({
        minDate: 0,
        onSelect: function(theDate) {
			var act_id=document.getElementById('id_cid').innerHTML;
			var cntrlid=document.getElementById(act_id);
			cntrlid.setAttribute('maxdate', theDate);
			
            $("#dataEnd").datepicker('option', 'mindate', new Date());
        },
        beforeShow: function() {
            $('#ui-datepicker-div').css('z-index', 9999);
        },
        dateFormat:'dd/mm/yy'
    });
$('#id_file').change( function(event) {
	var act_id=document.getElementById('id_cid').innerHTML;
	var cntrlid=document.getElementById(act_id);
	var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#"+act_id).fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    
});

});

$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'C:/wamp/www/Minotz456/application/views/minotz/uploads/';
	
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
		alert('sss');
            $.each(data.result.files, function (index, file) {
			
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
       
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>