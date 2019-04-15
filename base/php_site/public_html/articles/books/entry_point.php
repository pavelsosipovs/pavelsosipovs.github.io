<?php

$headerManager -> setTitle( 'О прочитанных книгах' );
$headerManager -> setMetaDesr('Павел Осипов, о прочитанных книгах');
$headerManager -> setMetaKeyw('Павел Осипов прочитанные книги');

SiteCore::showTopperLink();

?>
<div class='mainDiv'>
	<div class='mainTextDiv'>

    <h1 title="При всей моей занятости, чтение не теряет своей важности">Книги, прочитанные давно и не очень, но оставившие впечатление, о котором хочется написать</h1>

    <p>
Прочитав интересную книгу (а другие стараюсь не читать), иногда хочется свои мысли о ней записать. Хорошая книга порождает много всего в голове. Идеи, образы, поступки, со временем всё это тускнеет в памяти. А памятуя о том, что самый тупой карандаш лучше самой острой памяти, записать что-то о прочитанной книге видится мне хорошей идеей.
</p>

<br /><br />

    <b title="Как-никак важность каталогизации и таксономии для программиста трудно переоценить">Разделю всё по категориям</b>



      <?php
      SiteCore::showLinkElement(
              '
                <img src="'.SERVER_URL_ROOT.'articles/books/sf_sm.png" align="left"/>&nbsp;

                Фантастика',
              'По хорошему такой большой раздел надо-бы ещё глубже поделить, на научную фантастику, фэнтези, космическую оперу, и прочее, но думаю, что пока тут не так много обзоров, нужды в подобном разделении нет большой.
                  </p>

<p>
Фантастику люблю с детства, в то время читал всё, что только мог, по нескольку раз. Конечно попадались как хорошие, так и весьма сомнительного качества произведения. В итоге накопилась своя библиотека, прочитана практически вся фантастическая литература в близлежащих общественных библиотеках и у всех знакомых тоже.
               ',
              'fantastic/'
      );
      ?>

      <?php
      SiteCore::showLinkElement(
              '
                <img src="'.SERVER_URL_ROOT.'articles/books/stuff_sm.png" align="left"/>&nbsp;

                Без жанра <cite class="sm">(ака Разное)</sm>',
              'Можно конечно добавить ещё жанров, «Научно-популярное», «Познавательное», «Юмор», «Странное» и тому подобное,
                  но книг там будет совсем мало. Посему для такого типа книг будет  это раздел.
               ',
              'raznoe/'
      );
      ?>

  </div>
</div>