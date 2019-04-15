<?php

$headerManager->setTitle('Где кататься на роликах в Риге? А вот');
$headerManager->setMetaDesr('Где я катался на роликах в Риге');
$headerManager->setMetaKeyw('Ролики, Риге, трассы, ночная поездка');

SiteCore::showTopperLink('Назад в „Ролики“', 'riga');

?>

<div class='mainDiv'>

    <div class='mainTextDiv'>

        <h1>
            Роллерские трассы Риги для покатушек
        </h1>

        <div id='mainTextSubpost' class='mainTextSubpost'>

            <?php

            SiteCore::showLinkElement(
                '
                Трассы Риги
              ',
                'Межапарк - первый круг 12км',
                'trace_1/'
            );
            SiteCore::showLinkElement(
                '
                Трассы Риги
              ',
                'Межапарк - второй круг 18км',
                'trace_2/'
            );
            SiteCore::showLinkElement(
                '
                Трассы Риги
              ',
                'Межапарк - Вецаки - Межапарк',
                'trace_3/'
            );


            SiteCore::showTopLink();
            ?>

        </div>
    </div>
</div>


