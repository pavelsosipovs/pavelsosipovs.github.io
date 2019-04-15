<?php

//SiteCore class with site common used functions

class SiteCore
{

//  static function parse_input_vars( $var ) {
//    //will present site_fedback received in $var
//    //into keys array
//    //@$var: target variables string to explode
//
//    $r = explode( '_' , $var );
//    if(!$r[0]) {
//      //load default view
//      $r[0] = 'main';
//    }
//    return $r;
//
//  }

//  static function view_have_header( $viewName ) {
//    //method to check, are requested view need output header/footer around him
//    //@$viewName: name of view to check
//
//    $noHeaders = array(
//            'GetCityshns'
//    );
//
//    return !in_array( $viewName, $noHeaders );
//
//  }

    /**
     *Will parse target URL to parts and present it as some links in one string
     * @param string $text string to parse
     * @param array $partsUrlsArr array with info
     * @param string $delimeter delimeter symbol
     * Аквариум::Сестра Хаос (2002)::500
     * http://www.aquarium.ru/discography/sestra_chaos.html#@01
     * converts to <a href=''>Аквариум</a>::<a href=''>Сестра Хаос (2002)</a>::<a href=''>500</a>
     */
    static function parse_URL_to_parts($text, $partsUrlsArr, $delimeter = '::')
    {
        $parts = explode($delimeter, $text);
        $ret = $href = '';
        if ($parts) {
            foreach ($parts as $key => $value) {
                $href .= $partsUrlsArr[$key];
                $ret .= '<a href="' . $href . '">' . $value . '</a>' . $delimeter;
            }
        }
        if ($partsUrlsArr) {
            return '<span style="line-height:1.5em;font-size:0.7em"><b>' .
                substr($ret, 0, strlen($ret) - strlen($delimeter)) .
                '</b><span>';
        }
    }

    /**
     * Show one cite helper
     * @param type $curCite
     * @return string html
     */
    public static function showCite($curCite)
    {
        ob_start();
        ?>
        <div class="cite_holder" title="Цитата (должна быть в тему)">
            <div class="cite">
                <div class="cite_font"><?= $curCite['text'] ?></div>
                <?= SiteCore::parse_URL_to_parts(
                    $curCite['href_text'],
                    $curCite['url']
                ) ?>
            </div>
        </div>
        <?php
        $res = ob_get_clean();

        if (isset($curCite['isReturn']) && $curCite['isReturn'] === true) {
            return $res;
        }
        echo $res;
    }

    /**
     * @param $dateToShow
     * @param bool $add_offset
     */
    public static function showArticeDate($dateToShow, $add_offset = True)
    {
        ?>
        <div class="left_100">
            <p>
                <?php if ($add_offset) { ?><?php } ?>
                <span class='sign'>
        Павел Осипов<br/>
                    <?= $dateToShow ?>
      </span>
            </p>
        </div>
        <?php
    }

    /**
     * Code highliter, currently use http://freshmeat.net/projects/geshi
     * @param type $code
     * @param type $language
     */
    public static function outHighlited($source = '', $language = 'php')
    {
        global $codeHighliter;
        if (!defined('HIGHLITER_ITITIATED')) {
            require_once LBS_FOLDER . '/php_code_highliter/geshi/geshi.php';
            $codeHighliter = new GeSHi();
            define('HIGHLITER_ITITIATED', 1);
        }
        if ($codeHighliter->get_language_name() != $language) {
            $codeHighliter->set_language($language);
        }
        $codeHighliter->set_source($source);

        $codeHighliter->set_header_type(GESHI_HEADER_NONE);
        return $codeHighliter->parse_code();
    }

