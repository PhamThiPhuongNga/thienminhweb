<?php
session_start();
if (file_exists("../../../configuration.php")) {
	require_once("../../../configuration.php");
} else {
	echo "Missing Configuration File";
	exit();
}
//Include Database Controller
if (file_exists("../../../include/database.php")) {
	require_once("../../../include/database.php");
} else {
	echo "Missing Database File";
	exit();
}
//Include System File
if (file_exists("../../../include/ariacms.php")) {
	require_once("../../../include/ariacms.php");
} else {
	echo "Missing System File";
	exit();
}

?>
<div class="modal-editor">
	<form method="POST" action="?module=chinhsach&task=web_image_add" name="web_image_add" id="web_image_add" class="form-horizontal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Cập nhật thông tin chi tiết <small class="text-orange"><em>(Vui lòng nhập đầy đủ thông tin trường có dấu <font class="text-red">*</font>.)</em></small></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="title_vi" class="col-sm-2 col-md-2 col-lg-2 control-label">Tiêu đề tiếng viêt <span class="text-red">*</span> :</label>
					<div class="col-sm-10 col-md-10 col-lg-10">
						<input class="form-control" name="title_vi" id="title_vi" type="text" required value="" />
					</div>
					
				</div>
				<div class="form-group">
					
					<label for="title_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Tiêu đề tiếng anh:</label>
					<div class="col-sm-10 col-md-10 col-lg-10">
						<input class="form-control" name="title_en" id="title_en" type="text" value="" />
					</div>
				</div>
				<div class="form-group">
					<label for="order" class="col-sm-2 col-md-2 col-lg-2 control-label">Vị trí :</label>
					<div class="col-sm-10 col-md-10 col-lg-10">
						<input class="form-control " id="order" name="order" type="text" placeholder="Vị trí hiển thị" />
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary pull-left" name="submit" value="web_image_add">Cập nhật</button>
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng lại</button>
			</div>
		</div><!-- /.modal-content -->
	</form>
</div><!-- /.modal-dialog -->