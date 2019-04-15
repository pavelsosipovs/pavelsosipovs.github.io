<?php
//Ё

?>

<div class='mainDiv'>

    <div class='mainTextDiv'>

        <h1>
            Добро пожаловать на персональный сайт Павла Осипова
        </h1>

        <div id='mainTextSubpost' class='mainTextSubpost'>
            <p>
                Основной задачей данного сайта является размещение интересных мне материалов.
                <br/>
                На данный момент сайт организован в виде нескольких самостоятельных блогов.
                <br/> <br/>
            </p>
        </div>


        <div id='blogLnk1' class='mainTextSubpostP1'>
            <p class='blogLinkBox'>
                Светлогорск<br/>
                <?= SiteCore::addHighslidedImg(
                    "engine/images/main/DSC_4946.JPG",
                    "engine/images/svetlogorsk.jpg",
                    "Высоко стою, далеко гляжу",
                    'auto',
                    array('img_id' => 'id="pavel_scroll"')) ?>
            </p>
        </div>

        <div id='blogLnk2' class='mainTextSubpostP2'>
            <p class='blogLinkBox'>
                С башней<br/>
                <?= SiteCore::addHighslidedImg(
                    "engine/images/main/DSC_4112.JPG",
                    "engine/images/bashnja.jpg",
                    "Париж, что тут ещё сказать..",
                    '',
                    ['img_id' => 'id="pavel_scroll2"']) ?>
            </p>
        </div>
        <?php

        //         * <div id='blogLnk3' class='mainTextSubpostP3'>
        //         * <p class='blogLinkBox'>
        //         * FirePixel<br />
        //         * <img
        //         * class='roundedCornersImg'
        /*         * src='<?=SERVER_URL_ROOT?>/engine/images/firepixel.jpg'*/
        //         * alt='Кошка «Fire»Pixel'
        //         * title='Кошка «Fire»Pixel'
        //         * />
        //         * </p>
        //         * </div>


        //         * <div id='blogLnk4' class='mainTextSubpostP4'>
        //         * <p class='blogLinkBox'>
        //         * FirePixel<br />
        //         * <img
        //         * class='roundedCornersImg'
        /*         * src='<?=SERVER_URL_ROOT?>/engine/images/firepixel.jpg'*/
        //         * alt='Кошка «Fire»Pixel'
        //         * title='Кошка «Fire»Pixel'
        //         * />
        //         * </p>
        //         * </div>

        ?>

        <img src='<?= SERVER_URL_ROOT ?>/engine/images/inv_200.png' alt=''/>
        <br/><br/><br/>

        <?php
        SiteCore::show_last_articles_links();
        ?>
    </div>

</div>

<script type="text/javascript" src="<?= SERVER_URL_ROOT ?>engine/js/startup.js"></script>
