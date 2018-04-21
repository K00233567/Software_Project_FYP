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





$(document).ready(function () {
  $('.rating-star')
  .on('mouseover', function(e) {
    var rating = $(e.target).data('rating');
    // fill all the stars
    $('.rating-star').removeClass('fa-star-o').addClass('fa-star');
    // empty all the stars to the right of the mouse
    $('.rating-star#rating-' + rating + ' ~ .rating-star').removeClass('fa-star').addClass('fa-star-o');
  })
  .on('mouseleave', function (e) {
    // empty all the stars except those with class .selected
    $('.rating-star').removeClass('fa-star').addClass('fa-star-o');
  })
  .on('click', function(e) {
    var rating = $(e.target).data('rating');
    $('#rating-input').val(rating);
    // fill all the stars assigning the '.selected' class
    $('.rating-star').removeClass('fa-star-o').addClass('selected');
    // empty all the stars to the right of the mouse
    $('.rating-star#rating-' + rating + ' ~ .rating-star').removeClass('selected').addClass('fa-star-o');
  })
});
