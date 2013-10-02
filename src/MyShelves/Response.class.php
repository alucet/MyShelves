<?php
namespace MyShelves;

/**
 * Classe Response
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Response {
    
    private $_vars = array();
    private $_headers = array();
    
    public function addVar($key, $value) {
        $this->_vars[$key] = $value;
    }

    public function getVar($key) {
        return $this->_vars[$key];
    }

    public function getVars() {
        return $this->_vars;
    }

    public function redirect($url, $permanent = false) {
        $url = filter_var($url, FILTER_VALIDATE_URL);
        if ($permanent) {
            $this->_headers['Status'] = '301 Moved Permanently';
        } else {
            $this->_headers['Status'] = '302 Found';
        }
        $this->_headers['location'] = $url;
    }

    /**
     * Rendu de la vue.
     * @todo Gestion des headers
     */
    public function render($template, $varArray) {
        /*foreach ($this->_headers as $key => $value) {
            header($key. ':' . $value);
        }*/
        $twig = FrontController::getInstance()->getTwig();
        $tpl = $twig->loadTemplate($template);
        echo $tpl->render($varArray);
    }
    
}
