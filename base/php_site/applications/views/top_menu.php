<?php

?>

<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<!--            https://www.w3schools.com/howto/howto_js_off-canvas.asp-->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="topnav" id="myTopnav">
    <a href="/my_articles/"
       title="Не-полный список моих публикаций, либо просто ссылка на издание, либо вся статья в PDF">Публикации</a>
    <a href="/php/" title="Интересные вещи и рецепты связанные с PHP">PHP</a>
    <a href="/books/" class="active" title="Книги, о которых приятно вспомнить после прочтения">Книги</a>
    <a href="#about" onclick="toggleNav()" id="other_categories" title="Другие интересные разделы">Другие разделы 👇</a>
    <a href="javascript:void(0);" class="icon" onclick="togglemenu()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<style>

</style>
<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function togglemenu() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>


<!-- The overlay -->
<div id="myNav" class="overlay">

    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <!-- Overlay content -->
    <div class="overlay-content" id="overlay-content">
        <a href="/roller/" title="Рооолики :)">Ролики</a>
        <a href="/my_sites/"
           title="Сайты, в создании/поддержке которых я принимал участие, и о которых хочется что-то сказать">Мои
            сайты</a>
        <a href="/stuff/" title="Информация без определённой категории">Разное</a>
        <a href="/music/" title="Если есть, что интересного о музыке, пишу сюда.">Музыка</a>
        <a href="/semantic_web/" title="О семантической паутине и будущем развития Internet">Semantic WEB</a>
        <a href="/pc_goodies/" title="Автоматизация некоторых рутинных операций в консоли и оффисе">Автоматизация
            рутинных операций</a>
        <a href="/symfony2/"
           title="Неочевидные вещи о PHP фреймворке Symfony2, которые потребовали времени на нахождение решения">Symfony2</a>
    </div>

</div>
<script>
    var navOpened = false;

    function toggleNav() {
        if (navOpened) {
            closeNav();
        } else {
            openNav();
        }
    }

    /* Open */
    function openNav() {
        navOpened = true;
        var item = document.getElementById("myNav");
        item.style.height = "100%";
        item.style.width = "100%";
        document.getElementById("overlay-content").style.display = "inline-block";
    }

    /* Close */
    function closeNav() {
        navOpened = false;
        var item = document.getElementById("myNav");
        item.style.height = "0%";
        item.style.width = "0%";
        document.getElementById("overlay-content").style.display = "none";
    }
</script>