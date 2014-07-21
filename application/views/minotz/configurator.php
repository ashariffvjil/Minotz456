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
	
	function getvalues(divid)
	{
		var ele = document.getElementById(divid).children;
		var match = new Array();
		var total_elements = fillArray(ele,match);
		document.getElementById('val').innerHTML = total_elements;
		document.getElementById('id_txtvalues').value = total_elements;
		
	}
	function fillArray(e1,a1)
	{
		for(var i =0;i<e1.length;i++)
		{
			if(e1[i].id.indexOf('frmdiv') != 0)
			a1.push(e1[i].id);
			var prop=new Array();
			leftposition = parseInt($('#'+e1[i].id).offset().left) -parseInt($('#frmdiv').offset().left);
			topposition =parseInt($('#'+e1[i].id).offset().top) - parseInt($('#frmdiv').offset().top);
			element_width=document.getElementById(e1[i].id).offsetWidth;
			element_height=document.getElementById(e1[i].id).offsetHeight;
			var tmp=e1[i].name+'@'+leftposition+'@'+topposition+'@'+element_width+'@'+element_height;
			a1.push(tmp);
		}
		return a1;
   }
	function cntrl_deleted(id_cid)
	{
		var active_ctrlid=document.getElementById(id_cid).innerHTML;
		$('#'+active_ctrlid).remove();
	}
</script>
<script>


