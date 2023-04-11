<?php 
session_start();
if ($_SESSION['sess_id'] == '') {
   header("location:login.html");
}
    include 'systems/connect.php';
    if (isset($_REQUEST['cate_id'])) {
        $sql_product = $conn->query("SELECT * FROM tbl_product WHERE category = '".$_REQUEST['cate_id']."' ");
    }else {
        $sql_product = $conn->query("SELECT * FROM tbl_product");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Preview ListProduct </title>
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
                              
                                  <span>Welcome Admin</span>
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
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                            
                      
                        
                     </nav>


                

                          <!-- Modal: Listproduct-->
                          <div class="modal fade right" id="editlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                          aria-hidden="true" data-backdrop="false">
                          <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
                          <!--Content-->
                          <div class="modal-content">
                              <!--Header-->
                              <div class="modal-header">
                              <p class="heading"><A>Edit List Product</A>
                              </p>
                      
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" class="white-text">&times;</span>
                              </button>
                              </div>
                      
                              <!--Body-->
                              <div class="modal-body">
                                  <form action="systems/ac_product.php?ac=edit" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="product_id" id="product_id">
                                      <div class="mb-3 mt-3">
                                          <label for="imgproduct" class="form-label">Image Product</label>
                                          <input type="file" class="form-control" id="imgproduct" name="imgproduct">
                                      </div>
                                      <div class="mb-3 mt-3">
                                          <label for="nameproduct" class="form-label">Product Name</label>
                                          <input type="text" class="form-control" id="nameproduct" name="nameproduct" placeholder="Product Name.....">
                                      </div>

                                      <div class="mb-3 mt-3">
                                        <label for="price" class="form-label">Unit Price</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="price.....">
                                    </div>

                                    
                                    <div class="mb-3 mt-3">
                                        <label for="Category" class="form-label">Category</label>
                                        <?php 
                                            $sql_category = $conn->query("SELECT * FROM tbl_category");
                                        ?>
                                        <select name="category" id="Category">
                                            <?php 
                                                while ($fet_category = $sql_category->fetch_object()) {
                                                    
                                            ?>
                                            <option value="<?php echo $fet_category->id;?>"><?php echo $fet_category->cat_name;?></option>
                                            <?php }?>
                                        </select>
                                    </div>

                                      <div class="modal-footer justify-content-center">
                                          <button type="submit" class="btn btn-info" name="add-list">Edit List Product</button>
                                          <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
                                      </div>
                                  </form>
                              </div>
                      
                              <!--Footer-->
                             
                          </div>
                          <!--/.Content-->
                          </div>
                      </div>
                  <!-- Modal: modalAbandonedCart-->
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Preview ListProduct</p>
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
                  



                                                <!--เเสดงหมวดหมู่สินค้า-->
                                                <div class="container-fluid mt-4">
                                                <div class="d-flex justify-content-end ">
                                                <div class="dropdown w-25 text-center">
                                                        <a href="#" class="dropdown-toggle form-control" data-toggle="dropdown">เลือกหมวดหมู่สินค้า</a>
                                                        <ul class="dropdown-menu dropdown-menu-light form-control">
                                                        <li><a href="admin.php" class="dropdown-item">หน้าแรก</a></li>
                                                        <?php 
                                                        $sql_cate = $conn->query("SELECT * FROM tbl_category");
                                                        while ($fet_cate = $sql_cate->fetch_object()) {
                                                            
                                                        ?>
                                                        <li><a href="preview.php?cate_id=<?php echo $fet_cate->id;?>" id="btn-cate" data-id="<?php echo $fet_cate->id;?>" class="dropdown-item"><?php echo $fet_cate->cat_name;?></a></li>
                                                        <?php } ?>
                                                        </ul>
                                                </div>
                                                </div>
                                                <hr>
                                            <div class="row">
                                                <?php 
                                                    while ($fet_productlist = $sql_product->fetch_object()) {
                                                        
                                                ?>
                                                <div class="col-12 col-sm-6 col-md-3">
                                                    <div class="card" style="width:100%;">
                                                        <div class="card-header">
                                                            <img src="image/product/<?php echo $fet_productlist->imgproduct;?>" style="width:100%; height: 200px;">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $fet_productlist->nameproduct;?></h5>
                                                            <hr>
                                                            <p class="card-text"><?php echo $fet_productlist->product_price;?> บาท</p>
                                                            
                                                                <button  class="btn btn-info btn-sm" id="btn-update" data-id="<?php echo $fet_productlist->product_id;?>" data-name="<?php echo $fet_productlist->nameproduct;?>" data-price="<?php echo $fet_productlist->product_price;?>" data-category="<?php echo $fet_productlist->category;?>" data-toggle="modal" data-target="#editlist">Edit List</button>
                                                                <a href="?delete=<?php echo $fet_productlist->product_id;?>" class="btn btn-danger btn-del btn-sm" data-id="<?php echo $fet_productlist->product_id;?>">Delete List</a>
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>





                                            <!-- Modal: Addcategory-->
                                            <div class="modal fade right" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                            aria-hidden="true" data-backdrop="false">
                                            <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
                                            <!--Content-->
                                            <div class="modal-content">
                                                <!--Header-->
                                                <div class="modal-header">
                                                <p class="heading"><A>Edit Category</A>
                                                </p>
                                        
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                                </div>
                                        
                                                <!--Body-->
                                                <div class="modal-body">
                                                    <form action="Admin.php" method="post">
                                                        <div class="mb-3 mt-3">
                                                            <label for="imgproduct" class="form-label">Image Product</label>
                                                            <input type="file" class="form-control" id="imgproduct" name="imgproduct">
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            <label for="nameproduct" class="form-label">Category Name</label>
                                                            <input type="text" class="form-control" id="nameproduct" name="nameproduct" placeholder="category Name.....">
                                                        </div>

                                                        <div class="modal-footer justify-content-center">
                                                            <button type="submit" class="btn btn-info" name="Edit">Edit Cateogy</button>
                                                            <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
                                                        </div>
                                                    </form>
                                                </div>
                                        
                                                <!--Footer-->
                                            
                                            </div>
                                            <!--/.Content-->
                                            </div>
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
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                       <script>
                                        $(document).on("click","#btn-update",function () {
                                            var id = $(this).data(id);
                                            $("#product_id").val($(this).data("id"));
                                            $("#nameproduct").val($(this).data("name"));
                                            $("#price").val($(this).data("price"));
                                        });
                                        $(document).on("click",".btn-del",function (e) {
                                                var pro_id = $(this).data("id");
                                                e.preventDefault();
                                                deleteProductConfirm(pro_id);
                                                
                                                function deleteProductConfirm(pro_id) {
                                                    swal.fire({
                                                        title: 'Are you sure?',
                                                        text:'Do you want to delete this product?',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor:'#d33',
                                                        confirmButtonText: 'Yes, I do!',
                                                        showLoaderOnConfirm: true,
                                                        preConfirm: function () {
                                                            return new Promise(function (resolve) {
                                                                $.ajax({
                                                                    url: 'systems/ac_product.php?ac=del',
                                                                    type: 'GET',
                                                                    data: 'delete=' + pro_id,
                                                                })
                                                                .done(function () {
                                                                    Swal.fire({
                                                                        title: 'success',
                                                                        text:'ลบข้อมูลสำเร็จ',
                                                                        icon: 'success'
                                                                    }).then(() => {
                                                                        document.location.href='preview.php';
                                                                    })
                                                                    
                                                                })
                                                                .fail(function () {
                                                                    Swal.fire('Oops...','ไม่สามารถทำรายการได้ มีบางอย่างผิดปกติ','error');
                                                                    window.location.reload();
                                                                })
                                                        })
                                                            
                                                        }
                                                    })
                                                }
                                            });
                                       </script>
</body>

</html>
