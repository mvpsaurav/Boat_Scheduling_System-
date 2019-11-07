<?php $url=$_SERVER['REQUEST_URI'];?>
<div class="col-2 sidebar_container">
	<div class="logo"><span><img id="logo" src="../../includes/images/logo.jpg"><h1>B.S.S</h1></span>
	</div>
	<ul class="list-group sidebar_list">
		<a href="../../modules/bo/boat_listing.php" class="<?php if($url == "/boat_token_system/modules/bo/boat_listing.php"){echo "sidebar_active";}else{echo "sidebar_list_li";}?>"><li>My Boats</li></a>
		<a href="../../modules/logout.php"><li class="sidebar_list_li">Logout</li></a>
	</ul>
</div>