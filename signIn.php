
<!--Lv62Qu98hIIPzgrRAqg4EG6P--> 
<!--new secret-->
<?php
// Start the session
session_start();
?>




</body>
</html>
<html>
  <head>
    <title>Sign In</title>
    <meta name="viewport" content="initial-scale=1.0">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="155697290910-40pgod6lgqt3jpo5o339t5bj4rk3vqea.apps.googleusercontent.com">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>



    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/signin.css">

  </head>
  <body>
    
    

<!--    <h1>Sign In Page</h1>-->
<!--  <label>Email: </label>  <input id="username" type="text"></input>-->
<!--  <br />-->
<!--  <br />-->

<!--  <label>Password: </label>  <input id="pswd" type="password"></input>-->
<!--  <br />-->
<!--  <br />-->
<!--  <div id="result"></div>-->
<!--<button id="normalS" onclick= "normalSignin()">Sign In</button>-->
<!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
<!--<div class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="false"></div>-->
<!--    <a href="#" onclick="signOut();">Sign out</a>-->


    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">  

            <h1>Sign In Page</h1>
          <form class="form-signin">
            <div class="form-label-group">
              <label>Email: </label><input id="username" type="text" class="form-control"></input>
            </div>
            <div class="form-label-group">
              <label>Password: </label><input id="pswd" type="password" class="form-control"></input>
            </div>
              <div id="result"></div>
              <button id="normalS" onclick= "normalSignin()" class="btn btn-lg btn-primary btn-block text-uppercase">Sign In</button>
              <div id="google"class="g-signin2" data-onsuccess="onSignIn" ></div>
              <div class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="false"></div>
              <a href="#" onclick="signOut();">Sign out</a>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>


  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    var email;
    
    function normalSignin() {
      var email= $("#username").val();
      var pass= $("#pswd").val();
      
       $.ajax({
          type: "POST",
          url: "authNormal.php",
          data: { "email": email,"password":pass },
          dataType: "json",
          
     success: function(data, status) {
            if(data.successfulLogin){
                window.location = "index.php";
            }
            if(data.wrongPass){
              $("#result").html("Wrong Password");
            }
            if(data.noEmail){
              $("#result").html("No account found with associated email");
            }
            // if (data.isSignedUp) {
            //     window.location = "../Get-Me-There/index.php";
            //     $("#message").html("Account successful");
            // }
            // else {
            //     $("#message").html("Error: " + data.message);
            //     $("#message").removeClass("open-hidden");
            // }
            // console.log(data.isSignedUp);
            // console.log("helllooooo");
            // return alert("it doesnt work");
        }
      
    });
    }
    function onSignIn(googleUser) {
      
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    var email= profile.getEmail();
    
    var array= profile.getName().split(" ");
    var fN= array[0];
    var lN= array[1];
    
    console.log(fN);
    console.log(lN);
    var id_token = googleUser.getAuthResponse().id_token;
        // $.post('/server/sign-in', {id_token: id_token})
        // .then(function(user) {
        //     // The user is now signed in on the server too
        //     // and the user should now have a session cookie
        //     // for the whole site. 
        //     document.location.href = 'https://get-me-there.herokuapp.com'
        // })
        
    $.ajax({
          type: "POST",
          url: "auth.php",
          data: { "email": profile.getEmail(),"firstname":fN, "lastname":lN, "pass" :profile.getId() },
          success: function(){},
          dataType: "json",
           success: function(data, status) {
            if(data.successfulLogin){
                window.location = "index.php";
            }
           
            // if (data.isSignedUp) {
            //     window.location = "../Get-Me-There/index.php";
            //     $("#message").html("Account successful");
            // }
            // else {
            //     $("#message").html("Error: " + data.message);
            //     $("#message").removeClass("open-hidden");
            // }
            // console.log(data.isSignedUp);
            // console.log("helllooooo");
            // return alert("it doesnt work");
        }
      
          
    });
        
  }
 
    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        console.log('User signed out.');
      });
    }
    
    </script>

  </body>
</html>