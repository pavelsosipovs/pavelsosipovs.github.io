<?php

$headerManager->setTitle('Полезные мелочи, которые могут помочь сэкономить время при работе за компьютером');
$headerManager->setMetaDesr('Полезные мелочи автоматизирующие нектороые рутинные опирации при работе за компьютером');
$headerManager->setMetaKeyw('LibreOffice, регулярники, регулярные выражения, ресайз большого количества картинок, пакетная обраьотка картинок');

SiteCore::showTopperLink();


?>
<div class='mainDiv'>
    <div class='mainTextDiv'>


        <?php
        SiteCore::showCite(array('text' => '— Вот что я тебе скажу, птичка... <br />— Запомни: лучше день потерять, потом за пять минут долететь!'));
        ?>


        <br/><br/><br/><br/>
        <h1 title="Полезные мелочи, которые могут помочь сэкономить время при работе за компьютером ">
            Автоматизация некоторых рутинных операций в консоли и оффисе</h1>
        <br/>
        Не делать же руками, в самом деле!!

        <br/><br/>
        <?php


        SiteCore::showLinkElement(
            '
                <div  title="Используем python для конвертирования изображений в base64 для CSS Data URI схемы">
                <img src="/articles/pc_goodies/python_base64/Python_logo.png" alt="Python мой выбор" alt="Python мой выбор" />
                  Python для конвертирования изображений в base64 для CSS Data URI схемы
                </div>
              ',
            "
            Итак задача: для всех .png изображений в текущей директории генерировать их представление в <a href='http://ru.wikipedia.org/wiki/Base64'>base64</a> в формате пригодном для использования в <a href='http://ru.wikipedia.org/wiki/Css'>CSS</a> файле в виде <a href='http://en.wikipedia.org/wiki/Data_URI_scheme'> Data URI схемы</a>.
              ",
            'python_base64/'
        );


        SiteCore::showLinkElement(
            '
                <div title="Полезности в Libre (Open) Office. В M$ Office не проверялось">
                <img src="' . SERVER_URL_ROOT . 'articles/pc_goodies/office/libre_office_logo_sm.png" alt="Libre Office мой выбор" alt="Libre Office мой выбор" />
                  Полезности в Libre(Open)Office
                </div>
              ',
            '
            Иногда встречаются вещи, которые скучно делать в ручную
              ',
            'office/'
        );


        SiteCore::showLinkElement(
            '
                <div title="Консоль, великая и ужасная!">Работа из консоли</div>
              ',
            '
	Использование GraphicsMagic для пакетного изменения размеров изображений
          ',
            'console/'
        );


        SiteCore::showTopLink();
        ?>
    </div>
</div>
