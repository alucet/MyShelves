<?php
namespace MyShelves\Model;

/**
 * @todo Gérer les tris
 * @author Aurélie Lucet <aurelie.lucet at gmail.com>
 */
class Items extends Model {
    
    private $_items = array();
    protected $_db;
    
    public function __construct() {
        parent::__construct();
        $this->_db = parent::getDb();
    }
    
    public function getList($idShelf, $sort = 'ASC') {
        $req = $this->_db->query("
            SELECT id_item
            FROM item
            ".($idShelf?"WHERE id_shelf = $idShelf":'')."
            ORDER BY title_item $sort", \PDO::FETCH_ASSOC);
        if ($req !== FALSE) {
            foreach ($req as $row) {
                $this->_items[] = new Item($row['id_item']);
            }
        }
        return $this->_items;
    }
    
}