    static function showTopperLink($text = 'На главную', $href = '', $isAnchor = true)
    {
        $addToPath = '';
        if ($isAnchor) {
            $href = str_replace('/', '', $href);
            $addToPath = '../#';
        }
        ?>
        <!--        <ins><span style="float: right;position: relative;left: -400px;">-->
        <ins><span class="left_100" style="text-align: right;padding-top: 1em;">
      <b>
        <img src="<?= SERVER_URL ?>engine/images/top_sign_sm.png" alt="" style="border: 0px;"
        />&nbsp;&nbsp;<a href="<?= $addToPath . $href ?>"><?= $text ?></a></b>&nbsp;&nbsp;
    </span></ins>
        <?php
    }


    static function get_view_script($toInclude)
    {
        //return path to view based on his name received in
        //All, what not allowed, DENYED!
        //@toInclude: view name, to get his path


        //allowed views names
        if (!defined('MOBI')) {
            $allowedViews = array(
                'MainFeedback', 'MainLogin',
                'RegFirst',
                'AuthMain', 'AuthAddshn', 'AuthAddoffer', 'AuthEditinfo', 'AuthGeoadstatus',
                'AuthAddoffer', 'AuthAddsuboffer', 'AuthOffersarchive', 'AuthEditshn',
                'GetCityshns'
            );
        } else {
            $allowedViews = array(
                'MainLogin',
                'RegFirst',
                'GeomShopWithoffers', 'GeomShopAroudincat'

            );
        }

        $retPath = VIEWS_FOLDER;
        if (defined('MOBI')) {
            $retPath = MOBI_VIEWS_FOLDER;
        }
        if (in_array($toInclude, $allowedViews)) {

            $retPath .= SiteCore::parse_capital_letters($toInclude);

        } else {

            $retPath .= '/main/main.php';

        }
        return $retPath;
    }

