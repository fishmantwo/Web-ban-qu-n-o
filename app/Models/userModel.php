<?php
class userModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function __destruct()
    {
        unset($this->db);
    }
    public function getAll()
    {
        return $this->db->pdo_query(
            "SELECT * FROM user"
        );
    }
    public function Login($email, $password)
    {
        return $this->db->pdo_query_one(
            "SELECT * FROM user WHERE email_user = '$email' AND pass = '$password'"
        );
    }
    public function Resgiter($email, $password, $fullname, $address, $phone) {
        // bắt lỗi người dùng không được để rỗng
        if(empty($address)&&empty($email)&&empty($password)&&empty($fullname)&&empty($address)&&empty($phone)) {
            echo '<script>alert("Bạn không được để rỗng")</script>';
        }else{
            // bắt lỗi email 
           
                $kiemTraEmail = $this->db->pdo_query_one("SELECT * FROM user WHERE email_user = ?", $email);
                if($kiemTraEmail) {
                    echo '<script>alert("Email của bạn đã tồn tại")</script>';
                }else{
                    // kiểm tra sô điện thoại
                    $KiemTraPhone = $this->db->pdo_query_one("SELECT * FROM user WHERE 	phoneNumber_user = ?", $phone);
                    if($KiemTraPhone) { 
                        echo '<script>alert("Số điện thoại này của bạn đã tồn tại")</script>';
                    }else{
                        // mất khẩu ít nhất có 1 chữ viết hoa
                        if(!preg_match('/[A-Z]/', $password)){
                            echo '<script>alert("Mật khẩu ít nhất có 1 chữ viết hoa")</script>';
                        }else{
                            echo '<script>alert("Đăng kí thành công nha ")</script>';
                            return $this->db->pdo_execute(
                                "INSERT into user (email_user, pass, name_user, address, phoneNumber_user) VALUES ('$email', '$password', '$fullname', '$address', '$phone')"
                            );
                        }
                    }
                }
            
            
        }
      
    }
    // check đăng ksi user
    // function handleRegistration() {
    //     if (isset($_POST['registerNew']) && ($_POST['registerNew'])) {
    //         $phone = $_POST['phone'];
    //         $pass = $_POST['pass'];
    //         $interPass = $_POST['interPass'];

    //         $sql = "SELECT * FROM user WHERE phone = ? AND role_user = 3";
    //         $roloUser = $this->db->pdo_query_one($sql, $phone);

    //         if( $roloUser){
    //             $thongbao="Tài khoản bị chặn";
    //         }else{

    //             if (empty($phone) || empty($pass) || empty($interPass)) {
    //                 $thongbao = "Vui lòng điền đầy đủ thông tin.";
    //             } else {
    //                 $sql = "SELECT * FROM user WHERE phone = ? ";
    //                 $existingidUser = $this->db->pdo_query_one($sql, $phone);
    //                 if($existingidUser){
    //                     $thongbao="Trùng số điện thoại";
    //                 }else{
    //                     if (!preg_match("/^(0[3|5|7|8|9])+([0-9]{8})$/", $phone)) {
    //                         $thongbao = "Số điện thoại của bạn không hợp lệ.";
    //                     } else {
    //                         if (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]{6,}$/", $pass) && !preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]{6,}$/", $interPass)) {
    //                             $thongbao = "Mật khẩu phải có ít nhất 6 ký tự (chữ và số) nhiều nhất là 12 kí tự.";
    //                         } else {
    //                             if ($pass == $interPass) {
    //                                 insetUser($phone,$pass);
    //                                 $thongbao = "Đăng ký thành công";
    //                             } else {
    //                                 $thongbao = "Mật khẩu không trùng nhau";
    //                             }
    //                         }
    //                     }
    //                 }

    //             }
    //         }

    //     }
    //     require_once "view/register.php";

    // }
    public function loadOneUser($id_user)
    {
        return $this->db->pdo_query_one(
            "SELECT * FROM user WHERE id_user = ?",
            $id_user
        );
    }
    public function UpdateProFile($name, $address, $email, $id_user)
    {
        return $this->db->pdo_execute(
            "UPDATE user SET name_user = ?, address = ?, email_user= ? WHERE id_user= ?",
            $name,
            $address,
            $email,
            $id_user
        );
    }
    public function insertImgUser($imgUser, $id_User) {
        if($imgUser == "") {
            echo "chưa chọn ảnh";
        }else{
            
            return $this->db->pdo_execute(
                "UPDATE user SET img_user = ? WHERE id_user = ?",$imgUser, $id_User
            );
        }
    }
}
