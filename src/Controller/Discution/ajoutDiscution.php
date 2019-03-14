<?php
/**
 * Created by PhpStorm.
 * User: Florian
 * Date: 07/03/2019
 * Time: 22:23
 */

namespace PHPInitiation\Controller\Discussion;


class ajoutDiscussion
{

        public
        function lectureJson ($jsonName)
        {
            $jsonName = "jsonDiscussion/$jsonName";
            $handle = fopen($jsonName, "r");
            $resultat = fread($handle, filesize($jsonName));
            $finalDiscussion = json_decode($resultat);
            fclose($handle);
            return $finalDiscussion;
        }

        public function ecrireJson ($nomDuFichier,$login,$message){
            $jsonName = "jsonDiscussion/$nomDuFichier";
        $fichier = fopen($jsonName, 'r+');
        $jesaispas = fread($fichier, filesize($jsonName));
   		$resultat = json_decode($jesaispas);
   		if ($resultat === null){$resultat = [];}
   		array_push($resultat, ["login"=>$login,"message"=>$message]);
   		$resultat2 = json_encode($resultat);
   		$fichier = fopen($jsonName, 'w+');
   		fwrite($fichier, $resultat2);
   		fclose($fichier);
	   }
        
}
