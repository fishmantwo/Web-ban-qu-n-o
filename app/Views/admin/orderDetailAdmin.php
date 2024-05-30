<div class="container">
    <div class="row">
        <div class="bg-CCC p-2">
            <h1>Quản lý đơn hàng</h1>
        </div>
        <div class="mt-3">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>  
                        <th scope="col">Giá</th>  
                        <th scope="col">Size</th>  
                        <th scope="col">Trạng thái</th>  
                        <th scope="col">Thao tác</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php $i =0?>
                    <?php foreach($loadOneDTO as $dto):?>
                    <tr>
                        <td>#<?=$dto['id_dto']?></td>
                        <td><?=$dto['name_Pro']?></td>
                        <td><?=$dto['quantity']?></td>
                        <td><?= number_format($dto['price'], 0, ",", ".")?></td>
                        <td><?=$dto['size']?></td>

                      
                        <td>
                        <form action="<?=APPURL?>?url=orderAdmin/updateStatus" method="post">

                            <?php
                                switch ($status['status']) {
                                    case 'cho-xac-nhan':
                                        echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus'.$i.'">
                                            <option value="'.$status['status'].'">Chờ xác nhận</option>
                                            <option value="chuan-bi-hang">Chuẩn bị hàng</option>
                                            <option value="dang-giao">Đang giao</option>
                                            <option value="da-giao">Đã giao</option>
                                            <option value="huy-don">Hủy đơn</option>
                                        </select>
                                        ';
                                        break;
                                    case 'chuan-bi-hang':
                                        echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus'.$i.'">
                                            <option value="'.$status['status'].'">chuẩn bị hàng</option>
                                            <option value="dang-giao">Đang giao</option>
                                            <option value="da-giao">Đã giao</option>
                                            <option value="huy-don">Hủy đơn</option>
                                        </select>
                                        ';
                                        break;
                                    case 'dang-giao':
                                        echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus'.$i.'">
                                            <option value="'.$status['status'].'">Đang gia</option>
                                            <option value="da-giao">Đã giao</option>
                                            <option value="huy-don">Hủy đơn</option>
                                        </select>
                                        ';
                                        break;
                                    case 'da-giao':
                                        echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus'.$i.'">
                                            <option value="'.$status['status'].'">Đã giao</option>
                                        </select>
                                        ';
                                        break;
                                    case 'huy-don':
                                        echo '
                                        <select class="form-select form-select-sm " name="nameStatus" id="selectStatus'.$i.'">
                                            <option value="'.$status['status'].'">Hủy đơn</option>
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
                            <input type="hidden" name="id_bill" value="<?=$status['id_bill']?>">
                            <button type="button"data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary">Thay đổi</button>

                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <p class="modal-title">Đơn hàng hàng số <?=$dto['id_dto']?></p>
                                        
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body" >
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
                    <?php $i++?>
                   <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var statusPHP = <?php echo json_encode($status);?>;
    console.log(); 
    var geStatus = statusPHP.status;
    var nameStatus = "";
    switch (geStatus) {
        case 'cho-xac-nhan':
            nameStatus += 'Chờ xác nhận';
            break;
        case 'chuan-bi-hang':
            nameStatus += 'Chuẩn bị hàng';
            break;
        case 'dang-giao':
            nameStatus += 'Đang giao';
            break;
        case 'da-giao':
            nameStatus += 'Đã giao';
            
            break;
        case 'huy-don':
            nameStatus += 'Hủy đơn';
            break;
    }
    var allSelects = document.querySelectorAll('select[id^="selectStatus"]');
    var getShowStatus = document.getElementById('showStatus');
    
    // Thêm sự kiện cho từng phần tử select
    allSelects.forEach(function(selectElement) {
        selectElement.addEventListener('change', function () {
            var selectedValue = selectElement.value;
            // console.log(selectedValue);
            switch (selectedValue) {
                case 'cho-xac-nhan':
                    getShowStatus.innerHTML = '<p>'+ 'Bạn muốn thay đổi từ ' + ' <span class="text-warning">' + nameStatus + '</span> ' + ' Sang <span class="text-primary">Chờ xác nhận</span>' +'</p>'
                    break;
                case 'chuan-bi-hang':
                    getShowStatus.innerHTML = '<p>'+ 'Bạn muốn thay đổi từ ' + ' <span class="text-warning">' + nameStatus + '</span> ' + ' Sang <span class="text-primary">Chuẩn bị hàng</span>' +'</p>'

                    break;
                case 'dang-giao':
                    getShowStatus.innerHTML = '<p>'+ 'Bạn muốn thay đổi từ ' + ' <span class="text-warning">' + nameStatus + '</span> ' + ' Sang <span class="text-primary">Đang giao</span>' +'</p>'

                    break;
                case 'da-giao':
                    getShowStatus.innerHTML = '<p>'+ 'Bạn muốn thay đổi từ ' + ' <span class="text-warning">' + nameStatus + '</span> ' + ' Sang <span class="text-primary">Đã giao</span>' +'</p>'

                    break;
                case 'huy-don':
                    getShowStatus.innerHTML = '<p>'+ 'Bạn muốn thay đổi từ ' + ' <span class="text-warning">' + nameStatus + '</span> ' + ' Sang <span class="text-primary">Hủy đơn</span>' +'</p>'

                    break;
            }
        });
    });
    // console.log(selcetStatus);
</script>

<?php
    // echo '<pre>';
    // print_r($loadOneDTO);
    // echo '</pre>';
    // $myJSON = json_encode($status);

    // echo $myJSON;
?>