    public static function showLinkElement(
        $header,
        $text,
        $href = ''
    )
    {
        ?>
        <hr class='custom_hr'/>
        <div class="articleLinkHolder">
            <div style="margin-left: 15px;">

                <?php if (!empty($href)){ ?><a href="<?= $href ?>" class="article-href"
                                               name="<?= substr($href, 0, strlen($href) - 1) ?>"><?php } ?>
                    <ins><h1><?= $header ?></h1></ins>
                    <?php if (!empty($href)){ ?></a><?php } ?>

                <?php
                if (!empty($text)) {
                    echo '<p>'.$text . '</p><br>';
                }

                if (!empty($href)) {
                    ?>
                    <a title="Потому, что интересно..." href="<?= $href ?>" class="more_link"
                       name="<?= str_replace('/', '', $href) ?>">
                        Читать дальше
                        <img src="<?= SERVER_URL_ROOT ?>engine/images/1311669401_24-arrow-next.png" alt="Полный текст"
                             title="Полный текст заметки"
                             style="position: relative;top: 6px;"
                        />
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }


    public static function includeHighslide()
    {
        if (!defined('HIGHSLIDE_INCLUDED')) {
            define('HIGHSLIDE_INCLUDED', True);
            ?>
            <script type="text/javascript"
                    src="<?= SERVER_URL_ROOT ?>engine/js/highslide/highslide-full.packed.js"></script>
            <link rel="stylesheet" type="text/css" href="<?= SERVER_URL_ROOT ?>engine/js/highslide/highslide.css"/>
            <script type="text/javascript">
                hs.graphicsDir = '<?=SERVER_URL_ROOT?>engine/js/highslide/graphics/';
            </script>
            <?php
        }
    }

    /**
     *
     * @param type $srcBig
     * @param type $srcSm
     * @param type $title
     * @param type $align
     * @param type $settingsArr
     * @return type
     */
    public static function addHighslidedImg($srcBig, $srcSm, $title = '', $align = 'right', $settingsArr = array())
    {
        ob_start();
        ?>
        <ins>
            <div style="float: right;display: inline-block;"
            ><a href="<?= SERVER_URL_ROOT . $srcBig ?>"
                class="highslide"
                onclick="return hs.expand(this)">
                    <img src="<?= SERVER_URL_ROOT . $srcSm ?>"
                         alt="<?= $title ?>" title="<?= $title ?>" <?= $settingsArr['img_id'] ?>
                         class="roundedCornersImg"/></a>
            </div>
        </ins>
        <?php
        return ob_get_clean();
    }

    /**
     *
     */
    public static function showTopLink()
    {
        ?>

        <br/><br/>
        <ins><span style="float: right;position: relative;left: -310px;">
  <b>
    <img src="<?= SERVER_URL ?>engine/images/top_sign_sm.png" alt="" style="border: 0px;"
    />&nbsp;&nbsp;<a href="#">Наверх</a></b>
</span><br/><br/></ins>

        <?php
    }


    public static function showCategoryLinks($linksArr = array())
    {
        ?>

        <div id="main_interesting_links_holder">


            <div class="interestingLinksContainer">
                <h3>Ссылки в тему</h3>
                <br/>
                <?php

                foreach ($linksArr as $key => $value) {
                    ?>
                    <div class="interestingLinksHolder">
                        <a href="<?= $value['url'] ?>"><?= $value['link_text'] ?></a>
                        <br/>
                        <p style="text-align: right">

                            <?= $value['text'] ?>
                        </p>
                    </div>
                    <?php
                }

                ?>
            </div>
        </div>
        <?php
    }


    public static function show_last_articles_links()
    {

        ?>
        <div>

            <?php

            self::showLinkElement(
                '
                  <a href="books/">Книги</a> -
                  <a href="books/fantastic/aberkrombi/3_The_Last_Argument_of_Kings/">
                  Джо Аберкромби «Земной Круг» - «Первый Закон» - Книга третья: «Последний довод королей»</a>
              ',
                "
                  ltima ratio regum. Когда дипломатам уже нет тем для общения, нить разговоров между странами переходит в руки генералов.
 Третья книга, завершает первую трилогию цикла. Большинство сюжетных завязок получают объяснение, главные герои получают награду, причём каждый достойную себя. Но чувствуется, автор не собирается покидать созданный мир..
              ",
                'books/fantastic/aberkrombi/3_The_Last_Argument_of_Kings/'
            );

            self::showLinkElement(
                '
                  <a href="symfony2/">Symfony2</a> -
                  <a href="symfony2/symfony2_naiti_podstroku_v_route/">Как в .twig шаблоне найти подстроку в route или любой другой строке</a>
              ',
                "
                  Итак, возникла задача в twig шаблоне найти подстроку, всё оказалось просто..
              ",
                'symfony2/symfony2_naiti_podstroku_v_route/'
            );

            self::showLinkElement(
                '
                  <a href="symfony2/">Symfony2</a> -
                  <a href="symfony2/orm_er_specific_1/">Doctrine - связывание сущностей </a>
              ',
                "
                  Итак возникает задача организовать отношение один-ко-многим для двух объектов в базе. В этой заметке расскажу как это делается в Symfony2 + Doctrine ORM. Неочевидные особенности синтаксиса и другая мелочёвка.
              ",
                'symfony2/orm_er_specific_1/'
            );


            self::showLinkElement(
                '<a href="books/">Книги</a> -
               <a href="books/raznoe/masaru_ibuka/">После трёх уже поздно</a>

              ',
                "Один из основателей компании «Sony» <a href='http://ru.wikipedia.org/wiki/Ибука,_Масару'>Масару Ибука</a>
                  родился в 1903 году в Японии. По слогу чувствуется, что он любит детей, понимает их, много думает о их мотивах,
                  целях, желаниях. Старается погрузиться в мир детского разума, чтобы в итоге, формализовать его в понятном для взрослого виде. ",
                'books/raznoe/masaru_ibuka/'
            );


            self::showLinkElement(
                '<a href="books/">Книги</a> -
               <a href="books/fantastic/oikumena/">Генри Лайон Олди «Ойкумена»</a>

              ',
                "Присутствуют все необходимые атрибуты космической оперы. Мощные космические крейсера, флуктуации пространства, телепатические поединки, битвы в космосе и на планетах, и многое другое.
                  <br />Очень много всего там ещё присутствует. А сдобрено всё богатым русски языком отменного качества!

",
                'books/fantastic/oikumena/'
            );


            self::showLinkElement(
                '<a href="pc_goodies/">Автоматизация рутинных операций </a> &nbsp; -
              <a href="pc_goodies/python_base64/">Python для base64 изображений для CSS Data URI</a>
              ',
                "Задача: для всех .png изображений в текущей директории генерировать их представление в <a href='http://ru.wikipedia.org/wiki/Base64'>base64</a> в формате пригодном для использования в <a href='http://ru.wikipedia.org/wiki/Css'>CSS</a> файле в виде <a href='http://en.wikipedia.org/wiki/Data_URI_scheme'> Data URI схемы</a>.",
                'pc_goodies/python_base64/'
            );


            self::showLinkElement(
                '<a href="pc_goodies/">Автоматизация рутинных операций</a> &nbsp; -
              <a href="pc_goodies/console/">GraphicsMagic</a>
              ',
                'Как — то раз понадобилось мне изменить размер для большого количества изображений в папке. И получилась из этого целая статья .',
                'pc_goodies/console/'
            );

            self::showLinkElement(
                '<a href="roller/">Ролики</a> &nbsp; -
                <a href="roller/service/">Обслуживание</a> &nbsp; -
                <a href="roller/service/bearings/">Подшипники</a>
              ',
                'Как я менял подшипники перед сезоном 2011',
                'roller/service/bearings/'
            );

            self::showLinkElement(
                '<a href="my_sites/">Сайты</a>',
                'Сайты к созданию которых я имею отношение. Ссылки и короткие описания. Будет время,
                добавлю больше, пока самые интересные.',
                'my_sites/'
            );
            ?>
        </div>
        <?php
        /**/
    }


    public static function parse_capital_letters($str = '')
    {
        //will convert string GoodsAddStore to goods/add/store
        preg_match_all('/[A-Z][^A-Z]*/', $str, $results);

        //print_r( $results );
        $fileName = strtolower(array_pop($results[0]));
        $path = strtolower(implode('/', $results[0]));

        return '/' . $path . '/' . $fileName . '.php';
    }


    public static function import_controller($contrName)
    {
        //method to load controller without relative paths
        //@$contrName: name of required controller
        require_once CONTROLLERS_FOLDER . '/' . $contrName . '.php';
    }

    public static function get_model($modelName)
    {
        //method to load model without relative paths
        //@$modelName: name of required model
        require_once MODELS_FOLDER . '/' . $modelName . '.php';
    }

    public static function protectMail($s)
    {
//encript mail address to avoid it to be taken by bots
        $result = '';
        $s = 'mailto:' . $s;
        for ($i = 0; $i < strlen($s); $i++) {
            $result .= '&#' . ord(substr($s, $i, 1)) . ';';
        }
        return $result;
    }

    private static function go301($trgt = '')
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Status: 301 Moved Permanently");
        $_SERVER['REDIRECT_STATUS'] = 301;
        self::jumpHead($trgt);
    }

