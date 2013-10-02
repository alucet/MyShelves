<?php
namespace MyShelves\Controller;
use MyShelves as MS;

/**
 * Controller
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Controller {
    
    const SORT_ASC      = 'ASC';
    const SORT_DESC     = 'DESC';
    
    protected $_request;
    protected $_response;
    
    protected function __construct() {
        $this->_request = MS\FrontController::getInstance()->getRequest();
        $this->_response = MS\FrontController::getInstance()->getResponse();
    }
    
}
