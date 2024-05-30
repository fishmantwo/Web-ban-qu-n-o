<?php
class adminStatistiqueModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function __destruct()
    {
        unset($this->db);
    }
    public function StatistiqueByName($id, $nameDatabase) {
        if ($nameDatabase == 'orders') {
            return $this->db->pdo_query("SELECT COUNT(`$id`) AS soLuong$nameDatabase FROM $nameDatabase WHERE status= 'da-giao'");
        } else {

            return $this->db->pdo_query(
                "SELECT COUNT(`$id`) AS soLuong$nameDatabase FROM $nameDatabase"
            );
        }
    }
    public function loadAll($nameDatabase) {
        if ($nameDatabase == 'orders') { 
            return $this->db->pdo_query(
                "SELECT * FROM $nameDatabase WHERE status != 'gio-hang'"
            );
        }
        
    }
    public function loadProducts() {
        return $this->db->pdo_query(
            "SELECT 
             product.name_Pro AS nameProduct, 
            SUM(detailorder.quantity) AS qtysold
        FROM 
            product
        JOIN 
            detailorder ON product.id_product = detailorder.id_Product
        GROUP BY    
        nameProduct
        "
        );
    }

    
}
