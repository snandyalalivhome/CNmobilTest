<?PHP
//include_once("../Controller/loginController.php"); 
//include_once("../Controller/landingpageController.php"); 
 

//planning to send page request to route the appropriate controller
//need to research for better routing methods  (if any)



        session_start(); 


if(isset($_REQUEST['action']))
 {
    $action= $_REQUEST['action']; 
   
   
    switch ($action)
    {
        case 'Login':

//            $filename = '../Controller/loginController.php';
//
//            if (file_exists($filename)) {
//                echo "The file $filename exists";
//            } else {
//                echo "The file $filename does not exist";
//            }
            include_once("../Controller/loginController.php"); 
           
            $controller = new loginController();  
            $controller->validate(); 
            break;
        case 'forgotPswd':
            include_once("../Controller/loginController.php"); 
            $controller = new loginController(); 
            $controller->forgotPassword(); 
            break;
        case 'Logout':
            include_once("../Controller/loginController.php"); 
            $controller = new loginController(); 
            $controller->logout(); 
            break;
        case 'CompleteProfile':
            include_once("../Controller/profileController.php"); 
            $controller = new profileController(); 
            $controller->editProfile(); 
            break;
        case 'Landing':
            include_once("../Controller/loginController.php"); 
            $controller = new loginController(); 
            $controller->prepareLandingPage(); 
            break;
        case 'AgreeTc':
            include_once("../Controller/loginController.php"); 
            $controller = new loginController(); 
            $controller->updateConfirm(); 
              break;
        case 'VideoCall':
            include_once("../Controller/landingpageController.php"); 
            $controller = new landingpageController(); 
            $controller->zoomCall(); 
            break;
        case 'Calendar':
             include_once("../Controller/eventController.php");
             $controller = new eventController(); 
             $controller->GetEventTypes();
             break;
        case 'AddEvent':
             include_once("../Controller/eventController.php");
             $controller = new eventController(); 
             $controller->AddEvent();
             break;
         case 'DeleteEvent':
             include_once("../Controller/eventController.php");
             $controller = new eventController(); 
             $controller->DeleteEvent();
             break;
         
        case 'SecurityQuestions':
             include_once("../Controller/SecurityQuestionsController.php"); 
             $controller = new SecurityQuestionsController(); 
             $controller->select();
             break;     
         
        case 'SaveSecurityQuestions':
             include_once("../Controller/SecurityQuestionsController.php"); 
             $controller = new SecurityQuestionsController(); 
             $controller->save();
             break; 

        case 'SendMessage':
             include_once("../Controller/messageController.php"); 
             $controller = new messageController(); 
             $controller->sendMessage();
             break;
         
        default :
            include_once("../Controller/loginController.php"); 
            $controller = new loginController();  
            $controller->validate(); 
            break;
            
    }
} 
else
{
     include_once("../Controller/loginController.php"); 
            $controller = new loginController(); 
            $controller->prepareLandingPage(); 
//            include_once("../Controller/loginController.php"); 
//            $controller = new loginController();  
//            $controller->validate(); 
           
}

?>

