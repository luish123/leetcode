<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/25
 * Time: 下午9:58
 */

//给定一个非空字符串 s，最多删除一个字符。判断是否能成为回文字符串。
//
//示例 1:
//
//输入: "aba"
//输出: True

//https://leetcode-cn.com/problems/valid-palindrome-ii/description/

//我们换一种想法。首先考虑如果不允许删除字符，如何判断一个字符串是否是回文串。常见的做法是使用双指针。定义左右指针，初始时分别指向字符串的第一个字符和最后一个字符，每次判断左右指针指向的字符是否相同，如果不相同，则不是回文串；如果相同，则将左右指针都往中间移动一位，直到左右指针相遇，则字符串是回文串。
//
//在允许最多删除一个字符的情况下，同样可以使用双指针，通过贪心算法实现。初始化两个指针 low 和 high 分别指向字符串的第一个字符和最后一个字符。每次判断两个指针指向的字符是否相同，如果相同，则更新指针，令 low = low + 1 和 high = high - 1，然后判断更新后的指针范围内的子串是否是回文字符串。如果两个指针指向的字符不同，则两个字符中必须有一个被删除，此时我们就分成两种情况：即删除左指针对应的字符，留下子串 s[low + 1], s[low + 1], ..., s[high]，或者删除右指针对应的字符，留下子串 s[low], s[low + 1], ..., s[high - 1]。当这两个子串中至少有一个是回文串时，就说明原始字符串删除一个字符之后就以成为回文串。

function validPalindrome($s) {

    $left = 0;
    $right = strlen($s)-1;
    while ($left<$right){
        if($s[$left] == $s[$right]) {
            $left++;
            $right--;
        }else{
            $flag1 = 1;
            $flag2 = 1;
            $i = $left;
            $j = $right-1;
            while ($i<$j){
                if($s[$i] == $s[$j]) {
                    $i++;
                    $j--;
                }else{
                    $flag1 = false;
                    break;
                }
            }
            $i = $left+1;
            $j = $right;
            while ($i<$j){
                if($s[$i] == $s[$j]) {
                    $i++;
                    $j--;
                }else{
                    $flag2 = false;
                    break;
                }
            }
            return $flag2||$flag1;
        }
    }
    return true;
}


$data = validPalindrome('aaba');

var_dump($data);