<?php
/**
 * --- WorkSena - Micro Framework ---
 * Classe abstrata responsável por renderizar o layout
 * @license https://github.com/WalderlanSena/worksena/blob/master/LICENSE (MIT License)
 *
 * @copyright © 2013-2018 - @author Walderlan Sena <walderlan@worksena.xyz>
 *
 */

namespace MVS\WorksenaMvc;

abstract class AbstractActionController
{
    private $layout;
    private $action;

    protected function render($view, $layout = true, $data = [])
    {

    }

    private function content()
    {

    }
}