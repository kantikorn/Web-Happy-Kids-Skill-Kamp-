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
    <title>Review</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css-review.css">
    <script src="js1/bootstrap.min.js"></script>
</head>
<body>
    <!--Modal Launch Button-->



<!--card History-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card" style="background-color: aliceblue;">
                <h5 class="card-title mb-3 mt-3" style="color:#080d36; text-align: center; font-weight: bolder; font-size: 27px;">Review Product Happy Kids<a href="index.php" style="color:#4992ff; margin-left: 15px; font-size: 18px;"><< Shopping</a></h5>
            </div>
        </div>
    </div>
</div>
<?php 
  $sql_reviews = $conn->query("SELECT tbl_order.*,tbl_cart.*,tbl_product.* FROM tbl_order LEFT JOIN tbl_cart ON tbl_order.order_id = tbl_cart.order_id LEFT JOIN tbl_product ON tbl_cart.ca_product = tbl_product.product_id WHERE tbl_order.cus_name = '".$_SESSION['user_id']."' AND tbl_order.order_status = '2' ");
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="card" style="width:100%;">
                <div class="container-fluid">
                    <div class="row">
                        <?php 
                          while ($fet_reviews = $sql_reviews->fetch_object()) {
                            $row = $conn->query("SELECT tbl_review.*,tbl_product.product_id FROM tbl_review LEFT JOIN tbl_product ON tbl_review.re_product = tbl_product.product_id WHERE re_user = '".$_SESSION['user_id']."' ");
                            $num = $row->num_rows;
                        ?>
                        <div class="col-sm-6 mb-3 mt-3">
                            <img src="image/product/<?php echo $fet_reviews->imgproduct;?>" style="width:100%; height: 230px;">
                        </div>
                        <div class="col-sm-6 mb-3 mt-3">
                            <h5><?php echo $fet_reviews->nameproduct;?></h5>
                            <hr>
                            <p class="card-text">Unit: <?php echo $fet_reviews->ca_qty;?></p>
                            <p class="card-text">Total Price: <?php echo $fet_reviews->total_price;?></p>
                            <p class="card-text">Date Purchase: <br> <?php echo $fet_reviews->order_date;?></p>
                            <?php 
                              if ($num <= 0) {
                            ?>
                            <button type="button" id="btn-reviews" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $fet_reviews->product_id;?>">
                                Review Product +
                              </button>
                              <?php }else {
                                echo '<p class="text-center mt-3">คุณรีวิวรายการนี้แล้ว</p>';
                              }?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



  
  <!-- Modal -->
  
  </div>
  <script src="js/jquery.min.js"></script>
  <script>
    $(document).on("click","#btn-reviews",function () {
        let productId = $(this).data("id")
        $("#re_product1").val($(this).data("id"))
    })
  </script>
</body>
</html>
