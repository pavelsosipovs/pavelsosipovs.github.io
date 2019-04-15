<?php



$headerManager -> setTitle( 'Впечатление о первой книге трилогии «Первый Закон» - «Кровь и железо»'  );
$headerManager -> setMetaDesr('Впечатление о первой книге трилогии «Первый Закон» - «Кровь и железо»');
$headerManager -> setMetaKeyw('Джо Аберкромби, Земной Круг, Первый Закон, Кровь и железо');

SiteCore::showTopperLink( 'Назад к Джо Аберкромби  «Первый Закон»', '1_blood_and_steel' );

$i = 1;

?>

<div class='mainDiv'>

	<div class='mainTextDiv'>

		<h1 title="Книга первая, всё неплохо так начинается">
			Джо Аберкромби «Земной Круг» - «Первый Закон» - «Кровь и железо»
		</h1>

    <div id='mainTextSubpost' class='mainTextSubpost'>

        <?php
    echo SiteCore::addHighslidedImg(
                        "articles/books/fantastic/aberkrombi/logos/$i.jpeg",
                        "articles/books/fantastic/aberkrombi/logos/thumbs/$i.jpeg",
                        "Другие обложки",'right');
    $i++;
                        ?>


<p>
Первая книга, «Кровь и железо». Она оставляет впечатление первой части большого путешествия. Нет ненужных для основной канвы ответвлений сюжета, всё продумано и уложено в одну большую картину. Именно так, как нужно. Ты прочитал первую книгу, впереди лежат ещё, в которых история продолжится.
</p><p>
В общих чертах — каша заваривается. Жестокие сражения, политика, интриги и заговоры, красивые пейзажи, люди — разные, несколько разных культур, загадки древности, магия, алчность и преданность. Много всего намешено, но практически без излишеств, грамотно, с чувством, с толком.
<br /><br />
</p><p>
Итак странные, непохожие друг на друга люди собираются в странную команду и под руководством странного лысого дядьки отправляются через странные страны на край мира. А вокруг них кипит жизнь, бурлят войны, начинается движение народов на целых континентах и эти люди явно сыграют в нём важную роль. Большая игра начинается!
</p><p>
    He has began!
</p>



<?php
/**
 <div class="left_100">

</div>
    <div class="left_100">

?>
        <div class="left_100">
        Ещё найденные обложки:
    </div>

<?php
for ( ; $i < 9; $i++ ) {
    echo SiteCore::addHighslidedImg(
                        "articles/books/fantastic/oikumena/logos/$i.jpeg",
                        "articles/books/fantastic/oikumena/logos/thumbs/$i.jpeg",
                        "Варианты обложки разных изданий книги Ойкумена",'left');
}

</div>
  </p>

    /**/
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

