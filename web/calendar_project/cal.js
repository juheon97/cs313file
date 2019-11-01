function toggle_visibility(id){
    var e = document.getElementById(id);
    if (e.style.display == 'block') {
        e.style.display = 'none';
    }
    else {
        e.style.display= 'block';
    }
}

function add_events(id) {
    const calendar = load_cal(id);
    calendar.then(data => {
        cal_div= document.getElementById('calendar_display');
        cal_div.innerHTML = data;
    })
}

function load_cal(id) {
   const data = {
       cal_id: id
   };
   return fetch("calendar_fetch.php", {
    method: 'POST',
    mode: 'cors',
    headers: {
        'Content-Type': 'application/json'
   },
   body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok){
            console.log("in then", response);
            return response;
        }
    });
}