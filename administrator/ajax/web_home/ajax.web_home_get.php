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
$database = new database($ariaConfig_server, $ariaConfig_username, $ariaConfig_password, $ariaConfig_database);
$ariacms = new ariacms();
$id = $_REQUEST['id'];
$query = "SELECT * FROM e4_web_home WHERE id = $id";
$database->setQuery($query);
$web_home_detail = $database->loadRow();
?>
<script>
x = document.getElementById("parent").value;
if( x== 90)
	 document.getElementById("display").style.display = "block";

function display() {
  var x = document.getElementById("parent").value;
 if(x == 90){
	 document.getElementById("display").style.display = "block";
 }
 else{
	 document.getElementById("display").style.display = "none";
 }
}
</script>
<div class="modal-editor modal-full">
	<form method="POST" action="?module=web_home&task=web_home_edit&id=<?php echo $id ?>" name="web_home_edit" id="web_home_edit" class="form-horizontal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Cập nhật thông tin chi tiết <small class="text-orange"><em>(Vui lòng nhập đầy đủ thông tin trường có dấu <font class="text-red">*</font>.)</em></small></h4>
			</div>
			<div class="modal-body modal-scroll">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a aria-expanded="true" href="#info_general" data-toggle="tab">Thông tin chung <font class="text-red">*</font></a></li>
						<button type="submit" class="btn btn-primary pull-left" name="submit" value="web_home_edit">Cập nhật</button>
					</ul>
					
					<div class="tab-content">
						<div class="active tab-pane" id="info_general">
							<div class="form-group">
								<label for="parent_id" class="col-sm-2 col-md-2 col-lg-2 control-label">Thuộc cấu hình cha :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<select name="parent" id="parent" class="form-control" onchange="display()">
										<option value="0" select = "selected"  >Vui lòng chọn</option>
										<?php 
											$query = "SELECT * FROM `e4_web_home` WHERE parent = 0 ORDER BY `parent` ASC";
											$database->setQuery($query);
											$categories = $database->loadObjectList();
											foreach($categories as $categorie){?>
												<option value="<?= $categorie->id ?>" <?php if( $categorie->id == $web_home_detail['parent']) echo "selected";?>><?= $categorie->title_vi  ?></option>
											<?php	
											}
										?>
									</select>
								</div>
								<label for="icon" class="col-sm-2 col-md-2 col-lg-2 control-label">Id (Liên kết với menu) :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" readonly name="icon" id="icon" type="text" placeholder="Chứa class font ví dụ: fa fa-eye, fa fa-laptop,..." value="<?php echo $web_home_detail['icon'] ?>" />
								</div>
							</div>
						
							<div class="form-group">
								<label for="link" class="col-sm-2 col-md-2 col-lg-2 control-label">Địa chỉ nút liên kết :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" name="link" id="link" type="text" value="<?php echo $web_home_detail['link'] ?>" placeholder="Địa chỉ url cho nút trong nội dung cấu hình nếu có..." />
								</div>
								<label for="link_name" class="col-sm-2 col-md-2 col-lg-2 control-label">Tên nút liên kết :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" name="link_name" id="link_name" type="text" value="<?php echo $web_home_detail['link_name'] ?>" placeholder="Tên hiển thị trên nút liên kết..." />
								</div>
							</div>

							<div class="form-group">
								<label for="image" class="col-sm-2 col-md-2 col-lg-2 control-label">Ảnh đại diện :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<?php if ($web_home_detail['image'] != '') { ?>
										<img style="height:75px;" id="newImg" txthide="image" class="choiceImg cursor " src="<?php echo $web_home_detail['image'] ?>" onclick="fcall.fcChoiceImg(this);" data-toggle="tooltip" title="Nhấn để chọn ảnh đại diện trên hệ thống" />
									<?php } else { ?>
										<img style="height:75px;" id="newImg" txthide="image" class="choiceImg cursor " src="templates/aptcms/dist/img/noimage.png" onclick="fcall.fcChoiceImg(this);" data-toggle="tooltip" title="Nhấn để chọn ảnh đại diện trên hệ thống" />
									<?php } ?>

								</div>
								<label for="file_download" class="col-sm-2 col-md-2 col-lg-2 control-label">File đính kèm :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<?php if ($web_home_detail['file_download'] != '') { ?>
										<input class="btn btn-info" id="newFile" txthide="file_download" class="choiceFile cursor " onclick="fcall.fcChoiceImg(this);" data-toggle="tooltip" title="Nhấn để chọn file khác trên hệ thống" type="button" value="Chọn file" />
										<a data-toggle="tooltip" href="<?php echo $web_home_detail['file_download'] ?>" target="_blank" title="Download file cũ" class="btn"><i class="fa fa-download margin"></i></a>
									<?php } else { ?>
										<input class="btn btn-info" id="newFile" txthide="file_download" class="choiceFile cursor " onclick="fcall.fcChoiceImg(this);" data-toggle="tooltip" title="Nhấn để chọn file trên hệ thống" type="button" value="Chọn file" />
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label for="image" class="col-sm-2 col-md-2 col-lg-2 control-label">Link ảnh :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control " id="image" name="image" type="text" placeholder="Dán đường dẫn ảnh..." value="<?php echo $web_home_detail['image'] ?>" />
								</div>
								<label for="file_download" class="col-sm-2 col-md-2 col-lg-2 control-label">Link file :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control " id="file_download" name="file_download" type="text" placeholder="Dán đường dẫn file..." value="<?php echo $web_home_detail['file_download'] ?>" />
								</div>
							</div>
								<div class="form-group">
								<label for="title_vi" class="col-sm-2 col-md-2 col-lg-2 control-label">Chủ đề Tiếng Việt :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" name="topic_vi" id="topic_vi" type="text" value="<?php echo $web_home_detail['topic_vi'] ?>" />
								</div>
								<label for="title_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Chủ đề Tiếng Anh :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" name="topic_en" id="topic_en" type="text" value="<?php echo $web_home_detail['topic_en'] ?>" />
								</div>
							</div>
								<div class="form-group">
								<label for="title_vi" class="col-sm-2 col-md-2 col-lg-2 control-label">Tiêu đề Tiếng Việt <span class="text-red">*</span> :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" name="title_vi" id="title_vi" type="text" required value="<?php echo $web_home_detail['title_vi'] ?>" />
								</div>
								<label for="title_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Tiêu đề Tiếng Anh :</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" name="title_en" id="title_en" type="text" value="<?php echo $web_home_detail['title_en'] ?>" />
								</div>
							</div>
			
							<div class="form-group" id="display" style='display: none'>
								<label for="date_start" class="col-sm-2 col-md-2 col-lg-2 control-label">Ngày bắt đầu:</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" name="date_start" id="date_start" type="date" value="<?php echo str_replace("/","-",date("Y/m/d",$web_home_detail['date_start']))?>" />
								</div>
								<label for="date_end" class="col-sm-2 col-md-2 col-lg-2 control-label">Ngày kết thúc:</label>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<input class="form-control" name="date_end" id="date_end" type="date" value="<?php echo str_replace("/","-",date("Y/m/d",$web_home_detail['date_end']))?>" />
								</div>
							</div>
							<div class="form-group" id ="brief">
								<label for="brief_vi" class="col-sm-2 col-md-2 col-lg-2 control-label">Giới thiệu Tiếng Việt :</label>
								<div class="col-sm-12 col-md-12 col-lg-12">
									<textarea class="form-control" rows="5" name="brief_vi" id="brief_vi" placeholder="Tóm tắt giới thiệu bản tin..."><?php echo $web_home_detail['brief_vi'] ?></textarea>
								</div>
								<script type="text/javascript" >
									CKEDITOR.replace('brief_vi', {
										// Reset toolbar settings, so full toolbar will be generated automatically.
										toolbarGroups: [{
												name: 'insert'
											},
											{
												name: 'others'
											},
											{
												name: 'paragraph',
												groups: ['align']
											},
											{
												name: 'basicstyles',
												groups: ['basicstyles']
											},
											{
												name: 'document',
												groups: ['mode', 'document', 'doctools']
											},
											{
												name: 'styles'
											}
										],
										removeButtons: null,
										height: 500,
										entities: false,
										fullPage: true,
										// Image browser
										filebrowserImageBrowseUrl: filemanageUrl,
										filebrowserImageUploadUrl: filemanageUrl,
										// allow style and css
										allowedContent: true,
										// auto wrap content in p tag
										autoParagraph: false
									});
								</script>
								<label for="brief_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Giới thiệu Tiếng Anh :</label>
								<div class="col-sm-12 col-md-12 col-lg-12">
									<textarea class="form-control" rows="5" name="brief_en" id="brief_en" placeholder="Tóm tắt giới thiệu bản tin..."><?php echo $web_home_detail['brief_en'] ?></textarea>
								</div>
								<script type="text/javascript">
						CKEDITOR.replace('brief_en', {
							// Reset toolbar settings, so full toolbar will be generated automatically.
							toolbarGroups: [{
									name: 'insert'
								},
								{
									name: 'others'
								},
								{
									name: 'paragraph',
									groups: ['align']
								},
								{
									name: 'basicstyles',
									groups: ['basicstyles']
								},
								{
									name: 'document',
									groups: ['mode', 'document', 'doctools']
								},
								{
									name: 'styles'
								}
							],
							removeButtons: null,
							height: 500,
							entities: false,
							fullPage: true,
							// Image browser
							filebrowserImageBrowseUrl: filemanageUrl,
							filebrowserImageUploadUrl: filemanageUrl,
							// allow style and css
							allowedContent: true,
							// auto wrap content in p tag
							autoParagraph: false
						});
					</script>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary pull-left" name="submit" value="web_home_edit">Cập nhật</button>
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng lại</button>
			</div>
		</div><!-- /.modal-content -->
	</form>
</div><!-- /.modal-dialog -->