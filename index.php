<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
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
        background-color: purple;
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
        background-color: #ddd;
      }
      
      .dropdown:hover .dropdown-content {
        display: block;
      }
      .top{
        /*position:relative;*/
      }
      .slogan {
        color:#0000ff;
        font-size:5em;
        font-weight:bold;
      font-family: 'Playfair Display SC', serif;

       position: absolute;
      top: 58%;
      left: 57%;
      transform: translate(-50%, -50%);
}
      .container{
        display: flex;
  flex-direction: column;
      }
      /*.container > div {*/
        /*width: 100px;*/
        /*margin: 10px;*/
      /*  text-align: center;*/
      /*  line-height: 75px;*/
      /*  font-size: 30px;*/
      /*}*/
      .taxiImage{
          opacity: 0.6;

      }
      .weAre, .underM{
        width: 100%;
        height: 350px;
        background-color: #edb982;
      }
      .missTop, .miss{
        font-family: 'Nanum Gothic', sans-serif;

          padding-top: 50px;
            font-size: 30px;

          text-align: center;

      }
      .middleMiss{
        display: flex;
        flex-direction: row;
          flex-wrap: wrap;
          justify-content: center;
                  text-align: center;




      }
      .middleMiss > div {
        background-color: #f1f1f1;
        margin: 10px;
        padding: 150px;
        font-size: 30px;
        text-align: center;
                  justify-content: center;

      }
      .idea, .journey, .idea{
        text-align: center;
                          justify-content: center;


        
      }
        </style>
        
        <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Zeta Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">

<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
    

	<!--<div class ="bigContainer">-->
	<!--	<div class="main_slider_item_bg" style="background-image:url(images/taxis.jpg)"></div>-->
	<!--		<div class="main_slider_shapes"><img src="images/taxis.jpg" alt="" style="width: 100% !important;"></div>-->

	<!--</div>-->
	
	<div class="container">
	  
	  <div class="top">
	    <img class ="taxiImage" src="images/taxis.jpg"  style="width:100%;">
  
    <div class ="slogan" style="width:70%;">A better way for transportation</div>
	  </div>
	  
  <div class="underM">
    <div class="weAre" style="width:100%; height:100%">
      <div class="missTop">Our Mission: </div>
            <div class="miss">To bring an easier outlet to find forms of transportation. We know how annoying it may be to try and find the 
            the fastest or most efficient, therefore we provide a tool to facilitate the planning.</div>
            

      
      
      
    </div>
    
  </div>
  
  <div class="middleMiss">
    <div class="idea">
      	    <img class ="ideaImg" src="images/idea.png"  style="  width: 100px; heigh:50px; margin: 10px;">
      	                	    <br><br>

      	    Think It.

    </div>
    <div class="plan">
            	    <img class ="planImg" src="images/plan.png"  style=" width: 100px; margin: 10px;">
            	    <br><br>
            	    Plan It.

    </div>
    <div class="journey">
            	    <img class ="journeyImg" src="images/journey.png"  style=" width: 100px; margin: 10px;">
            	                	    <br><br>

            	    Travel.

    </div>
    
  </div>
    
    
</div>


  
			

				

    </body>
</html>