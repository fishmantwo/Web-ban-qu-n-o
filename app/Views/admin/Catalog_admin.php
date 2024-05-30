<div class="container">
    <div class="row">
        <div class="bg-CCC p-2">
            <h1>Loại hàng</h1>
        </div>
        <div class="mt-3">
            <form action="<?= APPURL ?>?url=catalogAdmin/addCatalog" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mt-1 col-6">
                        <input class="form-control" type="text" name="nameCata" placeholder="Thêm loại hàng" aria-label="default input example">
                    </div>
                    <div class=" mt-1 col-6">
                        <input type="file" name="bannerCata" class="form-control" id="fileInput" accept="image/*">
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="<?= APPURL ?>?url=catalogAdmin/listCatalog">
                        <button type="button" class="btn btn-secondary">Danh sách</button>
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>