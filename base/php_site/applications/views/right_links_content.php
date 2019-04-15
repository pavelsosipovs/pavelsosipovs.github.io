<?php
//Ё

?>


<?= tableTop() ?>
    <div id='news_block' class='opened_block newsMainTable'>
        <p>Все категории</p>
        <br/>
        <?php

        //Anime

        //    showTagInCloud( 'Книги','books',1);

        showTagInCloud('Книги', 'books', 3, 'Книги, о которых приятно вспомнить после прочтения');
        showTagInCloud('Ролики', 'roller', 3, 'Рооолики :)');
        showTagInCloud('Публикации', 'my_articles', 3, 'не-Полный список моих публикаций, либо просто ссылка на издание, либо вся статья в PDF');
        showTagInCloud('Мои сайты', 'my_sites', 3, 'Сайты, в создании/поддержке которых я принимал участие, и о которых хочется что-то сказать');
        //    showTagInCloud( 'Флористика','floristic',1 );
        //    showTagInCloud( 'Фото','photo',1 );

        showTagInCloud('Разное', 'stuff', 3, 'Информация вне определённой категории');
        //    showTagInCloud( 'JS','js',3,'JavaScript наработки, которые могут кому-то пригодится' );
        showTagInCloud('PHP', 'php', 3, 'Интересные вещи и рецепты связанные с PHP');

        //    showTagInCloud( 'Конференции','my_conferences',3,'Полный список конференций в которых я принимал участие' );
        //    showTagInCloud( 'Ролики','roller', 3 );
        showTagInCloud('Музыка', 'music', 3, 'Если есть, что интересного о музыке, пишу сюда.');
        showTagInCloud('Semantic WEB', 'semantic_web', 3, 'О семантической паутине и будущем развития Internet');
        showTagInCloud('Автоматизация рутинных операций', 'pc_goodies', 3, 'Автоматизация некоторых рутинных операций в консоли и оффисе');
        showTagInCloud('Symfony2', 'symfony2', 3, 'Неочевидные вещи о PHP фреймворке Symfony2, которые потребовали времени на нахождение решения');

        ?>

    </div>


    <div id='fadback_block' class='closed_block newsMainTable'>

        <div class='friend_link'>
            <a href='http://iti.rtu.lv/'>Институт Информационных Технологий</a>
        </div>
        <div class='friend_link'>
            <a href='http://www.tsi.lv' class='friend_link'>Институт Транспорта и Связи</a><br/>
        </div>
        <div class='friend_link'>
            <a href='http://habrahabr.ru/users/pavel_osipov/' class='friend_link'>Я на Хабре</a><br/>
        </div>


    </div>
<?= tableBottom() ?>

<?php

function showTagInCloud($text, $link, $size = 3, $title_text = '')
{
    //$size font-size class for cloud element, currently can be 1 - 5
    ?>
    <span style="margin-right: 0.5em;margin-bottom: 0.5em;float: left;" title="<?= $title_text ?>">
    <a class="cloudEl cloudEl<?= $size ?>" href="<?= SERVER_URL . $link ?>/"

    ><img src="<?= SERVER_URL ?>engine/images/li_sign_sm.png" alt="" style="border: 0px;"
        /><?= $text ?></a>
   </span>
    <?php
}

