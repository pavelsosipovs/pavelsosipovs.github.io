<?php

/* * ******************
 * * Script Name: index.php
 * * Creation Date: 18-04-2009
 * * Author: Pavel Osipov
 * * Purpose: Main enrty point to site
 * ****************** */

//ini_set('display_errors', '1');
//error_reporting(E_ALL);


header("Content-Type: text/html; charset=utf-8;");
if (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE) {
    header("Content-Encoding: gzip");
    ob_start('ob_gzhandler', 5);
//    ob_start( array( 'ob_gzhandler', 9 ) );
} else {
    ob_start();
}


//******Including common, always available functions and constants
require '../applications/constants.php';
require '../applications/functions.php';
require CONTROLLERS_FOLDER . '/SiteCore.php';


SiteCore::get_model('CommonModel');
SiteCore::import_controller('CommonController');
SiteCore::import_controller('HeaderManager');

$headerManager = new HeaderManager();
$codeHighliter = NULL;  //Here will be stored higliter only if called at page, to not use new for each highliting


ob_start();  //including content first, to be able set <title and other meta-tags

$v1 = '';
if (isset($_GET['v1'])) {
    $v1 = sheckGetParam($_GET['v1']);
}
if (!$v1 or $v1 == 'index.php') {
    $f = '/opening.php';
    @require(ARTICLES_ROOT_FOLDER . '/' . $f);
} else {

//***   Including friends links for category   ***
    $curBase = getParams(5);
//  echo "<br />";
//  print_r($curBase);
//***   Including friends links for category   ***

    $f = implode('/', $curBase) . '/entry_point.php';
    if (file_exists(ARTICLES_ROOT_FOLDER . '/' . $f)) {
        @require(ARTICLES_ROOT_FOLDER . '/' . $f);
    } else {

        $file = $curBase[count($curBase) - 1];
        $f = implode('/', $curBase) . "/$file.php";
        if (file_exists(ARTICLES_ROOT_FOLDER . '/' . $f)) {
            @require(ARTICLES_ROOT_FOLDER . '/' . $f);
        } else {
            require(ARTICLES_ROOT_FOLDER . '/uc.php');
        }
    }
}

$content = ob_get_clean(); //including content first, to be able set <title and other meta-tags

require(VIEWS_FOLDER . '/header.php');
echo $content;
require(VIEWS_FOLDER . '/right_links.php');
require(VIEWS_FOLDER . '/footer.php');

//***   Additional core functions   ***


function sheckGetParam($param)
{
    return preg_replace('/[^A-Za-z0-9_]/', '', $param);
//    return ereg_replace( "[^A-Za-z0-9_]", "", $param );
//  return str_replace(array('/','.','&','?'), array('','','',''), $param);
}

function checkForLinks($catsArr = array())
{
    global $links;
    $linksDirPath = implode('/', $catsArr);
    $links_holder = ARTICLES_ROOT_FOLDER . "/$linksDirPath/links.php";

    if (file_exists($links_holder)) {
        @require_once $links_holder;
    }
}

function getParams($deepLevel = 3)
{
    global $links;
    $curBase = array();

    for ($i = 1; $i < $deepLevel; $i++) {
        if (!isset($_GET["v$i"])) {
            break;
        }

        $curBase[] = sheckGetParam($_GET["v$i"]);
        checkForLinks($curBase);
    }
    return $curBase;
}
