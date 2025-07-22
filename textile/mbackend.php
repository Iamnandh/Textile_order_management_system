<?php
include('db.php');


// Fetch image logic
if (isset($_POST['fetch_image'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "SELECT image FROM orders WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row && !empty($row['image'])) {
            echo json_encode([
                'status' => 200,
                'image' => $row['image']
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

// Handle approve button click
if (isset($_POST['approve_order'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "UPDATE orders SET status='2' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        $transportQuery = "INSERT INTO transportation (order_id, order_name, order_type, amount) 
                           SELECT id, order_name, order_type, amount FROM orders WHERE id='$id'";
        if (mysqli_query($conn, $transportQuery)) {
            $response = array(
                'status' => 200,
                'message' => 'Order Approved and Moved to Transportation'
            );
        } else {
            $response = array(
                'status' => 500,
                'message' => 'Error Moving Order to Transportation: ' . mysqli_error($conn)
            );
        }
    } else {
        $response = array(
            'status' => 500,
            'message' => 'Error Approving Order: ' . mysqli_error($conn)
        );
    }
    echo json_encode($response);
    exit();
}
?>