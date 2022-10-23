<?php
global $database;
global $ariacms;
global $params;
// echo "AAAAAAAAAAAAAAAAAAAAA";die;
$min_price =(trim($_REQUEST["min_price"]) != '' && trim($_REQUEST["min_price"]) != 'undefined') ? trim($_REQUEST["min_price"]) : 0; 
$max_price =(trim($_REQUEST["max_price"]) != '' && trim($_REQUEST["max_price"]) != 'undefined') ? trim($_REQUEST["max_price"]) : 600000;
$where = " where post_type = 'product' and product_sale >=".$min_price ." and product_sale <".$max_price;
$task = $ariacms->getParam("task");
if(isset($task)){
	$where = $where." and c.url_part = '".$task."' ";
	$task = "san-pham/".$task.".html";
}else{
	$task = "san-pham.html";
}
	//$S =(trim($_REQUEST["s"]) != '' && trim($_REQUEST["s"]) != 'undefined') ? trim($_REQUEST["s"]) : "aaaa"; 
$key= '';
if($_POST["key"] != "" or $_POST["key"]!= null){
	$key = $_POST["key"];
	$where = $where. " and a.title_vi like '%{$key}%'";
}else{
	$key= '';
}
//phân trang
$maxRows = $ariacms->web_information->product_per_page; 

if(trim($ariacms->getParaUrl('?curPg')) != '' && trim($ariacms->getParaUrl('?curPg')) != 'undefined'){
	$page = trim($ariacms->getParaUrl('?curPg'));
}else if($_POST["page"]){
	$page = $_POST["page"];
}
else{
	$page =1;
}
// echo 'AAAAAAAAAAAAAAAAAA'.$page;

$curPg = ($page > 0) ? $page : 1;
		$curRow = ($curPg - 1) * $maxRows;
		$limit = " LIMIT " . $curRow . "," . $maxRows . " ";
// $page_from = ($page-1)*$maxRows; 
// $page_to = ($page-1)*$maxRows +$maxRows;
// $limit = " limit " . $page_from . ",". $page_to ." "; 

	// lấy sản phẩm
$query = "SELECT a.*,c.title_vi as danhmuc_vi,c.title_en as danhmuc_en FROM `e4_posts` a 
left join `e4_term_relationships` b on a.id = b.object_id 
left join `e4_term_taxonomy` c on c.id = b.term_taxonomy_id or b.term_taxonomy_id in((SELECT id from e4_term_taxonomy WHERE parent = c.id ))"
.$where. " group by id order by a.id desc ".$limit;
// echo $query; die();
$database->setQuery($query);
$products = $database->loadObjectList();

$query = "SELECT COUNT(*) total FROM e4_posts WHERE post_type = 'product'";
		$database->setQuery($query);
		$totalRows = $database->loadRow();

$count_product = $totalRows['total'];

$query = "	SELECT count(a.id) total FROM `e4_posts` a 
left join `e4_term_relationships` b on a.id = b.object_id 
left join `e4_term_taxonomy` c on c.id = b.term_taxonomy_id "
.$where. " group by id order by a.id desc";

$database->setQuery($query);
$count = $database->loadRow();
$count = $count["total"];
$count_page = number_format($count/6 + 1,0);

	// lấy banner chính
$query = "SELECT a.* from e4_web_home a where a.parent > 0 and a.`icon` = 4 and status = 'active' ORDER BY `a`.`order` ";
$database->setQuery($query);
$banner_mains = $database->loadObjectList();  
//$maxRows = $ariacms->web_information->product_per_page; 
//$maxRows = 3; 

