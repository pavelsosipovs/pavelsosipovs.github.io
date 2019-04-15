<?php


function protectMail($s)
{
    //encript mail address to avoid it to be taken by bots
    $result = '';
    $s = "mailto:" . $s;
    for ($i = 0; $i < strlen($s); $i++) {
        $result .= '&#' . ord(substr($s, $i, 1)) . ';';
    }
    return $result;
}


function tableTop($width = '100%', $classNum = '', $inalign = 'left')
{
    ?>
    <table width='<?= $width ?>' style='background-color:#f4f4f4;'>
    <tr>
        <td class='t_tl'></td>
        <td class='t_tc'></td>
    </tr>
    <tr>
    <td class='t_ml'></td>
    <td class='t_mc' align='<?= $inalign ?>'>
    <?php
}

function tableBottom($classNum = '')
{
    ?>
    </td>

    </tr>
    <tr>
        <td class='t_bl'></td>
        <td class='t_bc'></td>
    </tr>
    </table>
    <?php
}

?>