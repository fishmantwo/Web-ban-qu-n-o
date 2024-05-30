<?php
if (array($OneProduct)) {
    // echo 1;
    // print_r($OneProduct);
    // print_r($OneDtProduct);
}

?>

<section>
    <div class="container">
        <div class="row  mb-5">
            <!-- Hình ảnh -->

            <div class="col-md-6 text-center">
                <img id="largeImage" src="../public/img/<?= $OneProduct['img_main_pro'] ?>" class="detail_img" alt="">
                <!-- 3 ảnh nhỏ phí dưới -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <img src="img/<?= $OneProduct['img_1'] ?>" class="detail_img thumbnail" alt="Ảnh nhỏ 1">
                    </div>
                    <div class="col-md-4">
                        <img src="img/<?= $OneProduct['img_2'] ?>" class="detail_img thumbnail" alt="Ảnh nhỏ 2">
                    </div>
                    <div class="col-md-4">
                        <img src="img/<?= $OneProduct['img_main_pro'] ?>" class="detail_img thumbnail" alt="Ảnh nhỏ 3">
                    </div>
                </div>
            </div>
            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <div class="product_detail_name">
                    <span> <?= $OneProduct['name_Pro'] ?> </span>

                </div>
                <div class="product_detail_id">
                    Mã số: #<?= $OneProduct['id_product'] ?>
                </div>
                <div class="product_detail_catalogName">
                    <img style="height:24px; margin-bottom:10px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAADsAAAA7AF5KHG9AAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAA8xJREFUWIXFl11oHGUUhp8zM7sbo2kTijbBakqMRYlooYYEBUWKZhPTdLO4UEVbEBWpBQsFIVrtNjZgrJbSitSfChWpaKm5iEEbL2wF0SsllILoTSuktqakTUzs7szsHC82aSbZnexuUuK5+n7O977PzJxvvhlYZDht8Ycm2hLVC11vLMbcjsYbPU8HI55b/78AINoDRByRs0sOoImEqcojAOJx55IDMDZWBlgAIrpLk8kFaS0YQAYHJ4FzAAIPp38e+kBBlgwAQISea214zmmNHygVYlEAoab7DgucnO6r6jY7Gu+ZZ8niAOzHYuvS0c5vpvuSTHoZdM/sLO2yW+LPXHcATSRuUEO+QFjlHy9LXTmVkyv6nrYmbr6uAM545gngDpQ6v7hTvnxdnvRlNu4LxehaxQKoaPtUs9z23MF0NPa2CJXqyet585VHgYL1UDQAKrWIZtvCWpCjqsHpAnXFyJZQhLqs+FwAMtONVGusNdXWuaYkAE0kTH9fhIslAozMiMlrkpHeogHS0fib6fHMwVlAMFySvRJSkIn1HSsFmhBtn2yJ1xQEyJ7t+oqgT+r6zhUzF8E/JQEIa+2Wzl9CIesnsrVmWWQPL3/kFKGlmU1AGCFsW/KxdnRstlNmLUqsJIApCJipVBG9HzjqT8m5A6La5OvEbNscx+A0UA0gt9ZgNDdCeXmuYTiMrK4N5FHRlXPH8tSAVgUJGA80ETr4DubTmwgd2o9ULp+ZjESwundibnw8EABPcrTzAMhk0Hoz1o576BOcbTvQs38iDzbPmO9+FRwb9/2PggGEscIAyh9B6/XSKMa99yB3rUFuXwUXR3zmDm53LzhOsL9ozk7KBTDk1yCBzOEjUFWJ1bUD7/sf8E6fKdocAM8YyoGaO6AbNpTbjnUBqJhXrIQrnwo3bNq3yMDAZf9g7i7o7/9XVT4r2nzPXqytzxPu/5LQ/l6kOqfQs6Hy9VzzvAAAjmoS5UpB8+5ejOZGpOFunBdfxvvtd8xn836LZEB25pvIC1Ax2Pe3CNsLmeM4cNON6Ohl9PwFGD6f//0A+yInjp8pGgAg/G3fEWCvf8zavhWupnB3v3XtmXunfkRWVBH69EPMLU/hHeubKzUQrrC6gnzm/YJVEDsa3wX6BiBSU42OjICbmZ0YCiH1dejwXzA+7p/pC6eszXLy2MSCAKYj3RqLoXIAuK2YfGBCVZKRE1/tE/9hsFAAyG7PtGO9JLAFaAhIOwd8Hg6570p//6VidEv+kwFItXTUC2aDoqsNg6uKMaquDJV9dzzwLRoU/wGxqGF2wiMubwAAAABJRU5ErkJggg==">
                    Đại hạ giá upto - <?= $OneProduct['sale_Pro'] ?>%
                </div>
                <div class="product_detail_price">
                    <span id="text_priceBase">Giá Gốc: </span> <span class="text-danger price" style="text-decoration: line-through;" id="originalPrice"></span>
                </div>
                <div class="product_detail_sale">
                    <span id="text_priceSale">Giá Sale: </span> <span class="text-danger price" id="salePrice"></span id="savings"><span id="savings"></span>
                </div>
                <div class="product_detail_size">
                    <label for="sizeSelect" style="margin-bottom: 4px; font-size: 1.2rem;">Chọn Kích Thước:</label>

                    <select class="form-size" id="sizeSelect" onchange="updateProductInfo()">
                        <?php foreach ($OneDtProduct as $size) : ?>
                            <?php if ($size['size'] !== "") : ?>
                                <option value="<?= $size['size'] ?>"><?= $size['size'] ?></option>

                            <?php endif ?>
                        <?php endforeach ?>
                    </select>

                </div>
                <div class="product_detail_describe">
                    <h4>Mô tả sản phẩm</h4>
                    <?= $OneProduct['description_Pro'] ?>
                </div>

                <div class="mt-3">
                    <button class=" bg-success text-white btn-success buy-now-btn">Mua Ngay</button>
                    <a id="addToCartLink" href="<?= APPURL ?>?url=Product/addTooCart/<?= $OneProduct['id_product'] ?>">
                        <button class=" btn-primary buy-now-btn">Thêm vào Giỏ Hàng</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <img src="img/<?= $OneProduct['img_1'] ?>" class="img-fluid" alt="Ảnh nhỏ 1">
            </div>
            <div class="col-md-6">
                <img src="img/<?= $OneProduct['img_2'] ?>" class="img-fluid" alt="Ảnh nhỏ 1">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <img src="img/<?= $OneProduct['img_3'] ?>" class="img-fluid" alt="Ảnh nhỏ 1">
            </div>
            <div class="col-md-6">
                <img src="img/<?= $OneProduct['img_4'] ?>" class="img-fluid" alt="Ảnh nhỏ 1">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <img src="img/<?= $OneProduct['img_5'] ?>" class="img-fluid" alt="Ảnh nhỏ 1">
            </div>
            <div class="col-md-6">
                <img src="img/<?= $OneProduct['img_6'] ?>" class="img-fluid" alt="Ảnh nhỏ 1">
            </div>
        </div>
    </div>
