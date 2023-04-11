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
    <title>Order_Customer</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>

  <body>

    <scripts src="js/bootstrap.min.js"></script>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="admin.php">
                         
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                              
                                  <span>Order For Customer</span>
                                  <i class="ti-angle-down"></i>
                              </a>
                            
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                 
                                  <div class="user-details">
                                      <span id="more-details">Admin<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
            
                                          <a href="systems/ac_logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="p-15 p-b-0">
                              <form class="form-material">
                                  <div class="form-group form-primary">
                                      <input type="text" name="footer-email" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                  </div>
                              </form>
                          </div>
                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="active">
                                  <a href="admin.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">HOME</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <hr>
                             
                          
                        
                     </nav>


                  <!-- Button trigger modal-->
                        
                        <!-- Modal: Addcategory-->
                     







                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Order All</h5>
                                          <p class="m-b-0">Order For Customer</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="admin.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                           
                                           
                                           



                                        <!--เเสดงหมวดหมู่สินค้า-->
                                        <div class="row my-2 mx-1 justify-content-center" style="width: 100%;">
                                            <table class="table table-striped table-borderless">
                                              <thead style="background-color:#84B0CA ;" class="text-white">
                                                <tr>
                                                    <th>Order_ID</th>
                                                    <th>Customer</th>
                                                  <th scope="col">Product</th>
                                                  <th scope="col">Description</th>
                                                  <th scope="col">Qty</th>
                                                  <th scope="col">Unit Price</th>
                                                  <th scope="col">Amount</th>
                                                  <th scope="col">Status</th>
                                                  <th scope="col">Location</th>
                                                  <th scope="col">Check slip</th>
                                                  <th scope="col">Manages</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php 
                                                         $sql_order = $conn->query("SELECT tbl_order.*,tbl_product.nameproduct,tbl_product.product_price,tbl_product.imgproduct,tbl_cart.ca_product,tbl_cart.ca_qty,tbl_cart.ca_user,tbl_cart.ca_id,tbl_user.firstname FROM tbl_order 
                                                         INNER JOIN tbl_cart ON tbl_cart.order_id = tbl_order.order_id
                                                         INNER JOIN tbl_product ON tbl_cart.ca_product = tbl_product.product_id
                                                         INNER JOIN tbl_user ON tbl_cart.ca_user = tbl_user.id
                                                         ");
                                                        
                                                         while ($fet_order = $sql_order->fetch_object()) {
                                                ?>
                                                <tr>
                                                  <th scope="row"><?php echo $fet_order->order_id;?></th>
                                                  <td><?php echo $fet_order->firstname;?></td>

                                                  <td><img src="image/product/<?php echo $fet_order->imgproduct;?>" style="width: 60px; height: 60px; border-radius: 15px;"></td>
                                                  <td><?php echo $fet_order->nameproduct;?></td>
                                                  <td><?php echo $fet_order->ca_qty;?></td>
                                                  <td>$ <?php echo $fet_order->product_price;?></td>
                                                  <td>$ <?php echo $fet_order->product_price * $fet_order->ca_qty;?></td>
                                                  <td>
                                                      <?php 
                                                        if ($fet_order->order_status == 1) {
                                                            echo 'รอการยืนยัน';
                                                        }elseif ($fet_order->order_status == 2) {
                                                            echo 'ยืนยันคำสั่งซื้อเรียบร้อย';
                                                        }else {
                                                            echo 'ยกเลิกคำสั่งซื้อเรียบร้อย';
                                                        }
                                                        ?>
                                                  </td>
                                                  <td><?php $fet_order->address;?></td>
                                                  <td><a type="button" id="btn-check" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#check_slip" data-id="<?php echo $fet_order->order_id;?>">Check slip</a></td>
                                                  <td>
                                                    <?php if ($fet_order->order_status == 1) { ?>
                                                        <a href="systems/ac_order_manager.php?ac=confirm&order_id=<?php echo $fet_order->order_id;?>" class="btn btn-success">Confirm</a>
                                                        <a href="systems/ac_order_manager.php?ac=cancel&order_id=<?php echo $fet_order->order_id;?>" class="btn btn-danger">Cancel</a>
                                                        <?php }?>
                                                </td>

                                                </tr>
                                                <?php }?>
                                            </tbody>
                                            
                                        </table>
                                        
                                        <!-- modal -->
                                        <div class="modal fade right" id="check_slip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true" data-backdrop="false">
                                        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                            <!--Header-->
                                            <div class="modal-header">
                                            <p class="heading"><A>Check for slip</A>
                                            </p>
                                    
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                            </div>
                                    
                                            <!--Body-->
                                            <div class="modal-body"> </div>
                                    
                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
                                            </div>
                                        </div>
                                        <!--/.Content-->
                                        </div>








    
   
                                        <!-- Required Jquery -->
                                        <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
                                        <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
                                        <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
                                        <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
                                        <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
                                        <!-- waves js -->
                                        <script src="assets/pages/waves/js/waves.min.js"></script>
                                        <!-- jquery slimscroll js -->
                                        <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
                                        <!-- modernizr js -->
                                        <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
                                        <!-- slimscroll js -->
                                        <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
                                        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
                                        <!-- Chart js -->
                                        <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
                                        <!-- amchart js -->
                                        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
                                        <script src="assets/pages/widget/amchart/gauge.js"></script>
                                        <script src="assets/pages/widget/amchart/serial.js"></script>
                                        <script src="assets/pages/widget/amchart/light.js"></script>
                                        <script src="assets/pages/widget/amchart/pie.min.js"></script>
                                        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
                                        <!-- menu js -->
                                        <script src="assets/js/pcoded.min.js"></script>
                                        <script src="assets/js/vertical-layout.min.js "></script>
                                        <!-- custom js -->
                                        <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
                                        <script type="text/javascript" src="assets/js/script.js "></script>

                                    
                                        <script>
                                            $(document).on("click","#btn-check",function () {
                                                    let orderId = $(this).data("id");
                                                    $.ajax({
                                                        url: "systems/slip.php",
                                                        type: "post",
                                                        data: {
                                                            orderId: orderId
                                                        },success: function(response){
                                                            $(".modal-body").html(response);
                                                            $('#check_slip').modal('show');
                                                        },error: function(err){
                                                            console.log(err);
                                                        }
                                                    })

                                                })
                                        </script>
                                        
</body>

</html>
