<?php
/**
 * category_name
 * gst_rate
 * hsn_code
 */
    require_once('../../includes/functions.php');
    require_once('../../includes/status-constants.php');
    session_start();

    if(isset($_POST['edit_category'])) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];

        $employee_id = $_SESSION['employee_id'];

        $query = "UPDATE category SET category_name = '$category_name', updated_by = $employee_id, updated_at = now() WHERE category_id = $category_id";

        $result = mysqli_query($connection, $query);    
        checkQueryResult($result);

        $_SESSION['status'] = EDIT_STATUS_SUCCESS;
        header("Location: http://".BASE_SERVER."/erp/pages/manage-category.php");
        exit();
    }

?>