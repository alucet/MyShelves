<?php
namespace MyShelves;
/**
 * Classe Database héritée de PDO.
 * @todo Déporter la configuration DB dans un fichier.
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Database extends \PDO {
    
    private $_dbEngine = 'mysql';
    private $_dbServer = 'localhost';
    private $_dbUser = 'web';
    private $_dbPassword = 'coucou';
    private $_dbName = 'myshelves';
    
    public function __construct() {
        parent::__construct(
                $this->_dbEngine.':dbname='.$this->_dbName.";host=".$this->_dbServer, 
                $this->_dbUser, 
                $this->_dbPassword ); 
    }
    
}
