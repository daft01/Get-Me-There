<?php
  session_start();
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Settings</title>
  
  <style>

  </style>
</head>

<body id="dummybodyid">

  <form>
    <fieldset>
      <label>Make: </label>
      <select id="make">
          
      </select>
      <br>
      <label>Model: </label>
      <select id="model">
        
          
      </select>
      
      <br>
      
      <label>Year: </label>
      <select id ="year">
        
      </select>
      <br>
      
      <div>
        <h4 id= "cityMpg">City MPG: </h1>
        <h4 id= "highwayMpg">Highway MPG: </h1>
      </div>
      
      <button type = button id = "button">submit</button>
      <div id="container"> </div>
        
    </fieldset>
  </form>
  
  <button type = button id="deleteButton"> Delete Account</button>
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>
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
                // console.log(data);
                
                // $.each(data["Results"][0], function(element)
                // {
                    for(var i = 0; i < 100; i++)
                    {
                        $("#make").append('<option>' + data["Results"][i]["Make_Name"] + '</option>');
                    }
                    
                // });
                
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
            
        $("#button").on("click", function()
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
        
        $("#deleteButton").on("click", function()
        {
          $.ajax(
            type:"POST",
            url:"api/deleteAccount.php",
            dataType: "json",
            data: {
              if(!isset($_SESSION["email"]))
                "email" : $_SESSION["email"];
              }
            
            )
        })
        
        
                  
                 
  </script>
</body>

</html>