<?php

/**
 *     yasmf - Yet Another Simple MVC Framework (For PHP)
 *     Copyright (C) 2019   Franck SILVESTRE
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU Affero General Public License as published
 *     by the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU Affero General Public License for more details.
 *
 *     You should have received a copy of the GNU Affero General Public License
 *     along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace yasmf;

use Exception;
use yasmf\controllers;

class router {
    public function route($dataSource)
    {
        try {
            /*
            if (!isset($_SESSION) || $_SESSION == null) {
                $controllerName = 'index';
            } else {
                $controllerName = httphelper::getParam('controller') ?: 'index';
            }*/
            $controllerName = httphelper::getParam('controller') ?: 'index';

            

            $controllerQualifiedName = "controllers\\" . $controllerName . "Controller";

            try {
                $controller = new $controllerQualifiedName();

                // set the action to trigger
                $action = httphelper::getParam('action') ?: 'index';
                // trigger the appropriate action and get the resulted view
                $view = $controller->$action($dataSource->getPdo());

                // render the view
                try {
                    $view->render();
                } catch (\Error $e) {
                    header("Location: /?controller=erreur&err=view");
                    var_dump($e);
                    exit();
                }
            } catch (\Error $e) {
                header("Location: /?controller=erreur&err=controller");
                var_dump($e);
                exit();
            }
        } catch (\Error $e) {
            header("Location: /?controller=erreur&err=router");
            var_dump($e);
            exit();
        }

    }

}
