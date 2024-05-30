<?php
// print_r($loadDto);
?>
<div class="container">
  <table class="table table-hover">
    <thead class="thead-light">
      <tr>
        <th scope="col">Mã sản phẩm</th>
        <th scope="col" style="width: 100px;">hình</th>
        <th scope="col">tên sản phẩm</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Size</th>
        <th scope="col">Thao tác</th>

      </tr>
    </thead>
    <tbody>
        <?php foreach($loadDto as $detailPro):?>
            <tr>
            <th scope="row">
                #<?=$detailPro['id_dto']?>
            </th>
            <td><img class="img-fluid" src="../public/img/<?=$detailPro['img_main_pro']?>" alt="Product Image"></td>
            <td><?=$detailPro['name_Pro']?></td>
            <td><?= number_format($detailPro['price'], 0, ",", ".") ?>đ</td>
            <td><?=$detailPro['quantity']?> </td>
            <td><?=$detailPro['size']?> </td>

            <td><a href="<?=APPURL?>?url=Product/product_detail/<?=$detailPro['id_Product']?>"><button class="btn btn-primary">Mua lại</button></a></td>
            </tr>
        <?php endforeach?>
    </tbody>
  </table>
</div>