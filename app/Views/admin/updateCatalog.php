<div class="container">
    <div class="row">
        <div class="bg-CCC p-2">
            <h1>Sửa loại hàng</h1>
        </div>
        <div class="mt-3">
            <form action="<?= APPURL ?>?url=catalogAdmin/fixCatalog" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mt-1 col-6">
                        <input class="form-control" id="nameCata" type="text" name="nameCata" value="<?= $loadOneCatalog['name_catalog'] ?>" placeholder="Sửa loại hàng" aria-label="default input example">
                    </div>
                    <div class=" mt-1 col-6">
                        <input class="form-control" type="text" placeholder="#<?= $loadOneCatalog['id_catalog'] ?>" aria-label="default input example" disabled>
                    </div>
                </div>
                <div class="mt-1" style="width: 50%;">
                    <label for="fileInput" class="form-label ">
                        <img src="../public/upload/<?= $loadOneCatalog['banner_catalog'] ?>" alt="" style="width: 100%;">
                    </label>
                    <input type="file" name="bannerCata" class="form-control" id="fileInput" accept="image/*">
                </div>
                <div class="mt-2">
                    <input type="hidden" name="id_catalog" value="<?= $loadOneCatalog['id_catalog'] ?>">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary">Sửa</button>

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <p class="modal-title">Loại hàng số <?= $loadOneCatalog['id_catalog'] ?></p>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="showStatus">
                                        Sửa loại hàng <?= $loadOneCatalog['name_catalog'] ?>
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
                    <a href="<?= APPURL ?>?url=catalogAdmin/listCatalog">
                        <button type="button" class="btn btn-secondary">Danh sách</button>
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    var catalog = <?php echo json_encode($loadOneCatalog);?>;
    const catalogName = catalog.name_catalog
    // console.log();

    var inputName = document.getElementById('nameCata');
    var showInput = document.getElementById('showStatus');
    inputName.addEventListener('change', function() {
        var inputValue = inputName.value;
        showInput.innerHTML =  `<h3> Bạn muốn đổi từ <span class="text-warning">${catalogName}</span> sang  <span class="text-primary">${inputValue}</span> </h3>`;
        
    })
</script>
<?php
// print_r($loadOneCatalog);
?>