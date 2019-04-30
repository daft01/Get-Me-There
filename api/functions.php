function validateSession(){
   if (!isset($_SESSION['adminFullName'])) {
       header("Location: adminLogin.php");  //redirects users who haven't logged in
       exit;
   }
}