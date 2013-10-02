<?php
namespace MyShelves\Model;

/**
 * Table des étagères.
 *
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Shelves extends Model {
    
    private $_shelves = array();
    protected $_db;
    const SORT_NAME = 1;
    const SORT_ITEM_COUNT = 2;
    
    public function __construct() {
        parent::__construct();
        $this->_db = parent::getDb();
    }
    
    public function getList($sort = 'ASC') {
        $req = $this->_db->query("
            SELECT id_shelf
            FROM shelf
            ORDER BY name_shelf $sort", \PDO::FETCH_ASSOC);
        if ($req !== FALSE) {
            foreach ($req as $row) {
                $this->_shelves[] = new Shelf($row['id_shelf']);
            }
        }
        return $this->_shelves;
    }
    
}
