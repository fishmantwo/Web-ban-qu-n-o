<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
       

        .container-box {
            max-width: 400px;
            margin: 50px auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
<section>
            <div class="container-box">
                <h2 class="text-center mb-4">Đăng Ký</h2>
                <form action="<?=APPURL?>?url=user/userRegister" id="registrationForm" method="post">
                    <div class="form-group">
                        <label for="fullName">Họ và Tên:</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" >
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>

                    <div class="form-group">
                        <label for="password">Mật Khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password" >
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="far fa-eye" id="togglePassword" onclick="togglePassword()"></i>
                        </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Số điện thoại:</label>
                        <input type="text" class="form-control" id="email" name="phone" >
                    </div>

                    <div class="form-group">
                        <label for="address">Địa Chỉ:</label>
                        <textarea class="form-control" id="address" name="address" rows="3" ></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                </form>
                <!-- <h2 class="text-success">
                    <?php
                    
                        if(isset($thongBao) && $thongBao!="") {
                            echo $thongBao;
                        }
                    ?>
                </h2> -->
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script>
                // Bổ sung đoạn mã JavaScript để xử lý validation (nếu cần)
                document.getElementById('registrationForm').addEventListener('submit', function (event) {
                    var form = event.target;
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
                function togglePassword() {
                    var passwordField = document.getElementById('password');
                    var toggleIcon = document.getElementById('togglePassword');

                    if (passwordField.type === 'password') {
                        passwordField.type = 'text';
                        toggleIcon.classList.remove('far', 'fa-eye');
                        toggleIcon.classList.add('far', 'fa-eye-slash');
                    } else {
                        passwordField.type = 'password';
                        toggleIcon.classList.remove('far', 'fa-eye-slash');
                        toggleIcon.classList.add('far', 'fa-eye');
                    }
                }

            </script>
        </section>