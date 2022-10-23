<?php
global $actual_link;
global $database;
global $title;
global $brief;
global $title_ca;
$id = GetId();
$query = "	select a.id,
						a.title_vn,
						a.title_en,
						a.brief_vn,
						a.brief_en,
						a.meta_keyword_vn,
						a.meta_keyword_en,
						a.meta_description_vn,
						a.meta_description_en,
						a.visited_count,
						a.copywriter,
						a.category_id,
						a.image,
						a.image_thumb,
						a.date_created,
						a.date_updated,
						b.title_vn ca_title_vn,
						b.title_en ca_title_en
					from e4_news a 
						left join e4_news_categories b on a.category_id = b.id 
					where a.status = 'active' AND b.status = 'active' 
						AND a.id != $id AND b.id IN (
							SELECT category_id FROM e4_news WHERE id = $id 
							UNION SELECT id FROM e4_news_categories WHERE parent_id = (SELECT category_id FROM e4_news WHERE id = $id )
						)
					
					order by a.region , a.id DESC LIMIT 0,5";

$database->setQuery($query);
$rows = $database->loadObjectList();
?>
<div class="side-widget">
	<h5 class="boxed-title"><?php echo _NEWS_RELATED; ?></h5>
	<ul class="vlinks vlinks-iconed vlinks-ruled-dots vlinks-lg">
		<?php
		foreach ($rows as $row) {
		?>
			<li>
				<img src="<?php echo ($row->image_thumb != '') ? $row->image_thumb : $row->image; ?>" alt="<?php echo $row->$title ?>" class="img">
				<a class="title" href="<?php echo $actual_link . 'tin-tuc/' . strtolower(ConvertFont_url($row->$title_ca)) . '/' . strtolower(ConvertFont_url($row->$title)) . '-' . $row->id . '.html'; ?>"><?php echo $row->$title ?></a>
				<span class="meta"><?php echo text_limit($row->$brief, 10); ?></span>
			</li>
		<?php
		}
		?>
	</ul>
</div>