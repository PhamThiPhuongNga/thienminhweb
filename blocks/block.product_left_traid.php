<?php 
global $database;
global $ariacms;
global $params;
global $web_menus;

$min_price =(trim($_REQUEST["min_price"]) != '' && trim($_REQUEST["min_price"]) != 'undefined') ? trim($_REQUEST["min_price"]) : 0; 
$max_price =(trim($_REQUEST["max_price"]) != '' && trim($_REQUEST["max_price"]) != 'undefined') ? trim($_REQUEST["max_price"]) : 600000;
if($_POST["key"]!="" or POST["key"]!=null){
	$key = $_POST["key"];
	$where = $where. " and a.title_vi like '%{$key}%' or a.title_en like '%{$key}%'";
}else{
	$key= '';
}

	// $web_menu->{$params->title}
$query = "SELECT * FROM `e4_term_taxonomy` where taxonomy ='product_category'  order by id DESC"; 
//echo $query;die();
$database->setQuery($query);
$menus = $database->loadObjectList();
  // print_r($menus); die();

$query = "SELECT * FROM `e4_term_taxonomy` where `taxonomy` ='product_category' and `parent` > 0 group by `parent` ORDER BY `id` ASC ";
$database->setQuery($query);
$cat_menus = $database->loadObjectList();

?>

<div class="col-order-inner">

	<div class="panel panel-default pt-filter">
		<div class="panel-heading layered-heading"><?= _FILTER_BY_PRICE?></div>
		<div class="layered">
			<div class="list-group">
				<div class="filter-attribute-container filter-attribute-remove-container">

					<!-- <div class="filter-attribute-container">
						<label><?= _FILTER_BY_PRICE?></label>
						<form method="POST" action="#">
						<div class="list-group-item">
							<div class="filter-price">
								<div id="slider-price"></div>
								<div class="slider-values">
									<span>VNĐ</span>
									<input id="price-from" disabled="disabled" class="input-price" type="submit" value="<?= $min_price?>" placeholder="Min" name="min_price"/>
									<span></span><em>-</em>
									<span>VNĐ</span>
									<input id="price-to" disabled="disabled" class="input-price" type="submit" value="<?= $max_price?>" placeholder="Max" name="max_price" />
									<span></span>
									<input type="hidden" name="key" value="<?= $key?>">
								</div>
							</div>
						</div>
					</form>
					</div> -->
				
				</div>


				
				
				<div class="block woocommerce widget_price_filter">
					<div class="block-title"><?= _FILTER_BY_PRICE?></div>
					<form method="POST" action="#">
						<div class="price_slider_wrapper">
							<div class="price_slider" style="display:none;"></div>
							<div class="price_slider_amount" data-step="5000">
								<input type="text" id="min_price" name="min_price" value="<?= $min_price?>" data-min="0" placeholder="Min price" style="width: 90px;"/>
								<strong>VNĐ</strong>
								<input type="text" id="max_price" name="max_price" value="<?= $max_price?>" data-max="600000" placeholder="Max price" style="width: 90px; margin-left: 10px;"/>
								<strong>VNĐ</strong>
								<input type="hidden" name="key" value="<?= $key?>"> 
								<button type="submit" class="button" style="margin-left: 15px;"><?= _FILTER?></button>
								<div class="price_label" style="display:none;"> <?= _PRICE?>: <span class="from"></span> &mdash; <span class="to"></span></div>
								<div class="clear"></div>
							</div>
						</div>
					</form>
				</div> 
				
			</div>
		</div>
		<input type="hidden" class="filter-url" value="indexac04.json?route=plaza/filter/category&amp;path=60" />
		<input type="hidden" class="price-url" value="indexac04.json?route=plaza/filter/category&amp;path=60" />
	</div>
	<!-- END Price -->
	<script type="text/javascript">
		var filter_url = '';
		var ids = [];
		var min_price = parseFloat('0');
		var max_price = parseFloat('600000');
		var current_min_price = parseFloat($('#price-from').val());
		var current_max_price = parseFloat($('#price-to').val());

		$('#slider-price').slider({
			range   : true,
			min     : min_price,
			max     : max_price,
			values  : [ current_min_price, current_max_price ],
			slide   : function (event, ui) {
				$('#price-from').val(ui.values[0]);
				$('#price-to').val(ui.values[1]);
				current_min_price = ui.values[0];
				current_max_price = ui.values[1];
			},
			stop    : function (event, ui) {
				filter_url = $('.price-url').val();
				filter_url += '&price=' + current_min_price + ',' + current_max_price;
				ptfilter.filter(filter_url);
			}
		});

		$('.a-filter').click(function () {
			var id = $(this).attr('name');
			var filter_ids;
			filter_url = $('.filter-url').val();
			if($(this).hasClass('add-filter') == true) {
				ids.push(id);
			} else if($(this).hasClass('remove-filter') == true) {
				ids = $.grep(ids, function (value) {
					return value != id;
				});
			}
			filter_ids = ids.join(',');
			filter_url += '&filter=' + filter_ids;
			ptfilter.filter(filter_url);
		});

		$('.clear-filter').click(function () {
			ids = [];
		});

		$(document).ajaxComplete(function () {
			var current_min_price = parseFloat($('#price-from').val());
			var current_max_price = parseFloat($('#price-to').val());

			$('#slider-price').slider({
				range   : true,
				min     : min_price,
				max     : max_price,
				values  : [ current_min_price, current_max_price ],
				slide   : function (event, ui) {
					$('#price-from').val(ui.values[0]);
					$('#price-to').val(ui.values[1]);
					current_min_price = ui.values[0];
					current_max_price = ui.values[1];
				},
				stop    : function (event, ui) {
					filter_url = $('.price-url').val();
					filter_url += '&price=' + current_min_price + ',' + current_max_price;
					ptfilter.filter(filter_url);
				}
			});

			$('.a-filter').click(function () {
				var id = $(this).attr('name');
				var filter_ids = '';
				filter_url = $('.filter-url').val();

				if($(this).hasClass('add-filter') == true) {
					ids.push(id);
				} else if($(this).hasClass('remove-filter') == true) {
					ids = $.grep(ids, function (value) {
						return value != id;
					});
				}
				filter_ids = ids.join(',');
				filter_url += '&filter=' + filter_ids;
				ptfilter.filter(filter_url);
			});

			$('.clear-filter').click(function () {
				ids = [];
			});
		});
	</script>
	<!-- <div class="popular-tags">
		<div class="title"><h3>Popular Tags</h3></div>

		<ul>
			<li>                                                  			
				<a href="index403c.html?route=product/search&amp;search=Fresh%20Fruit">Fresh Fruit</a>
				<a href="index9575.html?route=product/search&amp;search=%20Fresh%20Vegetables"> Fresh Vegetables</a>
				<a href="index55f7.html?route=product/search&amp;search=Fresh%20Salad">Fresh Salad</a>
				<a href="index5b88.html?route=product/search&amp;search=%20Butter%20&amp;%20Eggs"> Butter &amp; Eggs</a>
				<a href="index5fbb.html?route=product/search&amp;search=Milk">Milk</a>
				<a href="index7ad1.html?route=product/search&amp;search=Salad%20&amp;%20Dips">Salad &amp; Dips</a>
				<a href="index4c5c.html?route=product/search&amp;search=Bananas">Bananas</a>

			</li>
		</ul>
	</div> -->
	

	
</div>

