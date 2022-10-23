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
$query = "SELECT a.*, count(b.parent) sub FROM e4_term_taxonomy a 
	LEFT JOIN (SELECT parent FROM e4_term_taxonomy ) b ON a.id = b.parent 
	GROUP BY a.id ORDER BY a.order ";
$database->setQuery($query);
$taxonomies = $database->loadObjectList();
?>
<div class="modal-dialog modal-full">
	<form method="POST" action="?module=product&task=product_add" name="product_add" id="product_add" class="form-horizontal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Cập nhật thông tin chi tiết</h4>
			</div>
			<div class="modal-body modal-scroll">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a aria-expanded="true" href="#info_general" data-toggle="tab">Thông tin chung <font class="text-red">*</font></a></li>
						<li><a aria-expanded="false" href="#info_document" data-toggle="tab">Thông tin tài liệu</a></li>
						<li><a aria-expanded="false" href="#info_other" data-toggle="tab">Thông tin SEO</a></li>
					</ul>
					<div class="tab-content">
						<div class="active tab-pane" id="info_general">
							<div class="form-group">
								<label for="title_vi" class="col-sm-6 col-md-6 col-lg-6">Tiêu đề Tiếng Việt <span class="text-red">*</span></label>
								<label for="title_en" class="col-sm-6 col-md-6 col-lg-6">Hãng sản xuất</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input class="form-control" name="title_vi" id="title_vi" type="text" required />
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input class="form-control" name="title_en" id="title_en" type="text" />
								</div>
							</div>
							<div class="form-group">
								<label for="product_sale" class="col-sm-6 col-md-6 col-lg-6">Giá bán ra</label>
								<label for="product_price" class="col-sm-6 col-md-6 col-lg-6">Giá ban đầu (nếu có)</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input class="form-control" name="product_sale" id="product_sale" type="number" value="0" />
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input class="form-control" name="product_price" id="product_price" type="number" value="0" />
								</div>
							</div>
							<div class="form-group">
								<label for="VAT" class="col-sm-6 col-md-6 col-lg-6">Thuế VAT(%)</label>
								<label for="Eco-tax" class="col-sm-6 col-md-6 col-lg-6">Eco-tax</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input class="form-control" name="VAT" id="VAT" type="number" value="0" />
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input class="form-control" name="Eco_tax" id="Eco_tax" type="number" value="0" />
								</div>
							</div>
							<div class="form-group">
								<label for="brief_vi" class="col-sm-6 col-md-6 col-lg-6">Mã sản phẩm</label>
								<label for="brief_en" class="col-sm-6 col-md-6 col-lg-6">Xuất xứ sản phẩm</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<textarea class="form-control" rows="3" name="brief_vi" id="brief_vi" placeholder="Mã sản phẩm"></textarea>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<textarea class="form-control" rows="3" name="brief_en" id="brief_en" placeholder="Xuất xứ sản phẩm"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="content_vi" class="col-sm-12 col-md-12 col-lg-12">Nội dung Tiếng Việt</label>
								<div class="col-sm-12 col-md-12 col-lg-12">
									<textarea class="form-control" name="content_vi" id="content_vi"></textarea>
								</div>
								<script type="text/javascript">
									CKEDITOR.replace('content_vi', {
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
							<!--<div class="form-group">
								<label for="content_en" class="col-sm-12 col-md-12 col-lg-12">Nội dung Tiếng Anh</label>
								<div class="col-sm-12 col-md-12 col-lg-12">
									<textarea class="form-control" name="content_en" id="content_en"></textarea>
								</div>
								<script type="text/javascript">
									CKEDITOR.replace('content_en', {
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
							</div>-->
						</div>

						<div class=" tab-pane" id="info_document">
							<div class="form-group">
								<div class="col-sm-6 col-md-6 col-lg-6">
									<label for="image">Ảnh đại diện<span class="text-red">*</span>:</label>
									<input class="btn btn-info margin" id="newImg" txthide="image" class="choiceFile cursor margin" onclick="fcall.fcChoiceImg(this);" data-toggle="tooltip" title="Nhấn để chọn ảnh trên hệ thống" type="button" value="Chọn ảnh" />
									<input class="form-control" id="image" name="image" type="text" placeholder="Đường dẫn ảnh..." required />
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<label for="image_thumb">Ảnh thumb thu nhỏ:</label>
									<input class="btn btn-info margin" id="newImgThumb" txthide="image_thumb" class="choiceFile cursor margin" onclick="fcall.fcChoiceImg(this);" data-toggle="tooltip" title="Nhấn để chọn ảnh trên hệ thống" type="button" value="Chọn ảnh" />
									<input class="form-control " id="image_thumb" name="image_thumb" type="text" placeholder="Đường dẫn ảnh..." />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6 col-md-6 col-lg-6">
									<label>Danh mục - Category</label>
									<select class="form-control select2" id="category" name="taxonomy[]" data-placeholder="Chọn danh mục..." style="width: 100%;">
										<?php
										foreach ($taxonomies as $taxonomy) {
											if ($taxonomy->taxonomy == 'product_category' && $taxonomy->parent == 0) {
												echo '<option value="' . $taxonomy->id . '">' . $taxonomy->title_vi . '</option>';
												if ($taxonomy->sub > 0) {
													foreach ($taxonomies as $taxonomy_sub) {
														if ($taxonomy->id == $taxonomy_sub->parent) {
															echo '<option value="' . $taxonomy_sub->id . '">- - ' . $taxonomy_sub->title_vi . '</option>';
														}
													}
												}
											}
										}
										?>
									</select>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<label>Nhóm sp - Group</label>
									<select class="form-control select2" id="group" name="taxonomy[]" multiple="multiple" data-placeholder="Chọn danh mục..." style="width: 100%;">
										<?php
										foreach ($taxonomies as $taxonomy) {
											if ($taxonomy->taxonomy == 'product_group' && $taxonomy->parent == 0) {
												echo '<option value="' . $taxonomy->id . '">' . $taxonomy->title_vi . '</option>';
												if ($taxonomy->sub > 0) {
													foreach ($taxonomies as $taxonomy_sub) {
														if ($taxonomy->id == $taxonomy_sub->parent) {
															echo '<option value="' . $taxonomy_sub->id . '">- - ' . $taxonomy_sub->title_vi . '</option>';
														}
													}
												}
											}
										}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-6 col-md-6 col-lg-6">
									<label for="post_status">Trạng thái và hiển thị:</label>
									<select id="post_status" name="post_status" class="form-control">
										<option value="">- Chọn -</option>
										<option value="active" selected>Còn hàng</option>
										<!-- <option value="waiting">Chờ duyệt</option> -->
										<option value="deactive">Hết Hàng</option>
									</select>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<label for="rating">Đánh giá:</label>
									<select id="rating" name="rating" class="form-control">
										<option value="0">- Chọn -</option>
										<option value="1">1 sao</option>
										<option value="2">2 sao</option>
										<option value="3">3 sao</option>
										<option value="4">4 sao</option>
										<option value="5">5 sao</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<input style="margin-bottom:10px;" class="btn btn-warning" onclick="AddNewImage();" data-toggle="tooltip" title="Nhấn để chọn thêm ảnh cho sản phẩm" type="button" value="Thêm ảnh mới" />
									Danh sách hình ảnh sản phẩm
									<div class="col-xs-12" id="imagelist">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="chinhsach_vi" class="col-sm-12 col-md-12 col-lg-12">Chính sách sản phẩm Tiếng Việt</label>
								<div class="col-sm-12 col-md-12 col-lg-12">
									<textarea class="form-control" name="chinhsach_vi" id="chinhsach_vi"></textarea>
								</div>
								<script type="text/javascript">
									CKEDITOR.replace('chinhsach_vi', {
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
							<div class="form-group">
								<label for="chinhsach_en" class="col-sm-12 col-md-12 col-lg-12">Chính sách sản phẩm tiếng anh</label>
								<div class="col-sm-12 col-md-12 col-lg-12">
									<textarea class="form-control" name="chinhsach_en" id="chinhsach_en"></textarea>
								</div>
								<script type="text/javascript">
									CKEDITOR.replace('chinhsach_en', {
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

						<div class="tab-pane" id="info_other">
							<p id="error_url_part" class="col-sm-9 col-md-9 col-lg-9 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 text-danger"></p>
							<div class="form-group">
								<label for="url_part" class="col-sm-3 col-md-3 col-lg-3 control-label">Đường dẫn URL:</label>
								<div class="col-sm-9 col-md-9 col-lg-9">
									<input class="form-control" name="url_part" id="url_part" type="text" onblur="check_value_exist('', '#url_part', 'e4_posts', 'url_part', '#error_url_part', 'Đường dẫn URL');" />
								</div>

							</div>

							<div class="form-group">
								<label for="meta_title_vi" class="col-sm-3 col-md-3 col-lg-3 control-label">Meta Title Tiếng Việt:</label>
								<div class="col-sm-9 col-md-9 col-lg-9">
									<input class="form-control" name="meta_title_vi" id="meta_title_vi" type="text" />
								</div>
							</div>
							<div class="form-group">
								<label for="meta_title_en" class="col-sm-3 col-md-3 col-lg-3 control-label">Meta Title Tiếng Anh:</label>
								<div class="col-sm-9 col-md-9 col-lg-9">
									<input class="form-control" name="meta_title_en" id="meta_title_en" type="text" />
								</div>
							</div>
							<div class="form-group">
								<label for="meta_keyword_vi" class="col-sm-3 col-md-3 col-lg-3 control-label">Meta Keyword Tiếng Việt:</label>
								<div class="col-sm-9 col-md-9 col-lg-9">
									<input class="form-control" name="meta_keyword_vi" id="meta_keyword_vi" type="text" />
								</div>
							</div>
							<div class="form-group">
								<label for="meta_keyword_en" class="col-sm-3 col-md-3 col-lg-3 control-label">Meta Keyword Tiếng Anh:</label>
								<div class="col-sm-9 col-md-9 col-lg-9">
									<input class="form-control" name="meta_keyword_en" id="meta_keyword_en" type="text" />
								</div>
							</div>
							<div class="form-group">
								<label for="meta_description_vi" class="col-sm-3 col-md-3 col-lg-3 control-label">Meta Description Tiếng Việt:</label>
								<div class="col-sm-9 col-md-9 col-lg-9">
									<input class="form-control" name="meta_description_vi" id="meta_description_vi" type="text" />
								</div>
							</div>
							<div class="form-group">
								<label for="meta_description_en" class="col-sm-3 col-md-3 col-lg-3 control-label">Meta Description Tiếng Anh:</label>
								<div class="col-sm-9 col-md-9 col-lg-9">
									<input class="form-control" name="meta_description_en" id="meta_description_en" type="text" />
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary" name="submit" value="product_add">Cập nhật</button>
						<button type="button" class="btn btn-default " data-dismiss="modal">Đóng lại</button>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</form>
</div><!-- /.modal-dialog -->
<script>
	$(".select2").select2();
	var index_image = 0;

	function AddNewImage() {
		index_image++;
		var value_append = '<div class="form-group"><div class="col-md-2" style="padding-left:0px;"><input class="btn btn-info form-control" onclick="fcall.fcChoiceImg(this);" txthide="imagelist_' + index_image + '" type="button" value="Chọn file ảnh ' + index_image + '" name="imageadd[' + index_image + ']" id="imageadd_' + index_image + '" /></div><div class="col-md-10" style="padding-left:0px;"><input class="form-control" type="text" name="imagelist[' + index_image + ']" id="imagelist_' + index_image + '" txthide="imagelist_' + index_image + '" ondblclick="fcall.fcChoiceImg(this);" placeholder="Đường dẫn ảnh ' + index_image + ' cho sản phẩm" /></div></div>';
		$('#imagelist').append(value_append);
	}
</script>