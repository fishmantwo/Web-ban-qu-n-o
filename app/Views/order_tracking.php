<?php
// print_r($loadDto);
?>
<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Ngày mua</th>
        <th scope="col">Số sản phẩm</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orderTracking as $order) : ?>
        <tr>

          <th scope="row">
            <a href="<?=APPURL?>?url=order/detailOrder/<?= $order['id_bill'] ?>">
                #<?= $order['id_bill'] ?>
            </a>
          </th>
          <td><?= $order['order_Date'] ?></td>
          <td><?= $order['quantity_Product'] ?></td>
          <td><?= number_format($order['total'], 0, ",", ".") ?>đ</td>
          <td>
            <?php
            switch ($order['status']) {
              case 'cho-xac-nhan':
                echo '<span class="badge bg-info">chờ xác nhân</span>';
                break;
              case 'chuan-bi-hang':
                echo '<span class="badge bg-warning">Chuẩn bị hàng</span>';
                break;
              case 'dang-giao':
                echo '<span class="badge bg-primary">Đang giao</span>';
                break;
              case 'da-giao':
                echo '<span class="badge bg-success">Đã giao xong</span>';
                break;
              case 'huy-don':
                echo '<span class="badge bg-danger">Hủy đơn</span>';
                break;
            }

            ?>

          </td>
          <td>
            <!-- chưa làm tạo 1 if else để -->
            <?php if ($order['status'] == 'cho-xac-nhan') : ?>
              <a href="<?=APPURL?>?url=order/updateOrder/huy-don/<?= $order['id_bill'] ?>">
                <button type="button" class="btn btn-outline-danger">Hủy đơn</button>
              </a>
            <?php elseif ($order['status'] == 'da-giao') : ?>
              <a href="#">
                <button type="button" class="btn btn-outline-warning">Trả hàng</button>
              </a>
            <?php else : ?>
              <a href="#">
                <button type="button" class="btn btn-outline-warning">Liên hệ shop</button>
              </a>
            <?php endif ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>