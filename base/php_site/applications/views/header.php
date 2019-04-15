<?php
/********************
 ** Script Name: header.php
 ** Creation Date: 18-04-2009
 ** Author: Pavel Osipov
 ** Purpose: Main header structures and includes
 ********************/

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name='apple-mobile-web-app-capable' content='yes'/>
    <meta name='mobile-web-app-capable' content='yes'>
    <meta name='HandheldFriendly' content='true'/>
    <meta name='viewport' content='width=device-width, user-scalable=no'/>

    <link rel='SHORTCUT ICON' href='/engine/images/favicon.ico'/>
    <title id='title'><?= $headerManager->get('title') ?></title>

    <link rel="stylesheet" href="/engine/style.css?v=3" type="text/css"/>
    <link rel="stylesheet" href="/engine/css/menu.css?v=1" type="text/css"/>

    <meta name="description" content="<?= $headerManager->get('description') ?>"/>
    <meta name="keywords" content="<?= $headerManager->get('keywords') ?>"/>

    <script type="text/javascript"
            src="/engine/js/mootools/mootools-1.2.4-core_and_more.js"></script>
    <script type="text/javascript" src="/engine/js/engine.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Poiret+One|Bad+Script&amp;subset=latin,cyrillic'
          rel='stylesheet'
          type='text/css'/>

    <?php
    SiteCore::includeHighslide();
    //  if ( !defined( 'SITE_ROOT' ) ) {
    ?>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-19813451-1']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <?php
    //  }
    ?>
</head>

<body class="bg" id="body">


<div class='headDiv'>
    <div id="animate-area">
        <div class='headImg'>
            <a href='/' title='На главную'><img
                        alt='На главную'
                        class="logo_image"
                        src='/engine/images/top_image.png'
                /></a>
        </div>

<!--        <div class='headPhrase'>-->
<!--            <sup>Персональный сайт Павла Осипова</sup>-->
<!--        </div>-->

        <div style='float: right;'>
            <!--menu-->
            <?php
            require(VIEWS_FOLDER . '/top_menu.php');
            ?>
        </div>
    </div>
</div>
