<?php 
    include 'connect.php';
    if(isset($_POST['query'])) {
        $inputText = $_POST['query'];
        $sql = $conn->query("SELECT nameproduct FROM tbl_product WHERE nameproduct LIKE '%".$inputText."%' ");
        $result = $sql->fetch_object();
        if ($result) {
                echo '<a class="list-group-item list-group-item-action border-1">'.$result->nameproduct.'</a>';
            
        }else {
            echo '<p class="list-group-item border-1">ไม่พบข้อมูล</p>';
        }
    }

?>