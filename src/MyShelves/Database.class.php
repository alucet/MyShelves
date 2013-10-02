<?php
namespace MyShelves;
/**
 * Classe Database héritée de PDO.
 * @todo Déporter la configuration DB dans un fichier.
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Database extends \PDO {
    
    public function __construct() {
        $conf = FrontController::getConfig();
        parent::__construct($conf->getDSN(), $conf->getUsername(), $conf->getPasswd());
    }
    
}
