<?php

$headerManager -> setTitle( 'О Symfony2 - PHP фреймворке' );
$headerManager -> setMetaDesr('Павел Осипов, О Symfony2 - PHP фреймворке');
$headerManager -> setMetaKeyw('Павел Осипов О Symfony2 - PHP фреймворке');

SiteCore::showTopperLink();

?>
<div class='mainDiv'>
	<div class='mainTextDiv'>

    <h1 title="Увеличение эффективности разработки, однозначно связано с увеличением количества и качества финансовых поступлений">
        <img src='<?=SERVER_URL_ROOT?>articles/symfony2/logo_symfony_header.png'
             alt='Symfony2 текущий логотип'
             style="float: right;"
             />
        О Symfony2 - PHP фреймворке который надеюсь увеличит мою эффективность
    </h1>

<h2>Symfony2 — PHP фреймворк</h2>
<p>
Недавно начал разбираться с <a href='http://ru.wikipedia.org/wiki/PHP'>PHP</a> <a href='http://ru.wikipedia.org/wiki/%D4%F0%E5%E9%EC%E2%EE%F0%EA'>фреймворком</a> <a href='http://ru.wikipedia.org/wiki/Symfony'>Symfony2</a>. Мощный и удобный инструмент разработки. По началу конечно скорость создания первого проекта ниже, чем с использованием привычных инструментов и подходов, но чувствую, что по мере увеличения понимания требования и структуры фреймворка, моя эффективность растёт (hope it's True).
</p>
<h2>Что понравилось</h2>
<p>
Очень радуют возможности шаблонизатора из-коробки <a href='http://ru.wikipedia.org/wiki/Twig'>Twig</a> (<a href='http://habrahabr.ru/post/127906/'>ещё</a> на хабре статейка). До этого я работал в основном только со <a href='http://ru.wikipedia.org/wiki/Smarty'>Smarty</a>, который тоже хорош, но чуть что-то более сложное и в нём приходится городить огород, чтобы реализовать. А Twig сильно больше наворочен — а значит мне удобен. Хотя чую, что шаблоны получаются более сложные, радующие программиста, но дизайнерам похоже с ним труднее работать.
</p><p>
Ещё конечно <a href='http://ru.wikipedia.org/wiki/Doctrine'>Doctrine</a>. Тоже из-коробки :). Тут радости меньше, так-как чую, что это всё удобство даётся за счёт нехилого оверхеда, но пользоваться можно. Даже удобно, такой Enterprise-like код получается, как будто и не совсем РНР уже.<br />




Как-то так:<br />
<?php
ob_start();
?>
    /**
     * Common Delete  Offer action
     * @param type $offerID
     */
    private function _deleteOfferAction( $offerID ) {
        $em = $this -> getDoctrine() -> getEntityManager();
        $offer = $em -> getRepository( 'QR1000MainBundle:Offer' )
                -> findOneById( $offerID );
        if ( $offer ) {
            $em -> remove( $offer );
            $em -> flush();
        }
    }
<?=SiteCore::outHighlited(  ob_get_clean(), 'php') ?>




</p>
<h3>Ещё по мелочи:</h3>
<p>
<a href='http://ru.wikipedia.org/wiki/Model-View-Controller'>MVC</a> по умолчанию как основа фреймворка используется везде и всегда.
</p><p>
<h3>Сладкая плюшка РНР начиная с версии 5.3 — <a href='http://habrahabr.ru/post/72033/'>пространства имён</a></h3>
Используются везде, где нужно, очень на мой взгляд грамотно.
</p><p>
<h3>Качественная официальная <a href='http://symfony.com/doc/current/book/index.html'>документация</a></h3>
Всегда актуальная и очень детальная информация — отличный плюс в пользу фреймворка. Явился для меня важным критерием при выборе.
<br /><br />
</p>

<p>
<b>Далее буду выкладывать некоторые вещи, которые мне показались не настолько прозрачными, чтобы с ними разобраться в лёт.</b>
<br /><br />
</p>



      <?php
      /**/

      SiteCore::showLinkElement(
              '
                <img src="'.SERVER_URL_ROOT.'articles/symfony2/twig.png" align="left"/>&nbsp;

                Как в .twig шаблоне найти подстроку в route или любой другой строке',
              '
                  Итак, возникла задача в twig шаблоне найти подстроку, всё оказалось просто..
              ',
              'symfony2_naiti_podstroku_v_route/'
      );

      SiteCore::showLinkElement(
              '
                <img src="'.SERVER_URL_ROOT.'articles/symfony2/orm_sm.png" align="left"/>&nbsp;

                Особенности связывания сущностей',
              '
                  Итак возникает задача организовать <a href="http://yandex.ru/yandsearch?text=%D0%BE%D1%82%D0%BD%D0%BE%D1%88%D0%B5%D0%BD%D0%B8%D0%B5+%D0%BE%D0%B4%D0%B8%D0%BD-%D0%BA%D0%BE-%D0%BC%D0%BD%D0%BE%D0%B3%D0%B8%D0%BC">отношение один-ко-многим</a> для двух объектов в базе. В этой заметке расскажу как это делается в Symfony2 + Doctrine ORM. Неочевидные особенности синтаксиса и другая мелочёвка.
              ',
              'orm_er_specific_1/'
      );

      SiteCore::showLinkElement(
              '
                <img src="'.SERVER_URL_ROOT.'articles/symfony2/console.png" align="left"/>&nbsp;

                Нехватка памяти при очистке кеша',
              '
                  Что можно сделать если при app/console cache:clear получаем Fatal error: Allowed memory size of XXX bytes exhausted
              ',
              'symfony2_ochistka_kesha/'
      );
      /**/


      SiteCore::showTopLink();
      ?>

  </div>
</div>