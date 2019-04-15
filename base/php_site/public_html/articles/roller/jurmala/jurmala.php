<?php

$headerManager->setTitle('Где кататься на роликах в Юрмале? А вот');
$headerManager->setMetaDesr('Где я катался на роликах в Юрмале');
$headerManager->setMetaKeyw('Ролики, Юрмала, трассы, ночная поездка');

SiteCore::showTopperLink('Назад в „Ролики“', 'jurmala');

?>

<div class='mainDiv'>

    <div class='mainTextDiv'>

        <h1 title="Для тех, кто любит (как я ) пробежаться. Пока-что никаких рамп">
            Трассы Юрмалы для роллеров
        </h1>

        <div id='mainTextSubpost' class='mainTextSubpost'>

            <?php

            SiteCore::showLinkElement(
                '
                Трассы Юрмалы
              ',
                'Юрмала - короткий круг 10км',
                'trace_1/'
            );
            SiteCore::showLinkElement(
                '
                Трассы Юрмалы
              ',
                'Юрмала - длинный круг 16км',
                'trace_2/'
            );
            SiteCore::showLinkElement(
                '
                Трассы Юрмалы
              ',
                'Юрмала - по Капу 13км',
                'trace_3/'
            );


            SiteCore::showTopLink();
            ?>

        </div>
    </div>
</div>


