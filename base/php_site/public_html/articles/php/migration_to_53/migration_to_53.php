<?php


$headerManager->setTitle('Мой опыт миграции скриптов с версий PHP 5.1 на 5.3. С чем пришлось столкнуться и как я решал эти проблемы');
$headerManager->setMetaDesr('Мой опыт миграции скриптов с версий PHP 5.1 на 5.3. ');
$headerManager->setMetaKeyw('РНР, PHP, eval, миграция на 5.3, Notepad++, Netbeans , замена по регулярным выражениям, mysql_list_tables, get_called_class');

SiteCore::showTopperLink('Назад в „PHP“', 'php/');

?>

<div class='mainDiv'>

    <div class='mainTextDiv'>

        <h1 title="Пришлось поработать переводя большой (чужой) проект на наовый сервер">
            Что пришлось править
        </h1>

        <div id='mainTextSubpost' class='mainTextSubpost'>

            <p>
                Сайт, с которым пришлось работать использовал одну экзотическую CMS, поэтому большинство работы
                как раз и пришлось не на правку скриптов сайта, а на обновление этой CMS.<br/>
            </p>

            <p>
                Для начала пришлось разобраться с функциями ereg и eregi которые в PHP 5.3 объявлены устаревшими
                (deprecated).
                Так-как функция активно использовалась в движке, то руками править кучу файлов не резон, поэтому
                используется <a href="http://notepad-plus-plus.org/">Notepad++</a> у которого есть функция замены в
                файлах по
                маске регулярного выражения. К сожалению даже в седьмой версии моей текущей IDE
                <a href="http://netbeans.org/">Netbeans</a> такого
                счастья не предусмотрено <span style="font-size: xx-small">(грустный смайл)</span>.
                <br/>
                Хорошая <a
                        href="http://sourceforge.net/apps/mediawiki/notepad-plus/index.php?title=Regular_Expressions#Notepad.2B.2B_regex_syntax">вики</a>
                по регуляркам Notepad++.
            </p>

            <br/>
            <h2><?= SiteCore::outHighlited('ereg()') ?></h2>
            <p>
                Всё упирается в написание корректного регулярника для замены ereg("<i>выражение</i>") на
                preg_match("/<i>выражение</i>/").
                <br/>
                А вот и оно
                <br/>
                <span style="font-size: xx-small">барабанная дробь</span>
                <br/>
                <b>Search for:</b> &nbsp;&nbsp;&nbsp; ereg\((['"])(.*)(['"])([,\)])<br/>
                <b>Replace by:</b> &nbsp;&nbsp;&nbsp; preg_match(\1/\2/\3\4<br/>
            </p>

            <br/><br/>

            <h2><?= SiteCore::outHighlited('mysql_list_tables()') ?></h2>

            <p>
                Эта функция также объявлена устаревшей (deprecated), поэтому нуждается в замене.
                Её целью является получить список всех таблиц в целевой базе данных:<br/>
                <code><?= SiteCore::outHighlited('$result = mysql_list_tables(self::$db, self::$identifier);') ?></code><br/>
                Поэтому она заменяется простым запросом:<br/>

                <code>    <?= SiteCore::outHighlited('$result = mysql_query( "SHOW TABLES FROM ".self::$db, self::$identifier);') ?></code><br/>
                <br/>
                *Вместо <?= SiteCore::outHighlited('self::$db') ?> конечно может быть записано имя базы.

            </p>

            <br/>

            <h2><?= SiteCore::outHighlited('eval()') ?></h2>
            <p>
                Вспоминаем, что начиная с 5.3 РНР не разрешает обращаться к обычным методам с использованием синтаксиса
                доступа к статическим
                свойствам/методам, и все строки вида<br/>
                <code><?= SiteCore::outHighlited('eval ("return $class_name::__construct();");') ?></code><br/>
                меняем на такое вот<br/>
                <code><?= SiteCore::outHighlited('$class_return = new $class_name();') ?></code><br/>

                <br/>
                Ещё пример<br/>
                <code>

                    <?= SiteCore::outHighlited('
$result .= eval(
        "parser_".$parser."::$modifier = $modifier; "
        "parser_".$parser."::__construct(); "
        "return parser_".$parser."::parse(".$value.");"
); '); ?>
                </code>
                <br/>меняем на<br/>
                <code>
                    <?= SiteCore::outHighlited('
$parser_base ="parser_";
	$parser_name = $parser_base.$parser;
	$parser_obj = new $parser_name();
	$parser_obj::$modifier = $modifier;
	$result .= $parser_obj->parse( $value );
); '); ?>

                </code>

            </p>

            <br/>
            <h2><?= SiteCore::outHighlited('get_called_class()') ?></h2>
            <p>
                Эта функция добавлена в 5.3 и на мой взгляд является отличным инструментом для создания более
                элегантного, компактного и эффективного кода.
                В своём ORM велосипеде я её активно использую, жаль только, что большинство проектов всё ещё на версиях
                РНР ниже 5.3.
            </p>

            <br/><br/>
            <h3>Пока всё. Успешных проектов!</h3>

            <?php
            SiteCore::showTopLink();
            ?>

        </div>
    </div>
</div>


