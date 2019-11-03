function hide(){
            
	var errormessage1 = document.getElementsByClassName("errormessage");
		
	for(var i=0; i<errormessage1.length; i++) {
            
		errormessage1[i].style["visibility"] = "hidden";
	}
}


function valid(value, id) {

    var date = /^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$/;
    var validation = "no_error";
	switch(id){
		case "sample":
			if (!date.test(value)) {
				validation = "error";
			}
            break;
            
        
        default:
				validation = "error";
        }
        
        if (validation === "error") {
			document.getElementById(id+"message").style.visibility = "visible";
			document.getElementById(id).focus();
		}	else {
			document.getElementById(id+"message").style.visibility = "hidden";
		}
		
		return validation;

    }



