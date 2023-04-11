<?php 
session_start();
if ($_SESSION['sess_id'] == '') {
   header("location:login.html");
}
   include 'systems/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>

    <link rel="stylesheet" href="css1/bootstrap.min.css">
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Purchase Product</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
   </head>
   <body>

    <script src="js1/bootstrap.min.js"></script>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
         <a class="navbar-brand" href="#">shopping</a>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mt-1 position-relative" style="margin-left: 10px;">
                <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
               <span class="padding_10">Cart</span>
               <?php 
                  $sql_cart_number = $conn->query("SELECT * FROM tbl_cart WHERE ca_user='".$_SESSION['user_id']."' AND order_id = 0 ");
                  $row = $sql_cart_number->num_rows;
                  $result = $sql_cart_number->fetch_object();
                  if ($row > 0) {
                    
               ?>

               <span class="position-absolute bg-danger text-white top-0" style=" border-radius: 100%; width: 17px; height: 17px; font-size: 12px;"><?php echo $row;?></span>
               <?php }?>
            </button>
            </li>
           
          </ul>
          
          <form action="purchase.php" class="form-inline my-2 my-lg-0 d-flex mx-auto justify-content-end">
            <input class="form-control me-2 mr-sm-2" id="search" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">Search</button>
          </form>
          </div>
         
      </div>
   </nav>
   <div class="col-md-5  w-100 d-flex justify-content-center">
      <div class="list-group w-50 " id="show-list">

      </div>
   </div>

 

            
            <div class="offcanvas offcanvas-start" id="cart">
                <div class="offcanvas-header">
                <h1 class="offcanvas-title">Purchase</h1>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">

                        <?php 
                           $sql_cart = $conn->query("SELECT tbl_product.nameproduct,tbl_product.product_price,tbl_product.imgproduct,tbl_cart.ca_product,tbl_cart.ca_qty,tbl_cart.ca_user,tbl_cart.ca_id FROM tbl_cart LEFT JOIN tbl_product ON tbl_product.product_id = tbl_cart.ca_product WHERE ca_user = '".$_SESSION['user_id']."' AND order_id <= 0 ");
                        ?>
                       <div class="container-fluid">
                          
                          <div class="row">
                             <?php 
                              $total = 0;
                             while ($fet_cart = $sql_cart->fetch_object()) {
                                $price = $fet_cart->product_price * $fet_cart->ca_qty;
                                $total = $total+$price;
                                ?>
                                <form action="systems/add_to_cart.php?ac=next_page&ca_id=<?php echo $fet_cart->ca_id;?>" method="post">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card" style="width:100%;">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3 mt-3">
                                                <img src="image/product/<?php echo $fet_cart->imgproduct;?>" style="width:100%; height:130px;">
                                            </div>
                                            <div class="col-sm-6">
                                                <h3 class="card-title"><?php echo $fet_cart->nameproduct;?></h3>
                                                <hr>
                                                <div class="d-flex flex-row-reverse bd-highlight">
                                                   <div class="p-2 bd-highlight"><a href="systems/add_to_cart.php?ac=next_qty&ca_id=<?php echo $fet_cart->ca_id;?>" class="btn btn-light"><i class="bi bi-plus-circle"></i></a></div>
                                                   <div class="p-2 bd-highlight text-center"><h4 class="form-control w-100"><?php echo $fet_cart->ca_qty;?></h4></div>
                                                   <div class="p-2 bd-highlight"><a href="systems/add_to_cart.php?ac=reverse&ca_id=<?php echo $fet_cart->ca_id;?>" class="btn btn-light"><i class="bi bi-dash-circle"></i></a></div></div>
                                                </div>
                                                <div class="text-center my-2">
                                                   <h3 class="text-black">รวม $ <?php echo $price;?></h3>
                                                </div>
                                                <?php 
                                                   $price = 0;
                                                ?>
                                                <a href="systems/add_to_cart.php?ac=cancel&ca_id=<?php echo $fet_cart->ca_id;?>" class="btn btn-danger mt-2 " >ยกเลิกรายการนี้</a>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-12 col-md-12 col-lg-12 mt-3 mb-3">
                                    <h3 class="text-center">ราคาทั้งหมด <?php echo $total;?> บาท</h3>
                                    <button class="btn btn-success" type="submit"  style="width:100%; color:#fff;">Detail Purchase</button>
                                </div>

                            </div>

                       
                        </div>


                    </form>
                </div>
            </div>
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <?php 
                        if (isset($_REQUEST['cate_id'])) {
                           $sql_category = $conn->query("SELECT * FROM tbl_category WHERE id='".$_REQUEST['cate_id']."' ");
                           $fet_category = $sql_category->fetch_object();
                        
                     ?>
                        <h1 class="fashion_taital"><?php echo $fet_category->cat_name;?></h1>

                     <?php }else { ?>
                        <h1 class="fashion_taital">Product Happy kid Clothes</h1>

                        <?php }?>
                     <div class="fashion_section_2">
                        <div class="row">
                           <?php 
                           if (isset($_REQUEST['cate_id'])) {
                              $sql_productlist = $conn->query("SELECT * FROM tbl_product WHERE category='".$_REQUEST['cate_id']."' ");
                           }elseif (isset($_REQUEST['submit'])) {
                              $sql_productlist = $conn->query("SELECT * FROM tbl_product WHERE nameproduct='".$_REQUEST['search']."' ");
                           } else {
                              $sql_productlist = $conn->query("SELECT * FROM tbl_product");
                           }
                        while ($fet_productliset = $sql_productlist->fetch_object()) {
                           
                           ?>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text"><?php echo $fet_productliset->nameproduct;?></h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ <?php echo $fet_productliset->product_price;?></span></p>
                                 <div class="tshirt_img"><img src="image/product/<?php echo $fet_productliset->imgproduct;?>" width="250px" height="250px"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="systems/add_to_cart.php?ac=add_cart&product_id=<?php echo $fet_productliset->product_id;?>">ADD Cart +</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <?php }?>
                        </div>
                     </div>
                  </div>
               </div>
             
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-bs-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-bs-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- fashion section end -->
                        






     

     
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/search.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>