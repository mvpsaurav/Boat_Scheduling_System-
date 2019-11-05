<?php $url=$_SERVER['REQUEST_URI'];?>
<div class="col-2 sidebar_container">
	<div class="logo"><span><img id="logo" src="../../includes/images/logo.jpg"><h1>B.S.S</h1></span>
	</div>
	<ul class="list-group sidebar_list">
		<?php if($_SESSION['userrole']==1)
		{?>
		<a href="../../modules/admin/employee_listing.php" class="<?php if($url == "/boat_token_system/modules/admin/employee_listing.php"){echo "sidebar_active";}else{echo "sidebar_list_li";}?>"><li >Employee</li></a>
		<?php }
		?>
		<a href="../../modules/admin/bo_listing.php" class="<?php if($url == "/boat_token_system/modules/admin/bo_listing.php"){echo "sidebar_active";}else{echo "sidebar_list_li";}?>"><li>BO Registration</li></a>
		<a href="../../modules/admin/boat_listing.php" class="<?php if($url == "/boat_token_system/modules/admin/boat_listing.php"){echo "sidebar_active";}else{echo "sidebar_list_li";}?>"><li>Boat Registration</li></a>
		<a href="../../modules/admin/generate_token.php" class="<?php if($url == "/boat_token_system/modules/admin/generate_token.php"){echo "sidebar_active";}else{echo "sidebar_list_li";}?>"><li>Generate Ticket</li></a>
		<a href="../../modules/admin/ticket_history.php"  class="<?php if($url == "/boat_token_system/modules/admin/ticket_history.php"){echo "sidebar_active";}else{echo "sidebar_list_li";}?>"><li>Ticket History</li></a>
		<a href="../../modules/logout.php"><li class="sidebar_list_li">Logout</li></a>
	</ul>
</div>