</section>
<!-- Thay đổi ảnh -->
<script>
    // Thay đổi ảnh
    $(document).ready(function() {
        // Xử lý sự kiện khi click vào ảnh nhỏ
        $(".thumbnail").on("click", function() {
            // Lấy nguồn của ảnh nhỏ
            var smallImageSrc = $(this).attr("src");

            // Thay đổi nguồn của ảnh lớn thành nguồn của ảnh nhỏ
            $("#largeImage").attr("src", smallImageSrc);
        });
    });
</script>
<!-- Thay giá khi chọn size -->

<script>
    function updateProductInfo() {
        // Gọi cả hai hàm cần được thực hiện
        updatePrice();
        updateAddToCartLink();
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        const sizeSelect = document.getElementById("sizeSelect");

        // Chọn phần tử đầu tiên làm kích thước mặc định
        sizeSelect.selectedIndex = 0;

        // Gọi hàm cập nhật khi trang web được tải
        updateProductInfo();
    });


    function updateAddToCartLink() {
        var detailProducts = <?php echo json_encode($OneDtProduct); ?>;

        document.addEventListener("DOMContentLoaded", function() {
            const selectedSize = document.getElementById("sizeSelect").value;

            var selectedProduct = detailProducts.find(function(product) {
                return product.size === selectedSize;
            });
            if (!selectedProduct) {
                selectedProduct = detailProducts[0];
                document.getElementById("sizeSelect").value = selectedProduct.size;
            }

            updatePrice();
        });

        function updatePrice() {
            var boxSize = document.querySelector(".product_detail_size");
            var boxSale = document.querySelector(".product_detail_sale");
            var sizeSelect = document.getElementById("sizeSelect");
            var originalPriceElement = document.getElementById("originalPrice");
            var salePriceElement = document.getElementById("salePrice");
            var savingsElement = document.getElementById("savings");

            // console.log(sizeBig);

            var selectedSize = sizeSelect.value;
            var selectedProduct = detailProducts.find(product => product.size === selectedSize);

            // Kiểm tra xem có thông tin về kích thước hay không
            if (!selectedProduct || !selectedProduct.size) {
                // console.log("Không có thông tin về kích thước cho sản phẩm này");
                // console.log(selectedProduct.sale_price);
                // Kiểm tra xem có giá gốc và giảm giá hay không
                if (selectedProduct.sale_price > 0) {
                    // console.log(1);
                    // Nếu có giá gốc và giảm giá, tính giá và giảm giá bình thường
                    var originalPrice = selectedProduct.base_price;
                    var salePercentage = selectedProduct.sale_price;
                    var salePrice = originalPrice * (1 - salePercentage / 100);
                    var savings = originalPrice - salePrice;

                    originalPriceElement.innerHTML = formatPrice(originalPrice);
                    salePriceElement.innerHTML = formatPrice(salePrice);
                    savingsElement.innerHTML = " (Tiết kiệm: " + formatPrice(savings) + ")";
                    originalPriceElement.style.textDecoration = "line-through";
                    salePriceElement.style.display = "inline";
                    savingsElement.style.display = "inline";
                    boxSize.style.display = "none";
                } else {
                    // Nếu không có thông tin về giá, ẩn các phần tử và thoát

                    originalPriceElement.innerHTML = formatPrice(selectedProduct.base_price);
                    salePriceElement.style.display = "inline";
                    document.getElementById("text_priceBase").style.fontWeight = "500";
                    document.getElementById("text_priceBase").style.fontSize = "1.4rem";
                    document.getElementById("text_priceBase").style.fontWeight = "500";
                    originalPriceElement.style.textDecoration = "none";
                    boxSize.style.display = "none";
                    boxSale.style.display = "none";
                    return;
                }
            } else {
                // Có thông tin về kích thước, kiểm tra xem có giảm giá hay không
                if (selectedProduct.sale_price > 0) {
                    var originalPrice = selectedProduct.base_price;
                    var salePercentage = selectedProduct.sale_price;
                    var salePrice = originalPrice * (1 - salePercentage / 100);
                    var savings = originalPrice - salePrice;

                    originalPriceElement.innerHTML = formatPrice(originalPrice);
                    salePriceElement.innerHTML = formatPrice(salePrice);
                    savingsElement.innerHTML = " (Tiết kiệm: " + formatPrice(savings) + ")";
                    originalPriceElement.style.textDecoration = "line-through";
                    salePriceElement.style.display = "inline";
                    savingsElement.style.display = "inline";
                } else {
                    originalPriceElement.innerHTML = formatPrice(selectedProduct.base_price);
                    salePriceElement.innerHTML = "";
                    savingsElement.innerHTML = "";

                    originalPriceElement.style.textDecoration = "none";
                    salePriceElement.style.display = "none";
                    document.getElementById("text_priceBase").style.fontWeight = "500";
                    document.getElementById("text_priceBase").style.fontSize = "1.4rem";
                    document.getElementById("text_priceSale").style.display = "none";
                    document.querySelector(".product_detail_catalogName").style.display = "none";
                    savingsElement.style.display = "none";
                }
            }
        }

        function formatPrice(price) {
            // Hàm định dạng giá giống như trong ví dụ trước
            return number_format(price, 0, ",", ".") + ' đ';
        }

        function number_format(number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep,
                dec = (typeof decPoint === 'undefined') ? '.' : decPoint,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };

            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }

            return s.join(dec);
        }
    }
