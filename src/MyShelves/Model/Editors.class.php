<?php
namespace MyShelves\Model;

/**
 * Table des éditeurs.
 * @todo Gérer les tris
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Editors extends Model {
    
    private $_editors = array();
    protected $_db;
    
    public function __construct() {
        parent::__construct();
        $this->_db = parent::getDb();
    }
    
    public function getList($sort = 'ASC') {
        $req = $this->_db->query("
            SELECT id_editor
            FROM editor
            ORDER BY name_editor $sort", \PDO::FETCH_ASSOC);
        if ($req !== FALSE) {
            foreach ($req as $row) {
                $this->_editors[] = new Editor($row['id_editor']);
            }
        }
        return $this->_editors;
    }
    
}
