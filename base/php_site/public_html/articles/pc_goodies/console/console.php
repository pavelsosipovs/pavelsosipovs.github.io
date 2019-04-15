<?php

$headerManager->setTitle('Использование GraphicsMagic для пакетного изменения размеров изображений');
$headerManager->setMetaDesr('Пара строк консольных комманд, могущих сэкономить время и нервы');
$headerManager->setMetaKeyw('Старые подшипники, подшипы, ABEC, RollerBlade, RX100');

SiteCore::showTopperLink('Назад в „Автоматизация рутинных операций“', 'pc_goodies');
//SiteCore::includeHighslide();

?>


<div class='mainDiv'>

    <div class='mainTextDiv'>

        <h1 title="Под Ubuntu">
            Использование GraphicsMagic для пакетного изменения размеров изображений
        </h1>

        <div id='mainTextSubpost' class='mainTextSubpost'>
            <p>

            <div class="left_100">
                Как — то раз понадобилось мне изменить размер для большого количества изображений в папке. Предположим,
                что это была большая куча фотографий 20 мегапиксельных, по 8 мегабайт весом каждая. С отчётом о поездке
                в дальние края. И захотелось выложить их мне на сайт, а для этого надобно их ужать, да
                оптимизировать.<br/>
                Конечно пару / десяток фотографий можно и руками, можно в Фотошопе, можно ещё поискать программы, да
                скрипты под это дело заточенные.. Но, это ведь не так интересно, как написать пару строк в консоли и всё
                само чтобы обработалось красиво. Тут тебе и удовольствие от сделанного, и опыт который в будущем
                обязательно пригодится и материал для сайта, добрым людям в помощь.<br/>
                <br/>


                <img src="<?= SERVER_URL ?>/articles/pc_goodies/console/200px-GraphicsMagick-Logo.png"
                     alt="GraphicsMagick логотип" align="right"/>
                Один важный момент, всё происходит не в OS Windows, a в OS Ubuntu. <br/>

                Устанавливаем отличный пакет для работы с изображениями <a href='http://www.graphicsmagick.org/'>GraphicsMagick</a>.
                Именно GraphicsMagick а не <a href='http://www.imagemagick.org'>ImageMagick</a>. Почему? Просто это
                более продвинутый форк.


                <br/><br/>
                Кстати, под Windows он тоже устанавливается, так - что при небольшом шаманстве этот же подход можно и
                там использовать.
                <br/><br/>

                <b>После такой долгой прелюдии, всего-то строка кода:</b>


                <code class="left_100"><?= SiteCore::outHighlited('find -name "*.JPG" | while read f; do gm -convert -scale 800 $f thumbs/$f; done') ?></code>
            </div>

            <div class="left_100">
                Тут:<br/>
                <i>JPG</i> — расширение обрабатываемых файлов.<br/>
                <i>800</i> — Целевая ширина конвертации.<br/>
                <i>thumbs/</i> — Папка, в которую будут складываться уменьшенные изображения.<br/>
                <i>done</i> — Признак конца операции.<br/>
            </div>

            В итоге, в папке thumbs имеем уменьшенные копии фотографий, с теми же названиями.
            <br/><br/>
            </p>
            <p>
                В случае, если название нужно немного изменить — добавить постфикс _sm для уменьшенных превьюшек, можно
                написать так:
                <code><?= SiteCore::outHighlited('find -name "*.JPG" | while read f; do gm -convert -scale 200 "$f" "thumbs/${f%.*}_sm.jpg"; done') ?>
                    <br/><br/>
                </code>
            </p>

            <p>
                Дополнительно может понадобится изменить регистр букв в именах всех файлов, так-как некоторые особо
                продвинутые фотоаппараты упорно ставят расширение в верхнем регистре.<br/>
                В этом случае пишем:
                <code><?= SiteCore::outHighlited("rename 'y/A-Z/a-z/' *") ?></code>
                <br/><br/><br/>
            </p>

            <p>
                Ну и если очень хочется добавить водяные знаки, чтобы никто просто так не мог фотографии скачать с
                Вашего сайта и выдать за свои, то это сделать тоже не сложно:
                <code><?= SiteCore::outHighlited('composite -dissolve 55 -gravity SouthEast  watermark_image.png target_image.jpg result_image.jpg') ?></code>
                Или в цикле:
                <code>
                    <?= SiteCore::outHighlited('find -name "*.JPG" | while read f; do composite -dissolve 55 -gravity SouthEast  watermark.png "$f" "wat/${f%.*}"; done') ?>
                </code>


            <div class="left_100">
                Тут:<br/>
                <i>55</i> — Степень прозрачности накладываемого изображения.<br/>
                <i>SouthEast</i> — Константа определяющая положение накладываемого изображения. Может принимать одно из
                следующих значений:
                <br/>NorthWest, North, NorthEast, West, Center, East, SouthWest, South, или SouthEast.<br/>
                <i>watermark_image.png</i> —Путь до файла накладываемого изображения.<br/>
                <i>target_image.jpg</i> — Путь до целевого файла с фотографией.<br/>
                <i>result_image.jpg</i> — Путь и название результирующего файла.<br/>
            </div>

            </p>

            <p>
                Ещё:<br/>
                <code>
                    <?= SiteCore::outHighlited('gm mogrify -resize 120x120! imagename.jpg') ?>
                </code>
                изменит размер изображения на 120x120 не взирая на соблюдение пропорций.
                <br/>
                Или в цикле:<br/>
                (<i>
                    <ins style="color:red;">ВНИМАНИЕ!</ins>
                    Этот скрипт
                    <ins style="color:red;">ПАРЕЗАПИШЕТ</ins>
                    существующие фотографии их уменьшенными копиями, так-что сначала скопируйте изображения которые
                    будете конвертировать в отдельную папку!)</i>
                <code><?php
                    echo SiteCore::outHighlited('find -name "*.JPG" | while read f; do gm mogrify -resize 120x120! "$f"; done');
                    ?></code>
            </p>


            <p>
                Если задача состоит в том, чтобы привести все изображения к одной ширине, вне зависимости от их
                ориентации, то подойдёт такой код:
                <code><?php
                    echo SiteCore::outHighlited("gm -convert -geometry '650^x436^' target_image.jpg result_image.jpg");
                    ?></code>
                Тут: '650^x436^' - максимальные ширина или высота,
                символ крышки ^ - признак того, что данное значение будт использоваться в качестве максимального.
                Или в цикле:<br/>
                <code><?php
                    echo SiteCore::outHighlited('find -name "*.JPG" | while read f; do gm -convert -geometry "650^x436^" "$f" "thumbs/${f%.*}_sm.jpg"; done')
                    ?></code>

                Обработка 200 фотографий по 2.5Мб каждая заняла у меня около 4 минут.
                <br/><br/>
            </p>
            <p>

                Вот и всё!<br/>
                Успешной, приятной и эффективной работы!

                <?php
                SiteCore::showArticeDate('2011.07.19');
                SiteCore::showTopLink();
                ?>
            </p>

        </div>


        <br/><br/><br/><br/>
    </div>
</div>
