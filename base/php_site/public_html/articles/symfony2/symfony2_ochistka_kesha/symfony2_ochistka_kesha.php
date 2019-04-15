<?php

$headerManager -> setTitle( 'Если при app/console cache:clear получаем Fatal error: Allowed memory size of XXX bytes exhausted' );
$headerManager -> setMetaDesr('Что можно сделать если при app/console cache:clear получаем Fatal error: Allowed memory size of XXX bytes exhausted');
$headerManager -> setMetaKeyw('Symfony2, app/console, cache:clear, Fatal error, Allowed memory size of  bytes exhausted');

SiteCore::showTopperLink( 'Назад в „Symfony2“', 'symfony2' );

?>

<div class='mainDiv'>

	<div class='mainTextDiv'>


		<h1 title="Бывают в жизни огорчения">
			Что можно сделать если при app/console cache:clear получаем Fatal error: Allowed memory size of XXX bytes exhausted
		</h1>
    <p>
       Итак, для очистки кеша для целевого окружения или для все сразу мы используем консольный скрипт вызываемый следующей командой: <br />
       <code>app/console cache:clear</code>
       <br />или<br />
       <code>app/console cache:clear --env=dev</code>
       <br />
       Всё-бы хорошо, но когда проект разрастается, памяти для его очистки может на хватить и получаем сообщение:
       <br />
       <code>Fatal error: Allowed memory size of XXX bytes exhausted</code>
       Проблема.
    </p>
    <p>
        Есть два возможных решения:
    </p>
    <p>
        1) В php.ini увеличить значение memory_limit, к слову, для Symfony и так хорошо-бы метров 128/256 выделить.<br />
        Это поможет, но новое значение будет глобальным для всех РНР скриптов, чего в принципе наверное не хочется.
        </p>
    <p>
        2) Указать значение выделяемой памяти напрямую в параметрах запроса:<br />
        Для этого просто добавляем желаемый размер максимальной памяти с использованием такого синтаксиса:
        <br />
        <code> php -d memory_limit=256M app/console cache:clear</code>
        <br />
        И всё в порядке :)

    </p>


<br />
<br />
<h3><p>Успешных проектов!</p></h3>


    <div id='mainTextSubpost' class='mainTextSubpost'>




<?php
    SiteCore::showArticeDate( '2012.09.28' );
  SiteCore::showTopLink();
?>

    </div>
  </div>
</div>


