<?php
namespace MyShelves;

/**
 * Configuration de MyShelves. Hérité de simpleXMLElement.
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Config extends \SimpleXMLElement {
    
    public function getDSN() {
        
        switch ($this->database->dbengine) {
            case "mysql":
            case "pgsql":
                return  $this->database->dbengine.":".
                        "host=".$this->database->host.
                        ";port=".$this->database->port.
                        ";dbname=".$this->database->dbname;
            case "oracle":
                return  "oci:dbname=".$this->database->dbname;
            case "sqlite":
            case "odbc":
                return  $this->database->dbengine.
                        ":dbname=".$this->database->dbname;
            case "sqlsrv":
                return "sqlsrv:Server=".$this->database->host.
                        ",".$this->database->port.
                        ";Database=".$this->database->dbname;
            default:
                return  $this->database->dbengine.":".
                        "host=".$this->database->host.
                        ";port=".$this->database->port.
                        ";dbname=".$this->database->dbname.
                        ";uid=".$this->database->dbuser.
                        ";pwd=".$this->database->passwd;
        }
        
    }
    
    public function getUsername() {
        return $this->database->dbuser;
    }
    
    public function getPasswd() {
        return $this->database->passwd;
    }
    
}
