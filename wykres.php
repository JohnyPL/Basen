<!DOCTYPE html>
<html>
<head>
    <title>ChartJS - Line</title>
    <style>
        .chart-container {
            width: 800px;
            height: 600px;
            margin: 100px auto;
        }
    </style>
    
</head>
<body>

	<div class="chart-container">
		<canvas id="line-chartcanvas"></canvas>
	</div>

	<!-- javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

    <script>
        $(document).ready(function() {

/**
 * call the data.php file to fetch the result from db table.
 */
$.ajax({
    url : "http://baseny.epizy.com/data.php",
    type : "GET",
    success : function(data){
      //console.log(data);

       var score = {
				TeamA : [],
				TeamB : []
			};

			var len = data.length;

			for (var i = 0; i < len; i++) 
            {
				score.TeamA.push(data[i].Godz);
				score.TeamB.push(data[i].srednia);
			}
             //get canvas
            var ctx = $("#line-chartcanvas");

                var data = {
                    labels : score.TeamA,
                    datasets : [
                        {
                            label : "Liczba osób na basenie",
                            data : score.TeamB,
                            backgroundColor : "blue",
                            borderColor : "lightblue",
                            fill : false,
                            lineTension : 0.3,
                            pointRadius : 5
                        }
                    ]
                };

                var options = {
                    title : {
                        display : true,
                        position : "top",
                        text : "Średnia wejść na basen Wojska Polskiego",
                        fontSize : 18,
                        fontColor : "#111"
                    },
                    legend : {
                        display : true,
                        position : "bottom"
                    }
                };

                var chart = new Chart( ctx, {
                    type : "line",
                    data : data,
                    options : options
                } );

		},
    error : function(data) {
        console.log(data);
    }
});

});
    
    </script>
    
</body>
</html>