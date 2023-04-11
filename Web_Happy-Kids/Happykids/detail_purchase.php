<?php
session_start();
  include 'systems/connect.php';
   $sql_cart = $conn->query("SELECT tbl_product.nameproduct,tbl_product.product_price,tbl_product.imgproduct,tbl_cart.ca_product,tbl_cart.ca_qty,tbl_cart.ca_user,tbl_cart.ca_id FROM tbl_cart LEFT JOIN tbl_product ON tbl_product.product_id = tbl_cart.ca_product WHERE ca_user = '".$_SESSION['user_id']."' AND order_id <= 0 ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Purchase</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css">
</head>
<body>
    <script src="js1/bootstrap.min.js"></script>

    <div class="card">
        <div class="card-body">
          <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
              <hr>
            </div>
      
            <div class="container">
              <div class="col-md-12">
                <div class="text-center">
                  <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                  <h4 class="pt-0">Shopping Happy Kid</h4>
                </div>
      
              </div>
      
      
              <div class="row">
                <div class="col-xl-8">
                  <ul class="list-unstyled">
                    <li class="text-muted">Customer: <span style="color:#5d9fc5 ;"><?php echo $_SESSION['firstname']?></span></li>  
                  </ul>
                </div>
                <div class="col-xl-4">
                  <p class="text-muted">Invoice</p>
                  <ul class="list-unstyled">
                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        class="fw-bold">ID:</span> <?php echo $_SESSION['user_id'];?></li>
                  </ul>
                </div>
              </div>
      
              <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                  <thead style="background-color:#84B0CA ;" class="text-white">
                    <tr>
                        <th>No</th>
                      <th scope="col">Product</th>
                      <th scope="col">Description</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Unit Price</th>
                      <th scope="col">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $sum_total = 0;
                      $i=0;
                        while ($result = $sql_cart->fetch_object()) {
                         $i++;
                      ?>
                    <tr>
                      <th scope="row"><?php echo $i;?></th>
                      <td><img src="image/product/<?php echo $result->imgproduct;?>" style="width: 60px; height: 60px; border-radius: 15px;"></td>
                      <td><?php echo $result->nameproduct;?></td>
                      <td><?php echo $result->ca_qty;?></td>
                      <td><?php echo $result->product_price;?> บาท</td>
                      <td><?php echo $sum_price = $result->product_price * $result->ca_qty;?> บาท</td>
                    </tr>
                    <?php
                      $sum_total = $sum_total + $sum_price;
                      $sum_price = 0;
                    ?>
                    <?php }?>
                   
                  </tbody>
      
                </table>
              </div>
              <div class="row">
                <div class="col-xl-8">
                  <p class="ms-3">information Purchase</p>
      
                </div>
                <div class="col-xl-3">
                 
                  <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                      style="font-size: 25px;">$ <?php echo $sum_total;?> บาท </span></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xl-10">
                  <p>Thank you for your purchase</p>
                </div>
                <div class="col-xl-2">
                  <button type="button" class="btn btn-primary text-capitalize"  data-bs-toggle="modal" data-bs-target="#paynow"
                    style="background-color:#95c0d8 ;">Pay Now</button>

                    <button class="btn btn-success" onclick="window.print()">Print Bill</button>
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="paynow">
        <div class="modal-dialog">
            <div class="modal-content" style="width:320px;">
                <div class="modal-header">
                    <h5 class="modal-title">Pay Now</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
    
                <div class="modal-body">
                    <img src="image/licensed-image.jpg" style="width:100%; height:250px;">
                </div>
                    <hr>
                    <form action="systems/ac_order_manager.php?ac=add&sum_total=<?php echo $sum_total;?>" method="post" enctype="multipart/form-data">
                          <div class="form-group px-2">
                            <label for="payment">แนบสลิปการโอน</label>
                            <input type="file" name="payment" id="payment" class="form-control" required>
                          </div>
                          <div class="form-group px-2 mt-3">
                            <label for="address">ที่อยู่สำหรับจัดส่ง</label>
                            <textarea name="address" id="address"  rows="5" class="form-control" placeholder="Enter your address.." required></textarea>
                          </div>
                          <button  class="btn btn-success mb-3 mt-3" type="submit" style="width: 80%; margin-left: 30px;">Confirm Success</button>
                    </form>
            </div>
            
        </div>
      </div>
</body>
</html>