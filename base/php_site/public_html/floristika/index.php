<?php

require_once '../../applications/constants.php';
require_once '../../applications/controllers/SiteCore.php';

//for( $i=14; $i<100;$i++){
////    echo '<br />';
//    mkdir( 'tmp/'.$i.'/',0777 );
//}

define( IMAGES_FOLDER,'img/raboti/' );
$folder_num = intval( $_GET[ 'fn' ]) ?: 1;
$subfolder_number = intval( $_GET[ 'pn' ]) ?: 1;
define( IMAGES_BASE, $folder_num.'/'.$subfolder_number.'/');

$images_sets = get_dir_files( IMAGES_FOLDER, '', True );
print_r($images_sets);
//die();

$images = get_dir_files( IMAGES_FOLDER.IMAGES_BASE, '.JPG' );



$title = 'Ёлка необыкновенная!';
$h1 = 'Ёлка необыкновенная!';
$main_text = 'Бансай создан с любовью по книгам старых китайских мастеров. Использованы лучшие техники, которые только возможно применить в наших условиях. Обрезаение крестиком, перерзание синусойдой и секретный метод разрезания старого надреза керамическим шильцем.';
$descr_file = IMAGES_FOLDER.IMAGES_BASE.'descr.html';
if( file_exists( $descr_file ) ){
    include $descr_file;
}


?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>Светлана Осипова, флористика в Риге, <?=$title?></title>

        <script type="text/javascript" src="js/mootools-core-1.3.2-full-compat-yc.js"></script>
        <script type="text/javascript" src="js/iFishEye-full.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Griffy' rel='stylesheet' type='text/css'>

<?php
    SiteCore::includeHighslide();
?>
        <script type="text/javascript" src="js/mootools/MooDroper/MooDroper.js"></script>

        <script type="text/javascript">

            mooDropper = new MooDroper();
            mooDropper.init();

            window.addEvent('domready', function() {
                new iFishEye({
                    container: $("iFishEye_example_1"),
                    norm: "L2"

                });

                mooDropper.start_dropping();
            });

        </script>



    </head>
    <body>

      <div id="right_image">
        <div id="main_content_block">

            <div class="left_100">
                <div id="top_links_holder">
                    <div class="top_link">
                        Главный сайт
                    </div>
                    <div class="top_link">
                        Мои работы
                    </div>
                    <div class="top_link">
                        Обо мне
                    </div>
                </div>
            </div>


            <div id="main_image_holder" class="with_border with_shadow"
                 style="background-image: url('<?=IMAGES_FOLDER.IMAGES_BASE?>634/<?=$images[0]?>');"
                 >

                <?php/**?>
            <a href="<?=IMAGES_FOLDER.IMAGES_BASE?>/<?=$images[0]?>" class="highslide"
               onclick="return hs.expand(this)"
               ><?php/**/?><div id="main_image_click_holder"></div><?php/**?></a><?php/**/?>

                <div id="additional_images_holder">
                    <?php
                    $i = 0;
                    $y = -180;
                    foreach ($images as $key => $img_name) {
                        $i++;

                        ?>
                        <a href="<?=IMAGES_FOLDER.IMAGES_BASE?><?=$img_name?>" class="highslide"
                           onclick="return hs.expand(this)">
                        <div style="background-image: url('<?=IMAGES_FOLDER.IMAGES_BASE?>/sm/<?=$img_name?>');"
                             class="with_border with_small_shadow additional_image"
                             id="dropme_<?=$i?>"
                             >
                            &nbsp;
                        </div></a>

                    <script>
                        mooDropper.add_drop_object('dropme_<?=$i?>',0, <?=$y?>);
                    </script>

                    <?php
                    $y += 150;
                    }
                    ?>


                </div>



            </div>


            <div id="description_text_holder">
                <div id="description_text_head">
                    <h1><?=$h1?></h1>
                </div>
                <div id="description_text_text">
                    <p>
                        <br />
                        <?=$main_text?>
                    </p>
                </div>

            </div>

        </div>


          <div class="left_100" style="padding-left: 3em;">
              <div class="albuns_set_number" style="width: 5em;" >Альбомы: </div>
              <?php
                echo mt_rand();
                foreach ( $images_sets as $i => $value ) {
                    $ii = $i+1;
                    ?>
              <a href="?fn=<?=$ii?>&pn=1">
              <div class="albuns_set_number" title="Показать работы из альбома Nr. <?=$ii?>">
                    <?=$ii?>
                </div></a>
              <?php
                }
              ?>
            </div>


        <div id="iFishEye_example_1"
             style="width: 90%;height: 100px;float: left;margin-top: 1em;margin-left: 5%;">
            <style type="text/css">
                #iFishEye_example_1{
                    color: white;
                }
            </style>
            <table>
                <tr>
                    <?=show_bottom_thumbs( $subfolder_number, $folder_num )?>
                </tr>
            </table>
        </div>



<br />

</div>

<div style="width: 350px;height: 263px;background-image: url('css/img/flower_prepared_1_sm.png');z-index: -1;
     position: fixed;top: 575px;left: 940px;
     "></div>

<div style="width: 350px;
     float:left;color: lightgreen;margin-left: 2em;margin-top: 2em;
     ">И тут должно что-то быть, чтобы не завалится в левый угол.</div>

    </body>
</html>

<?php

function show_bottom_thumbs( $subfolder_number, $folder_num ) {
    ob_start();

    $files_base = IMAGES_FOLDER."$subfolder_number/";
    $files = get_dir_files( $files_base, '', True );

    if( !$files ){
//        Get subfolders with images
        $subfolder_number = 1;
        $folder_num = 1;
        $files_base = IMAGES_FOLDER."$subfolder_number/";
        $files = get_dir_files( $files_base, '', True );
    }

    foreach ( $files as $imgs_folder ) {
//        Get small image for thumbs
        $folder = $imgs_folder.'/sm/';
        $folder_files = get_dir_files( $folder );
        $filenames[ ] = $folder.$folder_files[ 0 ];
    }

    foreach ($filenames as $key => $value ) {
        out_img_menu_item($value, '',$key + 1);
    }

    return ob_get_clean();
}


function out_img_menu_item($img_filename, $text = '', $key = 1){
    global $folder_num;
    ?>
    <td ><a href="?fn=<?=$folder_num?>&pn=<?=$key?>"><img class="iFishEyeImg" src="<?=$img_filename?>" alt="sync" /><br /><span class="iFishEyeCaption"><?=$text?></span></a></td>
<?php
}




/**
 * Get array of all files in directory. Full path returned for each array item
 * @param type $path
 * @param type $extension
 * @param type $get_arranged_folders  if TRUE, when will be returned folders with names 1..n, arranged by name
 * @return type
 */
function get_dir_files( $path, $extension = '', $get_arranged_folders = False ){
    $ret = array();
    $counter = 0;
    if ($handle = opendir($path)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {

                if( $get_arranged_folders ){
                    $counter++;
                    $folder_path = $path.$counter;
                    if( file_exists( $folder_path ) ){
                        $ret[] = $folder_path;
                    }

                }else{


                    if( $extension ){
                        if( intval( strpos( $entry, $extension ) ) != (strlen( $entry )-strlen($extension) ) ){
    //                        Exclude with another extension or folder if needed
                            continue;
                        }
                    }
                    $ret[] = $entry;
                }
            }
        }
        closedir($handle);
    }

    return $ret;
}

