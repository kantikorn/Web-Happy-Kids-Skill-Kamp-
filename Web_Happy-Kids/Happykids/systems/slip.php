<?php
include 'connect.php';
    $id = $_POST['orderId'];
    $sql = $conn->query("SELECT * FROM tbl_order WHERE order_id='".$id."' ");
    while ($fet_slip = $sql->fetch_object()) {
       
?>
<img src="image/payment/<?php echo $fet_slip->slip_payment;?>" class="d-block mx-auto" style="width:75%; height:400px;">
<?php }?>