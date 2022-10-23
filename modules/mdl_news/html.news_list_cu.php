<?php
global $database;
global $ariacms;
global $params;
global $ariaConfig_template;
global $analytics_code;


       
?>
<!DOCTYPE html>

<html dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=_BLOG?></title>
<link href="/templates/traid/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/jquery/swiper/css/swiper.min.css" rel="stylesheet" type="text/css" />
<!-- icon font -->
<link href="/templates/traid/catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/templates/traid/catalog/view/javascript/ionicons/css/ionicons.css" rel="stylesheet" type="text/css" />
<!-- end icon font -->
<!-- end -->
<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/stylesheet.css" rel="stylesheet">
<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/header/header1.css" rel="stylesheet">
<link href="/templates/traid/atalog/view/theme/tt_amino1/stylesheet/plaza/theme.css" rel="stylesheet">
<link href="/templates/traid/catalog/view/javascript/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet">
<script src="/templates/traid/catalog/view/javascript/jquery/jquery-3.1.1.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/swiper/js/swiper.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/ultimatemenu/menu.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/newsletter/mail.js" ></script>
<script src="/templates/traid/catalog/view/javascript/common.js" ></script>
 <!-- <link href="<?=$ariacms->actual_link?>/blog.html" rel="" />  -->
<link rel="icon" href="<?= $ariacms->web_information->{'image-icon'} ?>">
  <!-- Quick view -->
      <script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/cloud-zoom.1.0.2.min.js" ></script>
    <script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/zoom.js" ></script>
    <script src="/templates/traid/catalog/view/javascript/plaza/quickview/quickview.js" ></script>
    <link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/quickview/quickview.css" rel="stylesheet" type="text/css" />
    <!-- General -->
  <!-- Sticky Menu -->
  	<script >
	 $(document).ready(function () {	
		var height_box_scroll = $('.scroll-fix').outerHeight(true);
	  $(window).scroll(function () {
		if ($(this).scrollTop() > 800) {
			$('.scroll-fix').addClass("scroll-fixed");
			$('body').css('padding-top',height_box_scroll);
		} else {
			$('.scroll-fix').removeClass("scroll-fixed");
			$('body').css('padding-top',0);
		}
	  });
	});
	</script>
    <!-- Scroll Top -->
      <script>
      $("#back-top").hide();
      $(function () {
        $(window).scroll(function () {
          if ($(this).scrollTop() > $('body').height()/3) {
            $('#back-top').fadeIn();
          } else {
            $('#back-top').fadeOut();
          }
        });
        $('#back-top').click(function () {
          $('body,html').animate({scrollTop: 0}, 800);
          return false;
        });
      });
    </script>
    <!-- Advance -->
      <!-- Bootstrap Js -->
  <script src="/templates/traid/catalog/view/javascript/bootstrap/js/bootstrap.min.js" ></script>
</head>

<body class="plaza-blog">
<div class="wrapper">
  <div id="back-top"><i class="ion-chevron-up"></i></div>
<div id="header" class="header-absolute" >	
	<nav id="top" >
				<div class="container">
					<div class="static-nav"><?= $ariacms->web_information->{$params->slogan} ?></div>


				</div>
			</nav>
			<?= $ariacms->getBlock("header_traid"); ?>
