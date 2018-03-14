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
