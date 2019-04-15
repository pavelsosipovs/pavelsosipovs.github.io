<?php

$headerManager->setTitle('Не фантастикой единой..');
$headerManager->setMetaDesr('Прочитанные книги вне типичных для меня жанров');
$headerManager->setMetaKeyw('Книги на разные темы');

SiteCore::showTopperLink('Назад в „Книги“', 'raznoe');

?>

<div class='mainDiv'>

    <div class='mainTextDiv'>

        <h1 title="Бывают книги, не роман, не техническая литература, так, размышления, или ещё что-то, их все сюда">
            Книги вне чётко определённых жанров
        </h1>

        <div id='mainTextSubpost' class='mainTextSubpost'>

            <?php
            SiteCore::showLinkElement(
                '
                После трёх уже поздно
              ',
                SiteCore::addHighslidedImg(
                    "articles/books/raznoe/masaru_ibuka/logos/1.png",
                    "articles/books/raznoe/masaru_ibuka/logos/thumbs/1.png",
                    "После трёх уже поздно") .
                '<a href="http://ru.wikipedia.org/wiki/Ибука,_Масару">Масару Ибука</a> дядька родился в 1903 году в Японии. По слогу чувствуется, что он любит детей,
                  понимает их, много думает о их мотивах, целях, желаниях. Старается погрузиться в мир детского разума,
                  чтобы в итоге, формализовать его в понятном для взрослого виде.  ',
                'masaru_ibuka/'
            ); ?>

            <?php
            SiteCore::showTopLink();
            ?>

        </div>
    </div>
</div>


