<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>





<!-- TEST CODE -->

    <div class="col-sm-6" align="left" id="addform">
            <h2>Add a location</h2>
            Address: <input id="address" name="address" type="text"><input id="submit" type="button" value="find"><br/><br>

            <label>Location Type:</label>
            <select name="type" id="type">
              <option value="accommodation">Accommodation</option>
              <option value="camping">Camping</option>
              <option value="toilet">Toilet</option>
              <option value="leisure">Leisure</option>
              <option value="atm">ATM</option>
              <option value="bank">Bank</option>
              <option value="information">Information</option>
            </select>
            <br><br>

            Latitude: <input type="text" id="lat"><br><br>
            Longitude: <input type="text" id="lng"><br><br>
            Name: <input id="name" name="name" type="text"> <br><br>
            Details: <input id="details" name="details" type="text"> <br><br>
            Opening Hours: <input id="hours" name="hours" type="text"> <br><br>
            Phone Number: <input id="phone" name="phone" type="text"> <br><br>
            Website: <input id="website" name="website" type="text"> <br><br>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input type="file" id="exampleInputFile">
            </div>
            <input name="myBtn" type="submit" value="Submit Data" onclick="ajax_post();"> <br><br>

            <div id="status"></div>
            </div>


    <script type="text/javascript">


    function ajax_post(){

                    // Create our XMLHttpRequest object
                    var hr = new XMLHttpRequest();
                    // Create some variables we need to send to our PHP file
                    var url = "process.php";
                    var address = document.getElementById("address").value;
                    var type = document.getElementById("type").value;
                    var name = document.getElementById("name").value;
                    var details = document.getElementById("details").value;
                    var lat = document.getElementById("lat").value;
                    var lng = document.getElementById("lng").value;
                    var hours = document.getElementById("hours").value;
                    var phone = document.getElementById("phone").value;
                    var website = document.getElementById("website").value;
                    var vars = "address="+address+"&name="+name+"&type="+type+"&details="+details+"&lat="+lat+"&lng="+lng+"&hours="+hours+"&phone="+phone+"&website="+website;
                    hr.open("POST", url, true);
                    // Set content type header information for sending url encoded variables in the request
                    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    // Access the onreadystatechange event for the XMLHttpRequest object
                    hr.onreadystatechange = function() {
                    if(hr.readyState == 4 && hr.status == 200) {
                    var return_data = hr.responseText;
                document.getElementById("status").innerHTML = return_data;
                    }
                    }
                    // Send the data to PHP now... and wait for response to update the status div
                    hr.send(vars); // Actually execute the request
                    document.getElementById("status").innerHTML = "processing...";
                }

</script>

<!-- END OF TEST CODE -->




    <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5p3hqra4__AqPXzAKe0UX4KYVQsFC-Sk&callback=initMap">
    </script>

    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/myJS.js"></script>
  </body>
</html>
fjfj