</div>
    
  
  <div class="container">
    <ul class="breadcrumb">
        <li><a href="<?=$ariacms->actual_link?>/trang-chu.html"><i class="fa fa-home"></i></a></li>
        <li><?= _BLOG?></li>
    </ul>
    <div class="main">
        <div class="row">
            

            <div id="content" class="col-md-9 col-sm-12 col-xs-12">
                <h1><?= _BLOG?></h1>
   <!--              <div class="tool-bar">	
                   <div class="row">
                      <div class="col-sm-6 col-xs-6">
                         <div class="btn-group btn-group-sm">
                            <button type="button"  onclick="location='<?=$ariacms->actual_link?>/blog.html?route=plaza/blog&amp;content=grid'" class="btn-grid-view btn btn-default active" data-toggle="tooltip" title="Grid"></button>
                            <button type="button"  onclick="location='<?=$ariacms->actual_link?>/blog.?route=plaza/blog&amp;content=list'" class="btn-list-view btn btn-default " data-toggle="tooltip" title="List"></button>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                     <div class="post-item-limit form-group input-group input-group-sm">
                        <label class="input-group-addon" for="input-limit">Limit</label>
                        <select id="input-limit" class="form-control" onchange="location = this.value;">
                          <option value="http://amino.demo2.towerthemes.com/index.php?route=plaza/blog&amp;limit=6" selected="selected">6</option>
                          <option value="index6dca.html?route=plaza/blog&amp;limit=50">50</option>
                          <option value="index0c3f.html?route=plaza/blog&amp;limit=75">75</option>
                          <option value="index85ef.html?route=plaza/blog&amp;limit=100">100</option>
                      </select>
                  </div>
              </div>
          </div>
      </div> -->
      <div class="post-page">
        <div class="row">
        	<?php foreach( $news as $key => $new ){ ?>
            <div class="post-layout col-sm-4 col-xs-6">
              <div class="post-grid">
                 <div class="post-item odd">
                    <div class="post-image">
                       <a title="<?= $new->{$params->title};?>" href="<?=$ariacms->actual_link?>chi-tiet/<?= $new->url_part?>.html"><img src="<?=$new->image?>" alt="Celebrity Daughter Opens Up About Having" /></a>
                   </div>
                   <div class="post-cation">
                       <div class="inner">
                          <h4 class="post-name"><a  href="<?=$ariacms->actual_link?>chi-tiet/<?= $new->url_part?>.html"><?=$new->{$params->title}?></a></h4>
                          <div class="post-intro"><p><?=$new->{$params->brief}?></p></div>
                          <div class="post-date-author">
                             <span class="post-date"><?= $ariacms->unixToDate($new->post_created, "/")?></span>
                             <span class="post-author" ><?=_Learn_More?></span>
                         </div>
                         <div class="btn-more"><a href="<?=$ariacms->actual_link?>chi-tiet/<?= $new->url_part?>.html"><?=_Learn_More?></a></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
         <?php } ?>
     

</div>

</div>

<div class="tool-bar-bottom">
  <div class="row">
     <div class="col-sm-6 show-page text-left">
        <ul class="pagination">
            <?= $ariacms->paginationPublic($count,$maxRows1, 12) ?>
        </ul>
    </div>
     <!-- <div class="col-sm-6 text-right">Showing 1 to 6 of 8 (2 Pages)</div> -->
 </div>
</div>


</div>
<div class="col-md-3 col-xs-12">
    
    <div class="blog-widget-section categories-widget">
        <div class="title cat-title">
            <h3><?=_CATEGORIES?></h3>
        </div>
        <?php 
        $query = "SELECT * FROM e4_term_taxonomy 
		WHERE taxonomy='category' AND parent>0 AND status='active'";
		$database->setQuery($query);
		$cate = $database->loadObjectList();
        foreach ($cate as $key => $ca) {
         ?>
        <div class="widget-content">
            <a href="<?=$ariacms->actual_link?>/blog/<?=$ca->url_part?>.html"><?=$ca->{$params->title}?></a>
        </div>
    <?php } ?>
    </div>

    <div class="blog-widget-section blog-widget">
        <div class="title">
            <h3>Latest Post</h3>
        </div>
        <?php $query = "SELECT * FROM `e4_posts` where post_type = 'post' order by id desc limit 0,5";
				$database->setQuery($query);
				$news_latest = $database->loadObjectList();
		?>
		<?php foreach($news_latest as $ne){?>
        <div class="widget-content">
            <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $ne->url_part?>.html"><img src="<?= $ne->image?>" alt="<?= $ne->{$params->title}?>" /></a>
            <div class="latest-post-content">
                <h6 class="latest-post-name"><a href="<?=$ariacms->actual_link?>chi-tiet/<?= $ne->url_part?>.html"><?= $ne->{$params->title}?></a></h6>
                <div class="post-date-author">
                   <span class="post-date"><?= $ariacms->unixToDate($ne->post_created, "/")?></span>
                   <!--span class="post-author">Plaza</span-->
               </div>
           </div>
       </div>
       <?php }?>
       
   

</div>

</div>
</div>

</div>
</div>



	<?= $ariacms->getBlock("footer_traid"); ?>	

</div>
		</body>

		</html>