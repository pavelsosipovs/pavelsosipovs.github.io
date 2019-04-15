<?php


$headerManager->setTitle('Статьи - как результат научной деятельности, а также отчётность Ph.D.студента');
$headerManager->setMetaDesr('Павел Осипов, научные статьи');
$headerManager->setMetaKeyw('Павел Осипов, научные статьи');


SiteCore::showTopperLink();

?>

<div class='mainDiv'>
    <div class='mainTextDiv'>

        <h1 title="В них соответственно вложено больше всего труда">
            Нектороый мои научные публикации.
        </h1>


        <div style="font-size: small">
            <sup style="color: red">*</sup>
            Пока только PDF`ки, будет время оформлю в виде HTML страниц
        </div>
        <br/>++++++++++

        <?php


        require_once ('Pavel_Osipov Ontoligies 2009.15.10._EN.htm');



        SiteCore::showTopLink();
        ?>

    </div>
</div>