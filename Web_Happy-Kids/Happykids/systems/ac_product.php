<?php
echo '<script src="../js/jquery-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" integrity="sha512-t89+ZHqiI+cJO2EZ1zy846TMzc7K0VH22insNeb32hMoVymAMd0aYeLzmNF4WuRLDUXPVo6dzbZ1zI7MBWlqlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />';


    include 'connect.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'addnew':
                if (isset($_FILES['imgproduct']['name'])) {
                    $temp = explode('.',$_FILES['imgproduct']['name']);
                    $newname = round(microtime(true)*9999).'.'.end($temp);
                    move_uploaded_file($_FILES['imgproduct']['tmp_name'],'../image/product/'.$newname);
                }
                $sql = $conn->query("INSERT INTO tbl_product(nameproduct,product_price,category,imgproduct) VALUES('".$_REQUEST['nameproduct']."','".$_REQUEST['price']."','".$_REQUEST['category']."','".$newname."') ");
                if ($sql) {
                    echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Successfully",
                            text: "เพิ่มรายการสินค้าสำเร็จ",
                            type: "success"
                        },function(){
                            window.location="../admin.php";
                        })
                    },500);
                    
                </script>';
                }else {
                    echo 'Error'.$conn->error;
                }
                break;
                case 'edit':
                    $sql_select = $conn->query("SELECT * FROM tbl_product WHERE product_id='".$_REQUEST['product_id']."' ");
                    $fet_select = $sql_select->fetch_object();
                    if (isset($_FILES['imgproduct']['name'])) {
                        $tmp = explode('.',$_FILES['imgproduct']['name']);
                        $new_name = round(microtime(true)*9999).'.'.end($tmp);
                        move_uploaded_file($_FILES['imgproduct']['tmp_name'],'../image/product/'.$new_name);
                    }
                    if ($_FILES['imgproduct']['name'] == '') {
                       $new_name = $fet_select->imgproduct;
                    }
                    $sql = $conn->query("UPDATE tbl_product SET nameproduct='".$_REQUEST['nameproduct']."',product_price='".$_REQUEST['price']."',category='".$_REQUEST['category']."',imgproduct='".$new_name."' WHERE product_id='".$_REQUEST['product_id']."' ");
                    if ($sql) {
                        echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Successfully",
                                text: "แก้ไขรายการสินค้าสำเร็จ",
                                type: "success"
                            },function(){
                                window.location="../preview.php";
                            })
                        },500);
                        
                    </script>';
                    }else {
                        echo 'Error'.$conn->error;
                    }
                    break;
                    case 'del':
                        if (isset($_GET['delete'])) {
                            $sql = $conn->query("DELETE FROM tbl_product WHERE product_id='".$_GET['delete']."' ");
                            if ($sql) {
                                echo '<script>
                            setTimeout(function(){
                                swal({
                                    title: "Successfully",
                                    text: "ลบรายการสินค้าสำเร็จ",
                                    type: "success"
                                },function(){
                                    window.location="../preview.php";
                                })
                            },500);
                            
                        </script>';
                        }else {
                            echo 'Error'.$conn->error;
                        }
                        }
        }
        # code...
    }
?>