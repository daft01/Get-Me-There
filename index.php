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
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
      }
      
      .navbar {
        overflow: hidden;
        background-color: #333;
      }
      
      .navbar a {
        float: right;
        font-size: 1.5em;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      
      .dropdown {
        float: right;
        overflow: hidden;
        font-size: 1em;
        margin-right: 100px;
        width: 150px;
      }
      
      .dropdown .dropbtn {
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        font-size: 1.5em;
        margin: 0;
      }
      
      .navbar a:hover, .dropdown:hover .dropbtn {
        background-color: red;
      }
      
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      
      .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        
      }
      
      .dropdown-content a:hover {
        background-color: purple;
      }
      
      .dropdown:hover .dropdown-content {
        display: block;
      }
      #container{
        width: 1500px;
        margin: 0 auto;
      }
      #mapContainer{
        display: flex;
      }
      #trips{
        width: 100%;
        background-color: black;
          font-size: 1.5em;
        color: white;
        margin-left: 10px;
          height: 1000px;
      }
      #tripTitle{
        width: 100%;
        text-align: center;
        font-size: 3em;
      }
      #locations{
        font-size: 2.5em;
        margin-bottom: 20px;
      }
      input{
        font-size: .7em;
        width: 300px;
      }
      #optionsContainer{
        font-size: 1.4em;
        margin: 5px;
      }
      #addTrip{
        width: 200px;
        height: 50px;
        font-size: .5em;
        border-radius: 5px;
          background-color: purple;
          color: white;
      }
      .option{
        margin: 5px;
      }
        .yellow{
            color: yellow;
        }
        
        .trip{
            border-bottom: 5px solid yellow;
        }
        .tripLocation{
            padding: 10px;
        }
        .optionTitle{
            text-align: center;
        }
        #DRIVING{
            flex-basis: 25%;
            flex-grow: 0;
        }
        #WALKING{
            flex-basis: 25%;
            flex-grow: 0;
        }
        #BICYCLING{
            flex-basis: 25%;
            flex-grow: 0;
        }
        #TRANSIT{
            flex-basis: 25%;
            flex-grow: 0;
        }
    </style>
  </head>
  <body>
    
    <div class="navbar">
      <div class="dropdown">
        <button class="dropbtn">Account
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="#">Settings</a>
          <a href="#">Sign Out</a>
          <a href="#">Delete Account</a>
        </div>
      </div> 
      <a href="map.php">Map</a>
      <a href="index.php">Home</a>
    </div>

    <div id="container">
      <div id="locations">
        <label for="origin">Origin: </label>
        <input class="form-control" id="origin" type="text" placeholder="Current Location">
  
        <label for="destination">Destination: </label>
        <input class="form-control" id="destination" type="text" placeholder="Search">
          
        <button id="addTrip" onclick="addTripClicked()">Add to trips</button>
      </div>
      
      <div id="mapContainer">
        <div>
          <div id="map"></div>
          
        	<div id="optionsContainer">
        		<div id="DRIVING" class="option" onclick="optionClicked(this.id)"></div>
        		<div id="WALKING" class="option" onclick="optionClicked(this.id)"></div>
        		<div id="BICYCLING" class="option" onclick="optionClicked(this.id)"></div>
        		<div id="TRANSIT" class="option" onclick="optionClicked(this.id)"></div>
        	</div>
        </div>
        
        <div id="trips">
          <div id="tripTitle">Trips</div>
            
        </div>
      </div>
    </div>
      <div id = "email">
      <?= $email ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0vzljkSDp7Hk3CWIytTfZJEM8jS-UooU&libraries=places"></script>
    <script type="text/javascript" src="javascript/googleMapsCode.js"></script>
    <script type="text/javascript" src="javascript/login.js"></script>
  </body>
</html>