    public static function jumpHead($file)
    {
        //simple header redirect
        //@$file: target file
        header('Location: ' . $file);
        exit();
    }

    public static function redirect($trgt = '')
    {
        self::go301($trgt);
    }


//  public static function check_hard( $ss,$max_len=50000 ) {
//    //most hardest checking of received value
//    if(is_array($ss)) {
//      reset($ss);
//      while (list($key, $val) = each($ss)) {
//        $ss[$key] = SiteCore::check_hard($val);
//      }
//      return $ss;
//    }
//
//    if(mb_strlen($ss,'utf-8')  > $max_len)$ss = mb_substr($ss,0,$max_len,'utf-8');
//
//    $ss = htmlspecialchars(stripslashes(trim($ss)));
//    //$ss =	addcslashes ($ss,"\0..\37");
//    $ss =	addcslashes ($ss,"\0..\10");
//    $sqlInjSrch	= array('null','union','delete','update','char','outfile','ob_clean','system','script');
//    $sqlInjRep	= array('nu11','uniРѕn','dв„®lв„®tв„®','updatв„®','chР°r','Рѕutfile','ob_cleР°n','systРµm','sСЃript');
//    $ss	=	str_ireplace($sqlInjSrch, $sqlInjRep, $ss);
//
//    $sArr = array("'",'"','//','\\','#','--','(',')');
//    $rArr = array('`','В«','','','','вЂ”вЂ”','вЂ№','вЂє');
//    return str_replace($sArr, $rArr, $ss);
//  }
//  public static function check_medium( $s,$max_len=50000 ) {
//
//
//  }
//  public static function check_lite( $s,$max_len=50000 ) {
//
//
//  }

//  public static function  ip() {
//    if (getenv('HTTP_X_FORWARDED_FOR')) $ip = getenv('HTTP_X_FORWARDED_FOR');
//    elseif(getenv('REMOTE_ADDR')) $ip = getenv('REMOTE_ADDR');
//    else $ip = getenv('HTTP_CLIENT_IP');
//    $error='';
//    $not_detect='0.0.0.0';
//    $ipnum=explode('.', $ip);
//    if (sizeof($ipnum) == '4') {
//      for($i=0;$i<4;$i++) {
//        if ($ipnum[$i] != intval($ipnum[$i]) || $ipnum[$i] > 255 || $ipnum[$i] < 0) $error='1';
//      }
//    }
//    else $error='1';
//    $real_ip = ($error) ? $not_detect : $ip;
//    return $real_ip;
//  }
//  public static function  int2ip($i) {
//    $d[0]=(int)($i/256/256/256);
//    $d[1]=(int)(($i-$d[0]*256*256*256)/256/256);
//    $d[2]=(int)(($i-$d[0]*256*256*256-$d[1]*256*256)/256);
//    $d[3]=$i-$d[0]*256*256*256-$d[1]*256*256-$d[2]*256;
//    return "$d[0].$d[1].$d[2].$d[3]";
//  }
//
//
//  public static function jumpHead( $file ) {
//    //simple header redirect
//    //@$file: target file
//    header('Location: '.$file);
//    exit();
//  }
//
//  public static function makeTwo($dig) {
//    if(strlen($dig)==1)
//      return '0'.$dig;
//    else
//      return $dig;
//  }
//
//  public static function getArrKeys($arr, $keyName='') {
//    $ret = '';
//    if($arr) {
//      if($keyName) {
//        foreach ($arr as $key => $value) {
//          $ret .= ','.$value[ $keyName ];
//        }
//      }else {
//        foreach ($arr as $key => $value) {
//          $ret .= ','.$key;
//        }
//      }
//      return substr($ret,1);
//    }
//  }

    /**
     * JSON encoding of array. Re quired for AJAX data exchange.
     *
     * @link http://www.json.org/
     * @link http://wiki.script.aculo.us/scriptaculous/show/json
     * @param array $i
     * @taken_from: http://kurapov.name/article/857/
     */
//  function arr2json( $i=array() ) {
//    if( function_exists('json_encode')) {
//      return json_encode($i);
//    }
//
//    $search = array("", " ", " ", "Z", " ");//NOT CHANGE BRACES!!! (spec symbols inside)
//    $replace = array( '', ' ', ' ', 'Z' , ' ');
//    $o='';
//    foreach ($i as $k=>$v) {
//      $o .= '"'.$k.'":"'.str_replace($search, $replace, $v).'",';
//    }
//    return '({'.substr($o,0,-1).'})';
//    //if    header('X-JSON: ({'.substr($o,0,-1).'})');die();
//    //then in JS    --  json = eval(t.getResponseHeader('X-JSON'));
//    /**/
//    //SET THIS HEADER!!!!!!! header('Content type: application/json');
//  }


}
