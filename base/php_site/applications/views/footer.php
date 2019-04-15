<?php ?>

<a href="/semantic_web/" id="semanticWebImgHolder">
    <div class="semanticWebImg" title="Семантическая паутинка"></div>
</a>

<div style="width: 100%;">
    <?php
    if (!empty($links)) {
        SiteCore::showCategoryLinks($links);
    }
    ?>

    <div id="rss_link_holder">
        <a href="/engine/feed.xml">
            <img src="/engine/images/1300800514_rss2_8-17.png"
                 title="Получай извещение о появлении новостей на сайте"
                 alt="Подписаться на RSS канал с извещением о появлении новостей на сайте" style="border: 0px;"
            />
        </a>
        <h3>Внимание!</h3>
        Теперь за обновлениями сайта можно следить подписавшись на RSS ленту!
        <br/><br/>
    </div>

</div>


<div class='w3'>
    <p>
        <?php
        /*
        if (!$v1 or $v1 == 'index.php') {
            ?>
            <a href="http://validator.w3.org/check?uri=referer"><img
                        src='//engine/images/valid-xhtml10-blue.png'
                        alt="Valid XHTML 1.0 Strict" height="31" width="88"/></a>
            <?php
        }
        /**/

        if (!defined('LOCAL')) {
            ?>
            <script src="http://connect.facebook.net/en_US/all.js#appId=256756581012732&amp;xfbml=1"></script>
            <!-- Place this tag in your head or just before your close body tag -->
            <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
            <!-- Place this tag where you want the +1 button to render -->
            <?php
        }
        ?>
    </p>
</div>


<div class='footer custom_hr'>
    <div style="position: relative;top: -64px;">
        <a href="/engine/feed.xml">
            <img
                    src="/engine/images/1300800514_rss2_8-17.png"
                    style="float: left;border:0px"
                    title="RSS feed"
                    alt="RSS feed"
            />
        </a>
    </div>


    <div style="position: relative;top: -64px;">
        <a href='<?= SiteCore::protectMail('www.osipov.lv@gmail.com') ?>'
        ><img src="/engine/images/1300137871_email_upload1.png" style="float: left;border:0px"
              title="Есть что сказать? Пишите мне на электропочту" alt="Есть что сказать? Пишите мне на электропочту"/></a>
    </div>
    <br/>
    Павел Осипов &copy; 2009 - 2019
    <a href="https://plus.google.com/u/0/102649742378290957378?rel=author">Google+</a>
    <div><a href="http://www.000webhost.com/">000webhost hosting</a></div>
</div>
<div class='footDiv'>


</div>


</body>
</html>