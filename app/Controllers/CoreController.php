<?php
    class CoreController {
        protected $data;
        public function loadView($viewName, $data=[]) {
            // $data['cart']
            extract($data);
            // $cart$user = $this->loadModel('user');
            
            include_once '../app/Views/template_header.php';
            include_once '../app/Views/'.$viewName.'.php';
            include_once '../app/Views/template_footer.php';
        }
        public function loadViewAdmin($viewName, $data=[]) {
            extract($data);
            $user = $this->loadModel('user');
            $loadOneUser = $user->loadOneUser($_SESSION['user']['id_user']);
            $loadAllUser = $user->getAll();

            include_once '../app/Views/admin/admin_header.php';
            include_once '../app/Views/admin/body_header.php';
            include_once '../app/Views//admin/'.$viewName.'.php';
            include_once '../app/Views/admin/admin_footer.php';
        }   
        public function loadModel($modelName) {
            return new ($modelName."Model")();
        }
    }
?>