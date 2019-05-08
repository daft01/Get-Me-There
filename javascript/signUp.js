/* global $ */

$(document).ready(function()
{
$.ajax
  ({
    type:"GET",
    url: "https://vpic.nhtsa.dot.gov/api/vehicles/GetAllMakes?format=json",
    dataType:"json",
    data:
    {
    },
    success:function(data, status)
    {
        for(var i = 0; i < 100; i++)
        {
            $("#make").append('<option>' + data["Results"][i]["Make_Name"] + '</option>');
        }
        
    } ,
  complete: function(status, err){
     console.log(status);
  } 
  });
});

$("#make").change(function()
{
    $("#model").html("")
    var selected = $("#make").val()
    var model = selected.toLowerCase();
  $.ajax
  ({
    type:"GET",
    url: "https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMake/" + model + "?format=json",
    dataType:"json",
    data:
    {
    },
    success:function(data, status)
    {
        console.log(data);
        for(var i = 0; i < 100; i++)
        {
          $("#model").append('<option>' + data["Results"][i]["Model_Name"] + '</option>');
        }
            
        for(var i = 1; i < 30; i++)
        {
          $("#year").append('<option>' + (1990 + i) + '</option>');
        }
        
    } ,
  complete: function(status, err){
     console.log(status);
  } 
  });
});

$("#year").change(function()
{          
    $("#cityMpg").html("City MPG: ")
    $("#highwayMpg").html("Highway MPG: ")
    var selectedMake = $("#make").val()
    var selectedModel = $("#model").val();
    var selectedYear = $("#year").val();
    
    var model = selectedModel.toLowerCase();
    var make = selectedMake.toLowerCase();
    var key1 = "MLAC6TRTY2RAC09";
  $.ajax
({
    type:"GET",
    url: "https://specifications.vinaudit.com/v3/specifications?format=json&key=" + key1 + "&year=" + selectedYear + "&make=" + make + "&model=" + model + "",
    dataType:"json",
    data:
    {
    },
    success:function(data, status)
    {
        console.log(data);
        if(data['attributes']['highway_mileage'] != 'undefined')
        {
          $("#highwayMpg").html("Highway MPG: " + data['attributes']['highway_mileage']);
          $("#cityMpg").html("City MPG: " + data['attributes']['city_mileage']);
        }
        else
        {
          $("#highwayMpg").html("Highway MPG: Unavailable")
          $("#cityMpg").html("City MPG: Unavailable");
        }
        
    } ,
  });
});


$("#signupButton").on('click', function(e) {
    
    var pass = $("input[name='password']").val();
    var cpass = $("input[name='confirmation']").val();
    
    if(pass == ""){
        $("#message").html("Invalid Password");
        return;
    }
    if(cpass == ""){
        $("#message").html("Invalid Confirmation Password");
        return;
    }
    if(pass != cpass){
        $("#message").html("Password confirmation Does Not Match Password");
        return;
    }
    
    $.ajax({
        type: "POST",
        url: "api/signUp.php",
        dataType: "json",
        data: {
            "email": $("input[name='email']").val(),
            "password": $("input[name='password']").val(),
            "confirmation": $("input[name='confirmation']").val(),
            "first_name": $("input[name='first_name']").val(),
            "last_name": $("input[name='last_name']").val(),
            "phone_number": $("input[name='phone_number']").val(),
        },
        success: function(data, status) {
            console.log("inside function    ");
            console.log(data);
            if (data.isSignedUp) {
                 window.location = "map.php";
                $("#message").html("Account successful");
            }
            else {
                $("#message").html("Error: " + data.message);
                $("#message").removeClass("open-hidden");
            }
        },
        error: function() { 
            console.log(arguments);
        },
        complete: function(data, status) { //optional, used for debugging purposes
            console.log(status);
        }
    });
})



