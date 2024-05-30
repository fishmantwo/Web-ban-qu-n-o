<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
// Dữ liệu mẫu về doanh số bán hàng theo tháng
$dataPoints = [];
foreach ($loadstatisticsProduct as $data) {
    $dataPoints[] = [
        'nameProduct' => $data['nameProduct'],
        'qtysold' => $data['qtysold'],

    ];
}

// Chuyển định dạng dữ liệu sang JSON để truyền vào JavaScript
$salesDataJSON = json_encode($dataPoints);
?>
<canvas id="myLineChart" width="400" height="200"></canvas>

<script>
    // Sử dụng dữ liệu PHP đã chuyển định dạng sang JSON
    var dataPoints = <?php echo $salesDataJSON; ?>;

    // Tạo biểu đồ đường bằng Chart.js
    var ctx = document.getElementById('myLineChart').getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dataPoints.map(item => item.nameProduct),
            datasets: [{
                label: 'sản phẩm đã bán ra',
                data: dataPoints.map(item => item.qtysold),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>