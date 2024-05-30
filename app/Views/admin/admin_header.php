<?php
    // print_r($loadAllUser);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/admin.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <!-- Vertical Navigation -->
    <div class="container-fluid">
        <!-- menu -->
        <div class="row">
            <div class="col-md-2 bg-blue menu_left" style="height: 800px;">
                <div class="row p-2 menu_user_header">
                    <div class="d-flex justify-content-between align-items-center p-2">
                        <div class="">
                            <img src="../public/img/<?=$loadOneUser['img_user']?>" class=" rounded-circle" style="width:70px; height:70px;" alt="">
                        </div>
                        <div class="name_user">
                            <span class="text-white font-weight-bold">
                                <?=$loadOneUser['name_user']?> <br>
                            </span>
                            <span class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 4 4" fill="none">
                                    <path d="M2 0C1.46957 0 0.96086 0.210714 0.585787 0.585787C0.210714 0.96086 0 1.46957 0 2C0 2.53043 0.210714 3.03914 0.585787 3.41421C0.96086 3.78929 1.46957 4 2 4C3.11 4 4 3.11 4 2C4 1.46957 3.78929 0.96086 3.41421 0.585787C3.03914 0.210714 2.53043 0 2 0Z" fill="#4ECB71" />
                                </svg> Online
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-3 mb-3">
                    <a href="<?=APPURL?>?url=admin/index/" class="text-decoration-none text-center">
                        <div class="d-flex align-items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16" fill="none">
                                <path d="M8 1.4L6 2.7V1H4V4L0 6.6L0.6 7.4L8 2.6L15.4 7.4L16 6.6L8 1.4Z" fill="white" />
                                <path d="M8 4L2 8V15H7V12H9V15H14V8L8 4Z" fill="white" />
                            </svg>
                            <span class="text-white font-weight-bold fs-1-5 ml-2">
                                Trang Chủ<br>
                            </span>
                        </div>
                    </a>

                </div>
                <div class="p-3 mb-3">
                    <a href="" class="text-decoration-none text-center">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48" fill="none">
                                <path d="M44 14L24 4L4 14V34L24 44L44 34V14Z" stroke="white" stroke-width="4" stroke-linejoin="round" />
                                <path d="M4 14L24 24" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M24 44V24" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M44 14L24 24" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M34 9L14 19" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="text-white font-weight-bold fs-1-5 ml-2">
                                Sản Phẩm<br>
                            </span>
                        </div>
                    </a>

                </div>
                <div class="p-3 mb-3">
                    <a href="<?=APPURL?>?url=admin/catalog" class="text-decoration-none text-center">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 31" fill="none">
                                <path d="M1.875 26.25C1.875 26.5137 1.92383 26.7578 2.02148 26.9824C2.11914 27.207 2.25098 27.4023 2.41699 27.5684C2.58301 27.7344 2.7832 27.8711 3.01758 27.9785C3.25195 28.0859 3.49609 28.1348 3.75 28.125H13.125L16.8896 30H3.75C3.23242 30 2.74902 29.9023 2.2998 29.707C1.85059 29.5117 1.4502 29.2432 1.09863 28.9014C0.74707 28.5596 0.478516 28.1641 0.292969 27.7148C0.107422 27.2656 0.00976563 26.7773 0 26.25V3.75C0 3.27148 0.102539 2.80762 0.307617 2.3584C0.512695 1.90918 0.791016 1.50879 1.14258 1.15723C1.49414 0.805664 1.89453 0.527344 2.34375 0.322266C2.79297 0.117188 3.26172 0.00976563 3.75 0H24.375V9.97559L22.5 9.03809V1.875H3.75C3.52539 1.875 3.30078 1.92871 3.07617 2.03613C2.85156 2.14355 2.65137 2.29004 2.47559 2.47559C2.2998 2.66113 2.1582 2.86133 2.05078 3.07617C1.94336 3.29102 1.88477 3.51562 1.875 3.75V23.0273C2.1582 22.8613 2.45605 22.7344 2.76855 22.6465C3.08105 22.5586 3.4082 22.5098 3.75 22.5H11.25V24.375H3.75C3.48633 24.375 3.24219 24.4238 3.01758 24.5215C2.79297 24.6191 2.59766 24.751 2.43164 24.917C2.26563 25.083 2.12891 25.2832 2.02148 25.5176C1.91406 25.752 1.86523 25.9961 1.875 26.25ZM30 14.8682V26.0303L21.5625 30.2344L13.125 26.0303V14.8682L21.5625 10.6641L30 14.8682ZM21.5625 12.7588L16.1572 15.4541L21.5625 18.1494L26.9678 15.4541L21.5625 12.7588ZM15 24.873L20.625 27.6709V19.7754L15 16.9629V24.873ZM28.125 24.873V16.9629L22.5 19.7754V27.6709L28.125 24.873Z" fill="#F8F8F8" />
                            </svg>
                            <span class="text-white font-weight-bold fs-1-5 ml-2">
                                Loại Hàng<br>
                            </span>
                        </div>
                    </a>

                </div>
                <div class="p-3 mb-3">
                    <a href="<?=APPURL?>?url=admin/OrderList" class="text-decoration-none text-center">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <path d="M21.25 5H8.75C7.36929 5 6.25 6.11929 6.25 7.5V23.75C6.25 25.1307 7.36929 26.25 8.75 26.25H21.25C22.6307 26.25 23.75 25.1307 23.75 23.75V7.5C23.75 6.11929 22.6307 5 21.25 5Z" stroke="#F8F8F8" stroke-width="2" />
                                <path d="M11.25 11.25H18.75M11.25 16.25H18.75M11.25 21.25H16.25" stroke="#F8F8F8" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <span class="text-white font-weight-bold fs-1-5 ml-2">
                                Đơn Hàng<br>
                            </span>
                        </div>
                    </a>

                </div>
                <div class="p-3 mb-3">
                    <a href="<?=APPURL?>?url=admin/thongKe" class="text-decoration-none text-center">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="27" viewBox="0 0 26 27" fill="none">
                                <path d="M12.906 0.00448758C12.8637 0.0121243 12.822 0.0224791 12.781 0.0354876C12.5552 0.0860893 12.354 0.213411 12.2116 0.395757C12.0692 0.578102 11.9944 0.804188 12 1.03549V2.03549H3C2.20435 2.03549 1.44129 2.35156 0.87868 2.91417C0.31607 3.47678 0 4.23984 0 5.03549L0 18.0355C0 19.6915 1.344 21.0355 3 21.0355H12V21.4105L6.562 24.1295C6.32171 24.2455 6.13736 24.4523 6.0495 24.7042C5.96164 24.9562 5.97747 25.2327 6.0935 25.473C6.20953 25.7133 6.41627 25.8976 6.66822 25.9855C6.92018 26.0733 7.19671 26.0575 7.437 25.9415L12 23.6605V24.0355C12 24.3007 12.1054 24.5551 12.2929 24.7426C12.4804 24.9301 12.7348 25.0355 13 25.0355C13.2652 25.0355 13.5196 24.9301 13.7071 24.7426C13.8946 24.5551 14 24.3007 14 24.0355V23.6605L18.563 25.9415C18.8033 26.0575 19.0798 26.0733 19.3318 25.9855C19.5837 25.8976 19.7905 25.7133 19.9065 25.473C20.0225 25.2327 20.0384 24.9562 19.9505 24.7042C19.8626 24.4523 19.6783 24.2455 19.438 24.1295L14 21.4105V21.0355H23C24.656 21.0355 26 19.6915 26 18.0355V5.03549C26 4.23984 25.6839 3.47678 25.1213 2.91417C24.5587 2.35156 23.7956 2.03549 23 2.03549H14V1.03549C14.005 0.893285 13.9797 0.751643 13.9256 0.620024C13.8716 0.488404 13.79 0.369839 13.6865 0.272249C13.5829 0.17466 13.4597 0.100293 13.3251 0.054118C13.1905 0.00794282 13.0477 -0.00897747 12.906 0.00448758ZM2 5.03549H24V18.0355H2V5.03549ZM20.875 6.03549C20.651 6.05957 20.4417 6.15858 20.281 6.31649L17 9.59849L14.719 7.31549C14.6098 7.2034 14.4757 7.11852 14.3277 7.06767C14.1797 7.01682 14.0218 7.00143 13.8667 7.02274C13.7117 7.04404 13.5638 7.10144 13.435 7.19033C13.3061 7.27921 13.2 7.39709 13.125 7.53449L10.156 12.7225L8.937 9.65949C8.87781 9.50134 8.77953 9.36075 8.65132 9.25084C8.52312 9.14093 8.36918 9.06528 8.20384 9.03093C8.0385 8.99659 7.86716 9.00467 7.70579 9.05443C7.54443 9.10418 7.39828 9.194 7.281 9.31549L4.281 12.3155C4.18645 12.41 4.11143 12.5222 4.06024 12.6456C4.00904 12.7691 3.98267 12.9015 3.98262 13.0351C3.98257 13.1688 4.00886 13.3012 4.05997 13.4247C4.11108 13.5482 4.18601 13.6604 4.2805 13.755C4.37499 13.8495 4.48717 13.9246 4.61065 13.9758C4.73412 14.0269 4.86648 14.0533 5.00015 14.0534C5.13382 14.0534 5.26619 14.0271 5.3897 13.976C5.51321 13.9249 5.62545 13.85 5.72 13.7555L7.626 11.8495L9.064 15.4115C9.13187 15.5901 9.2495 15.7456 9.40298 15.8595C9.55645 15.9733 9.73934 16.0408 9.92999 16.054C10.1206 16.0671 10.3111 16.0254 10.4787 15.9337C10.6464 15.8419 10.7842 15.7041 10.876 15.5365L14.22 9.69249L16.282 11.7555C16.3753 11.852 16.487 11.9287 16.6105 11.9811C16.734 12.0335 16.8668 12.0605 17.001 12.0605C17.1352 12.0605 17.268 12.0335 17.3915 11.9811C17.515 11.9287 17.6267 11.852 17.72 11.7555L21.72 7.75549C21.878 7.60924 21.9845 7.41593 22.0238 7.20428C22.0631 6.99263 22.0331 6.77394 21.9382 6.58073C21.8433 6.38752 21.6885 6.2301 21.497 6.13186C21.3054 6.03363 21.0873 5.99983 20.875 6.03549Z" fill="#F8F8F8" />
                            </svg>
                            <span class="text-white font-weight-bold fs-1-5 ml-2">
                                Thống Kê<br>
                            </span>
                        </div>
                    </a>

                </div>

            </div>