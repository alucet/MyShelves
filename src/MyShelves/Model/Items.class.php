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
    
    /**
     * Retourne un tableau d'éléments.
     * @param array $filters Filtre la liste des éléments selon certains critères:
     *                          éléments d'un certain emplacement, d'un éditeur précis...
     *                          'controleur' => id
     *                          Ex: 'shelf' => 3 : affiche les éléments de l'étagère n°3.
     * @param string $sort
     * @return array Tableau d'objets Item chargés.
     */
    public function getList(array $filters, $sort = 'ASC') {
        
        for ($i = 0; $i == sizeof($filters)-1; $i++) {
            if ($i == 0)
                $filtersString .= " WHERE ";
            else
                $filtersString .= " AND ";
            $key = array_keys($filters)[$i];
            $filtersString .= 'id_' . $key . ' = ' . $filters[$key];
        }
        
        $req = $this->_db->query("
            SELECT id_item
            FROM item
            $filtersString
            ORDER BY title_item $sort", \PDO::FETCH_ASSOC);
        if ($req !== FALSE) {
            foreach ($req as $row) {
                $this->_items[] = new Item($row['id_item']);
            }
        }
        return $this->_items;
    }
    
}
