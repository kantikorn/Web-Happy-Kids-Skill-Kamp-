<?php 
echo '<script src="../js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" integrity="sha512-t89+ZHqiI+cJO2EZ1zy846TMzc7K0VH22insNeb32hMoVymAMd0aYeLzmNF4WuRLDUXPVo6dzbZ1zI7MBWlqlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
session_start();
    include 'connect.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'addnew':
                $sql = $conn->query("INSERT INTO tbl_review(re_user,feedback,comment,re_date,re_product,order_id) VALUES('".$_SESSION['user_id']."','".$_REQUEST['feedback']."','".$_REQUEST['comment']."',now(),'".$_REQUEST['re_product']."','".$_REQUEST['order_id']."') ");
                if ($sql) {
                    echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Successfully",
                            text: "Reviews success",
                            type: "success"
                        },function(){
                            window.location="../history.php";
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