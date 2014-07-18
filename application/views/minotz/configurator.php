<?php 
//echo "<pre>";
//print_r($_POST);

//echo base_url();
//echo "</pre>";


?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/textbox.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/validchar.js"></script>

 <link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>js/jpicker/css/jpicker-1.1.6.min.css" />
  <link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>js/jpicker/jPicker.css" />
  <script src="<?php echo base_url() ?>js/jpicker/jquery-1.4.4.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>js/jpicker/jpicker-1.1.6.min.js" type="text/javascript"></script>
  
<script type="text/javascript">
  $(document).ready(
    function()
    {
	//alert('sagar');
      $('#Expandable').jPicker(
        {
          window:
          {
            expandable: true
          }
        });
		
		$(".Ok").clicked(function(){
		alert('sss');
		//alert($(".jPicker .Icon .Color").attr('style'));
		});
		//$(".panel-body1").css('background-color','rgb(255,200,155)');
    });
</script>
<script>


$(function () {

	
	//$('.panel-body1').css();
	//$('#Expandable .jPicker .Icon .Color').find().css('background-color')= $(".panel-body1").css('background-color');//$( ".Color" ).css( "background-color");
	
    $(".panel-tool li").draggable({
        appendTo: "body",
        helper: "clone"
		
    });
	
	//$(".text").draggable({ cancel: null });
	var i=0;var j=0;k=0;l=0;m=0;
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
				
			/*	 dropPositionX = parseInt(event.pageX) - parseInt($(this).offset().left);
				 dropPositionY = parseInt(event.pageY) - parseInt($(this).offset().top);
				$('#id_textbox_'+i).css({left : dropPositionX+'px'});
				$('#id_textbox_'+i).css({top : dropPositionY+'px'});
			
				$('#id_lposition').val(parseFloat(dropPositionX));
				$('#id_tposition').val(parseFloat(dropPositionY));
				 dropPositionX =0;
				 dropPositionY =0; */
				var phval=$ctrl.attr('placeholder');  
				$('#id_placeholder').val(phval);
				
				$("#id_textbox_"+i).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'text');
					},
				 scroll: false, cancel: null  });
				i++;
				}
			else if(ui.draggable.text()=='Check box'){
				var $ctrl = $('<input/>').attr({ type: 'checkbox', id:'id_chk_'+j, name:'checkbox'}).addClass("chk");
				$(this).append($ctrl);
				var id='id_chk_'+j;
				$("#id_chk_"+j).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'checkbox');
					},
				 scroll: false, cancel: null  });
				j++;
				}
			else if(ui.draggable.text()=='Button'){
				var $ctrl = $('<input/>').attr({ type: 'button', name:'btn',value:'Button'}).addClass("btn");
				$(this).append($ctrl);
				
				$( ".btn" ).draggable({ containment: ".panel-body1", scroll: false, cancel: null });
				}
			else if(ui.draggable.text()=='Radio button'){
				var $ctrl = $('<input/>').attr({ type: 'radio',id:'id_rdo_'+k, name:'radio'}).addClass("rad");
				$(this).append($ctrl);
				var id='id_rdo_'+k;
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
				var id='id_dropdown_'+l;
				$("#id_dropdown_"+l).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'dropdown');
					},
				 scroll: false, cancel: null  });
				//$( ".select" ).draggable({ containment: ".panel-body1", scroll: false, cancel: null });
				l++;
				}
			else if(ui.draggable.text()=='Image')
				{
				var $ctrl=$('<img />').attr({ 'id': 'Myid', 'src': 'C:\Users\Public\Pictures\Sample Pictures/Penguins.jpg', 'alt':'MyAlt','width':300,'height':300}).addClass("image");
				$(this).append($ctrl);
				$( ".image" ).draggable({ containment: ".panel-body1", scroll: false, cancel: null });

				}

			else if(ui.draggable.text()=='Header'){
				var lbl = prompt ("Enter Text","");
				var $ctrl=$('<label/>').attr({id:'id_lbl_'+m , name:'label'}).append(lbl);
				$(this).append($ctrl);
				var id='id_lbl_'+m;
				$("#id_lbl_"+m).draggable({ containment: ".panel-body1",
				     drag: function(){
						gettextbox_properties(this,'Label');
					},
				 scroll: false, cancel: null  });
				m++;
				
			}
			else if(ui.draggable.text()=='Subheader'){
				var lbl = prompt ("Enter Text","");
				var $ctrl=$('<label/>').append(lbl);
				$(this).append($ctrl);
				$( "label" ).draggable({ containment: ".panel-body1", scroll: false, cancel: null });
			}
				//var $ctrl = $('<label/>').attr({ type: 'label', name:'lbl',value:'Label'}).addClass("label");
			
			
        }
    }).sortable({
        items: "li:not(.placeholder)",
        sort: function () {
            // gets added unintentionally by droppable interacting with sortable
            // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
            $(this).removeClass("ui-state-default");
        }
    });
});
</script>



<div id="container">
	<h1>Configurator</h1>

	<div id="body">
		<div class="row">
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
						</ul>
					</div>
					
				</div>
			</div>
			<div class="col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading"> Form </div>
					<div class="panel-body1">
					
					</div>
					
				</div>
			</div>
			<div class="col-lg-3">
				<div class="panel panel-info">
					<div class="panel-heading"> Properties </div>
					<div class="panel-properties">
					<table width='100%'>
						<tr>
							<td>Name</td>
							<td><input type='text' name='txt_fname' id='id_fname' class='textprop'></td>
						</tr>
						<tr><td id='lblid'>ID:</td><td id='id_cid'></td></tr>	
						<tr>
							<td>Left-position</td>
							<td><input type='text' name='txt_lposition' id='id_lposition' onkeypress='return onlynumbers(event)' maxlength=3 class='textprop' onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
						</tr>
						<tr>
							<td>Top-position</td>
							<td><input type='text' name='txt_tposition' id='id_tposition' onkeypress='return onlynumbers(event)' maxlength=3 class='textprop' onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
						</tr>
						<tr>
							<td>Width</td>
							<td><input type='text' name='txt_width' id='id_width' class='textprop' onkeypress='return onlynumbers(event)' maxlength=3 onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
						</tr>
						<tr>
							<td>Height</td>
							<td><input type='text' name='txt_height' id='id_height' class='textprop' onkeypress='return onlynumbers(event)' maxlength=3 onchange='setposition("id_tposition","id_lposition","id_cid","id_width","id_height")'></td>
						</tr>
						<tr>
							<td>Placeholder</td>
							<td><input type='text' name='txt_placeholder' id='id_placeholder' class='textprop' onchange='setplaceholder(this,"id_cid")' ></td>
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
			</div><?php 
		/*	$this->form_validation->set_rules('txt_lposition', 'Left position', 'numeric');	
			$this->form_validation->set_rules('txt_tposition', 'Top position', 'numeric');	
			$this->form_validation->set_rules('txt_width', 'Width', 'numeric');	
			$this->form_validation->set_rules('txt_height', 'Height', 'numeric');	
			*/
			?>
</div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>