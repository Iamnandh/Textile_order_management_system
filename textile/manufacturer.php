<?php


include('db.php'); // Include the configuration file

$query = "SELECT * FROM orders WHERE status='1'";
$result = mysqli_query($conn, $query);
$query1 = "SELECT * FROM orders WHERE status='2'";
$result1 = mysqli_query($conn, $query1);


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
    <title>Textile</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/animate.css" />

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>

    <div class="main-wrapper">
        <div class="header">
            <div class="header-left active">
                <a href="index.html" class="logo">
                    <img src="images/logo.bg.png" alt="" />
                </a>
                <a href="index.html" class="logo-small">
                    <img src="" alt="" />
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
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);"
                        role="button">
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
                            <a class="dropdown-item logout pb-0" href="signin.html"><img
                                    src="assets/img/icons/log-out.svg" class="me-2" alt="img" />Logout</a>
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
                            <a href="manufacturer.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                                    Manufacturer</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="manu.php">Orders</a></li>
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

            <!-- Image Modal -->
            <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">View Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img id="modalImage" src="" alt="Image Preview" style="max-width: 100%; display: none;" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View Description Modal-->
            <div class="modal fade" id="description" tabindex="-1" aria-labelledby="descriptionLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="descriptionLabel">Problem Description</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="view-description">
                            <div class="modal-body"
                                style="padding: 15px; font-size: 1.1em; color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                <ol class="list-group list-group-numbered" style="margin-bottom: 0;">
                                    <li class="list-group-item d-flex justify-content-between align-items-start"
                                        style="padding: 10px; background-color: #fff;">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"
                                                style="font-size: 1.2em; font-weight: 600; color: #007bff;">Order Type
                                            </div>
                                            <b><span id="order_type" style="color: #555;"></span></b>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start"
                                        style="padding: 10px; background-color: #fff;">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"
                                                style="font-size: 1.2em; font-weight: 600; color: #007bff;">Amount
                                                Coated</div>
                                            <b><span id="amount" style="color: #555;"></span></b>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start"
                                        style="padding: 10px; background-color: #fff;">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"
                                                style="font-size: 1.2em; font-weight: 600; color: #007bff;">Description
                                            </div>
                                            <b><span id="o_description" style="color: #555;padding-top:5px;"></span></b>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script>
        $(document).ready(function () {
            // Handle image button click
            $(document).on('click', '.showImage', function () {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "mbackend.php",
                    data: {
                        'fetch_image': true,
                        'id': id
                    },
                    success: function (response) {
                        try {
                            var res = JSON.parse(response);
                            if (res.status == 200 && res.image) {
                                $('#modalImage').attr('src', res.image).show();
                                $('#imageModal1').modal('show');
                            } else {
                                alert(res.message || "Failed to load image");
                            }
                        } catch (error) {
                            console.error("Error parsing response:", error);
                            alert("Error loading image");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        alert("Failed to fetch image");
                    }
                });
            });

            // Handle description button click
            $(document).on('click', '.btndesc', function () {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "mbackend.php",
                    data: {
                        'fetch_description': true,
                        'id': id
                    },
                    success: function (response) {
                        try {
                            var res = JSON.parse(response);
                            if (res.status == 200) {
                                $('#order_type').text(res.order_type);
                                $('#amount').text(res.amount);
                                $('#o_description').text(res.description);
                                $('#description').modal('show');
                            } else {
                                alert(res.message || "Failed to load description");
                            }
                        } catch (error) {
                            console.error("Error parsing response:", error);
                            alert("Error loading description");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        alert("Failed to fetch description");
                    }
                });
            });

            // Handle approve button click
            $(document).on('click', '.approveBtn', function () {
                var id = $(this).val();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to approve this order?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, approve it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "mbackend.php",
                            data: { 'approve_order': true, 'id': id },
                            success: function (response) {
                                var res = JSON.parse(response);
                                if (res.status == 200) {
                                    Swal.fire('Approved!', res.message, 'success').then(() => {
                                        $('#new-orders').load(location.href + " #new-orders");
                                    });
                                } else {
                                    Swal.fire('Error', res.message || "Failed to approve order", 'error');
                                }
                            },
                            error: function () {
                                Swal.fire('Error', "Failed to approve order", 'error');
                            }
                        });
                    }
                });
            });
            // Clear modal image when modal is hidden
            $('#imageModal1').on('hidden.bs.modal', function () {
                $('#modalImage').attr('src', '').hide();
            });
        });
    </script>
</body>

</html>