<?php 
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $organizationtype= $_POST['organizationtype'];
    $password = $_POST['password'];
    $email =$_POST['email'];

    // Fetch user from database
    $sql = "SELECT * FROM table1 WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Check password and organization type together
        if ( $password === $row['password'] && $organizationtype === $row['organizationtype']){ 
            if ($organizationtype === 'textile') {
                echo "<script>
                        alert('Login Successful!');
                        window.location.href ='index1.php';
                      </script>";}
            elseif ($organizationtype === 'manufacturer'){
                echo "<script>
                        alert('Login Successful!');
                        window.location.href = 'manu.php';
                      </script>";
            } elseif ($organizationtype === 'transportation'){
                echo "<script>
                        alert('Login Successful!');
                        window.location.href = 'transportation.php';
                      </script>";
            }
        } else {
            echo "<script>alert('Incorrect password or organization type!'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('Please register.'); window.location.href = 'index.php';</script>";
    }
}
$conn->close();
?>