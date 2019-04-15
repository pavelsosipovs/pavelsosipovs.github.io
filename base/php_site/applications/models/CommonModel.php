<?php
//common parent model

class CommonModel
{

    public function __construct()
    {

    }

    /**
     * @param $inData
     * @param $retKeyName
     * @return array
     */
    public static function toRetArray($inData, $retKeyName)
    {
        //Sometimes neede return nor resource, but array with only one
        //keys set
        $retArr = array();
        //die('--------');
        if ($inData and $retKeyName and mysql_num_rows($inData)) {
            while ($tmp = mysql_fetch_assoc($inData)) {
                $inArr = array();

                $args = func_num_args();
                if ($args < 3) {
                    //for one argument not receive 2D array, just simple
                    $retArr[] = $tmp[$retKeyName];
                } else {
                    //overwise return all in 2D array, shere first level
                    //simple indexes and second arrays with all data
                    $lev2Arr = array();
                    for ($j = 1; $j < $args; $j++) {

                        $argName = func_get_arg($j);
                        $lev2Arr[$argName] = $tmp[$argName];

                    }
                    $retArr[] = $lev2Arr;
                }
            }
        }
        //print_r($retArr);
        return $retArr;
    }

    /**
     * @param $inData
     * @param $retKeyName
     * @param $retReqVal
     * @return array
     */
    public static function toRetAssocArray($inData, $retKeyName, $retReqVal)
    {
        $args = func_num_args();
        $ret = array();

        if ($inData and $retKeyName and mysql_num_rows($inData)) {

            $args = func_num_args();
            if ($args < 4) {

                if ($retReqVal == '*') {

                    while ($tmp = mysql_fetch_assoc($inData)) {
                        $key = $tmp[$retKeyName];
                        $ret[$key] = $tmp[strval($retKeyName)];
                        $ret[$key] = $tmp;
                    }

                } else {

                    while ($tmp = mysql_fetch_assoc($inData)) {
                        $key = $tmp[$retKeyName];
                        if ($retReqVal) {
                            $ret[$key] = $tmp[$retReqVal];
                        } else {
                            //to put some constant value, like 0
                            $ret[$key] = $retReqVal;
                        }
                        for ($j = 3; $j < $args; $j++) {
                            $argName = func_get_arg($j);
                            $ret[$key]['path'] = $tmp[$argName];
                        }
                    }

                }


            } else {
                while ($tmp = mysql_fetch_assoc($inData)) {
                    $addArr = array();
                    $key = $tmp[$retKeyName];

                    if ($retReqVal) {
                        $ret[$key] = $addArr;
                        $ret[$key][$retReqVal] = $tmp[$retReqVal];

                    }


                    for ($j = 3; $j < $args; $j++) {
                        $argName = func_get_arg($j);
                        $ret[$key][$argName] = $tmp[$argName];
                    }
                }
            }

            return $ret;
        }
    }

}