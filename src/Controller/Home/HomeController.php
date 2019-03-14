<?php
/**
 * @author nicolas
 * @license : MIT
 */

namespace PHPInitiation\Controller\Home;

use PHPInitiation\Controller\Discussion\ajoutDiscussion;
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
		 if (!$this->session("id")) {
            header("location: login");
        	}

		    if(!$_SESSION["discussionChoix"]) {
                $finalDiscussion = array(["login" => "admin", "message" => "aucune discussion selectionné"]);
                $finalDiscussion = json_encode($finalDiscussion);
                $finalDiscussion = json_decode($finalDiscussion);
            }else{$discussion = new ajoutDiscussion();
                  $finalDiscussion = $discussion->lectureJson($_SESSION["discussionChoix"]);
            }

		if(filter_input(INPUT_POST, "discussionEnvoi")){
		$jsonName = filter_input(INPUT_POST, "discussionEnvoi").".json";
		$discussion = new ajoutDiscussion();
		$finalDiscussion = $discussion->lectureJson($jsonName);
		$_SESSION["discussionChoix"] = $jsonName;
		}
		
		if (filter_input(INPUT_POST, "messageEnvoi")) {
            $jsonName = $_SESSION["discussionChoix"];
			$login = $this->session("login");
			$message = filter_input(INPUT_POST, "message");
			$discussion = new ajoutDiscussion();
			$discussion->ecrireJson($jsonName,$login,$message);
			$discussion = new ajoutDiscussion();
			$finalDiscussion = $discussion->lectureJson($jsonName);
            header("location: home");
			}
		
        $key = "email";
        $value = filter_input(INPUT_POST, "email");
        $this->session($key,$value);

   //     try {
//            $repository = new UserLoginRepository();
//            $usersMessage = $repository->listMessage();
//            $updateTimeB = new UserLoginRepository();
//            $updateTimeB->updateTime($email = "n@n.fr");
//        } catch (\PDOException $e) {
//        }

			$tabTest = explode(",",$this->session("discussion"));
            foreach ($tabTest as $value){
                $nomDiscussion = new UserLoginRepository();
                $resultatDiscussion[$value] = $nomDiscussion->selectNomDiscussion($value);
            }

            $this->display("home/home.html.php", [
            "title" => "Users",
            "discussion" => $finalDiscussion,
            "nomDiscussion" => $resultatDiscussion
       		 ]);

    }



}



