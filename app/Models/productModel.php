<?php
class productModel {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function __destruct() {
        unset($this->db);
    }
    public function getAll_product() {
        return $this->db->pdo_query(
            "SELECT product.*, img.img_main_pro
            FROM product
            JOIN productimg img ON product.id_img = img.id_img
            ORDER BY product.id_product DESC"
        );
    }
    public function getAll_detailProduct() {
        return $this->db->pdo_query(
            "SELECT * FROM detailproduct"
        );
    }
    public function getOne_Product($id) {
        return $this->db->pdo_query_one(
         "SELECT * FROM product JOIN productimg ON product.id_img = productimg.id_img WHERE product.id_product = ?", $id
        );
    }
    // chưa lấy cái giá và cái size 
    public function getOne_dtProduct($id) {
        return $this->db->pdo_query(
            "SELECT * FROM detailproduct WHERE id_product = ?", $id
        );
    }
    public function getById($id) { 
        return $this->db->pdo_query_one(
            'SELECT * FROM product WHERE id = ?', $id
        );
    }
    

}
   

?>