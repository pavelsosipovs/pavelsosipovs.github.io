<?php
//Ё

?>

<div class='mainNewsDiv'>
<!--    <div style="margin-bottom: 0.5em;">-->
<!--        --><?//= tableTop() ?>
<!---->
<!--        <div class='newsMainTable'>-->
<!---->
<!--            --><?php
//            if (!defined('LOCAL')) {
//                ?>
<!--                <div style="position: relative;top: 1em;left:0px;float: right;width: 100%;padding-bottom: 2em;">-->
<!--                    <div style="float: left;">-->
<!--                        <div id="fb-root"></div>-->
<!--                        <fb:like href="http://www.osipov.lv--><?//= $_SERVER['REQUEST_URI'] ?><!--" send="true"-->
<!--                                 layout="button_count" width="150" show_faces="true" action="like" font=""></fb:like>-->
<!--                    </div>-->
<!---->
<!--                    <div style="float: right;">-->
<!--                        <g:plusone></g:plusone>-->
<!--                    </div>-->
<!--                </div>-->
<!--                --><?php
//            }
//            ?>
<!---->
<!---->
<!--            <img src="--><?//= SERVER_URL_ROOT ?><!--/engine/images/li_sign.png" alt=""/>-->
<!--            <a href="--><?//= SERVER_URL_ROOT ?><!--" class='categoryLink'>-->
<!--                На главную-->
<!--            </a>-->
<!--            <br/>-->
<!---->
<!--            <img src="--><?//= SERVER_URL_ROOT ?><!--/engine/images/li_sign.png" alt=""/>-->
<!--            <a href="#dww22" onclick='main_engine.toggleLeftBlock()' class='categoryLink'>-->
<!--                Содержимое сайта-->
<!--            </a>-->
<!--            <br/>-->
<!---->
<!--            <img src="--><?//= SERVER_URL_ROOT ?><!--/engine/images/li_sign.png" alt=""/>-->
<!--            <a href="#dww11" onclick='main_engine.toggleLeftBlock()' class='categoryLink'>-->
<!--                Дружественные сайты-->
<!--            </a>-->
<!--            <br/>-->
<!---->
<!--            <br/>-->
<!---->
<!--        </div>-->
<!---->
<!--        --><?//= tableBottom() ?>
<!--    </div>-->


    <?php
        require('right_links_content.php');
    ?>

</div>