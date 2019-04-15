<?php

$headerManager->setTitle('Меняем старые, убитые подшипники на новые, HOWTO');
$headerManager->setMetaDesr('Как я менял старые подшипники в роликах на новые');
$headerManager->setMetaKeyw('Старые подшипники, подшипы, ABEC, RollerBlade, RX100');

SiteCore::showTopperLink('Назад в „Обслуживание роликов“', 'bearings');
//SiteCore::includeHighslide();

?>

<div class='mainDiv'>

    <div class='mainTextDiv'>

        <h1 title="А то старые за столько времени уже не катят">
            Как я менял подшипники перед сезоном 2011
        </h1>

        <div id='mainTextSubpost' class='mainTextSubpost'>

            <?= SiteCore::addHighslidedImg(
                "articles/roller/service/bearings/img/dsc_9942.jpg",
                "articles/roller/service/bearings/img/sm/dsc_9942_sm.jpg",
                "Бонифаций одобряет новые подшипы") ?>
            <p>С момента покупки роликов прошло уже несколько сезонов, и до последнего времени меня всё в них
                устраивало. Однако под конец прошлого сезона я начал замечать, что не так уж и славно они идут как
                раньше. Разобрав пару колёс, получил несколько разболтанных подшипников.
                Конечно первым делом я их отмыл и смазал, но результат оказался не достаточно хорош, видимо доктор
                сказал в морг, значит в морг.
                <br/>
                <?= SiteCore::addHighslidedImg(
                    "articles/roller/service/bearings/img/dsc_9940.jpg",
                    "articles/roller/service/bearings/img/sm/dsc_9940_sm.jpg",
                    "Пациент") ?>
                Вот и решил я поменять подшипники, и процесс это запечатлеть на фотографии, дабы кому-то мой опыт
                полезен был.<br/>

                Конечно опытным роллерам это не так интересно, но уверен новичкам может быть полезно.
            </p>


            <br/>
            <p>
                Подшипники<br/>

                Выбрать правильные подшипники не так уж и просто. Конечно хорошей идеей будет постараться купить такие
                же, как и оригинальные, но только при условии, что они хорошо себя показали.
                Основной стандарт на них это <a href='http://ru.wikipedia.org/wiki/ABEC'>ABEC</a>. Цитирую Википедию:
                <cite>Аббревиатура ABEC используется для указания точности изготовления прецизионных подшипников.</cite>
                Иными словами, чем больше цифра, тем более качественно сделаны подшипники, более дорогие, и теоретически
                должны дольше и лучше работать.<br/>
                Я не сильно долго думал и купил такие же как и были оригинальные: ABEC 7.
            </p>

            <br/>
            <p>
                Магазин<br/>


                В своё время ролики я покупал в магазине Čampions, но как только я поехал в него за подшипниками, он
                вдруг закрылся, и честно говоря я не знаю его теперешний статус. А жаль, потому-что персонал там был
                квалифицированный и отношение к покупателям отменное.<br/>
                <?= SiteCore::addHighslidedImg(
                    "articles/roller/service/bearings/img/dsc_9939.jpg",
                    "articles/roller/service/bearings/img/sm/dsc_9939_sm.jpg",
                    "Made in China, что в общем-то и не удивительно", 'left') ?>
                Поэтому пришлось искать другие места. Вариантов оказалось не много, нашёл только один специализированный
                магазин для роллеров, <a href='http://www.taktika.lv'>Taktika</a> на ул. Čaka 54. <br/>
                В принципе магазин неплохой, но что-то в нём мне не очень понравилось. Если в Čampions`е было интересно
                поговорить с персоналом, то тут отношение купил — проваливай.. Хотя это скорее всего просто мне не
                повезло.<br/>
                В итоге купил набор «Powerslide ABEC 7 — 608» за 15ls.<br/>
                Вроде должны быть хорошие, на первых покатушках показали себя славно. Одно мне не нравится, завальцована
                только одна сторона. Надеюсь, при моём бережном отношении, за сезон со внутренней стороны под пыльник не
                набъётся полкило грязи. Вскрытие покажет..

            </p>


            <br/>
            <p>
            <div style="min-height: 200px">
                Снимаем колёса<br/>
                <?= SiteCore::addHighslidedImg(
                    "articles/roller/service/bearings/img/dsc_9941.jpg",
                    "articles/roller/service/bearings/img/sm/dsc_9941_sm.jpg",
                    "Аккуратно откручиваем колёса") ?>
                Аккуратно откручиваем колёса и раскладываем в том же порядке, в котором они были на раме. В виду
                особенностей строения стопы, задние колёса стачиваются быстрее передних, поэтому, если разница большая,
                то их можно поменять местами. Я пользовался рекомендацией, что менять их нужно через одно, т. е.
                четвёртое меняем местами со вторым, а первое с третьим.<br/>
            </div>

            <div style="min-height: 200px">
                <?= SiteCore::addHighslidedImg(
                    "articles/roller/service/bearings/img/dsc_9944.jpg",
                    "articles/roller/service/bearings/img/sm/dsc_9944_sm.jpg",
                    "Раскладываем их в порядке живой очереди (FIFO)", 'left') ?>
                <br/>Также самое время всё аккуратно протереть.<br/>
                Не нужно сильно нажимать на ключ, бывают случаи, когда он ломается в шлице и возникает проблемка.
            </div>

            </p>

            <br/>

            <div style="min-height: 200px">
                <?= SiteCore::addHighslidedImg(
                    "articles/roller/service/bearings/img/dsc_9946.jpg",
                    "articles/roller/service/bearings/img/sm/dsc_9946_sm.jpg",
                    "Вытаскиваем подшипы 1") ?>
                <p>
                    Вынимаем подшипники.
                    <br>
                    Далее из каждого колеса вытаскиваем подшипники. Я для этого использовал тот же ключ, которым и
                    откручивал, но в комплекте с подшипниками шёл также весьма удобный загнутый ключ. <br/>
                </p>
            </div>


            <div style="min-height: 200px">
                <?= SiteCore::addHighslidedImg(
                    "articles/roller/service/bearings/img/dsc_9947.jpg",
                    "articles/roller/service/bearings/img/sm/dsc_9947_sm.jpg",
                    "Вытаскиваем подшипы 2", 'left') ?>
                <?= SiteCore::addHighslidedImg(
                    "articles/roller/service/bearings/img/dsc_9948.jpg",
                    "articles/roller/service/bearings/img/sm/dsc_9948_sm.jpg",
                    "Вытаскиваем подшипы 3") ?>
                Чтобы вытащить подшипник, нужно засунуть внутрь колеса Г-образный инструмент, что-то похожее как на
                фото. И
                просто потянуть. Он ничем не закреплён, просто жёстко уплотнён во втулке колеса, так-что выходит с
                усилием.
                <br>
                В итоге, с каждого колеса получаем по два подшипника и внутреннюю распорку, которая находится между
                ними.
            </div>

            <div style="min-height: 200px">
                <br/><br/>

                Памятуя о том, что человек эффективнее всего делает однообразную работу, вытаскиваем последовательно все
                подшипники, и раскладываем для каждого колеса уже новые.
                <br>
                Ну а дальше всё в обратном порядке. Собираем подшипники, закручиваем колёса, радуемся и бежим
                раскатывать
                обновки :)
                <?= SiteCore::addHighslidedImg(
                    "articles/roller/service/bearings/img/dsc_9952.jpg",
                    "articles/roller/service/bearings/img/sm/dsc_9952_sm.jpg",
                    "Вытаскиваем подшипы 4") ?>

                </p>
            </div>

            <div class="left_100">
                <br/><br/>
                <p>
                    Дополнительные фотографии<br/>
                <div class="left_100" style="text-align: center;">
                    <?= SiteCore::addHighslidedImg(
                        "articles/roller/service/bearings/img/dsc_9950.jpg",
                        "articles/roller/service/bearings/img/sm/dsc_9950_sm.jpg",
                        "Ключ из комплекта подшипников", 'left') ?>
                    <?= SiteCore::addHighslidedImg(
                        "articles/roller/service/bearings/img/dsc_9951.jpg",
                        "articles/roller/service/bearings/img/sm/dsc_9951_sm.jpg",
                        "Ключ из комплекта подшипников 2", 'left') ?>
                    <?= SiteCore::addHighslidedImg(
                        "articles/roller/service/bearings/img/dsc_9955.jpg",
                        "articles/roller/service/bearings/img/sm/dsc_9955_sm.jpg",
                        "Вжимаем подшипник", 'left') ?>
                    <?= SiteCore::addHighslidedImg(
                        "articles/roller/service/bearings/img/dsc_9954.jpg",
                        "articles/roller/service/bearings/img/sm/dsc_9954_sm.jpg",
                        "Всё аккуратно скручиваем", 'left') ?>
                    <?= SiteCore::addHighslidedImg(
                        "articles/roller/service/bearings/img/dsc_9943.jpg",
                        "articles/roller/service/bearings/img/sm/dsc_9943_sm.jpg",
                        "Бонька доволен", 'left') ?>
                </div>
            </div>
            &nbsp;
            </p>
        </div>


        <div class="left_100" style="padding-bottom: 3em;">
            <br/>
            <p>
                Спасибо за внимание.
                Надеюсь кому-то это пригодится всё.
            </p>
        </div>


        <?php
        SiteCore::showTopLink();
        ?>

    </div>
</div>
</div>


