<?php
// print_r($_SESSION['cart']);


// echo '<pre>';
// print_r($cart);
// echo '</pre>';


// echo '<pre>';
// print_r($voucher);
// echo '</pre>';

?>
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Style cho nút kích hoạt dropdown */
    .dropdown-btn {
        padding: 10px;
        background-color: #3498db;
        color: #fff;
        cursor: pointer;
    }

    /* Style cho dropdown menu */
    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
        z-index: 1;
    }

    /* Style cho các mục trong dropdown menu */
    .dropdown-menu a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #333;
    }

    /* Hiển thị dropdown menu khi hover vào dropdown container */
    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>
<main>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <strong>Giỏ hàng của <?= $_SESSION['user']['name_user'] ?></strong>
                        <?php else : ?>
                            <strong>Giỏ hàng của bạn</strong>
                        <?php endif; ?>
                    </div>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 100px;">Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Tổng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i = 0;
                            $totalProduct = 0;
                            $calculateOrders = 0;
                            $total = 0;
                            $ship = 15000;
                            if (isset($_SESSION['user'])) {
                                // có user tồn tại
                                foreach ($cart as $ca) {
                                    $saleShow = "";
                                    if ($ca['sale_price'] > 0) {
                                        $priceSale = $ca['base_price'] * ($ca['sale_price'] / 100);
                                        $afterPriceReduction = $ca['base_price'] - $priceSale;

                                        $saleShow .= $afterPriceReduction;
                                    } else {
                                        $saleShow .= $ca['base_price'];
                                    }
                                    $showFromSize = '';
                                    foreach ($allDetailProduct as $detailItem) {
                                        if ($detailItem['id_product'] == $ca['id_Product']) {
                                            $showFromSize .= '<option value="' . $detailItem['size'] . '">' . $detailItem['size'] . '</option>';
                                        }
                                    }

                                    // extract($ca);
                                    $total =  $saleShow * $ca['quantity'];
                                    $giam = ($ca['quantity'] <= 1) ?   'disabled' : '';
                                    $tang = ($ca['quantity'] >= $ca['quantity_Pro']) ?   'disabled' : '';
                                    echo
                                    '
                                    <tr>
                                        <td><img class="img-fluid" src="../public/img/' . $ca['img_main_pro'] . '" alt="Product Image"></td>
                                        <td>' . $ca['name_Pro'] . '</td>
                                        <td>' . number_format($saleShow, 0, ",", ".") . 'đ</td>
                                      
                                            <td>
                                                <a class="btn btn-sm ' . $tang . '" href="' . APPURL . '?url=Product/cartItem/' . $ca['id_dto'] . '/' . $ca['id_Product'] . '/more">+</a>
                                                    ' . $ca['quantity'] . '
                                                <a class="btn btn-sm  ' . $giam . '" href="' . APPURL . '?url=Product/cartItem/' . $ca['id_dto'] . '/' . $ca['id_Product'] . '/less">--</a>
                                            </td>
                                       
                                            <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                                ' . $ca['size'] . '
                                                </button>
                                                
                                                <ul class="dropdown-menu">
                                                    <form class="p-2" action=" '.APPURL.'?url=Product/updateSize" method="post">
                                                        <label for="inputOption" class="form-label">Chọn size</label>
                                                            <select class="form-select mb-2" name="updateSize" id="inputOption">
                                                                ' . $showFromSize . '
                                                            </select>
                                                            <input type="hidden" name="MaDH" value="'. $ca['id_dto'] .'">
                                                            <input type="hidden" name="MaSP" value="'. $ca['id_Product'] .'">
                                                        <button type="submit" class="btn btn-primary">Thay đổi</button>
                                                    </form>
                                                </ul>
                                            </div>

                                                                                
                                            </td>
                                        <td>' . number_format($total, 0, ",", ".") . 'đ</td>
                                        <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                                            Xóa
                                        </button>
                                        <div class="modal fade " id="myModal">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                      
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                              <h4 class="modal-title">Giỏ hàng</h4>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                      
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                              Bạn có muốn xóa \' '. $ca['name_Pro'].' \'
                                            </div>
                                      
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <a href="' . APPURL . '?url=Product/deteleCart/' . $ca['id_product'] . '/' . $ca['id_dto'] . '/dongY">
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Xác nhận</button>
                                            </a>
                                            <a href="' . APPURL . '?url=Product/deteleCart/' . $ca['id_product'] . '/' . $ca['id_dto'] . '/khongDongY">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                            </a>
                                            </div>
                                      
                                          </div>
                                        </div>
                                      </div>                                        
                                       
                                        </td>
                                    </tr>
                                    ';
                                    $totalProduct += $ca['quantity'];
                                    $calculateOrders +=  $total;
                                }
                            } else {
                                // không có user là sesstion['cart]
                                $i = 0;

                                foreach ($cart as $cartItem) {

                                    $saleShow = "";
                                    if ($cartItem['sale_price'] > 0) {
                                        $priceSale = $cartItem['base_price'] * ($cartItem['sale_price'] / 100);
                                        $afterPriceReduction = $cartItem['base_price'] - $priceSale;

                                        $saleShow .= $afterPriceReduction;
                                    } else {
                                        $saleShow .= $cartItem['base_price'];
                                    }

                                    $total = $saleShow * $cartItem['quantitySS'];
                                    $giam = ($cartItem['quantitySS'] <= 1) ?   'disabled' : '';
                                    $tang = ($cartItem['quantitySS'] >= $cartItem['quantity_Pro']) ?   'disabled' : '';
                                    
                                    echo
                                    '
                                <tr>
                                    <td><img class="img-fluid" src="../public/img/' . $cartItem['img_main_pro'] . '" alt="Product Image"></td>
                                    <td>' . $cartItem['name_Pro'] . '</td>
                                    <td>' . number_format($saleShow, 0, ",", ".") . 'đ</td>
                                    <td>
                                    <a class="btn btn-sm '.$tang .'" href="'.APPURL.'?url=Product/cartItem/0/'.$cartItem['id_product'].'/more ">+</a>
                                        ' . $cartItem['quantitySS'] . '
                                    <a class="btn btn-sm '.$giam.'" href="'.APPURL.'?url=Product/cartItem/0/'.$cartItem['id_product'].'/less">--</a>
                                    </td>
                                    <td>' . $cartItem['sizeSS'] . '</td>
                                    <td>' . number_format($total, 0, ",", ".") . 'đ</td>
                                    <td>
                                    <a href="' . APPURL . '?url=Product/deteleCart/' . $i  . '">
                                        <button class="btn btn-danger btn-sm">Xóa</button>
                                    </a>
                                    </td>
                                </tr>
                                ';
                                    $i++;
                                    $totalProduct += $cartItem['quantitySS'];
                                    $calculateOrders +=  $total;
                                }
                            }
                            ?>
                            <!-- Add more rows for additional products if needed -->
                        </tbody>
                    </table>
                    <div class="card-footer">
                        Tổng: <?= $totalProduct ?> sản phẩm
                    </div>
                </div>
            </div>



            <?php
            $giamGia = 0;
            if (isset($voucher['reduced_Price'])) {
                $giamGia = $voucher['reduced_Price'];
            } else if (isset($voucher['discount_Rate'])) {
                $giamGia = min(
                    ($total + $ship) * $voucher['discount_Rate'] / 100,
                    $voucher['minimize']
                );
            }
            ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <strong>Hóa đơn</strong>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6">Tạm tính: </div>
                            <div class="col-6 text-end">
                                <strong><?= number_format($calculateOrders, 0, ",", ".") ?>đ</strong>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">Tiền Ship </div>
                            <div class="col-6 text-end">
                                <strong><?= number_format($ship, 0, ",", ".") ?>đ</strong>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">Mã giảm giá: </div>
                            <div class="col-6 text-end">
                                <strong>-<?= number_format($giamGia, 0, ",", ".") ?>đ</strong>
                            </div>
                            <div class="col-12 text-end">
                                <form action="<?= APPURL ?>?url=order/addVoucher" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="voucher" id="" value="<?= (isset($ca['id_voucher'])) ? $ca['id_voucher'] : '' ?>">
                                        <input type="hidden" name="MaDH" value="<?= $ca['id_dto'] ?>">
                                        <button type="submit" class="btn btn-primary " style="z-index: 0;">Áp dụng</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <strong>TỔNG TIỀN</strong>
                            </div>
                            <div class="col-6 text-end">
                                <?php $tonTien = $calculateOrders + $ship - $giamGia; ?>
                                <strong><?= number_format($tonTien, 0, ",", ".") ?>đ</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary mt-4 d-block w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Đặt hàng
                </button>

                <form method="POST" action="<?= APPURL ?>?url=order/addOrder">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin giao hàng</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="HoTen" class="form-label">Họ Tên</label>
                                        <input type="text" class="form-control" name="nameUser" id="HoTen" value="<?= (isset($_SESSION['user'])) ? $user['name_user'] : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="DienThoai" class="form-label">Điện thoại</label>
                                        <input type="text" class="form-control" name="telUser" id="DienThoai" value="<?= (isset($_SESSION['user'])) ? '0' . $user['phoneNumber_user'] : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="DiaChi" class="form-label">Địa Chỉ</label>
                                        <input type="text" class="form-control" name="addressUser" id="DiaChi" value="<?= (isset($_SESSION['user'])) ? $user['address'] : '' ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Xác nhận & đặt hàng</button>
                                    <input type="hidden" name="MaDH" value="<?= $ca['id_dto'] ?>">
                                    <input type="hidden" name="tongTien" value="<?= $tonTien ?>">
                                    <input type="hidden" name="soLuong" value="<?= $totalProduct ?>">
                                    <input type="hidden" name="size" value="<?= $ca['size'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <form>
            </div>
        </div>


</main>
<script>
    function showForm(size) {
        var formContainer = document.getElementById('formContainer_' + size);
        formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
    }
</script>