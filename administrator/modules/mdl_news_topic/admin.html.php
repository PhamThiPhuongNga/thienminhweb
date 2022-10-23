<?php
class View
{
	static function showNewsTopicManager()
	{
?>
		<section class="content-header">
			<h1>
				<a class="col-lg-3 col-md-4 col-sm-4 col-xs-12 btn-lg btn btn-warning " href="index.php?module=<?php echo $_REQUEST['module'] ?>"><i class="fa fa-folder"></i> Quản lý chủ đề tin tức</a>
			</h1>
		</section>
<?php
	}
	static function news_topic_view()
	{
		include("admin.html.news_topic_view.php");
	}
}
?>