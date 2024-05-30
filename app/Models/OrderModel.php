<?php
class OrderModel
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
    public function getAllOrder() {
        return $this->db->pdo_query(
            "SELECT * FROM orders WHERE status != 'gio-hang'"
        );
    }
    public function getCartByUser($id_user)
    {
        return $this->db->pdo_query_one(
            "SELECT * FROM orders WHERE id_user =? AND status = 'gio-hang'",
            $id_user
        );
    }
    
    public function addCart($id_user)
    {
        return $this->db->pdo_execute(
            "INSERT INTO orders(`id_user`) VALUES(?)",
            $id_user
        );
    }
    public function addProduct($id_bill, $id_product, $size)
    {
        $kq = $this->hasCart($id_bill, $id_product);
        // echo 'đay là OrderModel'.$size;
        if ($kq) {
            if ($kq['size'] == $size) {
                return $this->db->pdo_execute(
                    "UPDATE detailorder 
                        SET quantity = quantity + 1 WHERE id_dto = ? AND id_Product = ?",
                    $id_bill,
                    $id_product

                );
            }else{
                return $this->db->pdo_execute(
                    "UPDATE detailorder SET size = '$size' WHERE id_dto = ? AND id_Product = ?",$id_bill,
                    $id_product
                );
            }
        } else {
            return $this->db->pdo_execute(
                "INSERT INTO detailorder(`id_dto`, `id_Product`, `size`) VALUES(?,?,?)",
                $id_bill,
                $id_product,
                $size
            );
        }
    }

    public function hasCart($id_order, $id_product)
    {
        return $this->db->pdo_query_one(
            "SELECT * FROM detailorder WHERE id_dto = ? AND id_Product  =?",
            $id_order,
            $id_product
        );
    }
    public function getProductInCart($MaTK)
    {
        return $this->db->pdo_query(
            "SELECT ct.*, sp.name_Pro, sp.quantity_Pro, sp.id_product ,img.img_main_pro, o.id_voucher, dtp.base_price, dtp.sale_price FROM detailorder ct 
                JOIN product sp ON ct.id_Product=sp.id_product
                JOIN detailproduct dtp ON dtp.id_product=ct.id_product AND dtp.size = ct.size
                jOIN productimg img ON sp.id_img = img.id_img 
                JOIN orders o ON ct.id_dto = o.id_bill
                WHERE o.id_user = ? AND o.status ='gio-hang' 
                ",
            $MaTK
        );
    }
    public function getProductSessionCart($products) {
        return $this->db->pdo_query(
            "SELECT product.quantity_Pro, product.name_Pro,img.img_main_pro FROM product 
            JOIN productimg img ON product.id_img = img.id_img
            WHERE product.id_product IN ($products)"
        );
    }
    public function getSizeProduct($cart) {
        $dtp = [];
        foreach ($cart as $cartItem) {
            // Thực hiện truy vấn SQL để lấy thông tin kích thước
            $loadSize = $this->db->pdo_query_one("SELECT * FROM detailproduct WHERE id_product = {$cartItem['id_product']} AND size = '{$cartItem['sizeSS']}'");
    
            // Kiểm tra xem kết quả có dữ liệu hay không
            if (!empty($loadSize)) {
                // Lưu thông tin kích thước vào mảng $dtp
                $dtp[] = $loadSize;
            }
            // print_r($dtp);
            // return $dtp;
        }
    
        // Trả về mảng chứa thông tin kích thước
        return $dtp;
    }

    public function deteleProductInCart($id_product, $id_dto) {
        return $this->db->pdo_execute(
            "DELETE FROM detailorder WHERE id_product = ? AND id_dto = ?",
            $id_product,
            $id_dto
        );
    }
    public function deteleCartOrder($id_user)
    {
        return $this->db->pdo_execute(
            "DELETE FROM orders WHERE id_user = ?",
            $id_user
        );
    }
    public function increaseItem($id_dto, $id_product)
    {
        return $this->db->pdo_execute(
            "UPDATE detailorder SET quantity=quantity+1 WHERE id_dto=? AND id_Product=?",
            $id_dto,
            $id_product
        );
    }
    public function decreaseItem($id_dto, $id_product)
    {
        return $this->db->pdo_execute(
            "UPDATE detailorder SET quantity=quantity-1 WHERE id_dto=? AND id_Product=?",
            $id_dto,
            $id_product
        );
    }
    public function addVoucher($voucher, $id_order) {
        return $this->db->pdo_execute(
            "UPDATE orders SET 	id_voucher = ? WHERE id_bill =?", $voucher, $id_order
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
    public function loadAllSizeProduct($id_product) {
        if($id_product > 0){
            return $this->db->pdo_query(
                "SELECT * FROM detailproduct dtp WHERE dtp.id_product IN ($id_product)"
            );
        }
        
    }
    public function updateSize($size, $id_product, $id_dto) {
        return $this->db->pdo_execute(
            "UPDATE detailorder dto SET size =? WHERE dto.id_Product  =? AND dto.id_dto=?",$size, $id_product, $id_dto
        );
    }
    public function getOrderByUserId($id_user) {
        return $this->db->pdo_query( 
            "SELECT * FROM orders WHERE id_user =? AND status!='gio-hang'",$id_user
        );
    }
    public function updateStatus($staus, $id_user, $id_bill) {
        return $this->db->pdo_execute(
            "UPDATE orders SET status =? WHERE id_user =? AND id_bill =?", $staus, $id_user, $id_bill
        );
    }
    public function loadOneDetailOrder($id_bill) {
        return $this->db->pdo_query(
            "SELECT dto.*, p.name_Pro, img.img_main_pro	 FROM detailorder dto
            JOIN product p ON dto.id_Product = p.id_Product
            JOIN productimg img ON p.id_img = img.id_img
            WHERE dto.id_dto  = ?
            ", $id_bill
        );
    }
    public function loadStatus($id) {
        if($id > 0) {
            return $this->db->pdo_query_one(
                "SELECT orders.status, orders.id_bill FROM orders WHERE id_bill = ?",$id
            );

        }else{
            return $this->db->pdo_query("SELECT orders.status, orders.id_bill FROM orders WHERE status != 'gio-hang'");
        }
    }
    public function updateStatusAdmin($staus, $id) {
        return $this->db->pdo_execute(
            "UPDATE orders SET status =? WHERE id_bill = ?",$staus,$id
        );
    }
}
