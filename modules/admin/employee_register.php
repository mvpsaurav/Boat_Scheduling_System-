<?php
require"../../includes/admin/layout/head.php";
require"../../includes/admin/layout/sidebar.php";
require"../../includes/admin/layout/header.php";?>
<div class="container">
    <div class="row">
            <div class="col">




<form action="../../scripts/admin/employee_register_script.php" method="post">
user name:<input type="text" name="user_name">
<br>full name:<input type="text" name="full_name">
<br>user email:<input type="text" name="user_email">
<br>mobile number:<input type="text" name="mobile_number">
<br>user password:<input type="password" name="password">
<br>confirm password:<input type="password" name="confirm_password">
<br><button type="submit">Register</button>
</form>




        </div>
    </div>
</div>
