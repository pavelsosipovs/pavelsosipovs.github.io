<?php

$headerManager -> setTitle( 'Заметки вне категорий' );
$headerManager -> setMetaDesr('Павел Осипов, заметки вне категорий');
$headerManager -> setMetaKeyw('Павел Осипов разное');

SiteCore::showTopperLink();

?>
<div class='mainDiv'>
	<div class='mainTextDiv'>

      <h1 title="Информация ради которой нет смысла создавать категории, но выложить можно (даже нужно)">Информация без категории</h1>

      <?php

      SiteCore::showLinkElement(
              'LibreOffice - мой выбор',
              'Кратко о LibreOffice, что за зверь и почему я его использую',
              'libreoffice/'
      );

      SiteCore::showLinkElement(
              'Спонтанное устное творчество',
              'Иногда придумываются высказывания, которые не хочется забывать',
              'storytelling/'
      );

      SiteCore::showLinkElement(
              'NIC.lv DNS проблемы',
              'Некоторое время назад, на сайте был размещён не относящийся к нему контент.',
              'nic/'
      );

SiteCore::showTopperLink();

      ?>

  </div>
</div>