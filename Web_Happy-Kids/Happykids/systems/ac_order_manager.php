<?php 
echo '<script src="../js/jquery-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" integrity="sha512-t89+ZHqiI+cJO2EZ1zy846TMzc7K0VH22insNeb32hMoVymAMd0aYeLzmNF4WuRLDUXPVo6dzbZ1zI7MBWlqlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
session_start();
    include 'connect.php';
    if (isset($_REQUEST['ac'])) {
       switch ($_REQUEST['ac']) {
        case 'add':
            if (isset($_FILES['payment']['name'])) {
                $tmp = explode('.',$_FILES['payment']['name']);
                $new_name = round(microtime(true)*9999).'.'.end($tmp);
                move_uploaded_file($_FILES['payment']['tmp_name'],"../image/payment/".$new_name);
            }
            $sql_add = $conn->query("INSERT INTO tbl_order(cus_name,total_price,order_status,order_date,slip_payment,address) VALUES('".$_SESSION['user_id']."','".$_REQUEST['sum_total']."','1',now(),'".$new_name."','".$_REQUEST['address']."') ");
            $sql_select = $conn->query("SELECT MAX(order_id) AS order_max FROM tbl_order WHERE cus_name = '".$_SESSION['user_id']."' ");
            $fet_max = $sql_select->fetch_object();
            $sql_update = $conn->query("UPDATE tbl_cart SET order_id='".$fet_max->order_max."' WHERE ca_user='".$_SESSION['user_id']."' AND order_id <= 0 ");
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Successfully",
                            text: "สั่งสินค้าสำเร็จ",
                            type: "success"
                        },function(){
                            window.location="../index.php";
                        })
                    },500);
                    
                </script>';
            break;
            case 'confirm':
                $sql = $conn->query("UPDATE tbl_order SET order_status = '2' WHERE order_id='".$_REQUEST['order_id']."' ");
                if ($sql) {
                    echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Successfully",
                            text: "Confirm success",
                            type: "success"
                        },function(){
                            window.location="../Order_Detail.php";
                        })
                    },500);
                    
                </script>';
                }else {
                    echo 'Error'.$conn->error;
                }
                break;
            case 'cancel':
                $sql = $conn->query("UPDATE tbl_order SET order_status = '3' WHERE order_id='".$_REQUEST['order_id']."' ");
                if ($sql) {
                    echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Successfully",
                            text: "Cancel success",
                            type: "success"
                        },function(){
                            window.location="../Order_Detail.php";
                        })
                    },500);
                    
                </script>';
                }else {
                    echo 'Error'.$conn->error;
                }
                break;
       }
    }
?>