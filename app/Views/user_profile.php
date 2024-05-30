<link rel="stylesheet" href="../public/css/user.css">
<?php
// print_r($_SESSION['user']);
// print_r($loadOneUser);
?>
<main>
    <div class="container-fluid ">
        <div class="row text-center">
            <h2 class="mt-5 mb-4"> Tài Khoản</h2>
        </div>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-3 bg-f8f8 shadow ml-5 p-3">
                    <div class="card-header text-center p-30-20 mb-4 ">
                        <div class="container bg-light  info">
                            <form action="<?= APPURL ?>?url=User/updateProfileImg" method="post" enctype="multipart/form-data">
                                <?php if ($loadOneUser['img_user'] == "") : ?>

                                    <label for="fileInput" class="custom-file-upload">
                                        <img src="../public/img/user_chua_co_anh.png" class=" " alt="Upload Image">
                                    </label>

                                <?php else : ?>
                                    <label for="fileInput" class="custom-file-upload">
                                        <img src="../public/upload/<?= $loadOneUser['img_user'] ?>" class=" " alt="Upload Image">
                                    </label>
                                <?php endif ?>
                                <input type="file" name="imgUser" id="fileInput" style="display:none;">

                                <div class="    card-title mt-3 mb-1"><?= $loadOneUser['name_user'] ?></div>

                                <input type="hidden" name="id_user" value="<?= $loadOneUser['id_user'] ?>">
                                <button class="btn btn-warning w-100 text-light h-35" type="submit">Cập nhật ảnh</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <ul class="navbar-nav card_body_ul mb-4">
                                <li class="nav-item">
                                    <a class="nav-link active title-info" href="">Tài khoản của tôi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active title-info" href="<?=APPURL?>?url=order/tracking/">Theo giỏ đơn hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active title-info" href="">Đổi mật khẩu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer p-5-10">
                        <div class="container p-30-20">
                            <a href="<?= APPURL ?>?url=user/logout">
                                <button class="btn btn-warning w-100 text-light h-35" type="submit">Đăng xuất</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 bg-f8f8 shadow">
                    <div class="border-bottom pb-2 p-3">
                        <h3>Thông tin tài khoản</h3>
                        <p>Bạn có thể cập nhật thông tin của mình ở trang này </p>
                    </div>
                    <div class="row p-3">
                        <div class="col-md-5">
                            <form action="" method="post">
                                <h5 class="mb-4">Thông tin đăng nhập</h5>
                                <p>
                                    <span>Email:</span>
                                    <strong><?= $loadOneUser['email_user'] ?></strong>
                                </p>
                                <p>
                                    <span>Số điện thoại:</span>
                                    <strong>0<?= $loadOneUser['phoneNumber_user'] ?></strong>
                                </p>
                            </form>
                        </div>
                        <div class="col-md-7">

                            <form action="<?= APPURL ?>?url=User/updateProfile" method="post">
                                <h5 class="mb-3">Thông tin cá nhân</h5>
                                <div class="form-group">
                                    <label for="id_nameUser">Họ và Tên</label>
                                    <input type="text" class=" bg-form" name="nameUser" id="id_nameUser" value="<?= $loadOneUser['name_user'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="addressUser">Địa chỉ</label>
                                    <input type="text" class=" bg-form" name="addressUser" id="addressUser" value="<?= $loadOneUser['address'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="emailUser">Email</label>
                                    <input type="email" class=" bg-form" name="emailUser" id="emailUser" value="<?= $loadOneUser['email_user'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phoneUser">Số điện thoại</label>
                                    <input type="tel" class=" bg-form" name="phone" id="phoneUser" value="0<?= $loadOneUser['phoneNumber_user'] ?>" disabled required>
                                </div>
                                <input type="hidden" name="id_user" value="<?= $loadOneUser['id_user'] ?>">
                                <button class="btn btn-primary" type="submit">Cập Nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<!-- <img src="../../public/img/bg-fromProfile.webp" alt=""> -->