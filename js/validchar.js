

function onlynumbers(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
	//alert(charCode);
    if (charCode != 46 && charCode != 37 &&charCode != 39 && charCode > 31 && (charCode < 48 || charCode > 57) ) {
        return false;
    }
    return true;
}