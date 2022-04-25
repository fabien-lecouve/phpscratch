<?php

require_once('model/dao/AdminDao.php');
require_once('model/dao/AdminDao.php');
require_once('model/dao/EventTypeDao.php');

if (!isset($_GET['action'])) 
{
    $action = "login";
} 
else 
{
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action) {
    case "login":
        require('view/login.php');
        break;

    case "loginProcessing":
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $adminDao = new AdminDao($Pdo);
        $admin = $adminDao->findByEmail($email);

        if( $admin )
        {
            $_SESSION['post']['email'] = $email;
            if (password_verify($password, $admin->getPassword()))
            {
                unset($_SESSION['post']);

                $eventTypeDao = new EventTypeDao($Pdo);
                $allEventTypes = $eventTypeDao->findAll();
                require('view/register_event.php');
                break;
            }
            else
            {
                $_SESSION['message'] = "Mot de passe incorrect";
                header("location: ./?path=main&action=login");
                exit;
            }
        }
        else
        {
            $_SESSION['message'] = "Votre compte utilisateur n'existe pas, veuillez vous inscrire";
            header("location: ./?path=main&action=register");
            exit;
        }
        break;

    case "register":
        require('view/register.php');
        break;

    case "registrationProcessing":
        $firstname = trim(filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $lastname = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        
        $adminDao = new AdminDao($Pdo);
        $admin = $adminDao->findByEmail($email);
        
        if ($admin) 
        {
            $_SESSION['message'] = "Votre adresse mail est déjà enregistrée dans nos services";
            header("location: ./?path=main&action=login");
            exit;
        } 
        else 
        {
            $empty_field = false;

            foreach ($_POST as $key => $value) {
                $_SESSION['post'][$key] = $value;

                if (empty($value)) {
                    $_SESSION["error"][$key] = "Le champ " . $key . " est vide";
                    $empty_field = true;
                }
            }
            if ( $empty_field || filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
                if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
                    $_SESSION['error']['invalid'] = "Le mail est invalide";
                }
                header("location: ./?path=main&action=register");
                exit;
            }

            $user = array( $firstname, $lastname, $email, $hashpassword);
            $user_serialize = serialize($user);
            $user_encode = base64_encode($user_serialize);
            $url_validation = "http://localhost/scratch/?path=main&action=confirmationEmail&data=" . $user_encode;

            $subject = "Bonjour ".$firstname;
            $message = 'Pour activer votre compte <a href="'.$url_validation.'">cliquez ici</a>';
            $recipient = $email;
            sendMail($subject, $message, $recipient);
            header("location: ./?path=main&action=validation");
            exit;
        }
        break;

    case "confirmationEmail":
        if ( isset($_GET['data']) && !empty($_GET['data']) ) {
            unset($_SESSION['post']);

            $data = base64_decode( $_GET['data'] );
            $user = unserialize($data);
            $adminDao = new AdminDao($Pdo);
            $adminDao->add($user[0], $user[1], $user[2], $user[3], 1);

            $_SESSION['message'] = "Votre profil a bien été créé";
            header("location: ./?path=main&action=login");
            exit;
        } else {
            $_SESSION['error']['inscription'] = "Votre inscription a échoué";
            header("location: ./?path=main&action=register");
            exit;
        }
        break;

    case "validation":
        require('view/validation.php');
        break;
}
