<?php
session_start();
require_once('../../includes/constants.php');
require_once('../../includes/functions.php');
$employee_id=$_SESSION['employee_id'];

if(isset($_POST['add_customer'])) {
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['cutsomer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_gst_no = $_POST['customer_gst_no'];

    $query = "SELECT * FROM customer WHERE customer_contact = $customer_contact";
    
    $result = mysqli_query($connection, $query);
    checkQueryResult($result, $query);

    if(mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO customer(customer_name, customer_contact, customer_email, gst_no, created_at) VALUES ('$customer_name', '$customer_contact', '$customer_email', '$customer_gst_no', now())";

        mysqli_query($connection, $query);
        checkQueryResult($result, $query);

        header("Location: http://". BASE_SERVER ."/erp/pages/add-category?q=success");
        exit();
    }

    header("Location: http://". BASE_SERVER ."/erp/pages/add-category?q=error&status=customer");
    exit();
}
?>