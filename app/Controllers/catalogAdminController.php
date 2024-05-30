<?php

    class catalogAdminController extends CoreController{
      
        public function addCatalog() {
            if($_SERVER['REQUEST_METHOD'] =='POST') { 
                $fileName = $_FILES['bannerCata']['name'];
                $target_dir = "../public/upload/";
                $target_file = $target_dir . basename($_FILES["bannerCata"]["name"]);
                if(move_uploaded_file($_FILES['bannerCata']['tmp_name'], $target_file)) {
                    // echo 'up ảnh thành công';
                }else{
                    // echo 'lỗi rùi';
                }

                $catalog = $this->loadModel('catalog');
                $catalog->addCatalog($_POST['nameCata'], $fileName);
               echo '<script>alert("bạn đã thêm loại hàng thành công");</script>';

           }
           $this->loadViewAdmin('Catalog_admin');

        }   
        public function listCatalog() {
            $catalog = $this->loadModel('catalog');
            $list = $catalog->getAll_BannerCatalog();
            $data['listCatalog'] = $list;
            $this->loadViewAdmin('listCata_admin', $data);

        }
        public function deteleCatalog($id, $xacNhan) {
            if( $xacNhan == 'dongY'){
                $catalog = $this->loadModel('catalog');
                $catalog->detaleCatalog($id);
            }else{
                $this->listCatalog();
            }
           

            $this->listCatalog();
        }
        public function updateCatalog($id) {
            $catalog = $this->loadModel('catalog');
            $listOneCatalog = $catalog->getOneCatalog ($id);

            $data['loadOneCatalog'] = $listOneCatalog;
            $this->loadViewAdmin('updateCatalog', $data);
        }     
        public function fixCatalog() {
            if($_SERVER['REQUEST_METHOD'] =='POST') { 
                if(isset($_POST['dongY'])){ 
                    $fileName = $_FILES['bannerCata']['name'];
                    $target_dir = "../public/upload/";
                    $target_file = $target_dir . basename($_FILES["bannerCata"]["name"]);
                    if(move_uploaded_file($_FILES['bannerCata']['tmp_name'], $target_file)) {
                        // echo 'up ảnh thành công';
                    }else{
                        // echo 'lỗi rùi';
                    }
                    $catalog = $this->loadModel('catalog');
                    $catalog->fixCatalog($_POST['nameCata'], $fileName, $_POST['id_catalog']);
                    echo '<script>alert("bạn đã Sửa loại hàng thành công");</script>';
                }else{
                    echo '<script>alert("bạn đã Sửa loại hàng Thất bại");</script>';
                }
             

            }
            $this->updateCatalog($_POST['id_catalog']);
        }
    } 
    
?>
