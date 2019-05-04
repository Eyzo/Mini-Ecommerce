<?php
namespace App\Core;

class Controller {

    public static function render($view,array $params = []) {

        extract($params);

        ob_start();
        require "../Views/{$view}";
        $content = ob_get_clean();

        require '../Views/layout.php';

    }

    // parent::getRepository(User)
    public static function getRepository($repoName) {

        $repoName= 'App\Models\Repository\\'.ucfirst($repoName).'Repository';

        return new $repoName();
    }

}
