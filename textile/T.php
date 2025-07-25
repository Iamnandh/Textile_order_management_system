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
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, html5, responsive" />
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
                                                    <span class="noti-title">Appointment booking with payment
                                                        gateway</span>
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
                                                    <span class="noti-title">Patient and Doctor video
                                                        conferencing</span>
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
                            <a href="index.html"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                                    Textile</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="neworder.html">New Orders</a></li>
                                <li><a href="ordersdetail.html">Order list</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                                    Manufacturer</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="manu.html">Orders</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img
                                    src="htdocs\textile\images\e13b1bfc-9b65-416f-868a-2900765edaa0.jpg"
                                    alt="img"><span>
                                    Transportation</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="transportation.html">Orders</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <ul class="nav nav-tabs mb-3 custom-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#new-orders" role="tab">
                                    <span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down"><i class="ti-desktop"></i><b>New Orders</b></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#task-updation" role="tab">
                                    <span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down"><i class="ti-tablet"></i><b>Task Updation</b></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#completed-orders" role="tab">
                                    <span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down"><i class="bi bi-people-fill"></i><b> Completed
                                            Orders</b></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="new-orders" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">New Order Info</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datanew no-footer">
                                                <thead>
                                                    <tr>
                                                        <th>S No</th>
                                                        <th>Name of the Order</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Amount coated</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (mysqli_num_rows($result) > 0) {
                                                        $serialNumber = 1;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<tr>";
                                                            echo "<td>" . $serialNumber . "</td>";
                                                            echo "<td>" . htmlspecialchars($row['order_name']) . "</td>";
                                                            echo "<td>" . htmlspecialchars($row['from_location']) . "</td>";
                                                            echo "<td>" . htmlspecialchars($row['to_location']) . "</td>";
                                                            echo "<td>" . $amounts[$amountIndex] . "</td>";
                                                            echo "<td>";
                                                            if ($row['status'] == 1) {
                                                                echo "<center>";
                                                                echo "<button class='btn btn-success approveBtn' type='button' value='" . $row['id'] . "'>Approve</button>";
                                                                echo "</center>";
                                                            } else {
                                                                echo "<span class='badge bg-success' style='font-size: 1.2em; color: #000; padding: 0.25em 0.5em;'>" . htmlspecialchars($row['status']) . "</span>";
                                                            }
                                                            echo "</td>";
                                                            echo "</tr>";
                                                            $serialNumber++;
                                                            $amountIndex = ($amountIndex + 1) % count($amounts);
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='6' class='text-center'>No orders found.</td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Task Updation and Completed Orders tabs remain unchanged -->
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
    </div>
</body>

</html>