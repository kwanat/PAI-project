<?php


function randomString($length, $pattern='abcdefghijklmnoprstuvwxyz1234567890!?')
{
    $random_string="";
    $tmp_len=strlen($pattern)-1;
    for($i=1;$i<=$length;$i++)
    {
        $random_string.=$pattern{mt_rand(0,$tmp_len)};
    }
    return $random_string;
}
?>