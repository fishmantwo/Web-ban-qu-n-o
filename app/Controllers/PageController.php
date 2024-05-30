<?php
    // xử lý, điều hướng các trang như: trang chủ, giới thiệu, liện hệ

    class PageController extends CoreController{
      
        public function index() {
            $catalog = $this->loadModel('catalog');
            $product = $this->loadModel('product');
            $data['bannerCatalog'] = $catalog->getAll_BannerCatalog();
            // print_r($data['bannerCatalog']); 
            $data['dsSP'] = $product->getAll_product();
            //  print_r($data['dsSP'] ); 
            

            $this->loadView('page_home', $data);
        }
    
        public function about() { 
            echo 'đây là trang giối thiệu';
        }
    
        public function contact() { 
            echo 'trang liên hệ nè';
        }
    }
    
?>