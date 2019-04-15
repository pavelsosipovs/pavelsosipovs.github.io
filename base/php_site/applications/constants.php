<?php

//Common file with ALL site constants
//all hosting/server dependend settings should be stored only
//in this file

if (!defined('SITE_ROOT')) {

//
    define('LOCAL', 1);
    define('DEBUG', 1);

//    define('SITE_FOLDER_NAME', 'www.osipov.lv');
    define('SITE_FOLDER_NAME', '../');

    if (defined('LOCAL')) {

        $tmpRoot = explode('/',$_SERVER['DOCUMENT_ROOT']);
        array_pop($tmpRoot);
//        print_r($tmpRoot);
//        die('--');
//        die(implode('/',$tmpRoot).'--');


//        define('SITE_ROOT', implode('/',$tmpRoot) . '/');
        define('SITE_ROOT', implode('/',$tmpRoot) );
//        define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/' . SITE_FOLDER_NAME . '/');
//
//        die(SITE_ROOT);

//        define('SERVER_URL_ROOT', 'http://localhost/' . SITE_FOLDER_NAME . '/site/public_html/');
        define('SERVER_URL_ROOT', 'https://osipovlv/');
        //*******Database access data
//		define ( 'DB_HOSTNAME' , 'localhost' );
//	  define ( 'DB_USERNAME' , 'root' );
//	  define ( 'DB_PASS' , '' );
//	  define ( 'DB_DATABASE' , 'geovendo' );
    } else {
        //die('constants.php needs to be setted up in other server');
        //define ('SITE_ROOT',$_SERVER['DOCUMENT_ROOT'].'/..');
        define('SITE_ROOT', '/storage/h6/183/1538183');
//        define('SERVER_URL_ROOT', 'http://www.osipov.lv/');
        define('SERVER_URL_ROOT', 'https://osipovlv.000webhostapp.com/');


        //*******Database access data
//		define ( 'DB_HOSTNAME' , 'geovendo.mysql.domeneshop.no' );
//	  define ( 'DB_USERNAME' , 'geovendo' );
//	  define ( 'DB_PASS' , '8LNxge5i' );
//	  define ( 'DB_DATABASE' , 'geovendo' );
    }

    define('SERVER_URL', SERVER_URL_ROOT);


//******Root folders
    define('PUBLIC_HTML', SITE_ROOT . '/public_html');
//  define ('LBS_FOLDER',SITE_ROOT.'/libs');
//  define ('CACHE_FOLDER',SITE_ROOT.'/cache');
    define('APP_FOLDER', SITE_ROOT . '/applications');
    define('LBS_FOLDER', APP_FOLDER . '/libs');
    define('ARTICLES_ROOT_FOLDER', PUBLIC_HTML . '/articles');

//******Deeper folders
    define('VIEWS_FOLDER', APP_FOLDER . '/views');
    define('CONTROLLERS_FOLDER', APP_FOLDER . '/controllers');
    define('MODELS_FOLDER', APP_FOLDER . '/models');
    define('ACTIONS_FOLDER', APP_FOLDER . '/actions');


//******Common possible uploaded data
    //define ('PHOTOS_FOLDER',UPLOAD_FOLDER.'/photos');
    //define ('DOCUMENTS_FOLDER',UPLOAD_FOLDER.'/documents');
    //define ('BNERS_FOLDER',UPLOAD_FOLDER.'/bners');
//****** Other constants
//  define('MAPS_HOST', 'maps.google.com');
//  define('AROUND_PLACES_RADIUS', 500);//metres = 0.45'
//  define ('GMAP_API_KEY','ABQIAAAA5is22T2361t_Kp5dg-ioQBSFOadasyl_OG2nK4dTsm2mzNESGoapixSVWYR_2xCBEz3GgIPBynSwRpVyow');  //required only for v.2 gMaps
    //URLs
    define('PAGE_404', SERVER_URL . '/404.html');
    define('IMG_FLDR', SERVER_URL . '/img');


//*****Including Zend and other libraries
//set_include_path(LBS_FOLDER.'/library');
}


