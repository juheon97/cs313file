function toggle_visibility(id){
    var e = document.getElementById(id);
    if (e.style.display == 'block') {
        e.style.display = 'none';
    }
    else {
        e.style.display= 'block';
    }
}

function toggle_visibility(id, id2){
    var e = document.getElementById(id);
    if (e.style.display == 'block') {
        e.style.display = 'none';
    }
    else {
        e.style.display= 'block';
        add_events(id2)
    }
}

function add_events(id) {
    const calendar = load_cal(id);
    calendar.then(data => {
        cal_div= document.getElementById('form_display');
        console.log(data);
        cal_div.innerHTML = data;
    })
}

function load_cal(id) {
    var formData = new FormData();
    formData.append('form_id', id);

    return fetch("calendar_fetch.php", {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok){
            console.log("in then", response);
            return response.text();
        }
    });
}