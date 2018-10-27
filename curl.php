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
    date_default_timezone_set("Europe/Warsaw");


    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://baseny-krosno.pl',
        CURLOPT_USERAGENT => 'My user agent string!',
        CURLOPT_RETURNTRANSFER => 1
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);

 
  preg_match_all('!<p class=zajete>(\d{1,})<\/p>!',$resp,$match);
  //print_r($match[0][1]);

  $iloscwp = intval(($match[1][0]));
   
    curl_close($curl);
    
    if(is_numeric($iloscwp) and $iloscwp>0)
    {
        $servername = "sql213.epizy.com";
        $username = "epiz_21434405";
        $password = "latawiec18";
        $basename = 'epiz_21434405_baseny';
        $data = date("Y-m-d");
        $godzina = date('H:i:s');
        
        echo  $godzina;
               
        // Create connection
        $conn = new mysqli($servername, $username, $password,$basename);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }    
        $sql = "INSERT INTO wejscia (ilosc,Data,Godzina) VALUES ($iloscwp,'$data','$godzina')";

            if ($conn->query($sql) === TRUE) {
                echo "Dodano rekord: Liczba osób na basenie: $iloscwp - $data : $godzina<br><br>";
            } else {
                echo "Blad: " . $sql . "<br>" . $conn->error;
            }
    }
    else {
        echo "Nie ma nikogo na basenie ;)";
    }
    
    

?>
 <script></script>
</body>
</html>