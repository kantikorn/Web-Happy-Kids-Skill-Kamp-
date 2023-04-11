<?php 
session_start();
    include 'systems/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History||Happy kids</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css">
</head>
<body>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/loginbanner.jpg" alt="Logo" width="80" height="80" class="d-inline-block align-text-top rounded-circle">
    </a>
    <div class="justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">กลับหน้าแรก</a></li>
        </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
    <?php 
        $sql_history = $conn->query("SELECT * FROM tbl_order WHERE tbl_order.cus_name = '".$_SESSION['user_id']."' AND tbl_order.order_status = '2' ");
        while ($fet_history = $sql_history->fetch_object()) {
            $sql_product = $conn->query("SELECT tbl_product.nameproduct,tbl_product.product_price,tbl_product.imgproduct,tbl_cart.ca_product,tbl_cart.ca_qty FROM tbl_cart LEFT JOIN tbl_product ON tbl_product.product_id = tbl_cart.ca_product WHERE tbl_cart.order_id='".$fet_history->order_id."'");
            $count_product = $sql_product->num_rows;
    ?>  
        <div class="col mt-5 mb-5">
            <div class="card text-center" style="width: 500px;">
                <div class="card-header">
                    <p class="card-title">ประวัติการสั่งสินค้า</p>
                </div>
                <div class="card-body">
                    <h4 class="card-text">Order id : <?php echo $fet_history->order_id;?></h4>
                    <div class="row ">
                        <?php
                        while ($fet = $sql_product->fetch_object()) {
                            
                            ?> 
                            <div class="col-4 mx-auto">
                                <img src="image/product/<?php echo $fet->imgproduct;?>" alt="product images" width="150" height="150" class="rounded d-block mx-auto">
                                <h4 class="card-text mt-3"><?php echo $fet->nameproduct;?></h4>
                                <p class="card-text"><?php echo $fet->product_price;?> บาท</p>
                                <p class="card-text">จำนวน <?php echo $fet->ca_qty?> ชื้น</p>
                            </div>
                            <?php }?>
                        </div>
                        <p class="card-text">ราคาทั้งหมด <?php echo $fet_history->total_price;?> บาท</p>
                        <p class="card-text"><?php echo $fet_history->order_date;?></p>
                    <?php 
                        $sql_review = $conn->query("SELECT * FROM tbl_review WHERE tbl_review.order_id = '".$fet_history->order_id."'");
                        $num = $sql_review->num_rows;
                        if ($num <= 0) {
                           
                    ?>
                    <button class="btn btn-primary btn-sm" id="btn-reviews" data-bs-toggle="modal" data-bs-target="#modal-review" data-id="<?php echo $fet_history->product_id;?>" data-order="<?php echo $fet_history->order_id; ?>">Reviews product</button>
                    <?php }else{ ?>
                        <p class="card-text">รีวิวรายการนี้แล้ว</p>
                        <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="modal fade" id="modal-review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" >
          <h5 class="modal-title" id="exampleModalLabel">Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body text-center">
            <i class="far fa-file-alt fa-4x mb-3 animated rotateIn icon1"></i>
            <h3>Review Product</h3>
            <h5><strong>Give us your feedback.</strong></h5>
            <hr>
           
          </div>
    
          <!-- Radio Buttons for Rating-->
          <form action="systems/ac_reviews.php?ac=addnew" method="post">
            <input type="hidden" name="re_product" id="re_product1">
            <input type="hidden" name="order_id" id="order_id1">
          <div class="form-check mb-4">
            <input name="feedback" value="5" type="radio">
            <label class="ml-3">Very good</label>
          </div>
          <div class="form-check mb-4">
            <input name="feedback" value="4" type="radio">
            <label class="ml-3">Good</label>
          </div>
          <div class="form-check mb-4">
            <input name="feedback" value="3" type="radio">
            <label class="ml-3">Mediocre</label>
          </div>
          <div class="form-check mb-4">
            <input name="feedback" value="2" type="radio">
            <label class="ml-3">Bad</label>
          </div>
          <div class="form-check mb-4">
            <input name="feedback" value="1" type="radio">
            <label class="ml-3">Very Bad</label>
          </div>
    
          <!--Text Message-->
          <div class="text-center">
            <h4>What could we improve?</h4>
          </div>
          <textarea type="textarea" placeholder="Your Review Detail....." rows="3" name="comment" id="comment" class="form-control"></textarea>
    
    
          <!-- Modal Footer-->
          <div class="modal-footer">
            <button class="btn btn-info" type="submit">Send
              <i class="fa fa-paper-plane"></i>
            </button>
            <a href="#" class="btn btn-outline-success" data-bs-dismiss="modal">Cancel</a>
          </div>
          </form>
      </div>
    </div>
</div>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script>
    $(document).on("click","#btn-reviews",function () {
        let productId = $(this).data("id")
        $("#re_product1").val($(this).data("id"))
        $("#order_id1").val($(this).data("order"))
    })
  </script>
</body>
</html>