<?php
global $ariacms;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn">
<?php include "layout/block.head.php"; ?>

<body class="sidebar-mini skin-green fixed <?=(isset($_COOKIE["sidebar_config"]))?$_COOKIE["sidebar_config"]:""; ?>">
	<div class="wrapper">
		<?php include "layout/block.header.php"; ?>
		<?php include "layout/block.left.php"; ?>
		<div class="content-wrapper">
			<?php $ariacms->getAdminBodyContent(); ?>
		</div>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.0.0
			</div>
			Copyright &copy; 2020 by <strong>STeam.</strong> All rights reserved.
		</footer>
	</div>
	<div class="modal fade " id="showCNTT" role="dialog" aria-hidden="true">
	</div>
	<?php include "layout/block.footer.php"; ?>
</body>

</html>