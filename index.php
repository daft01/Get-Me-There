<?php
  session_start();
  $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Get Me There</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <button id="JessicaButton"> <a href="settings.php">Jessica's Button</a> </button>
    
    <div id="locations">
      <label for="origin">Origin</label>
      <input class="form-control" id="origin" type="text" placeholder="Current Location">

      <label for="destination">Destination</label>
      <input class="form-control" id="destination" type="text" placeholder="Search">
        
      <button id="addTrip" onclick="addTripClicked()">Add to trips</button>
    </div>
    
    <div id = "email">
      <?= $email ?>
    </div>
    
    <div id="map"></div>
	<div id="optionsContainer">
		<div id="DRIVING" class="option" onclick="optionClicked(this.id)"></div>
		<div id="WALKING" class="option" onclick="optionClicked(this.id)"></div>
		<div id="BICYCLING" class="option" onclick="optionClicked(this.id)"></div>
		<div id="TRANSIT" class="option" onclick="optionClicked(this.id)"></div>
	</div>
  
        <div id=trips>
            Trips
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0vzljkSDp7Hk3CWIytTfZJEM8jS-UooU&libraries=places"></script>
    <script type="text/javascript" src="javascript/googleMapsCode.js"></script>
  </body>
</html>
