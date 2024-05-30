<?php
class catalogModel {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function __destruct() {
        unset($this->db);
    }
    public function getAll_BannerCatalog() {
        return $this->db->pdo_query(
            "SELECT * FROM catalog"
        );
    }
    public function getOneCatalog ($id) {
        return $this->db->pdo_query_one(
            "SELECT * FROM catalog WHERE id_catalog = ?", $id
        );
    }
    public function getById($id) { 
        return $this->db->pdo_query_one(
            'SELECT * FROM product WHERE id = ?', $id
        );
    }
    public function addCatalog($nameCata, $bannerCata){
        return $this->db->pdo_execute(
            "INSERT INTO catalog (`name_catalog`, `banner_catalog`) VALUES (?, ?)", $nameCata, $bannerCata
        );
    }
    public function detaleCatalog($id) {
        return $this->db->pdo_execute(
            "DELETE FROM  catalog WHERE id_catalog  = ?", $id
        );
    }
    public function addOrder($id_bill, $total, $qty, $size, $name, $tel, $address) {
        // chốt đơn
       $this->db->pdo_execute(
            "UPDATE orders SET 	quantity_Product = ?, total=?, order_Date=?, name_user=?, phone_user=?, address=?, status='cho-xac-nhan' 
            WHERE id_bill=?", $qty, $total, date('Y-m-d H:i:s'), $name, $tel, $address, $id_bill
        );
        // chốt giá
        $this->db->pdo_execute(
            "UPDATE detailorder ct 
            SET price = (SELECT base_price FROM detailproduct dtp 
             WHERE dtp.id_product = ct.id_Product AND dtp.size =  '$size') * 
             
             (1 - ( (SELECT sale_price FROM detailproduct dtp 
             WHERE dtp.id_product = ct.id_Product AND dtp.size =  '$size')/ 100))
            WHERE id_dto =? " ,$id_bill
        );
    }
    public function fixCatalog($name, $banner, $id) {
        if($banner == "") {
            return  $this->db->pdo_execute(
                "UPDATE catalog SET name_catalog= ? WHERE id_catalog=?",$name, $id
            );
        }else{
            return  $this->db->pdo_execute(
                "UPDATE catalog SET name_catalog= ?, banner_catalog=? WHERE id_catalog=?", $name,$banner ,$id
            );
        }
    }

}
   

?>