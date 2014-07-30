<style>
       .onoffswitch {
    position: relative; width: 45px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
    }
    .onoffswitch-checkbox {
    display: none;
    }
    .onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 9px;
    }
    .onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
    }
    .onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 15px; padding: 0; line-height: 15px;
    font-size: 12px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
    }
    .onoffswitch-inner:before {
    content: "ON";
    padding-left: 7px;
    background-color: #2FCCFF; color: #FFFFFF;
    }
    .onoffswitch-inner:after {
    content: "OFF";
    padding-right: 7px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
    }
    .onoffswitch-switch {
    display: block; width: 15px; margin: 0px;
    background: #FFFFFF;
    border: 2px solid #999999; border-radius: 9px;
    position: absolute; top: 0; bottom: 0; right: 30px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px;
    }
</style>

<table >
	<tr>
		<td>Type</td>
		<td id='tdid_type'></td>
	</tr>
	<tr>
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
    </div> </td>
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
	
	
</table>