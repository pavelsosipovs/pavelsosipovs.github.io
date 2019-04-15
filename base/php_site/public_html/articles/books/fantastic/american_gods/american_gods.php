<?php

$headerManager -> setTitle( 'Впечатление о книге "Американские Боги"' );
$headerManager -> setMetaDesr('Впечатление о книге "Американские Боги"');
$headerManager -> setMetaKeyw('Американские Боги');

SiteCore::showTopperLink( 'Назад в к списку книг', 'fantastic' );

$i = 1;

?>

<div class='mainDiv'>

	<div class='mainTextDiv'>

		<h1 title="В общем книжица вполне хороша">
			Американские Боги, Нил Гейман
		</h1>

    <div id='mainTextSubpost' class='mainTextSubpost'>

        <?php
    echo SiteCore::addHighslidedImg(
                        "articles/books/fantastic/american_gods/logos/logo_$i.jpg",
                        "articles/books/fantastic/american_gods/logos/thumbs/logo_$i.jpg",
                        "Другие обложки",'right');
    $i++;
                        ?>

        <p>
        Совершенно случайно, в комментариях одного <a href="http://habrahabr.ru/qa/4390/#answer_19134">топика</a> на хабре была упомянута эта книга. Заинтересовался, почитал о ней <a href="http://ru.wikipedia.org/wiki/%C0%EC%E5%F0%E8%EA%E0%ED%F1%EA%E8%E5_%E1%EE%E3%E8">тут</a>, <a href="http://fantlab.ru/work10134">тут</a> и <a href="http://www.erlib.com/Нил_Гейман/Американские_боги/0/">тут</a>. Понравились отзывы, надо читать книгу.
    </p>

    <p>
Книга являет собой хороший пример современного раскрученного бестселлера. Обласкана критикой, нравится читателям и по всему, неплохо продаётся.

<?php


    ob_start();
    ?>
    Получила <a href="http://ru.wikipedia.org/wiki/Премия_Хьюго_за_лучший_роман" title="Премия Хьюго за лучший роман" >премию Хьюго за лучший роман</a>
,
<a href="http://ru.wikipedia.org/wiki/Премия_Небьюла_за_лучший_роман" title="Премия Небьюла за лучший роман" >премию Небьюла за лучший роман</a> и <a href='http://ru.wikipedia.org/wiki/Премия_Брэма_Стокера'>премию имени Брэма Стокера</a>.
<br />
<?php
    $cite = array(
        'text' => ob_get_clean(),
        'href_text' => '',
        'url' => array()
        );

    SiteCore::showCite( $cite );

?>

    <div class="left_100">
<?php
/**/ ?>
        <div class="left_100">
Вот ещё к примеру, только часть обложек находящихся в гугле по названию книги:
    </div>

<?php
for ( ; $i < 11; $i++ ) {
    echo SiteCore::addHighslidedImg(
                        "articles/books/fantastic/american_gods/logos/logo_$i.jpg",
                        "articles/books/fantastic/american_gods/logos/thumbs/logo_$i.jpg",
                        "Другие обложки книги Американские Боги",'left');
}
    /**/
?>

        <div class="left_100">

            <div style="float: left;padding-top: 2em;">
                Даже на Латышском!
            </div>


<?php
//$i++;
    echo SiteCore::addHighslidedImg(
                        "articles/books/fantastic/american_gods/logos/logo_$i.jpg",
                        "articles/books/fantastic/american_gods/logos/thumbs/logo_$i.jpg",
                        "NĪls Geimens; Amerikāņu dievi",'left');
?>
        </div>


</div>

</p>

<div class="left_100">
    <br />
<p >
Сразу скажу, книга понравилась. Всё в ней хорошо, и конечно перевод на русский язык отличного качества, с этим мне повезло. <br />

Для более глубокого понимания, конечно важно иметь хотя-бы общее представление о упомянутых основных мифологиях. Главной конечно тут является скандинавская, но также важную роль играет славянская, германская, африканская и восточная мифологии. С миру по нитке, автору роман, читателю удовольствие.
<br />
<br />
</p>
<p>
Мне кстати повезло, в своё время купил книгу Карла Мунка «<a href='http://lib.rus.ec/b/145662'>Один</a>», которая конечно не официальный путеводитель по скандинавским мифам, но отличное представление даёт о всей их кухне. Рекомендую!
<br />
<br />
</p>
<p>

Сюжет описывать не буду, это уже сделали более опытные люди в сети, интереснее описать впечатление полученное от книги. Оно двойственное. С одной стороны, вокруг хорошей идеи построен детальный мир, люди выписаны тщательно, их мотивы, пейзажи.. С другой, как-то многие детали слишком уж искусственно натягиваются на основную канву. Читая, я постоянно подсознательно ждал чего-то большего, а нет, книга кончилась, а ожидание так и осталось. Ну да ладно, нельзя ведь быть во всём идеальным.
</p>
<p>

Для себя я выделил два наиболее интересных места: <br />
Когда протагонист (Тень) висит распятым на дереве, американском аналоге дерева <a href='http://ru.wikipedia.org/wiki/%C8%E3%E3%E4%F0%E0%F1%E8%EB%FC'>Иггдрасиль</a>. Очень всё хорошо, глубоко, многослойно описано, чую, что каждый что-то для своё в его переживаниях найдёт.<br />

И второй момент, это проживание в уездном городе Приозерье. Сразу как-то проникаешься духом городка. Люди там живут понятные, простые, жизнь идёт своим чередом. Есть и проблемы, как у многих других подобных городков в Америке, народ уезжает, некогда шумные улицы пустеют поколение за поколением...
<br />
<br />
</p>

<p>
В общем, хорошая книга, прочитал и не жалею. Более того, на что-то, что ранее казалось мелким, маловажным, после прочтения совсем другими глазами смотреть стал.
<br />
Рекомендую к прочтению!
<p>

    <br /><br />
</div>




    <?php

    SiteCore::showArticeDate( '2012.07.22' );

  SiteCore::showTopLink();

?>
<br /><br />
<br /><br />

    </div>
  </div>
</div>


