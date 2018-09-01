<?php
require_once("db.php");
// function checkQueryResult($resultset)
// {
//     global $connection;
    
//     if(!$resultset)
//     {
//         die("QUERY FAILED :" .mysqli_error($connection));
//         //here connection is used and it is global so we need to make t global
//     }
// }

function checkQueryResult($resultset, $query) {
    global $connection;
    if(!$resultset) {
        die("QUERY FAILED :".mysqli_error($connection)." <br/> $query");
    }
}

function getLoggedInEmployeeName($LoggedInId)
{
    global $connection;
    $query= "SELECT * FROM employee WHERE employee_id = $LoggedInId";
    $employee_details = mysqli_query($connection,$query);
    checkQueryResult($employee_details);
    if($row=mysqli_fetch_assoc($employee_details))
    {
        return ($row['employee_name']);
    }
}
function insert($tableName, $columns, $values){
    global $connection;
    $query = "INSERT INTO $tableName($columns) VALUES ($values)";
    
    $resultset = mysqli_query($connection, $query);
    checkQueryResult($resultset);
    return $resultset;
}
function redirect($url){
    header("Location: $url");
    exit();
}

?>