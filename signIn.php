<?php
    require_once "config.php";



	$loginURL = $gClient->createAuthUrl();
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign In</title>
    <meta name="viewport" content="initial-scale=1.0">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

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
<button id="googleS" onclick="window.location = '<?php echo $loginURL ?>';">Sign In With Google</button>




    <script>
    </script>

  </body>
</html>
