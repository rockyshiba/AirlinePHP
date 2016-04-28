var btnBookOnline = document.getElementById("onlineBook");
var btnSchedules = document.getElementById("schedules");
btnSchedules.onclick = toggleForms;
btnBookOnline.onclick = toggleForms;
function toggleForms() {
    var bookForm = document.getElementById("bookForm");
    var schedForm = document.getElementById("schedForm");
    if(btnSchedules.className === "col-6 blueLabel") {
        bookForm.className = "hidden";
        schedForm.className = "row";
        btnSchedules.className = "col-6 redLabel";
        btnBookOnline.className = "col-6 blueLabel";
    }
    else {
        bookForm.className = "col-12";
        schedForm.className = "hidden";
        btnSchedules.className = "col-6 blueLabel";
        btnBookOnline.className = "col-6 redLabel";
    }
}