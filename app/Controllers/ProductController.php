<?php
// xử lý, điều hướng các trang như: trang chủ, giới thiệu, liện hệ

class ProductController extends CoreController
{
    protected $product;

    public function __construct()
    {
        $this->product = $this->loadModel('product');
    }
    public function product_detail($id)
    {
        $data['OneProduct'] = $this->product->getOne_Product($id);
        $data['OneDtProduct'] = $this->product->getOne_dtProduct($id);

        $this->loadView('product_detail', $data);
    }
    public function addTooCart($id_Product, $size){
        // unset($_SESSION['cart']);
        // echo 'Mã sản phẩm: ' . $id_Product;
        // echo 'đây là ProductController'.$size.'<br>';

        if (isset($_SESSION['user'])) {
            $id_user = $_SESSION['user']['id_user'];
            $order = $this->loadModel("Order");
            $cart = $order->getCartByUser($id_user);
            // print_r($cart);
            if (!$cart) {
                // chưa có giỏ hàng
                $order->addCart($id_user);
                $cart = $order->getCartByUser($id_user);
            }

            $order->addProduct($cart['id_bill'], $id_Product, $size);
        } else {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                $timThay = false;
                $i = 0;
                foreach ($_SESSION['cart'] as $product) {
                    if ($product['id_product'] == $id_Product) {
                        $_SESSION['cart'][$i]['quantitySS']++;
                        $timThay = true;

                        break;
                    }
                    $i++;
                }
                if (!$timThay) { // chưa có trong giỏ 
                    array_push($_SESSION['cart'], [
                        "id_product" => $id_Product,
                        "quantitySS" => 1,
                        "sizeSS" => $size,
                    ]);
                }

        }
        header('location: ' . APPURL);
    }
    public function cart() {
        $order = $this->loadModel('Order');
        $user = $this->loadModel('User');
        $voucher = $this->loadModel('Voucher');

        if (isset($_SESSION['user'])) {
                // lấy cart trong database
                $cart = $order->getProductInCart($_SESSION['user']['id_user']);

                // load 1 user ra để điền vào form model
                $user = $user->loadOneUser($_SESSION['user']['id_user']);

                // lấy chi tiết sản phẩm theo size để tính giá 
                $loadSizeDTP = array_column( $cart, "id_Product"); // lấy id_product từ $cart
                $idDtp = implode(',', $loadSizeDTP);// tách mảng ra thành VD:1,2,3
                $AllSizeProduct = $order->loadAllSizeProduct($idDtp);// load được tất size theo id_product
    
                // làm voucher
                if(isset($cart[0]['id_voucher'])) {
                    $data['voucher'] = $voucher->getById( $cart[0]['id_voucher']);
                }

        } else {
            if(isset($_SESSION['cart']) && $_SESSION['cart'] !== []) {
                // lấy id_product từ $_SESSION['cart']
                // tách mảng lấy từ được thành VD:1,2,3
                // lấy sản phẩm theo id_product gán vào $cartProduct
                $idProducts = array_column($_SESSION['cart'], "id_product");
                $commaSeparatedIDs = implode(',', $idProducts);
                $cartProduct = $order->getProductSessionCart( $commaSeparatedIDs);

                $getSize = $order->getSizeProduct( $_SESSION['cart']);
                // print_r($getSize);
                // sử dụng array_map để gọp 2 mảng $cartProduct, $_SESSION['cart'] lai
                $cart = array_map(function($cartProduct, $SScart, $getSize) {
                    return array_merge($cartProduct, $SScart, $getSize) ;
                }, $cartProduct, $_SESSION['cart'], $getSize);
            }else{
                header('location: ' . APPURL);
            }
        }

        $data['cart'] = $cart;
        $data['user'] = $user;
        if(isset($_SESSION['user'])) {
            $data['allDetailProduct'] = $AllSizeProduct;
        }
        $this->loadView('product_cart', $data);
    }

    public function deteleCart($id_product, $id_dto = 0, $xacNhan) {
        if(isset($_SESSION['user']) &&  $id_dto > 0) {
            if($xacNhan == 'dongY') {
                $order = $this->loadModel("Order");
            
                $deleCart = $order->deteleProductInCart($id_product, $id_dto);
    
                header('location: ' . APPURL . '?url=Product/cart');
            }else{
                
                header('location: ' . APPURL . '?url=Product/cart');
            }
            

        }else{ 
            if (isset($_SESSION['cart'])) {
                // Sử dụng array_splice để xóa phần tử cụ thể từ giỏ hàng
                array_splice($_SESSION['cart'], $id_product, 1);
            }
            header('location: ' . APPURL . '?url=Product/cart');
        }
        
    }
    public function cartItem($id_dto=0, $id_product, $loai) {
        $order = $this->loadModel('Order');
        if(isset($_SESSION['user'])) {
            if($loai === 'more') {
                $order->increaseItem($id_dto, $id_product);
            }else{
                $order->decreaseItem($id_dto, $id_product);
            }
        }else{
            if(isset($_SESSION['cart']) && $_SESSION['cart'] !== []) { 
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['id_product'] == $id_product) {
                        if($loai === 'more') { 
                            $_SESSION['cart'][$key]['quantitySS'] += 1; 
                        }else{
                            $_SESSION['cart'][$key]['quantitySS'] -= 1; 
                        }
                        break;
                    }
                }
               
            }
        }
        
        header('location: ' . APPURL . '?url=Product/cart');    
    }

    public function updateSize() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order = $this->loadModel('Order');
            $order->updateSize($_POST['updateSize'], $_POST['MaSP'], $_POST['MaDH']);
        }
        header('location: ' . APPURL . '?url=Product/cart');    

    }
}
