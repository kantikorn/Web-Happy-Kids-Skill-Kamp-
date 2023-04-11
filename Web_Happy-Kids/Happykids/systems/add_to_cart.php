<?php
echo '<script src="../js/jquery-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" integrity="sha512-t89+ZHqiI+cJO2EZ1zy846TMzc7K0VH22insNeb32hMoVymAMd0aYeLzmNF4WuRLDUXPVo6dzbZ1zI7MBWlqlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />';

session_start();
    include 'connect.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'add_cart':
                $sql_select = $conn->query("SELECT ca_product FROM tbl_cart WHERE ca_product='".$_REQUEST['product_id']."' AND order_id <= 0 ");
    $num = $sql_select->num_rows;
    if ($num <= 0) {
        $sql_add = $conn->query("INSERT INTO tbl_cart(ca_product,ca_user,ca_qty) VALUES('".$_REQUEST['product_id']."','".$_SESSION['user_id']."','1') ");
        if ($sql_add) {
            echo '<script>
        setTimeout(function(){
            swal({
                title: "Successfully",
                text: "เพิ่มสินค้าเข้าสู่ตะกร้าของคุณแล้ว",
                type: "success"
            },function(){
                window.location="../purchase.php";
            })
        },500);
        
    </script>';
    }else {
        echo 'Error'.$conn->error;
    }
        
    }else {
        $sql_update = $conn->query("UPDATE tbl_cart SET ca_qty = ca_qty + '1' WHERE ca_product='".$_REQUEST['product_id']."'");
        header("location: ../purchase.php");
    }
    break;
    case 'next_qty':
        $sql = $conn->query("UPDATE tbl_cart SET ca_qty = ca_qty + '1' WHERE ca_id='".$_REQUEST['ca_id']."'");
        if ($sql) {
            header("location:../purchase.php");
     }else {
         echo 'Error'.$conn->error;
     }
        break;
        case 'cancel':
            $sql = $conn->query("DELETE FROM tbl_cart WHERE ca_id='".$_REQUEST['ca_id']."' ");
            if ($sql) {
                echo '<script>
            setTimeout(function(){
                swal({
                    title: "Successfully",
                    text: "ลบรายการสินค้าออกจากตะกร้าเรียบร้อย",
                    type: "success"
                },function(){
                    window.location="../purchase.php";
                })
            },500);
            
        </script>';
        }else {
            echo 'Error'.$conn->error;
        }
            break;
            case 'reverse':
                $sql = $conn->query("UPDATE tbl_cart SET ca_qty = ca_qty - '1' WHERE ca_id='".$_REQUEST['ca_id']."'");
                if ($sql) {
                   header("location:../purchase.php");
            }else {
                echo 'Error'.$conn->error;
            }
                break;
                case 'next_page':
                    echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Successfully",
                            text: "ดำเนินการทำรายการสำเร็จ",
                            type: "success"
                        },function(){
                            window.location="../detail_purchase.php";
                        })
                    },500);
                    
                </script>';
                    break;
        }
    }
?>