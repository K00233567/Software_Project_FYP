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

//CUSTOMER SIGN_UP FORM PASSWORD CHECK
$("#csignup").submit(function(event){
  if($('#CPassword').val() != $('#CpasswordConfirm').val()){
    event.preventDefault();
    alert("Passwords do not match!");
  }
  else{
    alert("Thank you for registering, please log in.");
  }
});



//BUSINESS SIGN_UP FORM PASSWORD CHECK

//on submitting the sign up form, the values are first checked to ensure they are correct
$("#signup").submit(function(event){
  if($('#Password').val() != $('#passwordConfirm').val()){
    event.preventDefault();
    alert("Passwords do not match!");
  }
  else{
    alert("Thank you for registering, please log in.");
  }
});
