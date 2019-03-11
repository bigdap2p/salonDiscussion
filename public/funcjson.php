       $filename = "test.json";
        $handle = fopen($filename, "r");
        $resultat = fread($handle, filesize($filename));
        $final = json_decode($resultat);
        foreach ($final as $value){
         echo    $value->{'login'} ;
         echo    " : ".$value->{'message'} ;
         echo "<br>";
        }
        fclose($handle);