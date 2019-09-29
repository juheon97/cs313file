function display_verse() {
    document.getElementById("verse").innerHTML = "Sing, O heavens; and be joyful, O earth; for the feet of those who are in the east shall be established; and break forth into singing, O mountains; for they shall be smitten no more; for the Lord hath comforted his people, and will have mercy upon his afflicted. 1 Nephi 21:13";
  }


function validation(value, id) {

    var textcheck = /^[A-Za-z. ]{1,30}$/;

    var validation = "no_error";
	switch(id){
		case "sample":
			if (!textcheck.test(value)) {
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

 function hide(){
            
	var errormessage1 = document.getElementsByClassName("errormessage");
		
	for(var i=0; i<errormessage1.length; i++) {
            
		errormessage1[i].style["visibility"] = "hidden";
	}
}
