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
    private $action;
    protected $pageTitle;
    protected $pageDescription;

    protected function render($view, $layout = true, $data)
    {
        extract($data);

        $this->action = $view;

        if ($layout == true && file_exists(__DIR__ . '/../../../../templates/ws-default/layout.php')) {
            return include_once __DIR__ . '/../../../../templates/ws-default/layout.php';
        }

        return $this->content($data);
    }

    private function content($data)
    {
        extract($data);
        $current = get_class($this);
        $moduleName = explode('\\', $current);
        $actionLocation = str_replace('.', '/', $this->action);
        return include_once __DIR__ . '/../../../../module/'.$moduleName[0].'/view/'.strtolower($actionLocation).'.phtml';
    }

    /**
     * Configurando titulo dinâmico para as views
     * @param $pageTitle
     */
    protected function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Adiciona separador no titulo da página
     * @param null $separator
     * @return null|string
     */
    protected function getPageTitle($separator = null)
    {
        if ($separator) {
            return $this->pageTitle . " " . $separator . " ";
        }
        return $this->pageTitle;
    }//end function getPageTitle

    /**
     * @param $description
     */
    protected function setDescription($description)
    {
        $this->pageDescription = $description;
    }

    /**
     * @return null
     */
    protected function getDescription()
    {
        return $this->pageDescription;

    }
}