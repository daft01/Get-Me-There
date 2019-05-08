

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Settings</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="css/setting.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
  
  <style>
  </style>
</head>

<body id="dummybodyid">
  <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" style="font-family: 'Source Serif Pro', serif; font-size:1.6em;" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-family: 'Source Serif Pro', serif; font-size:1.6em;" href="index.php">Map</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active"  style="font-family: 'Source Serif Pro', serif; font-size:1.6em;"href="settings.php" id="blue">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  style="font-family: 'Source Serif Pro', serif; font-size:1.6em;"href="signIn.php">Sign In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-family: 'Source Serif Pro', serif; font-size:1.6em;"href="signUp.html">Sign Up</a>
      </li>
  </ul>
    <div id="container">
      <form>
        <fieldset>
          <label>Make: </label>
          <select id="make" class="selectpicker" data-live-search="true">
              
          </select>
          <br><br>
          <label>Model: </label>
          <select id="model" class="selectpicker" data-live-search="true" >
            
              
          </select>
          
          <br><br>
          
          <label>Year: </label>
          <select id ="year" class="selectpicker" data-live-search="true">
            
          </select>
          <br><br>
          
          <div>
            <h4 id= "cityMpg">City MPG: </h1>
            <h4 id= "highwayMpg">Highway MPG: </h1>
          </div>
          
          <button type = button id = "button" class="btn btn-outline-success">Add Car</button>
          <button type = button id="deleteButton" class="btn btn-outline-danger"> Delete Account</button>
          <div id="container"> </div>
            
        </fieldset>
      </form>
      
  </div>
  

  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
        /* global $ */
        var model;
        var make;
        var city;
        var highway;
        
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
                   $('.selectpicker').selectpicker('refresh');
                    
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
                $('.selectpicker').selectpicker('refresh');
                
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
            
            model = selectedModel.toLowerCase();
            make = selectedMake.toLowerCase();
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
                  highway = data['attributes']['highway_mileage'];
                  city = data['attributes']['city_mileage'];
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
          $.ajax
          ({
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
        });
        
        $("#button").on("click", function()
        {
          $.ajax
          ({
            type:"POST",
            url: "api/car.php",
            dataType:"json",
            data:
            {
               "highway": parseInt(highway.substr(0,2)),
               "city": parseInt(city.substr(0,2)),
               "make": make,
               "model": model,
               "year": $("#year").val(),
            },
            success:function(data, status)
            {
                
            } ,
            
          });
        });
        
  </script>
</body>

</html>