<?php
session_start();
$con = mysqli_connect("localhost","root","","12_banto_stock");

if(isset($_POST['update_emp_data']))
{
    $id = $_POST['EmployeeNumber'];
    $name = $_POST['name'];
    $branch_name = $_POST['BranchName'];
    // photoはどうするのか$id = $_POST['EmployeeNumber'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $address= $_POST['address'];

    $query = "UPDATE users SET  name='$name', gender='$gender',email='$email', birthdate='$birthdate', address='$address'WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    $query = "UPDATE branches SET branch_name='BranchName', WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Saved Successfully";
        header("Location: userlistData.php");
    }
    else
    {
        $_SESSION['status'] = "Not Saved";
        header("Location: userlistData.php");
    }
}