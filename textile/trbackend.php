<?php
include('db.php');

// Check if the database connection is valid
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Process the approval request
if (isset($_POST['approve_order'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $updateQuery = "UPDATE orders SET status='3' WHERE id='$id'";
    if (mysqli_query($conn, $updateQuery)) {
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
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
