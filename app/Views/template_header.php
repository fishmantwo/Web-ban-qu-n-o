<?php
// print_r($_SESSION['user']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/addCss.css">
  <link rel="stylesheet" href="../public/js/bootstrap.bundle.min.js">
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
</head>

<body>
  <div class="container-fluid">
    <!-- header -->
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid ">
          <a class="navbar-brand " href="<?= APPURL ?>">
            <img src="img/yame-fav.png" style="width: 144px; margin-left:0%;" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= APPURL ?>">Trang Chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= APPURL ?>?url=page/newProduct">Sản Phẩm Mới</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Đại Hạ Giá</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Giới Thiệu</a>
              </li>
            </ul>
            <span class="navbar-text">
              <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                  <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </nav>
            </span>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">

                <?php if (isset($_SESSION['user'])) { ?>
                  <a href="" class="nav-link ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                      <path d="M14.3334 13C18.0153 13 21 10.3137 21 7C21 3.68629 18.0153 1 14.3334 1C10.6515 1 7.66669 3.68629 7.66669 7C7.66669 10.3137 10.6515 13 14.3334 13Z" stroke="black" stroke-width="1.5" />
                      <path d="M24.3333 13.45L26.555 15.25L31 10.75" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M27.6633 25C27.6667 24.754 27.6667 24.5035 27.6667 24.25C27.6667 20.5225 21.6967 17.5 14.3333 17.5C6.97 17.5 1 20.5225 1 24.25C1 27.9775 1 31 14.3333 31C18.0517 31 20.7333 30.7645 22.6667 30.3445" stroke="black" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                  </a>
                  <ul class="sub-menu" style=" right: 30px; z-index: 1;">
                    <div class="sub-menu__box w-100">
                      <div class="li-header__box">
                        <div class="li-header">
                          chào <?php if(isset($_SESSION['user']['name_user'])&&($_SESSION['user']['name_user']!="")) {
                            echo $_SESSION['user']['name_user'];
                          }else{
                            echo 'bạn chưa có Tên';
                          }?><?php
                            ?>
                        </div>
                      </div>
                      <div class="li-header__box">
                      <div class="li-body">
                        <ul>
                          <li><a href="<?=APPURL?>?url=User/productFile/<?=$_SESSION['user']['id_user']?>">Tài khoản của tôi</a><n</li>
                          <li><a href="<?=APPURL?>?url=order/tracking/">Theo giỏ đơn hàng</a></li>
                          <li><a href="">Đổi mật khẩu</a></li>
                          <?php if(isset($_SESSION['user']['role'])&&($_SESSION['user']['role'] == 1)) {
                            echo '<li><a href="'.APPURL.'?url=admin/index">Admin</a></li>';
                          }else{
                            echo '';
                          }?>
                          

                        </ul>
                      </div>
                      </div>
                      <div class="li-fooer">
                        <li style="list-style: none;">
                          <a href="<?= APPURL ?>?url=user/logout">Đăng xuất</a>
                        </li>
                      </div>
                    </div>
                
                  </ul>
                <?php } else { ?>
                  <a class="nav-link" href="<?=APPURL?>?url=user/userLogin">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                      <path d="M14.0336 13C17.6327 13 20.5503 10.3137 20.5503 7C20.5503 3.68629 17.6327 1 14.0336 1C10.4344 1 7.51678 3.68629 7.51678 7C7.51678 10.3137 10.4344 13 14.0336 13Z" stroke="black" stroke-width="1.5" />
                      <path d="M31 15.121L28.6963 13M28.6963 13L26.3926 10.879M28.6963 13L31 10.879M28.6963 13L26.3926 15.121M27.0639 25C27.0671 24.754 27.0671 24.5035 27.0671 24.25C27.0671 20.5225 21.2313 17.5 14.0336 17.5C6.83578 17.5 1 20.5225 1 24.25C1 27.9775 1 31 14.0336 31C17.6683 31 20.2897 30.7645 22.1795 30.3445" stroke="black" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                  </a>
                <?php } ?>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= APPURL ?>?url=Product/cart">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20" fill="none">
                    <path d="M17.5 16.375V15H5.75L6.5 13.625L18 12.5L20 5H4.625L3.75 1.25H0V2.5H2.75L5.375 13L3.75 16.25V18.125C3.75 19.125 4.625 20 5.625 20C6.625 20 7.5 19.125 7.5 18.125C7.5 17.125 6.625 16.25 5.625 16.25H15V18.125C15 19.125 15.875 20 16.875 20C17.875 20 18.75 19.125 18.75 18.125C18.75 17.25 18.25 16.625 17.5 16.375ZM5 6.25H18.375L17 11.25L6.5 12.375L5 6.25Z" fill="black" />
                  </svg> <!-- Thay thế bằng icon giỏ hàng của Bootstrap Icons -->
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    </header>