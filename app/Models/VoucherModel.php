<?php
class VoucherModel
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
    public function checkVoucher($id_voucher) {
        $voucher = $this->db->pdo_query_one( 
            "SELECT * FROM voucher  WHERE id_voucher = ?", $id_voucher
        );
        if(!$voucher) {
            return false;
        }
        if($voucher['quantity']<=0) {
            return false;
        }
        $now = new DateTime();
        if(!( new DateTime($voucher['start_Day']) <= $now && $now<= new DateTime($voucher['end_Day']))) {
            return false;
        }

        return true;
    }
    public function getById($id_voucher) {
        return $this->db->pdo_query_one(
            "SELECT * FROM voucher WHERE  id_voucher = ?",$id_voucher
        );
    }
}
