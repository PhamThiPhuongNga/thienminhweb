<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Danh sách hình ảnh</h4>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tiêu đề tiếng việt</th>
								<th >Tiêu đề tiếng việt</th>
								<th>Sắp xếp</th>
								<th >Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($web_images as $web_image) {
								$i++;
							?>
								<tr class="<?php echo ($i % 2 == 1) ? 'bg-gray-light' : ''; ?> valign-middle">
									<td><?php echo $i ?></td>
									<td><?php echo   $web_image->title_vi?></td>
									<td><?php echo $web_image->title_en ?></td>
									<td>
										<input type="number" class="form-control" name="order" id="order" value="<?php echo  $web_image->order ?>" onchange="update_value_by_id('e4_chinhsach', 'order', '<?php echo $web_image->id ?>', this.value);" />
									</td>
									<td><?php echo  Model::web_image_view_link($web_image) ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</section>