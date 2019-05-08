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
    
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <style>
      
      #container{
        width: 1400px;
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
        margin-left: 1%;
          height: 1000px;
      }
      #tripTitle{
        width: 100%;
        text-align: center;
        font-size: 2.5em;
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
        height: 39px;
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
        .nav
        {
           justify-content:flex-end;
        }
        #blue
        {
           border-bottom:2px blue solid;
        }
        span
        {
          font-size: 0.6em;
        }
    </style>
  </head>
  <body>
    <div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" style="font-family: 'Source Serif Pro', serif; font-size:1.6em;" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="font-family: 'Source Serif Pro', serif; font-size:1.6em;" href="index.php" id="blue">Map</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  style="font-family: 'Source Serif Pro', serif; font-size:1.6em;"href="sittings.php" >Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  style="font-family: 'Source Serif Pro', serif; font-size:1.6em;"href="signIn.php">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-family: 'Source Serif Pro', serif; font-size:1.6em;"href="signUp.html">Sign Up</a>
          </li>
        </ul>
    </div>
    <br><br>
  
    <div id="container">
      <div>
        <div id="locations" class="form-row">
          <span for="origin">Origin: </span> 
          <div class="col-4">
            <input class="form-control mx-sm-0" id="origin" type="text" placeholder="Current Location">
          </div>
          <span for="destination">Destination: </span>
          <div class="col-4">
          <input class="form-control mx-sm-0" id="destination" type="text" placeholder="Search">
          </div>
          
          <button class="form-control" id="addTrip" onclick="addTripClicked()">Add to trips</button>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
