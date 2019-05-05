<?php
namespace App\Controller;

use App\Core\Controller;
use Plasticbrain\FlashMessages\FlashMessages;

class SecurityController extends Controller {

    public static function login() {

        $msg = new FlashMessages();

        if (isset($_POST['submit-form'])) {
            $repo = parent::getRepository('User');
            $user = $repo->findUniqueName($_POST['username']);
            $password = password_verify($_POST['password'],$user->getPassword());

            if ($user) {

                if ($password) {

                    $user = serialize($user);
                    $_SESSION['user'] = $user;

                    $msg->success("vous êtes bien authentifier");
                    header('Location: /');
                }

            } else {

                $msg->error("username ou mot de passe invalide");

            }
        }

        parent::render('security/login.php', [
            'msg' => $msg
        ]);
    }

    public static function logout() {
        unset($_SESSION['user']);
        header('Location: /');
    }

    public static function register() {

        if (isset($_POST['submit-form'])) {

            $repo = parent::getRepository('User');
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $repo->InsertUser($_POST['username'],$password);

            $repo = parent::getRepository('User');
            $user = $repo->findUniqueName($_POST['username']);

            if ($user) {
                $user = serialize($user);
                $_SESSION['user'] = $user;
            }

            header('Location: /');
        }

        parent::render('security/register.php',[

        ]);

    }

}
