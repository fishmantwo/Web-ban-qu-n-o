<?php
// print_r($dsSP );
?>
<!-- body -->
<!-- banner -->
<main>
  <?php foreach ($bannerCatalog as $banner) : ?>
    <?php
    // Kiểm tra xem id_catalog có trong bảng product không
    $idCatalog = $banner['id_catalog'];
    $productsWithCatalog = array_filter($dsSP, function ($sp) use ($idCatalog) {
      return $sp['id_catalog'] == $idCatalog;
    });

    // Nếu có sản phẩm với id_catalog, hiển thị banner và sản phẩm
    if (!empty($productsWithCatalog)) :
    ?>
      <section>
        <div class="container banner">
          <img src="../public/img/<?= $banner['banner_catalog'] ?>" class="w-100" alt="">
        </div>
      </section>

      <!-- Sản phẩm mới nhất -->
      <section>
        <div class="container">
          <h1><?= $banner['name_catalog'] ?></h1>

          <div class="row d-flex justify-content-end">
            <?php $i = 0; ?>
            <?php foreach ($productsWithCatalog as $sp) : ?>
              <?php if($i < 4){?>
              <?php
              $saleShow = '';
              if ($sp['sale_Pro'] > 0) {
                $priceSale = $sp['price_Pro'] * ($sp['sale_Pro'] / 100);
                $afterPriceReduction = $sp['price_Pro'] - $priceSale;
                $saleShow .=
                  '
                      <span class="sale-price">' . number_format($afterPriceReduction, 0, ",", ".") . 'đ</span>
                      <span class="original-price">' . number_format($sp['price_Pro'], 0, ",", ".") . 'đ</span>
                  ';
              } else {
                $saleShow .= '
                 <span class="original-prices">' . number_format($sp['price_Pro'], 0, ",", ".") . 'đ</span>
                ';
              }
              ?>
              <div class="col-sm-3">
                <div class="product">
                  <div class="product-img">
                    <a href="<?= APPURL ?>?url=Product/product_detail/<?= $sp['id_product'] ?>">
                      <img src="../public/img/<?= $sp['img_main_pro'] ?>" alt="Product 1" class="product-image">
                    </a>
                  </div>

                  <div class="product-details">
                    <h5><?= $sp['name_Pro'] ?></h5>
                    <p><?= $saleShow ?></p>
                  </div>
                </div>
              </div>
              <?php }?>
              <?php $i++; ?>
            <?php endforeach ?>
          </div>
          <div class="d-flex justify-content-end mr-5">
            <button class="btn bg-dark text-white">Xem thêm các sản phẩm khác</button>
          </div>
        </div>
      </section>
    <?php endif; ?>
  <?php endforeach ?>
</main>
<!-- Thêm đoạn mã này vào cuối phần thân HTML hoặc vào tệp JavaScript của bạn -->
