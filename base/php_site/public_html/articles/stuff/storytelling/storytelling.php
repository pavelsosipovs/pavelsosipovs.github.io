<?php


$headerManager->setTitle('В разговорах иногда бывает придумаешь какую-то вещь, и она удачная оказывается. Не забывать-ведь, раз есть свой сайт. Бред всякий в общем');
$headerManager->setMetaDesr('Спонтанное вербальное творчество, скороговорки, шутки, бред всякий ');
$headerManager->setMetaKeyw('Скороговорка про лилию');

SiteCore::showTopperLink('Назад в „Разное“', 'stuff/');

?>


<div class='mainDiv'>

    <div class='mainTextDiv'>

        <h1 title="В разговорах иногда бывает придумаешь какую-то вещь, и она удачная оказывается. Не забывать-ведь, раз есть свой сайт. Бред всякий в общем, скороговрка одна пока и удачная (IMHO ;) игра слов.">
            На память для себя, ну и может ещё кому будет интересно
        </h1>

        <div id='mainTextSubpost' class='mainTextSubpost'>


            <p style="width:100%;float:left;">
            <h3>Скороговорка о лилиях<br/><br/></h3>

            Это Вы полили лилии химикалиями?<br/>
            Нет, химикалиями лилии не поливали мы!
            <?php
            SiteCore::showArticeDate('2010.12.05');
            ?>
            <br/><br/>
            </p>


            <p style="width:100%;float:left;">
            <h3>О странной семейке<br/><br/></h3>
            В одной семье все очень любили спорить, они даже размножались спорами.
            <?php
            SiteCore::showArticeDate('2011.07.18');
            ?>
            <br/><br/>
            </p>


            <?php
            SiteCore::showTopperLink('Назад в „Разное“', 'stuff/');
            ?>

            <?php
            //        SiteCore::showTopLink();
            ?>
            <br/><br/><br/><br/>
        </div>
    </div>
</div>