<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Baseny Krosno</title>
  <meta name="description" content="Baseny Krosno">
  <meta name="author" content="JohnyPL">

 <style>
     table {
    border-collapse: collapse;
    text-align: center;
    }

    table, th, td {
        border: 1px solid black;
    }
  </style>
</head>
<body>
    <a href="wykres.php" target="_blank">wykres</a>
    <?php
        /* $servername = "localhost";
        $username = "id1536675_i9373";
        $password = "latawiec18";
        $basename = 'id1536675_basen';
        */
        date_default_timezone_set("Europe/Warsaw");
        $servername = "sql213.epizy.com";
        $username = "epiz_21434405";
        $password = "latawiec18";
        $basename = 'epiz_21434405_baseny';
       
        
        // Create connection
        $conn = new mysqli($servername, $username, $password,$basename);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }         
        
        $sql = "SELECT * from wejscia order by id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) 
        {
            echo "<table border=1>";
            echo "<th>ID</th><th>Ilość wejść</th><th>Data</th><th>Godzina</th>";
                while($row = $result->fetch_array()) 
                {
                    echo "<tr>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "</tr>";
                }
            echo "</table>";
        } 
        else 
        {
            echo "0 results";
        }
            
        
        
        $conn->close();
    ?>

    
  <script></script>
</body>
</html>