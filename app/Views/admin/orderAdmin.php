<?php

?>
<div class="container">
    <div class="row">
        <div class="bg-CCC p-2">
            <h1>Chi tiết đơn hàng</h1>
        </div>
        <div class="mt-3">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                    <?php foreach ($orderlist as $i => $o) : ?>
                        <tr>
                            <td>#<?= $o['id_bill'] ?></td>
                            <td><?= $o['order_Date'] ?></td>
                            <td><?= $o['quantity_Product'] ?></td>
                            <td><?= number_format($o['total'], 0, ",", ".") ?></td>
                            <td><?= $o['name_user'] ?></td>
                            <td><?= $o['address'] ?></td>
                            <td><?= $o['phone_user'] ?></td>
                           

                            <td>
                                <form action="<?= APPURL ?>?url=orderAdmin/updateStatusOrder" method="POST">
                                <input type="hidden" name="id_bill" value="<?= $o['id_bill'] ?>">

                                    <?php
                                    switch ($o['status']) {
                                        case 'cho-xac-nhan':
                                            echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus' . $i . '">
                                           <option value="' . $o['status'] . '">Chờ xác nhận</option>
                                           <option value="chuan-bi-hang">Chuẩn bị hàng</option>
                                           <option value="dang-giao">Đang giao</option>
                                           <option value="da-giao">Đã giao</option>
                                           <option value="huy-don">Hủy đơn</option>
                                        </select>
                                        ';
                                            break;
                                        case 'chuan-bi-hang':
                                            echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus' . $i . '">
                                            <option value="' . $o['status'] . '">Chuẩn bị hàng</option>
                                            <option value="dang-giao">Đang giao</option>
                                            <option value="da-giao">Đã giao</option>
                                            <option value="huy-don">Hủy đơn</option>
                                        </select>
                                        ';
                                            break;
                                        case 'dang-giao':
                                            echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus' . $i . '">
                                            <option value="' . $o['status'] . '">Đang giao</option>
                                            <option value="da-giao">Đã giao</option>
                                            <option value="huy-don">Hủy đơn</option>
                                        </select>
                                        ';
                                            break;
                                        case 'da-giao':
                                            echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus' . $i . '">
                                            <option value="' . $o['status'] . '">Đã giao</option>
                                        </select>
                                        ';
                                            break;
                                        case 'huy-don':
                                            echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus' . $i . '">
                                            <option value="' . $o['status'] . '">Hủy đơn</option>
                                            <option value="cho-xac-nhan">Chờ xác nhận</option>
                                            <option value="chuan-bi-hang">Chuẩn bị hàng</option>
                                            <option value="dang-giao">Đang giao</option>
                                            <option value="da-giao">Đã giao</option>
                                        </select>
                                        ';
                                            break;
                                    }
                                    ?>



                            </td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#myModal<?= $i ?>" class="btn btn-primary" >Thay đổi</button>

                                <div class="modal fade" id="myModal<?= $i ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <p class="modal-title">Đơn hàng hàng số <?= $o['id_bill'] ?></p>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div id="showStatus">
                                                    Bạn chưa chọn trạng thái thay đổi
                                                </div>

                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">

                                                <button type="submit" name="dongY" class="btn btn-warning" data-bs-dismiss="modal">Đồng ý</button>

                                                <button type="submit" name="KhongDongY" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            </form>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var statusPHP = <?php echo json_encode($orderlist); ?>;
    // console.log(statusPHP.status);
    var allSelects = document.querySelectorAll('select[id^="selectStatus"]');
    allSelects.forEach(function(selectElement) {
        function getIdOrder($id_bill) {
            var selectedValue = selectElement.value;
            console.log(selectedValue);
        }
    });

    
    




    // console.log(selcetStatus);
</script>

<?php
// echo '<pre>';
// print_r($sta);
// echo '</pre>';
// $myJSON = json_encode($status);

// echo $myJSON;
?>