<?php
include('db.php'); // Include the database configuration file

// Check if the database connection is valid
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Fetch orders with status '2' (assuming status '2' means 'new orders')
$query = "SELECT orders.*, textile_detail.location AS from_location, manufacturer_detail.location AS to_location 
          FROM orders 
          LEFT JOIN textile_detail ON orders.textile_id = textile_detail.tex_id
          LEFT JOIN manufacturer_detail ON orders.manufacturer_id = manufacturer_detail.manu_id
          WHERE orders.status = '2'";

$result = mysqli_query($conn, $query);

if (!$result) {
  die("Database query failed: " . mysqli_error($conn));
}

$amounts = [8000, 9000, 10000];
$amountIndex = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
  <meta name="description" content="POS - Bootstrap Admin Template" />
  <meta name="keywords"
    content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive" />
  <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Dreams Pos admin template</title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg" />

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <!-- <div id="global-loader">
    <div class="whirly-loader"></div>
  </div> -->

  <div class="main-wrapper">
    <!-- Header and Sidebar code remains unchanged -->
    <div class="header">
      <div class="header-left active">
        <a href="index.html" class="logo">
          <img src="images/logo.bg.png" alt="" />
        </a>
        <a href="index.html" class="logo-small">
          <img src="assets/img/logo-small.png" alt="" />
        </a>
        <a id="toggle_btn" href="javascript:void(0);"> </a>
      </div>

      <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </a>

      <ul class="nav user-menu">
        <li class="nav-item">
          <div class="top-nav-search">
            <a href="javascript:void(0);" class="responsive-search">
              <i class="fa fa-search"></i>
            </a>
            <form action="#">
              <div class="searchinputs">
                <input type="text" placeholder="Search Here ..." />
                <div class="search-addon">
                  <span><img src="assets/img/icons/closes.svg" alt="img" /></span>
                </div>
              </div>
              <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img" /></a>
            </form>
          </div>
        </li>

        <li class="nav-item dropdown has-arrow flag-nav">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
            <img src="assets/img/flags/us1.png" alt="" height="20" />
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="javascript:void(0);" class="dropdown-item">
              <img src="assets/img/flags/us.png" alt="" height="16" /> English
            </a>
            <a href="javascript:void(0);" class="dropdown-item">
              <img src="assets/img/flags/fr.png" alt="" height="16" /> French
            </a>
            <a href="javascript:void(0);" class="dropdown-item">
              <img src="assets/img/flags/es.png" alt="" height="16" /> Spanish
            </a>
            <a href="javascript:void(0);" class="dropdown-item">
              <img src="assets/img/flags/de.png" alt="" height="16" /> German
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <img src="assets/img/icons/notification-bing.svg" alt="img" />
            <span class="badge rounded-pill">4</span>
          </a>
          <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header">
              <span class="notification-title">Notifications</span>
              <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
            </div>
            <div class="noti-content">
              <ul class="notification-list">
                <li class="notification-message">
                  <a href="activities.html">
                    <div class="media d-flex">
                      <span class="avatar flex-shrink-0">
                        <img alt="" src="assets/img/profiles/avatar-02.jpg" />
                      </span>
                      <div class="media-body flex-grow-1">
                        <p class="noti-details">
                          <span class="noti-title">John Doe</span> added new
                          task
                          <span class="noti-title">Patient appointment booking</span>
                        </p>
                        <p class="noti-time">
                          <span class="notification-time">4 mins ago</span>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="notification-message">
                  <a href="activities.html">
                    <div class="media d-flex">
                      <span class="avatar flex-shrink-0">
                        <img alt="" src="assets/img/profiles/avatar-03.jpg" />
                      </span>
                      <div class="media-body flex-grow-1">
                        <p class="noti-details">
                          <span class="noti-title">Tarah Shropshire</span>
                          changed the task name
                          <span class="noti-title">Appointment booking with payment gateway</span>
                        </p>
                        <p class="noti-time">
                          <span class="notification-time">6 mins ago</span>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="notification-message">
                  <a href="activities.html">
                    <div class="media d-flex">
                      <span class="avatar flex-shrink-0">
                        <img alt="" src="assets/img/profiles/avatar-06.jpg" />
                      </span>
                      <div class="media-body flex-grow-1">
                        <p class="noti-details">
                          <span class="noti-title">Misty Tison</span> added
                          <span class="noti-title">Domenic Houston</span> and
                          <span class="noti-title">Claire Mapes</span> to
                          project
                          <span class="noti-title">Doctor available module</span>
                        </p>
                        <p class="noti-time">
                          <span class="notification-time">8 mins ago</span>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="notification-message">
                  <a href="activities.html">
                    <div class="media d-flex">
                      <span class="avatar flex-shrink-0">
                        <img alt="" src="assets/img/profiles/avatar-17.jpg" />
                      </span>
                      <div class="media-body flex-grow-1">
                        <p class="noti-details">
                          <span class="noti-title">Rolland Webber</span>
                          completed task
                          <span class="noti-title">Patient and Doctor video conferencing</span>
                        </p>
                        <p class="noti-time">
                          <span class="notification-time">12 mins ago</span>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="notification-message">
                  <a href="activities.html">
                    <div class="media d-flex">
                      <span class="avatar flex-shrink-0">
                        <img alt="" src="assets/img/profiles/avatar-13.jpg" />
                      </span>
                      <div class="media-body flex-grow-1">
                        <p class="noti-details">
                          <span class="noti-title">Bernardo Galaviz</span>
                          added new task
                          <span class="noti-title">Private chat module</span>
                        </p>
                        <p class="noti-time">
                          <span class="notification-time">2 days ago</span>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            <div class="topnav-dropdown-footer">
              <a href="activities.html">View all Notifications</a>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown has-arrow main-drop">
          <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
            <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="" />
              <span class="status online"></span></span>
          </a>
          <div class="dropdown-menu menu-drop-user">
            <div class="profilename">
              <div class="profileset">
                <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="" />
                  <span class="status online"></span></span>
                <div class="profilesets">
                  <h6>John Doe</h6>
                  <h5>Admin</h5>
                </div>
              </div>
              <hr class="m-0" />
              <a class="dropdown-item" href="profile.html">
                <i class="me-2" data-feather="user"></i> My Profile</a>
              <a class="dropdown-item" href="generalsettings.html"><i class="me-2"
                  data-feather="settings"></i>Settings</a>
              <hr class="m-0" />
              <a class="dropdown-item logout pb-0" href="signin.html"><img src="assets/img/icons/log-out.svg"
                  class="me-2" alt="img" />Logout</a>
            </div>
          </div>
        </li>
      </ul>

      <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
          aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="profile.html">My Profile</a>
          <a class="dropdown-item" href="generalsettings.html">Settings</a>
          <a class="dropdown-item" href="signin.html">Logout</a>
        </div>
      </div>
    </div>

    <div class="sidebar" id="sidebar">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>
            <li class="active">
              <a href="transportation.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                  Dashboard</span> </a>
            </li>
            <li class="submenu">
              <a href="transportorders.php"><img src="htdocs\textile\images\e13b1bfc-9b65-416f-868a-2900765edaa0.jpg"
                  alt="img"><span>
                  Transportation</span> <span class="menu-arrow"></span></a>
              <ul>
                <li><a href="transportorders.php">Orders</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="page-wrapper">
    <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>500+</h5>
                                <h6>Total Textiles</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash1">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>600+</h5>
                                <h6>Total Manufacturer</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash3">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>200+</h5>
                                <h6>Total Transportation</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4>100</h4>
                                <h5>Customers</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h4>100</h4>
                                <h5>Suppliers</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4>100</h4>
                                <h5>Purchase Invoice</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div class="dash-counts">
                                <h4>105</h4>
                                <h5>Sales Invoice</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/feather.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/jquery.dataTables.min.js"></script>
      <script src="assets/js/dataTables.bootstrap4.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        $(document).ready(function () {
          // Handle approve button click
          $(document).on("click", ".approveBtn", function () {
            var id = $(this).val(); // Get the order ID from button value

            Swal.fire({
              title: "Are you sure?",
              text: "Do you want to approve this order?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, approve it!",
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: "trbackend.php", // Change to the actual PHP script handling approval
                  type: "POST",
                  data: { approve_order: true, id: id },
                  dataType: "json",
                  success: function (response) {
                    if (response.status === 200) {
                      Swal.fire("Approved!", response.message, "success").then(() => {
                        location.reload(); // Reload to reflect changes
                      });
                    } else {
                      Swal.fire("Error!", response.message, "error");
                    }
                  },
                  error: function () {
                    Swal.fire("Error!", "Something went wrong.", "error");
                  },
                });
              }
            });
          });
        });
      </script>
</body>

</html>