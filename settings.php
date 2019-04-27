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
      <label>Year: </label>
      <select id ="year">
        
      </select>
      
      <button type = button id = "button">submit</button>
      <div id="container"> </div>
        
    </fieldset>
  </form>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>

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
                    
                for(var i = 1; i < 21; i++)
                {
                  $("#year").append('<option>' + (1990 + i) + '</option>');
                }
                
            } ,
          complete: function(status, err){
             console.log(status);
          } 
          });
        });
            
        
        
        
                  
                 
  </script>
</body>

</html>
