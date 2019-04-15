<?php

$headerManager -> setTitle( 'О фантастических книгах, оставивших впечатление' );
$headerManager -> setMetaDesr('Прочитанные книги в жанре фантастики');
$headerManager -> setMetaKeyw('Фантастика, книги');

SiteCore::showTopperLink( 'Назад в „Книги“', 'books' );

?>

<div class='mainDiv'>

	<div class='mainTextDiv'>


		<h1 title="В этом жанре как ни в каком  другом важно читать только качественные произведения, ибо низкопробных произведений большинство, как не печально">
			Фантастика, пока-что всё ещё мой любимый жанр
		</h1>


    <div id='mainTextSubpost' class='mainTextSubpost'>

    <?php
    SiteCore::showLinkElement(
              '
                Аберкромби - Земной круг
              ',
              SiteCore::addHighslidedImg(
                        "articles/books/fantastic/aberkrombi/logos/1.jpeg",
                        "articles/books/fantastic/aberkrombi/logos/thumbs/1.jpeg",
                        "Одна из обложек Аберкромби - Земной круг - Кровь и железо").
            '<p>Джо Аберкромби называют надеждой англо-язычной фэнтези. Он не стесняется использовать все, что многие авторы придумали до него, но эта компиляция идей отнюдь не выглядит вторичной.  Аберкромби старается заварить как можно более крутую кашу из всех ингридиентов, которые у него только есть. А есть у него много всего..</p>',
              'aberkrombi/'
      );?>
    <?php
    SiteCore::showLinkElement(
              '
                Ойкумена
              ',
              SiteCore::addHighslidedImg(
                        "articles/books/fantastic/oikumena/logos/1.jpeg",
                        "articles/books/fantastic/oikumena/logos/thumbs/1.jpeg",
                        "Одна из обложек Ойкумены").
            '<p><a href="http://oldie.ru/">Олди</a>  — замечательные представители русскоязычной фантастики. Трилогия «Ойкумена» это одна из первых их серьёзных попыток отойти от коронного жанра фэнтези в мир космической оперы. Попытка на мой взгляд успешная со всех сторон. Вывод — читать однозначно!</p>',
              'oikumena/'
      );?>




    <?php
    SiteCore::showLinkElement(
              '
                Американские боги
              ',
              SiteCore::addHighslidedImg(
                        "articles/books/fantastic/american_gods/logo.jpg",
                        "articles/books/fantastic/american_gods/logo_sm.jpg",
                        "Один из вариантов обложки Американских Богов").
            '<p>Совершенно случайно, в комментариях одного <a href="http://habrahabr.ru/qa/4390/#answer_19134">топика</a> на хабре была упомянута эта книга. Заинтересовался, почитал о ней <a href="http://ru.wikipedia.org/wiki/%C0%EC%E5%F0%E8%EA%E0%ED%F1%EA%E8%E5_%E1%EE%E3%E8">тут</a>, <a href="http://fantlab.ru/work10134">тут</a> и <a href="http://www.erlib.com/Нил_Гейман/Американские_боги/0/">тут</a>. Понравились отзывы, надо читать книгу.</p>',
              'american_gods/'
      );?>



<?php
  SiteCore::showTopLink();
?>

    </div>
  </div>
</div>


