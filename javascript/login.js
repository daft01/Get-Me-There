// JavaScript File



if(document.getElementById(email) ==""){
    document.getElementById(email).innerHTML = "Sign up";
}
else{
    document.getElementById(email).innerHTML = "<div class='dropdown'><button class='dropbtn'>Account<i class='fa fa-caret-down'></i></button><div class='dropdown-content'><a href='settings.php'>Settings</a><a href='index.php'>Sign Out</a><a href='delete.php'>Delete Account</a></div></div>";
} 
console.log( document.getElementById(email).innerHTML + "lol");