</script>
<script>
    var detailProducts = <?php echo json_encode($OneDtProduct); ?>;

    document.addEventListener("DOMContentLoaded", function() {
        const selectedSize = document.getElementById("sizeSelect").value;

        var selectedProduct = detailProducts.find(function(product) {
            return product.size === selectedSize;
        });
        if (!selectedProduct) {
            selectedProduct = detailProducts[0];
            document.getElementById("sizeSelect").value = selectedProduct.size;
        }

        updatePrice();
    });

    function updatePrice() {
        var boxSize = document.querySelector(".product_detail_size");
        var boxSale = document.querySelector(".product_detail_sale");
        var sizeSelect = document.getElementById("sizeSelect");
        var originalPriceElement = document.getElementById("originalPrice");
        var salePriceElement = document.getElementById("salePrice");
        var savingsElement = document.getElementById("savings");

        // console.log(sizeBig);

        var selectedSize = sizeSelect.value;
        var selectedProduct = detailProducts.find(product => product.size === selectedSize);

        // Kiểm tra xem có thông tin về kích thước hay không
        if (!selectedProduct || !selectedProduct.size) {
            // console.log("Không có thông tin về kích thước cho sản phẩm này");
            // console.log(selectedProduct.sale_price);
            // Kiểm tra xem có giá gốc và giảm giá hay không
            if (selectedProduct.sale_price > 0) {
                // console.log(1);
                // Nếu có giá gốc và giảm giá, tính giá và giảm giá bình thường
                var originalPrice = selectedProduct.base_price;
                var salePercentage = selectedProduct.sale_price;
                var salePrice = originalPrice * (1 - salePercentage / 100);
                var savings = originalPrice - salePrice;

                originalPriceElement.innerHTML = formatPrice(originalPrice);
                salePriceElement.innerHTML = formatPrice(salePrice);
                savingsElement.innerHTML = " (Tiết kiệm: " + formatPrice(savings) + ")";
                originalPriceElement.style.textDecoration = "line-through";
                salePriceElement.style.display = "inline";
                savingsElement.style.display = "inline";
                boxSize.style.display = "none";
            } else {
                // Nếu không có thông tin về giá, ẩn các phần tử và thoát

                originalPriceElement.innerHTML = formatPrice(selectedProduct.base_price);
                salePriceElement.style.display = "inline";
                document.getElementById("text_priceBase").style.fontWeight = "500";
                document.getElementById("text_priceBase").style.fontSize = "1.4rem";
                document.getElementById("text_priceBase").style.fontWeight = "500";
                originalPriceElement.style.textDecoration = "none";
                boxSize.style.display = "none";
                boxSale.style.display = "none";
                return;
            }
        } else {
            // Có thông tin về kích thước, kiểm tra xem có giảm giá hay không
            if (selectedProduct.sale_price > 0) {
                var originalPrice = selectedProduct.base_price;
                var salePercentage = selectedProduct.sale_price;
                var salePrice = originalPrice * (1 - salePercentage / 100);
                var savings = originalPrice - salePrice;

                originalPriceElement.innerHTML = formatPrice(originalPrice);
                salePriceElement.innerHTML = formatPrice(salePrice);
                savingsElement.innerHTML = " (Tiết kiệm: " + formatPrice(savings) + ")";
                originalPriceElement.style.textDecoration = "line-through";
                salePriceElement.style.display = "inline";
                savingsElement.style.display = "inline";
            } else {
                originalPriceElement.innerHTML = formatPrice(selectedProduct.base_price);
                salePriceElement.innerHTML = "";
                savingsElement.innerHTML = "";

                originalPriceElement.style.textDecoration = "none";
                salePriceElement.style.display = "none";
                document.getElementById("text_priceBase").style.fontWeight = "500";
                document.getElementById("text_priceBase").style.fontSize = "1.4rem";
                document.getElementById("text_priceSale").style.display = "none";
                document.querySelector(".product_detail_catalogName").style.display = "none";
                savingsElement.style.display = "none";
            }
        }
    }

    function formatPrice(price) {
        // Hàm định dạng giá giống như trong ví dụ trước
        return number_format(price, 0, ",", ".") + ' đ';
    }

    function number_format(number, decimals, decPoint, thousandsSep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep,
            dec = (typeof decPoint === 'undefined') ? '.' : decPoint,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }

        return s.join(dec);
    }
</script>
<!-- // Hàm xử lý sự kiện onchange  -->
<script>
    // Hàm xử lý sự kiện onchange
    function updateAddToCartLink() {
        // Lấy giá trị đã chọn từ dropdown
        var selectedSize = document.getElementById('sizeSelect').value;

        // Lấy thẻ a để cập nhật thông tin
        var addToCartLink = document.getElementById('addToCartLink');

        // Cập nhật href của thẻ a với thông tin kích thước đã chọn
        addToCartLink.href = '<?= APPURL ?>?url=Product/addTooCart/<?= $OneProduct['id_product'] ?>/' + selectedSize;

        // Thực hiện các hành động khác nếu cần
    }
</script>