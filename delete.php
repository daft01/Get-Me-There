
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Get-Me-There Delete</title>
    </head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
          }
        h2{
            text-align: center;
            font-size: 2.5em;
        }
        .pageButton{
            width: 200px;
            height: 100px;
            font-size: 1.5em;
        }
        #container{
            width: 100%;
            text-align: center;
        }
        #deleteAccount{
            background-color: red;
        }
        #cancel{
            background-color: lime;
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
    </style>
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
    
        <br/><br/>
        
        <div id="container">
            <h1>You are about to delete your account.</h1>
            <h1>Do you want to continue?</h1>
            <button id="deleteAccount" onclick="deleteAccount()" class="pageButton">YES</button>
            <button id="cancel" onclick="cancel()" class="pageButton">NO</button>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>
            function cancel(){
                window.location = "map.php";
            }
            
            function deleteAccount(){
                
              $.ajax({
                    type:"POST",
                    url:"api/deleteAccount.php",
                    dataType: "text",
                    data: 
                    {
                    },
                    success: function(data)
                    {
                      console.log(data);
                      if(data){
                        window.location = "index.php";
                        console.log("Account deleted.");
                      }
                      else{
                        console.log("Account was not deleted.");
                      }
                    }
                });
                
                window.location = "index.php";
            }
        </script>
    </body>
</html>