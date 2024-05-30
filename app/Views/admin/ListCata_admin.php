<div class="container">
    <div class="row">
        <div class="bg-CCC p-2">
            <h1>Danh sách Loại hàng</h1>
        </div>
        <div class="mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Tên loại hàng</th>  
                        <th scope="col">Thao tác</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listCatalog as $cata): ?>
                        <tr>
                            <td scope="row">#<?=$cata['id_catalog']?></td>
                            <td style="width: 50%; text-align: center;">
                                <img src="../public/upload/<?=$cata['banner_catalog']?>" class="w-50" alt=""> 
                            </td>
                            <td><?=$cata['name_catalog']?></td>
                            <td class="text-center">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModalAdmins">
                                        Xóa
                                    </button>
                                    <div class="modal fade" id="myModalAdmins">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"> Bạn có muốn xóa ID: <?=$cata['id_catalog']?> </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                               
                                                <p>
                                                    Tên: <?=$cata['name_catalog']?>
                                                </p>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <a class="text-decoration-none " href="<?=APPURL?>?url=catalogAdmin/deteleCatalog/<?=$cata['id_catalog']?>/dongY">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Xác nhận</button>
                                                </a>
                                                <a class="text-decoration-none " href="<?=APPURL?>?url=catalogAdmin/deteleCatalog/<?=$cata['id_catalog']?>/KhongDongY">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                </a>
                                            </div>

                                            </div>
                                        </div>
                                    </div>                                    
                                
                                <a class="text-decoration-none" href="<?=APPURL?>?url=catalogAdmin/updateCatalog/<?=$cata['id_catalog']?>">
                                 <button type="button" class="btn btn-warning">Sửa</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    // print_r($listCatalog);

?>