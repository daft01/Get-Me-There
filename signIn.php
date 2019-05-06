

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


  </head>
  <body>
    
    

    <h1>Sign In Page</h1>
  <label>Username: </label>  <input id="username" type="text"></input>
  <br />
  <br />

  <label>Password: </label>  <input id="pswd" type="text"></input>
  <br />
  <br />
<button id="normalS">Sign In</button>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<div class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="false"></div>
    <a href="#" onclick="signOut();">Sign out</a>



    <script>
    var email;
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
        $.post('/server/sign-in', {id_token: id_token})
        .then(function(user) {
            // The user is now signed in on the server too
            // and the user should now have a session cookie
            // for the whole site. 
            document.location.href = 'https://get-me-there.herokuapp.com'
        })
        
    $.ajax({
          type: "POST",
          url: "auth.php",
          data: { "email": profile.getEmail(),"firstname":fN, "lastname":lN, "pass" :profile.getId() },
          success: function(){},
          dataType: "json"
          
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
