<?php 
session_start();
echo '<script src="../js/jquery-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" integrity="sha512-t89+ZHqiI+cJO2EZ1zy846TMzc7K0VH22insNeb32hMoVymAMd0aYeLzmNF4WuRLDUXPVo6dzbZ1zI7MBWlqlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
include 'connect.php';
    $sql_hash = $conn->query("SELECT * FROM tbl_user WHERE email = '".$_REQUEST['email']."'");
    $fet_hash = $sql_hash->fetch_object();
    $check = $sql_hash->num_rows;
    if ($check == 1) {
        $store_password = $fet_hash->password;
    $inputPassword = $_REQUEST['password'];
    if(password_verify($inputPassword , $store_password)) {
        $sql = $conn->query("SELECT * FROM tbl_user WHERE email='".$_REQUEST['email']."'");
        $num = $sql->num_rows;
        $fet_login = $sql->fetch_object();
        if ($num <= 0 ) {
            echo '<script>
                setTimeout(function(){
                    swal({
                        title: "Login failed",
                        text: "เข้าสู่ระบบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง",
                        type: "error"
                    },function(){
                        window.location="../login.html";
                    })
                },500);
                
            </script>';
        }else{
            $_SESSION['sess_id'] = session_id();
            $_SESSION['user_id'] = $fet_login->id;
            $_SESSION['email'] = $fet_login->email;
            $_SESSION['firstname'] = $fet_login->firstname;
            $_SESSION['lastname'] = $fet_login->lastname;
    
            if ($fet_login->role == 1) {
                echo '<script>
                setTimeout(function(){
                    swal({
                        title: "Login Successfully",
                        text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ Admin",
                        type: "success"
                    },function(){
                        window.location="../admin.php";
                    })
                },500);
                
            </script>';
            }else{
                echo '<script>
                setTimeout(function(){
                    swal({
                        title: "Login Successfully",
                        text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ user",
                        type: "success"
                    },function(){
                        window.location="../index.php";
                    })
                },500);
                
            </script>';
            }
        }
    }else{
        echo '<script>
                setTimeout(function(){
                    swal({
                        title: "Login failed",
                        text: "เข้าสู่ระบบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง",
                        type: "error"
                    },function(){
                        window.location="../login.html";
                    })
                },500);
                
            </script>';
    }
    }

   
?>