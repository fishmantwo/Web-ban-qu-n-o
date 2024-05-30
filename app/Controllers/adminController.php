<?php

    class AdminController extends CoreController{
      
        public function index() {
            $thongKe = $this->loadModel('adminStatistique');
            // truyền cái biến đầu tiên là id biến thứ 2 là tên bảng,
            $thongKeUser = $thongKe->StatistiqueByName('id_user', 'user'); // đếm user
            $thongKeCatalog = $thongKe->StatistiqueByName('id_catalog', 'catalog'); // đếm catalog
            $thongKeProduct = $thongKe->StatistiqueByName('id_product', 'product'); // đếm Product
            $thongKeOrders = $thongKe->StatistiqueByName('id_bill', 'orders'); // đếm Product

            $totalQtyThongKe = array_map(function($user, $cata, $pro, $orders){
                return $user + $cata + $pro + $orders;
            },$thongKeUser, $thongKeCatalog, $thongKeProduct, $thongKeOrders ); 
            $data['qtyThongKe'] = $totalQtyThongKe;


            // đơn hàng
            $loadListOrders = $thongKe->loadAll('orders');
            $data['listOrders'] = $loadListOrders;

            $this->loadViewAdmin('admin', $data);
            $this->loadViewAdmin('admin', $data);
        }
        public function catalog() {
            $this->loadViewAdmin('Catalog_admin');
        }
        public function thongKe() {
            $thongKe = $this->loadModel('adminStatistique');
            $thongKeProduct = $thongKe->loadProducts();
            $data['loadstatisticsProduct'] = $thongKeProduct;
            $this->loadViewAdmin('thongKe', $data);
        }   
        public function OrderList() { 
            $orderAdmin = $this->loadModel('Order');
            $loadAllOrderAmin = $orderAdmin->getAllOrder();
            $data['orderlist'] = $loadAllOrderAmin;

            $status = $orderAdmin->loadStatus(0);
            $data['status'] = $status;

            $this->loadViewAdmin('orderAdmin', $data);
            $this->loadViewAdmin('orderAdmin', $data);
        }   
       
    }
    
?>