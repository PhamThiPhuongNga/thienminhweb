<?php
class View
{

    public static function detail_product($detail, $product_relateds, $images)
    {
        include "html.detail_product.php";
    }
    public static function detail_news($detail, $taxonomies, $news_relateds)
    {
        include "html.detail_news.php";
    }
}
