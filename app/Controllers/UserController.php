<?php
    // xử lý, điều hướng các trang như: trang chủ, giới thiệu, liện hệ

    class UserController extends CoreController{
      protected $user;

        public function __construct() {
            $this->user = $this->loadModel('user');
        }
        // đăng nhâp
        public function userLogin() {
            if($_SERVER['REQUEST_METHOD'] =='POST') {
                $kq = $this->user->Login($_POST['email'], $_POST['password']);
                if($kq) { 
                    $_SESSION['user'] = $kq;
                    header('Location:  ' .APPURL . '?url=page/index');
                }else{ 
                    echo 'Email hoặc mật khẩu không đúng ';
                }
            }
            $this->loadView('user_Login');
        }
        // đăng kí
        public function userRegister() {
            if($_SERVER['REQUEST_METHOD'] =='POST') {
                $this->user->Resgiter(
                    $_POST['email'], 
                    $_POST['password'], 
                    $_POST['fullName'], 
                    $_POST['address'], 
                    $_POST['phone'], 
                );
                header('Location:  ' .APPURL . '?url=user/userLogin');
             
            }
            $this->loadView('user_register');
        }
        public function logout(){
            unset($_SESSION['user']); 
            header('location: ' .APPURL);
        }

        public function productFile($id_user) {
            $loadOneUser = $this->user->loadOneUser($id_user);
            $data['loadOneUser'] = $loadOneUser;
            $this->loadView('user_profile', $data);
        }
        public function updateProfile() {
            if($_SERVER['REQUEST_METHOD'] =='POST') { 
                $this->user->UpdateProFile($_POST['nameUser'], $_POST['addressUser'], $_POST['emailUser'], $_POST['id_user']);

            }
           $this->productFile($_POST['id_user']);
        }
        public function updateProfileImg() {
            if($_SERVER['REQUEST_METHOD'] =='POST') { 
                $fileName = $_FILES['imgUser']['name'];
                $target_dir = "../public/upload/";
                $target_file = $target_dir . basename($_FILES["imgUser"]["name"]);
                if(move_uploaded_file($_FILES['imgUser']['tmp_name'], $target_file)) {
                    // echo 'up ảnh thành công';
                }else{
                    // echo 'lỗi rùi';
                }


                $this->user->insertImgUser($fileName,$_POST['id_user']);
            }
            $this->productFile($_POST['id_user']);
        }
        
    }
    
?>