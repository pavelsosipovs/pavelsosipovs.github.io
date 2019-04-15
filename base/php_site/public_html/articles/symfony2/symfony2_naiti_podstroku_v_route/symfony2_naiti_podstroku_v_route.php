<?php

$headerManager -> setTitle( 'Как в .twig шаблоне найти подстроку в route или любой другой строке' );
$headerManager -> setMetaDesr('Как в .twig шаблоне найти подстроку в route или любой другой строке');
$headerManager -> setMetaKeyw('Symfony2, twig, strpos, substr, filter, подстрокаб вхождение строки');

SiteCore::showTopperLink( 'Назад в „Symfony2“', 'symfony2' );

?>

<div class='mainDiv'>

	<div class='mainTextDiv'>


		<h1 title="Не думаю, что очень уж редкая задача">
			Итак, возникла задача в twig шаблоне найти подстроку, всё оказалось просто..
		</h1>
    <p>
        Суть возникшей задачки в том, что есть основное меню, при нажатии на каждый из элементов
        которого он становится подсвеченным. Проще всего это сделать следующим образом: получить при генерации
        меню текущий route и в цикле вывода всех элементов проверять текущий route и текущий выводимый
        элемент на равенство. Если они равны, то добавляем класс menu-item-higlighted, или как там он у Вас
        может называться.
    </p><p>
    В виде кода это может выглядеть примерно следующим образом:
    <?php
    ob_start();
    ?>

          {%
            set header_menus = [
            { 'href':'MainBundle_TopMenuElement_Home','text':'common.menu.home.text'},
            { 'href':'MainBundle_TopMenuElement_About','text':'common.menu.about.text'},
            { 'href':'MainBundle_TopMenuElement_Contacts','text':'common.menu.contacts.text'},
            ]
          %}

          {% set route = app.request.get('_route') %}

          {% for menu_item in header_menus %}
              <div class="header-menu-item
                    {% if route == menu_item.href %}
                        menu-item-higlighted
                    {% endif %}
                   "
                   >
                  <a href="{{ path( menu_item.href ) }}" >
                    {{ menu_item.text|trans }}
                  </a>
              </div>

        {% endfor %}
    <?=SiteCore::outHighlited( ob_get_clean(), 'php') ?>
    </p>

<div class="left_100">
<?php
    ob_start();
    ?>
    Кстати, такая удобная возможность получения текущего route (<br />{% set route = app.request.get('_route') %}) появилась совсем недавно, в Symfony 2.0.* ещё
    не было, а в 2.1.* уже появилась. Хорошо, а то была проблема, городить всего приходилось, чтобы эту
    функциональность получить. Вот, <a href="http://stackoverflow.com/questions/9378714/get-current-url-in-twig-template">тут</a> всё хорошо разжёвано, сравните как было и как стало.
<?php
    $cite = array(
        'text' => ob_get_clean(),
        'href_text' => '',
        'url' => array()
        );
    SiteCore::showCite( $cite );
?></div>


    <p>
       Всё становится немного сложнее, если у каждого меню, есть подменю, с другими rout`ами. Тогда
       соответственно подсвечиваться будет только один элемент, у которого route совпадёт с текущим. Естественно
       возникает мысль, задать всем элементам подменю routes продолжающие route основного элемента, прим.:
        <div class="left_100">
            для основного <code class="nonl">MainBundle_TopMenuElement_Home</code> подменю могут быть
       <code class="nonl">MainBundle_TopMenuElement_Home_Benefits</code>,
       <code class="nonl">MainBundle_TopMenuElement_Home_Cooperation</code> и т.д.
       </div>
    </p>
    <p>
       И тогда в проверке соответствия нужно сравнивать не всю строку, а только начало, или другую общую уникальную часть. Но для этого надо
       использовать аналоги РНР`шных функций strpos или substr, а таких фильтров в Twig пока нет
       (в стандартной поставке).
    </p>

    <p>
        Решение нашлось простое, <b><code class="nonl">in</code></b> работает не только для массивов но и для строк! Этого уже достаточно считаю.
    </p>


<br />
<br />
<h3><p>Успешных проектов!</p></h3>


    <div id='mainTextSubpost' class='mainTextSubpost'>




<?php
    SiteCore::showArticeDate( '2012.10.11' );
  SiteCore::showTopLink();
?>

    </div>
  </div>
</div>


