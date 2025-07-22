<?php
include('db.php');

if (isset($_POST['save_orders'])) {
    $order_name = mysqli_real_escape_string($conn, $_POST['order_name']);
    $date_of_reg = mysqli_real_escape_string($conn, $_POST['date_of_reg']);
    $order_type = mysqli_real_escape_string($conn, $_POST['order_type']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);

    // Handle file upload
    $sample_image = '';
    if (isset($_FILES['sample_image']) && $_FILES['sample_image']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_extension = strtolower(pathinfo($_FILES["sample_image"]["name"], PATHINFO_EXTENSION));
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["sample_image"]["tmp_name"], $target_file)) {
            $sample_image = $target_file;
        }
    }

    // Insert into database
    $query = "INSERT INTO orders (order_name, date_of_reg, order_type, amount, image, description, deadline, status) 
              VALUES ('$order_name', '$date_of_reg', '$order_type', '$amount', '$sample_image', '$description', '$deadline', '1')";

    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 200,
            'message' => 'Order Created Successfully'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 500,
            'message' => 'Order Not Created: ' . mysqli_error($conn)
        );
        echo json_encode($response);
    }
    exit();
}
// Fetch description logic
if (isset($_POST['fetch_description'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "SELECT order_type, amount, description FROM orders WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo json_encode([
                'status' => 200,
                'order_type' => $row['order_type'],
                'amount' => $row['amount'],
                'description' => $row['description']
            ]);
        } else {
            echo json_encode([
                'status' => 404,
                'message' => 'No data found for this order'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 500,
            'message' => 'Error fetching data from database'
        ]);
    }
    exit();
}
// Fetch image logic
if (isset($_POST['fetch_image'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "SELECT image FROM orders WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row && !empty($row['image'])) {
            $imagePath = $row['image'];
            echo json_encode([
                'status' => 200,
                'image' => $imagePath
            ]);
        } else {
            echo json_encode([
                'status' => 404,
                'message' => 'No image found for this order'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 500,
            'message' => 'Error fetching image from database'
        ]);
    }
    exit();
}
?>