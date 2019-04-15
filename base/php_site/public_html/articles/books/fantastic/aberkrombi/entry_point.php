<?php

$headerManager -> setTitle( 'Впечатление о трилогии Джо Аберкромби «Земной Круг» - «Первый Закон»' );
$headerManager -> setMetaDesr('Впечатление о книге Джо Аберкромби «Земной Круг» - «Первый Закон»');
$headerManager -> setMetaKeyw('Джо Аберкромби, Земной Круг, Первый Закон');

SiteCore::showTopperLink( 'Назад к категории "Фантастика"', 'fantastic' );

$i = 1;

?>

<div class='mainDiv'>

	<div class='mainTextDiv'>

		<h1 title="Качественная драк-фентези">
			Джо Аберкромби «Земной Круг» - «Первый Закон»
		</h1>

    <div id='mainTextSubpost' class='mainTextSubpost'>

        <?php
    echo SiteCore::addHighslidedImg(
                        "articles/books/fantastic/aberkrombi/logos/$i.jpeg",
                        "articles/books/fantastic/aberkrombi/logos/thumbs/$i.jpeg",
                        "Другие обложки",'right');
    $i++;
                        ?>


<p>Разные фантастические книги «цепляют» читателя за разное. Кто-то из авторов старается создать как можно большую и детализированную вселенную, кому-то нравится описывать грандиозные события, кто-то ставит небольшое количество персонажей в весьма странные обстоятельства и смотрит, как они себя поведут. Некоторые любят насилие, описывая его в деталях и с явным удовольствием, друге сторонятся его, другим это не кажется важным (или нужным). Третьим важнее описать характер героев, их мотивы, жизненные обстоятельства. И частенько какая-то одна такая составляющая перерастает в весь роман.
</p><p>
Джо Аберкромби называют надеждой англо-язычной фэнтези. Он не стесняется использовать все, что многие авторы придумали до него, но эта компиляция идей отнюдь не выглядит вторичной.  Аберкромби старается заварить как можно более крутую кашу из всех ингридиентов, которые у него только есть. А есть у него много всего..
</p>

<?php
/**/
?>
 <div class="left_100">

</div>
    <div class="left_100">
        <div class="left_100">
        Ещё  обложки:
    </div>

<?php
for ( ; $i < 11; $i++ ) {
    echo SiteCore::addHighslidedImg(
                        "articles/books/fantastic/aberkrombi/logos/$i.jpeg",
                        "articles/books/fantastic/aberkrombi/logos/thumbs/$i.jpeg",
                        "Джо Аберкромби «Земной Круг» - «Первый Закон»",'left');
}
?>

</div>
  </p>
<?php
    /**/
?>

<p>
Иногда важно узнать побольше об авторе понравившегося произведения, чтобы глубже его понять. За примером далеко ходить не нужно, <a href='http://ru.wikipedia.org/wiki/%D2%EE%EB%EA%E8%ED,_%C4%E6%EE%ED_%D0%EE%ED%E0%EB%FC%E4_%D0%F3%FD%EB'>Толкиен (Толкин)</a>. Если просто прочитать «Хоббит или туда и обратно» или к тот же «Властелин колец», впечатление одно, а покопавшись в биографии профессора, поняв его лучше, и книги его воспринимаются заметно иначе..<br />
Также и с автором цикла книг. Молодое поколение фантастов, родился в 1974, работал монтажером-фрилансером, изучал психологию, сразу по выходу первой книги обласкан критикой и читателями, с удовольствием пишет ещё.
</p>

<div class="left_100">
<?php
    ob_start();
    ?>
    Книга получила первое место в категории "Лучший роман / авторский сборник зарубежного автора" конкурса <a href="http://fantlab.ru/award86#c1943" title="Книга года по версии Фантлаба" >"Книга года по версии Фантлаба"</a>.
<br />
<?php
    $cite = array(
        'text' => ob_get_clean(),
        'href_text' => '',
        'url' => array()
        );
    SiteCore::showCite( $cite );
?></div>


<p>
Чем-то мне этот роман напомнил <a href='http://ru.wikipedia.org/wiki/%CC%E0%ED%E3%E0'>мангу</a> «<a href='http://ru.wikipedia.org/wiki/%C1%E5%F0%F1%E5%F0%EA_(%EC%E0%ED%E3%E0)'>Берсерк</a>», уверен, автор её читал. Конечно не сюжет и не персонажи, но какая-то схожесть в атмосфере, в подходе героев к ситуациям на мой взгляд есть. Ну и конечно антураж схож.
</p>

<p >
    Как же в фэнтези и без карт. Всё авторские, Джо сам их с удовольствием рисует.
<div class="left_100">
<?php

    $imgs = array(
        'Map_First_Law_by_Scubamarco',
        'stiria',
        'siciliae',
    );
    foreach ( $imgs as $img ) {
        echo SiteCore::addHighslidedImg(
                            "articles/books/fantastic/aberkrombi/$img.jpg",
                            "articles/books/fantastic/aberkrombi/{$img}_sm.jpg",
                            "Авторские",'left');
    }
?>
    </div>
</p>
<p >
    Ещё фанатские эскизы и рисунки
<div class="left_100">
<?php

    $imgs = array(
        'finalcharacters',
        'Glokta_painter_11',
        'JoeAbercrombie',
    );
    foreach ( $imgs as $img ) {
        echo SiteCore::addHighslidedImg(
                            "articles/books/fantastic/aberkrombi/$img.jpg",
                            "articles/books/fantastic/aberkrombi/{$img}_sm.jpg",
                            "Фанатские",'left');
    }
?>
    </div>
</p>

<p>
Насколько я понимаю, на данный момент вышла законченная трилогия, но автор не собирается покидать созданный им мир, и в будущем порадует читателей новыми историями, отважными героями, славными приключениями, жестокими битвами и другими масштабными событиями. Пожелаем ему удачи.<br />

</p>

<p>
 Могу рекомендовать к прочтению любителям качественного дарк-фентези.
<p>






<?php

      SiteCore::showLinkElement(
              '
                Книга первая: «Кровь и железо»
              ',
              'Роман первый, всё закручиваются, над Союзом сгущаются тучи, древний маг собирает команду и отправляется в далёкое путешествие,
                  враги коварны и жестоки, магия уходит из мира..',
              '1_blood_and_steel/'
      );

      SiteCore::showLinkElement(
              '
                Книга вторая: «Прежде чем их повесят»
              ',
              'Всё развивается своим чередом, большое путешествие по величественным местам, впечатляющий упадок Старой империи, битвы выигранные и проигранные, враги становятся союзниками, тучи сгущаются над Союзом. Сюжет развивается не спеша в ожидании следующих томов..',
              '2_Before_They_Are_Hanged/'
      );

      SiteCore::showLinkElement(
              '
                Книга третья: «Последний довод королей»
              ',
              'Ultima ratio regum. Когда дипломатам уже нет тем для общения, нить разговоров между странами переходит в руки генералов.<br />
Третья книга, завершает первую трилогию цикла. Большинство сюжетных завязок получают объяснение, главные герои получают награду, причём каждый достойную себя. Но чувствуется, автор не собирается покидать созданный мир..',
              '3_The_Last_Argument_of_Kings/'
      );

?>

<div class="left_100">
    <br />


    <br /><br />
</div>




    <?php

    SiteCore::showArticeDate( '2012.09.16' );

  SiteCore::showTopLink();

?>
<br /><br />
<br /><br />

    </div>
  </div>
</div>


