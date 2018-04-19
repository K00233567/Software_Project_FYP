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




//Admin ADD_Admin FORM PASSWORD CHECK

//on submitting the sign up form, the values are first checked to ensure they are correct
$("#AdiminSignup").submit(function(event){
  if($('#APassword').val() != $('#ApasswordConfirm').val()){
    event.preventDefault();
    alert("Passwords do not match!");
  }
  else{
    alert("Thank you for registering, please log in.");
  }
});
