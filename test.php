<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/26
 * Time: 下午4:14
 */

////offset :0正数第一个，-1倒数第一个
//$res = array_slice($a1,1,2);
//print_r($res); //['b'=>"green",'c'=>'blue'];
//$res = array_slice($a1,-2,1);
//print_r($res);//['c'=>'blue'];
///********最后一个参数$preserve_keys*************/
////当原数组的key是字母时，保留原key
////当原数组的key是数字时，默认不保留，
//$a1=[0=>"red",1=>"green",2=>"blue",3=>"yellow"];
//$res = array_slice($a1,-2,1);
//print_r($res);//[0=>'blue'];默认不保留
//$res = array_slice($a1,-2,1,1);
//print_r($res);//[2=>'blue'];//保留以前的key


//def lowwer_bound(self, nums, target):
//    # find in range [left, right)
//    left, right = 0, len(nums)
//    while left < right:
//        mid = left + (right - left) // 2
//        if nums[mid] < target:
//            left = mid + 1
//        else:
//            right = mid
//    return left

//$left = array_slice($a1,2,1);



$str = 'abcabc';
var_dump(strpos($str,'b',2));


