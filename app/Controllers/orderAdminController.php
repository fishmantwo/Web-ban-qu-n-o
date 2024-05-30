<?php
class orderAdminController extends CoreController
{
    public function detailOrderAdmin($id)
    {
        $orderAdmin = $this->loadModel('Order');
        $detailOrder = $orderAdmin->loadOneDetailOrder($id);
        $data['loadOneDTO'] = $detailOrder;

        $status = $orderAdmin->loadStatus($id);
        $data['status'] = $status;

        $this->loadViewAdmin('orderDetailAdmin', $data);
        $this->loadViewAdmin('orderDetailAdmin', $data);
    }
    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['dongY'])) {
                $orderAdmin = $this->loadModel('Order');

                $orderAdmin->updateStatusAdmin($_POST['nameStatus'], $_POST['id_bill']);
                $this->detailOrderAdmin($_POST['id_bill']);
            } else {
                $this->detailOrderAdmin($_POST['id_bill']);
            }

        }
    }
    public function updateStatusOrder() {
        $orderAdminLoad = new AdminController();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['dongY'])) {
                $orderAdmin = $this->loadModel('Order');

                // echo $_POST['nameStatus'];  
                // echo $_POST['id_bill'];  
                $orderAdmin->updateStatusAdmin($_POST['nameStatus'], $_POST['id_bill']);
                $orderAdminLoad->OrderList();
            } else {
                $$orderAdminLoad->OrderList();
            }


        }
    }
}
