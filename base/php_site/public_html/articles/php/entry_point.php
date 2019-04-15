<?php

$headerManager->setTitle('Интересные заметки и факты о PHP. Полезные, надеюсь, не только лично мне');
$headerManager->setMetaDesr('Статьи о РНР, мой опыт его применения для решения разнообразных задач.  ');
$headerManager->setMetaKeyw('РНР, PHP, eval, миграция на 5.3, лабораторки по PHP, лабораторные работы по PHP,интресные задачи');

SiteCore::showTopperLink();

// <editor-fold defaultstate="collapsed" desc="Random cites info array">
$cites = array(
    array(
        'text' => "
                    Чем отличается хороший программист от программиста-профессионала?<br />
                    Хороший программист пишет хороший код, когда у него хорошее настроение, а профессионал пишет хороший код всегда.
",
        'href_text' => '',
        'url' => array()
    ),
    array(
        'text' => "
Кто такой программист?<br />
Человек который решает проблемы о которых никто не знает, способами, которые никто не понимает.
",
        'href_text' => '',
        'url' => array()
    ),
    array(
        'text' => "
Cначала программитст делает просто и убого, затем сложно и убого. После, поднаторев, сложно и хорошо, а вершина мастерства – просто и гениально
",
        'href_text' => '',
        'url' => array()
    )

); // </editor-fold>


?>
<div class='mainDiv'>
    <div class='mainTextDiv'>


        <?php
        SiteCore::showCite($cites[rand(0, count($cites) - 1)]);
        ?>


        <h1 title="Статьи о РНР, мой опыт его применения в различных сферах IT ">
            PHP</h1>
        <br/>
        Что мне есть сказать о препроцессоре гипертекста

        <br/><br/>
        <?php


        SiteCore::showLinkElement(
            '
                <div title="Лабораторки по РНР">Лабораторки по РНР</div>
              ',
            '
	В бытность свою преподавателем РНР в <a href="http://tsi.lv">Институте Транспорта и Связи</a>
          я подготовил курс молодого бойца, который 		(надеюсь успешно)
          преподавал студентам компьютерщикам выпускного четвёртого курса.
          ',
            'tsi_labs/'
        );

        SiteCore::showLinkElement(
            '
                <div  title="Миграция до версии 5.3, встреченные и решённые проблемы">
                  Миграция до версии 5.3, встреченные и решённые проблемы
                </div>
              ',
            '
                Некоторое время назад пришлось переводить один большой (и не свой) проект на РНР 5.3, думаю кому-то,
                кто сталкнётся с этим в будущем, мой опыт поможет сэкономить немного времени.<br />
              ',
            'migration_to_53/'
        );


        SiteCore::showTopLink();
        ?>
    </div>
</div>
