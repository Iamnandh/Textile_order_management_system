<?php
  include'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $texname =$_POST['texname'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $organizationtype =$_POST['organizationtype'];// Encrypt password

    // Insert into login table
    $sql = "INSERT INTO table1 (textilename, name, email,password,organizationtype) VALUES ('$texname', '$name','$email', '$password','$organizationtype')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Registration Successful!');
                window.location.href = 'index.php'; // Redirect to login page
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
              </script>";
    }
}

$conn->close();
?>
