<?php
/**
 * @author nicolas
 * @license : MIT
 */

namespace PHPInitiation\Controller\Home;

use PHPInitiation\Controller\Discution\ajoutDiscution;
use PHPInitiation\repository\UserLoginRepository;
use PHPInitiation\Controller\Controller;

class HomeController extends Controller
{
    public


          /**
         * @var string
         */
        $title;



    public function read()
    {
		$discutions = new ajoutDiscution();
		$finalDiscution = $discutions->lectureJson("1.json");
        
        $discution = new ajoutDiscution();
		$login1 = "julien";
		$message1 = "super bravo nico";
	 //	$finalDiscution = $discution->lireEcrire("a.json",$login1,$message1);
		





        $key = "email";
        $value = filter_input(INPUT_POST, "email");
        $this->session($key,$value);

        try {
            $repository = new UserLoginRepository();
            $usersMessage = $repository->listMessage();

            $updateTimeB = new UserLoginRepository();
            $updateTimeB->updateTime($email = "n@n.fr");
        } catch (\PDOException $e) {
        }

        $this->display("home/home.html.php", [
            "title" => "Users",
            "finalDiscution" => $finalDiscution
        ]);


    }



}



