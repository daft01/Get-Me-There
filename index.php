<!DOCTYPE html>
<html>
    <head>
        <title> </title>
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
    </body>
</html>