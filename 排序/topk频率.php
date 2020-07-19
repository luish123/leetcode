<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/4
 * Time: 下午11:56
 */
//347. 前 K 个高频元素
//给定一个非空的整数数组，返回其中出现频率前 k 高的元素。
//
//
//
//示例 1:
//
//输入: nums = [1,1,1,2,2,3], k = 2
//输出: [1,2]
//示例 2:
//
//输入: nums = [1], k = 1
//输出: [1]

//https://leetcode-cn.com/problems/top-k-frequent-elements/description/


function topKFrequent($nums, $k) {

    $key_cnt = array_count_values($nums);
    arsort($key_cnt);
    $res = array_slice($key_cnt,0,$k,1);
    return array_keys($res) ;

}
$nums = [1,1,1,2,2,3];
$k= 2;
$data = topKFrequent($nums, $k);
var_dump($data);