?>
<div class="custom-category">
	<?php if(count($products)==0){?>
		<p class="woocommerce-info"><?= _No_PRODUCT?></p>
	<?php } else {?> 
		<div class="tool-bar">
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="btn-group btn-group-sm">
						<button type="button" onclick="category_view.changeView('grid', 1, 'btn-grid-1')" class="btn btn-default btn-custom-view btn-grid-1" data-toggle="tooltip" data-placement="top" title="1">1</button>
						<button type="button" onclick="category_view.changeView('grid', 2, 'btn-grid-2')" class="btn btn-default btn-custom-view btn-grid-2" data-toggle="tooltip" data-placement="top" title="2">2</button>
						<button type="button" onclick="category_view.changeView('grid', 3, 'btn-grid-3')" class="btn btn-default btn-custom-view btn-grid-3" data-toggle="tooltip" data-placement="top" title="3">3</button>
						<button type="button" onclick="category_view.changeView('grid', 4, 'btn-grid-4')" class="btn btn-default btn-custom-view btn-grid-4" data-toggle="tooltip" data-placement="top" title="4">4</button>
						<button type="button" onclick="category_view.changeView('grid', 5, 'btn-grid-5')" class="btn btn-default btn-custom-view btn-grid-5" data-toggle="tooltip" data-placement="top" title="5">5</button>
						<button type="button" onclick="category_view.changeView('list', 0, 'btn-list')" class="btn btn-default btn-custom-view btn-list" data-toggle="tooltip" data-placement="top" title="List"></button>
						<input type="hidden" id="category-view-type" value="grid" />
						<input type="hidden" id="category-grid-cols" value="4" />
					</div>
				</div>
				
				<div class="col-md-3 col-xs-6">
					<div class="form-group input-group input-group-sm">
						<form action="/<?= $task?>" method="POST">
							<input type="hidden" name="min_price" value="<?= $min_price?>"> 
							<input type="hidden" name="max_price" value="<?= $max_price?>"> 
							<input type="hidden" name="key" value="<?= $key?>"> 
							<input type="hidden" name="page" value="<?= $page?>"> 
							<!-- <button name="btn" class="button btn-cart"  value="gird"style="border-radius: 4px;background-color: #88be4c;"><?= _GRID?> </button>
								<button name="btn"class="button" style="border-radius: 4px;" value="list"> <?= _LIST?> </button> -->
							</form>
						</div>
					</div>
				

				</div>

			</div>

			<div class="row">

				<!--showsanpham-->
				<?php foreach($products as $product){?>
					<div class="product-layout product-list col-xs-12 product-items">
						<div class="product-thumb">
							<div class="product-item">	

								<div class="image rotate-image-container">
									<div class="inner">

										<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html">
											<img src="<?= $product->image?>" alt="ante sodales bibendum" title="ante sodales bibendum" class="img-responsive img-default-image" />
											<img src="<?= $product->image?>" alt="ante sodales bibendum" title="ante sodales bibendum" class="img-responsive img-rotate-image" />
										</a>
										<div class="button-group">
											<div class="inner">
												<button type="button" class="button-wishlist"  title="Add to Wish List" onclick="addWish(<?=$product->id?>)"><span><?=_ADD_TO_WISHLIST?></span></button>
												<!-- <button type="button" class="button-compare"  title="Compare this Product" onclick="compare.add('32');"><span>Compare this Product</span></button> -->

												<button class="button-quickview" type="button"  title="Quick View" onclick="view(<?= $product->id?>)"><span>Quick View</span></button>
												<button type="button" class="button-cart"  title="Add to Cart" onclick="addCart(<?= $product->id?>)"><span><?=_ADD_TO_CART?></span></button>
											</div>
										</div>

									</div>
								</div>

								<div class="caption">
									<div class="inner">
										<h4><a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><?= $product->{$params->title}?></a></h4>
										<p class="manufacture-product">
											<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><?php if($_SESSION['steam_lang'] == en){echo $product->danhmuc_en ;}
											else {
												echo $product->danhmuc_vi;
											}?></a>
										</p>

										<div>
											<p class="price"> 			<?= $product->product_sale ;?> VNĐ
												<!-- <span class="price-tax">Ex Tax: $100.00</span>  </p> -->
												<div class="box-label">
												</div>
											</div>
											<p class="product-description"><?= $product->{$params->brief}?></p>
											<button type="button" class="button-cart"  title="Add to Cart" onclick="addCart(<?= $product->id?>)"><span><?=_ADD_TO_CART?></span></button>
										</div>

									</div>

								</div>
							</div>
						</div>
						<!---->
					<?php }?>
				</div>	


				<div class="tool-bar-bottom">
					<div class="row">
						<div class="col-sm-6 show-page text-left">
							<ul class="pagination">
								<?= $ariacms->paginationPublic($count_product,$maxRows, 12) ?>
							</ul>
						</div>
						<!-- <div class="col-sm-6 text-right">Showing 1 to 6 of 8 (2 Pages)</div> -->
					</div>
				</div> 

			<?php }?>

		</div>	











