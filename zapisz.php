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
    
    <?php
       /* $servername = "localhost";
        $username = "id1536675_i9373";
        $password = "latawiec18";
        $basename = 'id1536675_basen';
        */
        $servername = "localhost";
        $username = "id1536675_i9373";
        $password = "latawiec18";
        $basename = 'id1536675_basen';

        // Create connection
        $conn = new mysqli($servername, $username, $password,$basename);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }         
            $content = file_get_contents("http://www.baseny-krosno.pl/",null,null,8650,30);
            //$find = strpos($content,"Aktualna liczba osób na basenie:");
            preg_match_all('!<p class=zajete>(\d{2})<\/p>!',$resp,$match);
            //print_r($match);
            
            $iloscwp = intval(($match[1][0]));
            echo 'Ilosc osob '.$iloscwp;
            /*
            $ilosctu = intval(($match[1][1]));
            //echo $find;
            $aktualna=substr ($content , 8656,2);
            //echo '<h1>Aktualna liczba osób na basenie>'.$aktualna.'</h1>';     
              
            $sql = "INSERT INTO wejscia (ilosc) VALUES ($aktualna)";

            if ($conn->query($sql) === TRUE) {
                echo "Dodano rekord: Liczba osób na basenie: $aktualna<br><br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
        
            */
        $conn->close();
    ?>

    
  <script></script>
</body>
</html>