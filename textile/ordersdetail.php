<?php
include('db.php'); // Include the configuration file

$statusMessages = [
  '1' => 'New Order',
  '2' => 'Processing',
  '3' => 'Shipped',
  '4' => 'Delivered',
  '5' => 'Completed',
  // Add more status messages as needed
];

$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);
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
  <style>
    .table {
      border: 2px solid #000;
      /* Thick border for the table */
    }

    .table thead {
      background-color: #ddd;
      /* Black background for the header */
      color: #fff;
      /* White text for better contrast */
    }

    .table th,
    .table td {
      border: 1px solid #000;
      /* Thick border for cells */
      text-align: center;
      /* Center align text */
      padding: 10px;
      /* Add some padding for spacing */
    }
  </style>
</head>

<body>
  <!-- <div id="global-loader">
    <div class="whirly-loader"></div>
  </div> -->

  <div class="main-wrapper">
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
      <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 744px;">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>
            <li class="active">
              <a href="index1.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span></a>
            </li>
            <li class="submenu">
              <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span> Textile</span>  <span class="menu-arrow"></span></a>
              <ul>
                <li><a href="ordersdetail.php">Order List</a></li>
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
                  <span class="hidden-xs-down"><i class="ti-desktop"></i><b> New orders</b></span>
                </a>
              </li>

            </ul>
          </div>
        </div>
        <!-- new-order -->
        <div class="tab-content">
          <div class="tab-pane active" id="new-orders" role="tabpanel">
            <div class="row">
              <div class="col-sm-12">
                <div class="card" style="padding: 30px;" >
                  <div>
                    <button type="button" class="btn btn-info float-right" data-bs-toggle="modal"
                      data-bs-target="#new-ordersmodal">
                      Add Orders
                    </button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table datanew no-footer" id="neworder">
                        <thead>
                          <tr>
                            <th>S No</th>
                            <th>Name of the Order</th>
                            <th>Deadline</th>
                            <th>Description</th>
                            <th>View</th>
                            <th>Status</th>
                            <th>Completed</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $s = 1;
                          while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                              <td><?php echo $s; ?></td>
                              <td><?php echo $row['order_name']; ?></td>
                              <td><?php echo $row['deadline']; ?></td>
                              <td>
                                <center>
                                  <button type="button" class="btn btndesc" data-bs-toggle="modal"
                                    data-bs-target="#descriptionModal" value='<?php echo $row['id']; ?>'>
                                    <i class="fas fa-eye" style="font-size: 20px;"></i>
                                  </button>
                                </center>
                              </td>
                              <td>
                                <center>
                                  <button type="button" class="btn showImage" value="<?php echo $row['id']; ?>"
                                    data-bs-toggle="modal" data-bs-target="#imageModal1">
                                    <i class="fas fa-image" style="font-size: 20px;"></i>
                                  </button>
                                </center>
                              </td>
                              <td>
                                <?php
                                $status = $row['status'];
                                $statusMessage = isset($statusMessages[$status]) ? $statusMessages[$status] : 'Unknown Status';
                                ?>
                                <button class="btn btn-info" type="button">
                                  <?php echo $statusMessage; ?>
                                </button>
                              </td>
                              <td>
                                <?php if ($row['status'] == '5') { ?>
                                  <center>
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  <i class="fas fa-check-circle" style="font-size: 20px; color: green;"></i>
</button>
                                  </center>
                                 
                                <?php } ?>
                              </td>
                            </tr>
                            <?php $s++;
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- image -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="images/gpay.jpg" class="rounded-" alt="complete_pay_image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

          <!-- Modal for description -->
          <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="descriptionLabel">Problem Description</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"
                  style="padding: 15px; font-size: 1.1em; color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                  <ol class="list-group list-group-numbered" style="margin-bottom: 0;">
                    <li class="list-group-item d-flex justify-content-between align-items-start"
                      style="padding: 10px; background-color: #fff;">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Order Type
                        </div>
                        <b><span id="order_type" style="color: #555;"></span></b>
                      </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start"
                      style="padding: 10px; background-color: #fff;">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Amount Coated
                        </div>
                        <b><span id="amount" style="color: #555;"></span></b>
                      </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start"
                      style="padding: 10px; background-color: #fff;">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Description
                        </div>
                        <b><span id="order_description" style="color: #555; padding-top:5px;"></span></b>
                      </div>
                    </li>
                  </ol>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div id="imageModal1" class="modal fade" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="imageModalLabel">View Image</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img id="modalImage" src="" alt="Image Preview" style="max-width: 100%;" />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


          <!-- new-orders modal -->
          <div class="modal fade" id="new-ordersmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Orders</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="Addorders" method="POST">
                  <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-form-label col-md-2">Name of the order</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" name="order_name" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" id="date" class="form-control" name="date_of_reg" required>
                      <span class="form-text text-muted">dd/mm/yyyy</span>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-2">Order Type</label>
                      <div class="col-md-10">
                        <select class="form-select" name="order_type" required>
                          <option value="">-- Select --</option>
                          <option value="Main Order">Main Order</option>
                          <option value="Sample Order">Sample Order</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-2">Amount</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" name="amount" placeholder="Enter amount" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-2">Sample Image</label>
                      <div class="col-md-10">
                        <input class="form-control" type="file" name="sample_image" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-2">Description</label>
                      <div class="col-md-10">
                        <textarea rows="5" cols="5" class="form-control" name="description"
                          placeholder="Enter text here" required></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Deadline</label>
                      <input type="date" class="form-control" name="deadline" required>
                      <span class="form-text text-muted">dd/mm/yyyy</span>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Order</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- Description Modal -->
        <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="descriptionLabel">Problem Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <ol class="list-group list-group-numbered">
                  <li class="list-group-item">
                    <div class="fw-bold">Order Type</div>
                    <b><span id="order_type"></span></b>
                  </li>
                  <li class="list-group-item">
                    <div class="fw-bold">Amount Coated</div>
                    <b><span id="amount"></span></b>
                  </li>
                  <li class="list-group-item">
                    <div class="fw-bold">Description</div>
                    <b><span id="order_description"></span></b>
                  </li>
                </ol>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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



      </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function () {
        // Handle submenu toggle on clicking the menu-arrow
        $(document).on('click', '.menu-arrow', function (e) {
          e.preventDefault();
          var submenu = $(this).closest('li').find('ul');
          if (submenu.is(':visible')) {
            submenu.slideUp(); // Hide the submenu
          } else {
            submenu.slideDown(); // Show the submenu
          }
        });

        // Handle form submission
        $(document).on('submit', '#Addorders', function (e) {
          e.preventDefault();

          var formData = new FormData(this);
          formData.append('save_orders', true); // Add an identifier for the backend

          $.ajax({
            type: "POST",
            url: "backend.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              try {
                var res = JSON.parse(response);
                if (res.status == 200) {
                  $('#new-ordersmodal').modal('hide'); // Close the modal
                  $('#Addorders')[0].reset(); // Reset the form
                  $('#neworder').load(location.href + " #neworder", function () {
                    alert(res.message); // Show success message
                  });
                } else {
                  alert(res.message || "Something went wrong!");
                }
              } catch (error) {
                console.error("JSON parsing error:", error);
                alert("Error processing response");
              }
            },
            error: function (xhr, status, error) {
              console.error("AJAX Error:", error);
              alert("Failed to submit form. Please try again.");
            }
          });
        });

        // Handle image button click
        $(document).on('click', '.showImage', function () {
          var id = $(this).val();

          $.ajax({
            type: "POST",
            url: "backend.php",
            data: {
              'fetch_image': true,
              'id': id
            },
            success: function (response) {
              try {
                var res = JSON.parse(response);
                if (res.status == 200) {
                  $('#modalImage').attr('src', res.image);
                  $('#modalImage').css('display', 'block');
                  $('#imageModal1').modal('show');
                } else {
                  alert(res.message || "Failed to load image");
                  $('#modalImage').hide();
                }
              } catch (error) {
                console.error("Error parsing response:", error);
                alert("Error loading image");
              }
            },
            error: function (xhr, status, error) {
              console.error("AJAX Error:", error);
              alert("Failed to fetch image");
              $('#modalImage').hide();
            }
          });
        });

        $(document).on('click', '.btndesc', function () {
          var id = $(this).val(); // Get the order ID from the button's value

          // Fetch the description data from the database
          $.ajax({
            type: "POST",
            url: "backend.php",
            data: {
              'fetch_description': true,
              'id': id
            },
            success: function (response) {
              try {
                var res = JSON.parse(response);
                if (res.status == 200) {
                  // Update the modal content with the fetched data
                  $('#order_type').text(res.order_type);
                  $('#amount').text(res.amount);
                  $('#order_description').text(res.description);
                  $('#descriptionModal').modal('show'); // Open the modal
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
      });
    </script>

</body>

</html>