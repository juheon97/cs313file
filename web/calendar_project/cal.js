function toggle_visibility(id){
    var e = document.getElementById(id);
    if (e.style.display == 'block') {
        e.style.display = 'none';
    }
    else {
        e.style.display= 'block';
    }
}

function load_cal(id) {
   var cal_id = id;
   return fetch("calendar.php", {})
   .then(response =>) 

}