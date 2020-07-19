<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/25
 * Time: 上午12:24
 */


//编写一个函数，以字符串作为输入，反转该字符串中的元音字母。
//
//示例 1:
//
//输入: "hello"
//输出: "holle"
//示例 2:
//
//输入: "leetcode"
//输出: "leotcede"
//说明:
//元音字母不包含字母"y"。


function reverseVowels($s) {
    $in = ['a','e','i','o','u'];
    $len =  strlen($s);
    $left = 0;
    $right = $len-1;
    $s_a = str_split($s);
    while ($left<$right){
        if(in_array(strtolower($s_a[$left]),$in)){
            while ($left<$right){
                if(in_array(strtolower($s_a[$right]),$in)) {
                    $tmp = $s_a[$right];
                    $s_a[$right] = $s_a[$left];
                    $s_a[$left] = $tmp;
                    $right--;
                    break;
                }
                $right--;
            }
        }
        $left++;
    }
    return implode('',$s_a);
}
$data = reverseVowels('leetcode');
//leotcede
var_dump($data);



function reverseVowels2($s) {
    $hash = [
        'a' => '',
        'A' => '',
        'e' => '',
        'E' => '',
        'i' => '',
        'I' => '',
        'o' => '',
        'O' => '',
        'u' => '',
        'U' => ''
    ];
    $l = 0;
    $r = strlen($s) - 1;
    while ($l < $r) {
        if (!isset($hash[$s[$l]])) {
            $l++;
            continue;
        }
        if (!isset($hash[$s[$r]])) {
            $r--;
            continue;
        }
        $tmp = $s[$l];
        $s[$l] = $s[$r];
        $s[$r] = $tmp;
        $l++;
        $r--;
    }

    return $s;
}
