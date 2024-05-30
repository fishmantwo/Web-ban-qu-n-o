<style>
    section {
      position: relative;
      border: 1px solid #000;
      padding-top: 37px;
    }

    .table-contai {
      overflow-y: auto;
      height: 254px;
    }

    table {
      border-spacing: 0;
      width: 100%;
    }

    td {
      border-bottom: 1px solid #eee;
      background: #ddd;
      color: #000;
      padding: 10px 25px;
    }

    td+td {
      border-left: 1px solid #eee;
    }

    th {
      border-bottom: 1px solid #eee;
      background: #ddd;
      padding: 10px 25px;
      height: 0;
      line-height: 0;
      padding-top: 0;
      padding-bottom: 0;
      color: transparent;
      border: none;
      white-space: nowrap;
    }

    th .table-th {
      position: absolute;
      background: transparent;
      color: #fff;
      padding: 9px 25px;
      top: 0;
      margin-left: -25px;
      line-height: normal;
    }

    th:first-child .table-th {
      border: none;
    }
</style>
<!-- Nội dung -->
<div class="col-md-10 bg-gray">
    <!-- thanh sreach -->
    <div class="row mb-3">
        <div class="d-flex justify-content-between p-4 ">
            <div class="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm" aria-label="Nhập từ khóa tìm kiếm" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="button-addon2">Tìm Kiếm</button>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <path d="M29.6967 22.2127C28.7933 20.7794 27.451 16.7368 27.451 11.4787C27.451 8.43436 26.1394 5.51471 23.8046 3.36203C21.4699 1.20936 18.3034 0 15.0016 0C11.6998 0 8.53326 1.20936 6.19855 3.36203C3.86383 5.51471 2.5522 8.43436 2.5522 11.4787C2.5522 16.7383 1.20831 20.7794 0.304928 22.2127C0.106719 22.5257 0.00154465 22.8813 1.68848e-05 23.2437C-0.00151088 23.6061 0.100662 23.9625 0.296226 24.2768C0.491791 24.5912 0.773826 24.8524 1.11387 25.0342C1.45392 25.2159 1.83994 25.3118 2.23299 25.312H9.01312C9.24572 26.6209 9.97535 27.811 11.0717 28.6698C12.1681 29.5285 13.5598 30 14.9984 30C16.437 30 17.8287 29.5285 18.9251 28.6698C20.0215 27.811 20.7511 26.6209 20.9837 25.312H27.7702C28.163 25.3112 28.5486 25.215 28.8882 25.0331C29.2278 24.8511 29.5094 24.5898 29.7046 24.2756C29.8998 23.9613 30.0016 23.6051 30 23.243C29.9983 22.8808 29.8931 22.5255 29.6951 22.2127H29.6967ZM15.0016 28.2553C14.0677 28.255 13.1613 27.9643 12.4288 27.4302C11.6963 26.8961 11.1806 26.1498 10.9651 25.312H19.0381C18.8226 26.1498 18.3069 26.8961 17.5744 27.4302C16.8419 27.9643 15.9355 28.255 15.0016 28.2553ZM28.0431 23.3989C28.0168 23.444 27.9776 23.4815 27.9298 23.5075C27.882 23.5334 27.8273 23.5468 27.7718 23.546H2.23299C2.17748 23.5468 2.12283 23.5334 2.07499 23.5075C2.02714 23.4815 1.98794 23.444 1.96165 23.3989C1.93364 23.3541 1.91889 23.3034 1.91889 23.2517C1.91889 23.2001 1.93364 23.1493 1.96165 23.1046C3.16988 21.1914 4.46749 16.7309 4.46749 11.4787C4.46749 8.90272 5.57733 6.43224 7.55286 4.61075C9.52839 2.78926 12.2078 1.76595 15.0016 1.76595C17.7954 1.76595 20.4748 2.78926 22.4503 4.61075C24.4259 6.43224 25.5357 8.90272 25.5357 11.4787C25.5357 16.7295 26.8349 21.1841 28.0431 23.1046C28.0711 23.1493 28.0859 23.2001 28.0859 23.2517C28.0859 23.3034 28.0711 23.3541 28.0431 23.3989Z" fill="black" />
                    </svg>
                </div>
                <div class="">
                    <img src="../public/img/<?=$loadOneUser['img_user']?>" class=" rounded-circle" style="width:45px; height:45px;" alt="">
                </div>

            </div>
        </div>
    </div>