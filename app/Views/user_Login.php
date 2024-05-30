<section>
  <div class="container page-content-account">
    <div class="d-group">
      <div class="left-col">
        <h1 class="text-center">Đăng nhập</h1>
        <div class="container mt-5">
          <form id="loginForm" class="needs-validation" novalidate method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Email:</label>
              <input type="email" class="form-control" id="username" name="email" required>
              <div class="invalid-feedback">
                Vui lòng nhập Email.
              </div>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu:</label>
              <input type="password" class="form-control" id="password" name="password" required>
              <div class="invalid-feedback">
                Vui lòng nhập mật khẩu.
              </div>
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
            </div>

            <button class="btn btn-primary" type="submit">Đăng nhập</button>

            <div class="mt-3">
              <a href="#" class="text-decoration-none">Quên mật khẩu?</a>
            </div>
          </form>

          <div class="mt-3">
            <p>Chưa có tài khoản? <a href="<?= APPURL ?>?url=user/userRegister" class="text-decoration-none">Đăng ký ngay!</a></p>
          </div>
        </div>

        <!-- Bao gồm Bootstrap JS và Popper.js nếu cần -->
        <script src="path/to/popper.min.js"></script>
        <script src="path/to/bootstrap.min.js"></script>

        <!-- JavaScript để xử lý validation -->
        <script>
          // Sử dụng JavaScript để xử lý validation
          (function() {
            'use strict';

            // Lắng nghe sự kiện submit của form
            var form = document.getElementById('loginForm');
            form.addEventListener('submit', function(event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add('was-validated');
            }, false);
          })();
        </script>
      </div>
    </div>
  </div>
</section>