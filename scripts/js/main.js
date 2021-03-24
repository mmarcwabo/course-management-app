//Globals
var appAbsolutePath = "http://localhost/courses_man/";

//Enable submit if checkbox has been activated
EnableSubmit = function (val) {
    var sbmt = document.getElementById("Accept");

    if (val.checked == true) {
        sbmt.disabled = false;
    }
    else {
        sbmt.disabled = true;
    }
}
