<?php
class OrderController extends CoreController
{
    public function addVoucher() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order = $this->loadModel('Order');
            $voucher = $this->loadModel('Voucher');

            if ($voucher->checkVoucher($_POST['voucher'])) {
                // kiểm tra có mã giảm giá
                $order->addVoucher($_POST['voucher'], $_POST['MaDH']);
                header('location: ' . APPURL . '?url=Product/cart');
            } else {
                echo 'Mã giảm giá này không hợp lệ';
            }
        }
    }
    public function addOrder() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order = $this->loadModel('Order');
            $order->addOrder(
                $_POST['MaDH'], 
                $_POST['tongTien'], 
                $_POST['soLuong'], 
                $_POST['size'],
                $_POST['nameUser'],
                $_POST['telUser'],
                $_POST['addressUser'],
            );
            header('location: ' . APPURL);
        }
    }
    public function tracking() {
        $order = $this->loadModel('Order');
        $data['orderTracking'] = $order->getOrderByUserId($_SESSION['user']['id_user']);
        $this->loadView('order_tracking', $data);
    }
    public function updateOrder($staus, $id_bill) {
        $order = $this->loadModel('Order');
        $order->updateStatus($staus, $_SESSION['user']['id_user'], $id_bill);
       
        $this->tracking();
    }
    public function detailOrder($id_bill) {
        $order = $this->loadModel('Order');
        $data['loadDto'] = $order->loadOneDetailOrder($id_bill);
        
        $this->loadView('detailOrder_tracking', $data);
    }

}
