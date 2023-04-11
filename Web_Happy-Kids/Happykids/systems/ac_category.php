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
                    move_uploaded_file($_FILES['imgproduct']['tmp_name'],'../image/category/'.$newname);
                }
                $sql = $conn->query("INSERT INTO tbl_category(cat_name,images) VALUES('".$_REQUEST['nameproduct']."','".$newname."') ");
                if ($sql) {
                        echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Successfully",
                            text: "เพิ่มหมวดหมู่สินค้าสำเร็จ",
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
                case 'del':
                    if (isset($_GET['delete_cate'])) {
                        $sql = $conn->query("DELETE FROM tbl_category WHERE id='".$_GET['delete_cate']."' ");
                        if ($sql) {
                            echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Successfully",
                                text: "ลบหมวดหมู่สินค้าสำเร็จ",
                                type: "success"
                            },function(){
                                window.location="../admin.php";
                            })
                        },500);
                        
                    </script>';
                    }else {
                        echo 'Error'.$conn->error;
                    }
                    }
                    break;
                    case 'edit':
                        $sql_select = $conn->query("SELECT * FROM tbl_category WHERE id='".$_REQUEST['id']."' ");
                        $fet_select = $sql_select->fetch_object();
                        if (isset($_FILES['images']['name'])) {
                            $tmp = explode('.',$_FILES['images']['name']);
                            $new_name = round(microtime(true)*9999).'.'.end($tmp);
                            move_uploaded_file($_FILES['images']['tmp_name'],'../image/category/'.$new_name);
                        }
                        if ($_FILES['images']['name'] == '') {
                            $new_name = $fet_select->images;
                        }
                        $sql = $conn->query("UPDATE tbl_category SET cat_name='".$_REQUEST['cat_name']."',images='".$new_name."' WHERE id='".$_REQUEST['id']."' ");
                        if ($sql) {
                            echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Successfully",
                                text: "แก้ไขหมวดหมู่สินค้าสำเร็จ",
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
            
            
        }
    } 

?>