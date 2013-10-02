<?php
namespace MyShelves\Model;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Model {
    
    protected $_db;
    
    protected function __construct() {
        $this->_db = \MyShelves\FrontController::getInstance()->getDb();
    }
    
    public function getDb() {
        return $this->_db;
    }
    
}