$(function () {
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
			var curr_elementid=document.activeElement.id;
		    var currentelement=document.activeElement.type;
			var currentobj=(currentelement=='' || currentelement==undefined )?ui.draggable.text().toLowerCase():currentelement;
		    if(ui.draggable.text()=='Text'){
				var $ctrl = $('<input/>').attr({ type: 'text', id:'id_textbox_'+i, name:'text', value:'',placeholder:'textbox'}).addClass("text");
				 $(this).append($ctrl);
				var id='id_textbox_'+i;
				
			   /* dropPositionX = parseInt(event.pageX) - parseInt($(this).offset().left);
				 dropPositionY = parseInt(event.pageY) - parseInt($(this).offset().top);
				$('#id_textbox_'+i).css({left : dropPositionX+'px'});
				$('#id_textbox_'+i).css({top : dropPositionY+'px'});
			
				$('#id_lposition').val(parseFloat(dropPositionX));
				$('#id_tposition').val(parseFloat(dropPositionY));
				 dropPositionX =0;
				 dropPositionY =0; */
				var placeholder_val=$ctrl.attr('placeholder');  
				$('#id_placeholder').val(placeholder_val);
				$("#id_textbox_"+i).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'text');
					},
				 scroll: false, cancel: null  });
				i++;
			}
			else if(ui.draggable.text()=='Check box'){
				var val='Checkbox';
				var $ctrl = $('<input/>').attr({ type: 'checkbox', id:'id_chk_'+j, name:'checkbox'}).addClass("chk");
				// $(this).append ( "<span id='id_chk_" + j +"'><label for='id_chk_" + j + "'>" + val + "</label>&nbsp<input id='id_chk_" + j + "' type='checkbox' value='" + val + "' /></span>" );
				//var $ctrl_lbl=$('<label />', { 'for': 'id_chk_'+j, text: 'checkbox' }).appendTo("panel-body1");
				$(this).append($ctrl);
				$("#id_chk_"+j).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'checkbox');
					},
				 scroll: false, cancel: null  });
				j++;
			}
			else if(ui.draggable.text()=='Radio button'){
				var $ctrl = $('<input/>').attr({ type: 'radio',id:'id_rdo_'+k, name:'radio'}).addClass("rad");
				$(this).append($ctrl);
				$("#id_rdo_"+k).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'radio');
					},
				 scroll: false, cancel: null  });
				k++;
			}
			else if(ui.draggable.text()=='Dropdown list'){
				var $ctrl = $('<select/>').attr({id:'id_dropdown_'+l , name:'dropdown'}).addClass("select");
				var $ctrloptn=$('<option />', {value: '', text: 'Select'}).appendTo($ctrl);
				$(this).append($ctrl);
				$("#id_dropdown_"+l).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'dropdown');
					},
				 scroll: false, cancel: null  });
				l++;
			}
			else if(ui.draggable.text()=='Header'){
				var lbl = prompt ("Enter Text","");
				var $ctrl=$('<label/>').attr({id:'id_header_'+m , name:'header'}).append(lbl);
				$(this).append($ctrl);
				$("#id_header_"+m).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'header');
					},
				 scroll: false, cancel: null  });
				m++;
			}
			else if(ui.draggable.text()=='Button'){
				var $ctrl = $('<input/>').attr({ type: 'button',id:'id_button_'+n, name:'button',value:'Button'}).addClass("button");
				$(this).append($ctrl);
				$("#id_button_"+n).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'button');
					},
				 scroll: false, cancel: null  });
				n++;
			}
			else if(ui.draggable.text()=='Subheader'){
				var lbl = prompt ("Enter Text","");
				var $ctrl=$('<label/>').attr({id:'id_subhead_'+p,name:'Subheader'}).append(lbl);
				$(this).append($ctrl);
				$("#id_subhead_"+p).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'subheader');
					},
				 scroll: false, cancel: null  });
				p++;
			}
			else if(ui.draggable.text()=='Label'){
				var lbl = prompt ("Enter Text","");
				var $ctrl=$('<label/>').attr({id:'id_label_'+q,name:'Label'}).append("<b>"+lbl+"</b>");
				$(this).append($ctrl);
				$("#id_label_"+q).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'label');
					},
				 scroll: false, cancel: null  });
				q++;
			}
			else if(ui.draggable.text()=='Page break'){
				var $ctrl=$('<hr/>').attr({id:'id_pagebrk_'+r,name:'page break'}).addClass("page_break");
				$(this).append($ctrl);
				$(".page_break").css('background-color','blue');
				$(".page_break").height(2);
				$("#id_pagebrk_"+r).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'Pagebreak');
					},
				 scroll: false, cancel: null  });
				 r++;
			}
			else if(ui.draggable.text()=='Line'){
			var $ctrl=$('<hr />').attr({id:'id_hr_'+s, name:'line'}).addClass("line");
				$(this).append($ctrl);
				$(".line").css('background-color','red');
				$(".line").width(200).height(2);
				$("#id_hr_"+s).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'line');
					},
				 scroll: false, cancel: null  });
				 s++;
			}
			else if(ui.draggable.text()=='Sketch'){
				var $ctrl=$('<div ></div>').attr({ 'id': 'id_sketch_'+t, name:'sketh'}).addClass("sketch");
				$(this).append($ctrl);
				$(".sketch").width(200).height(70);
				$(".sketch").css('background-color','grey');
				$("#id_sketch_"+t).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'sketh');
					},
				 scroll: false, cancel: null  });
				t++;
			}
        }
    }).sortable();
});
</script>

<div id="container">
	<h1>Configurator</h1>

	<div id="body">
		<div class="row">
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
					<div class="panel-heading"> Form </div>
					<div class="panel-body1" id="frmdiv">
					</div>
				</div>
			</div>
			<!---------- Start the Properties panel-------------->
			<div class="col-lg-3">
				<div class="panel panel-info">
					<div class="panel-heading"> Properties  <input type="button" name="btn_del" id="id_del" value="Delete" onclick="cntrl_deleted('id_cid')"></div>
					<div class="panel-properties">
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
						<tr>
							<td>Placeholder</td>
							<td><input type='text' name='txt_placeholder' id='id_placeholder' class='textprop' onchange='setplaceholder(this,"id_cid")' ></td>
						</tr>
						<tr>
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
						</tr>
					</table>
					</div>
				</div>
			</div>
			<center>
			<input type="submit" value='Create' name="btn_create" id="id_btncreate" onclick="getvalues('frmdiv')"></center>
			<input type="text" name="txt_values" id="id_txtvalues" ><div id='val'></div>
		</div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>