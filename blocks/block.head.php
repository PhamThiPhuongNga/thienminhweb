<?php

global $ariacms;

global $params;

global $ariaConfig_template;

global $analytics_code; 

?>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">



    <title><?=$ariacms->web_information->{$params->name}; ?></title>



    <!-- Fav Icon -->

    <link rel="icon" href="<?=$ariacms->web_information->{'image-icon'};?>" type="image/x-icon">



    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="/templates/assets/fonts/fontawesome-free-6.1.1-web/css/fontawesome.min.css">

    <!-- Stylesheets -->

    <link href="/templates/assets/css/font-awesome-all.css" rel="stylesheet">

    <link href="/templates/assets/css/flaticon.css" rel="stylesheet">

    <link href="/templates/assets/css/owl.css" rel="stylesheet">

    <link href="/templates/assets/css/bootstrap.css" rel="stylesheet">

    <link href="/templates/assets/css/jquery.fancybox.min.css" rel="stylesheet">

    <link href="/templates/assets/css/animate.css" rel="stylesheet">

    <link href="/templates/assets/css/color.css" rel="stylesheet">

    <link href="/templates/assets/css/style.css" rel="stylesheet">

    <link href="/templates/assets/css/responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="/templates/assets/css/lightslider.min.css">



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="/templates/assets/js/jquery.lightSlider.js"></script>

    <script src="/templates/assets/js/js.slideshow-galleri.js"></script>

    <script src="/templates/assets/js/plus-minus-number.js"></script>
    <script>

$(document).ready(function() {



$('#minMax').lightSlider({



  minSlide:1,



  maxSlide:4,



  slideMargin:5,



  slideWidth:200



}); 



});

</script>

</head>