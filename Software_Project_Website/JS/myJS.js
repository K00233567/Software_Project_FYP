// Get the modal
var cmodal = document.getElementById('cSign-Up');
var bmodal = document.getElementById('bSign-Up');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == cmodal) {
        modal.style.display = "none";
    }
}

window.onclick = function(event) {
    if (event.target == bmodal) {
        modal.style.display = "none";
    }
}


//     GOOGLE MAP           //
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
