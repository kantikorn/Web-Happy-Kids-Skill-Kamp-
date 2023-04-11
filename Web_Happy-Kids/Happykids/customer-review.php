<?php 
  include 'systems/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review for Customer</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="customer-review.css">
    <script src="js1/bootstrap.min.js"></script>
</head>
<body>
    <!--card History-->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card" style="background-color: aliceblue;">
                <h5 class="card-title mb-3 mt-3" style="color:#080d36; text-align: center; font-weight: bolder; font-size: 27px;">Review For Customer Happy Kids<a href="admin.php" style="color:#4992ff; margin-left: 15px; font-size: 18px;">HOME</a></h5>
            </div>
        </div>
    </div>
</div>
    <section class="mt-4">
      <?php 
        $sql_cus_reviews = $conn->query("SELECT tbl_review.*,tbl_product.*,tbl_user.* FROM tbl_review INNER JOIN tbl_product ON tbl_review.re_product = tbl_product.product_id INNER JOIN tbl_user ON tbl_review.re_user = tbl_user.id");
        
      ?>
        <div class="row text-center d-flex align-items-stretch">
          <?php 
            while ($result = $sql_cus_reviews->fetch_object()) {
          ?>
          <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
            <div class="card testimonial-card w-75 d-flex mx-5">
              <div class="card-up" style="background-color: #9d789b;"></div>
              <div class="avatar mx-auto bg-white">
                <img src="image/product/<?php echo $result->imgproduct;?>"
                  class="rounded-circle img-fluid" />
              </div>
              <div class="card-body">
                <h4 class="mb-4"><?php echo $result->firstname;?> <?php echo $result->lastname;?></h4>
                <hr />
                <p class="dark-grey-text mt-4">
                  <i class="fas fa-quote-left pe-2"></i><?php echo $result->comment;?>
                </p>
              </div>
            </div>
          </div>
          <?php } ?>
         
        </div>
      </section>
</body>
</html>
