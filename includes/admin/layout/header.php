<?php 
if(!empty($_GET))
{
    if(!empty($_GET['delete']))
    {
        if($_GET['delete']=="success")
        {
            echo "<script> Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Deleted Successfully',
                showConfirmButton: false,
                timer: 1000
                })</script>";
        }
        //delete=success
    }
    elseif(!empty($_GET['edit']))
    {
        if($_GET['edit']=="success")
        {
            echo "<script> Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Edited Successfully',
                showConfirmButton: false,
                timer: 1000
                })</script>";
        }
        //edit=success
    }
    elseif(!empty($_GET['password']))
    {
        if($_GET['password']=="didnotmatched")
        {
            echo "<script>Swal.fire({
                type: 'error',
                title: 'Password Did not match',
                text: 'Try Entering same password on both fields!',
                showCloseButton: true,
                showConfirmButton: false
              })</script>";
        }
        //password=didnotmatched
    }
    elseif(!empty($_GET['register']))
    {
        if($_GET['register']=="success")
       { //register=success
        echo "<script> Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Registered Successfully',
            showConfirmButton: false,
            timer: 1000
            })</script>";
        }
    }
    elseif(!empty($_GET['empty']))
    {
        if($_GET['empty']=="fields")
        {
            echo "<script> Swal.fire({
                type: 'error',
                title: 'Empty Fields',
                text: 'It looks like you have left some fields empty',
                showCloseButton: true,
                showConfirmButton: false
                })</script>";
        }
        //empty=fields
    }
    elseif(!empty($_GET['user']))
    {
        if($_GET['user']=="welcome")
        {
            echo "<script> Swal.fire({
                position: 'center',
                imageUrl: '../../includes/images/admin2.png',
                imageWidth: 300,
                imageHeight: 400,
                title: 'Welcome ".$_SESSION['username']."',
                showConfirmButton: false,
                timer: 1000
                })</script>";
        }
        //user=welcome
    }
}
?>