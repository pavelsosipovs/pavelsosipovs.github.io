<?php

$headerManager->setTitle('Использование регулярных выражений в LibreOfice для поиска и замены по шаблону');
$headerManager->setMetaDesr('Использование регулярных выражений в LibreOfice для поиска и замены по шаблону');
$headerManager->setMetaKeyw('LibreOficeб регулярник, поиск и замена, синтаксис');

SiteCore::showTopperLink('Назад в „Автоматизация рутинных операций“', 'pc_goodies');
//SiteCore::includeHighslide();

?>


<div class='mainDiv'>

    <div class='mainTextDiv'>

        <?php
        SiteCore::showCite(array('text' => 'Подробнее о LibreOffice читайте в заметке <a href="' . SERVER_URL . 'stuff/libreoffice/">"LibreOffice&nbsp;-&nbsp;мой&nbsp;выбор"</a>.'));
        ?>
        <br/><br/><br/>


        <h1 title="Под Ubuntu">
            <ins><a href='http://ru.wikipedia.org/wiki/LibreOffice'><img
                            src="<?= SERVER_URL ?>/articles/pc_goodies/office/libre_office_logo_sm.png"
                            alt="LibreOffice логотип для привлечения внимания" style="float:right"
                            title="Логотип LibreOffice для привлечения внимания"/></a></ins>
            Полезности в Libre(Open)Office
        </h1>
        <h2>
            Поиск и замена по регулярным выражениям
        </h2>


        <div id='mainTextSubpost' class='mainTextSubpost'>
            <p>

                <?= SiteCore::addHighslidedImg(
                    "articles/pc_goodies/office/search_and_destroy.png",
                    "articles/pc_goodies/office/search_and_destroy_sm.png",
                    "Замена по регулярному выражению в LibreOffice") ?>


                Была задача: из большого текста удалить все идентификаторы вида __<i>n</i>__ , где может <i>n</i> быть
                любым числом, к примеру __8756__. <br/>
                Руками как обычно конечно всё сделать кажется быстрее, но заставить работать машину, моя работа, да и
                разобраться с регулярными
                выражениями в LibreOffice было интересно. В итоге, набросал следующий простой регулярник: <br/>
                <code><?= SiteCore::outHighlited('__[:digit:]{3,6}__') ?></code>


                <br/><br/>

                P.S. Кстати, думаю в OpenOffice.org синтаксис регулярных выражений не должен был изменится.
                <br/><br/>

            </p>

            <p>
                <ins style="text-decoration: none;">
                    Успешной, приятной и эффективной работы!

                    <?php
                    SiteCore::showArticeDate('2011.07.26');
                    SiteCore::showTopLink();
                    ?>
                </ins>
            </p>

        </div>


    </div>
</div>