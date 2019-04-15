<?php

/********************
 ** Script Name:
 ** Created: 05-08-2009
 ** Last changed: 05-08-2009
 ** @Author: Pavel Osipov
 ** Purpose: Common controller class
 ** Version:
 ********************/
class CommonController
{

    public function __construct()
    {

    }


    public static function encode(&$param, $encNum = 2)
    {
        //by default encodeToShow
        switch ($encNum) {
            case 1:
                //SAVE
                $fName = 'textEncodeToSave';
                break;
            case 2:
                //SHOW
                $fName = 'textDecodeToShow';
                break;
            case 3:
                //EDIT
                $fName = 'textDecodeToEdit';
                break;
            case 4:
                //EDIT
                $fName = 'delHTTP';
                break;
            default:
                $fName = 'void';
        }
        //echo 'Used: ',$fName;

        // call_user_func_array($fName, array(&$param));
        call_user_func_array(array('CommonController', $fName), array(&$param));
        //if needed no reference, use call_user_func()
    }

    public static function checkArrReqFldInAllLangs($lngsInfoArr, $dtaArr, $fldName)
    {
        //checking array fields in every languge to be not empty
        //$lngsInfoArr - array with keys ==> lang names/fields names postfixes
        foreach ($lngsInfoArr as $key => $value) {
            $keyn = $fldName . $key;
            self::chk4DB($dtaArr[$keyn]);
            if (!$dtaArr[$keyn]) {
                //name in all langs are REQUIRED!
                return false;
            }
        }
        return isset ($lngsInfoArr);//for empty array will return false
    }

    public static function checkArrReqKeys($arr)
    {
        //will get array and some number of key names to check, will return true if ALL keys have values
        $args = func_num_args() - 1;
        if ($arr and $args) {
            for ($i = $args; $i > 0; $i--) {
                $arg = $arr[func_get_arg($i)];
                if (!isset($arg) or empty($arg)) {
                    if (defined('DEBUG')) {
                        //die('Required field missed: '.func_get_arg($i));
                    }
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    public static function chk4DB(&$val, $type = 'str', $len = 9999)
    {
        //will prepeare data to write into DB
        $val = SiteCore::check_hard($val);
        switch ($type) {
            case 'str':
                self::encode(SiteCore::check_hard($val, $len), 1);
                break;
            case 'int':
                $val = intval($val);
                break;
            case 'float':
                $val = floatval($val);
                break;
            case 'bool':
                $val = intval((boolean)$val);//to return 1 or 0
                break;
            case 'phone':
                $val = self::fixPhoneNumber($val, true);
                break;
        }
    }

    function textEncodeToSave(&$txt)
    {
//  global $s,$r;
        $s = array('"', '\'', '\n', '<br />', '«', '»');
        $r = array('|||', '^^^', '', '<br>', '|||', '|||');
        $txt = str_replace($s, $r, $txt);
    }


    function textDecodeToShow(&$txt)
    {
//  global $s2,$r2;
        $s2 = array('|||', '^^^', '%amp;', '\'', '^br^', '<br>', '&quot;', '&amp;', '&', "\n", '#37;', '&#37;amp;', '&amp;lt;', '&amp;gt;');
        $r2 = array('&quot;', '`', '&', '′', '<br />', '<br />', '’', '&', '&amp;', '<br />', '&#37;', '', '&lt;', '&gt;');
        $txt = str_replace($s2, $r2, $txt);
    }


    function textDecodeToEdit(&$txt)
    {
//  global $s3,$r3;
        $s3 = array('|||', '^^^', '<br>', '<br />', '%amp;', '\'', '^br^', '&quot;', '&#37;amp;');
        $r3 = array('«', '′', '', '', '&', '′', "\n", '“', '&');
        $txt = str_replace($s3, $r3, $txt);
    }

    function void()
    {
//just void function
    }

    public static function delHTTP(&$href)
    {
        $tmpHref = strtolower($href);
        if (substr($tmpHref, 0, 7) == 'http://') {
            //delete http:// prefix if presented
            $href = substr($href, 7);
        } elseif (substr($tmpHref, 0, 8) == 'https://') {
            $href = substr($href, 8);
        }
    }

    public static function fixPhoneNumber($pn, $addPlus = true)
    {
        if (trim($pn) and $pn != '+0') {
            $s5 = array(' ', '-', '`', 'TEL:0', 'TEL:', '+', '(03)', 'TEL/FAX:', 'TEL:', '(0)', '(', ')', '‹', '›');
            $r5 = array('', '', '', '+81', '', '', '', '', '', '', '', '', '', '');

            $out = strval(str_replace($s5, $r5, $pn));
            if ($addPlus and strlen($out) > 3) {
                $out = '+' . $out;
            }
            $pn = $out;
            return $out;
        } else {
            return '';
        }
    }


    public static function fixWwwLink($link)
    {
        //ONLY TO USE LINK WITH http:// BUT SHOW FROM WWW
        if ($link) {
            $link = trim($link);
            if (substr($link, 0, 6) == 'http:w') {
                $link = 'http://' . substr($link, 5);
                //echo '1';
            }
            if (substr($link, 0, 7) == 'https:w') {
                $link = 'https://' . substr($link, 6);
                //echo '2';
            }
            if (substr($link, 0, 7) != 'http://') {
                $link = 'http://' . $link;
                //echo '3';
            }
            return $link;
        } else {
            return '';
        }
    }


    public static function checkArrayStrings(&$targetArr, $encNum = 2)
    {
        //encode associative array (all possible subkeys)
        foreach ($targetArr as $key => $value) {
            if (is_string($value)) {
//        echo 'Checking '.$key.' to: '.$value.' <br />';
                self::encode($targetArr[$key], $encNum);
//        echo 'Result: '.$value.' <hr />';
            } elseif (is_array($value)) {
                self::checkArrayStrings($targetArr[$key], $encNum);
            }
        }
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

}