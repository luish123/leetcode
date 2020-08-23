<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/8/22
 * Time: 下午9:28
 */

function shuffle_arr($arr){

    $cnt = count($arr);
    $res = $arr;
    for ($i=0;$i<$cnt;$i++){
        $rand = rand(0,$i);
        $res[$i] = $res[$rand];
        $res[$rand] = $arr[$i];

    }
    var_dump($res);
}
$arr = range(0,10);
shuffle_arr($arr);