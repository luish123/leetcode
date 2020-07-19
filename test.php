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


$arr = [1,2,2,2,4,4,5];


/**
 * 返回第一个大于等于 $target的index
 * @param $arr
 * @param $target
 * @return int
 */
function low_bound($arr,$target){
    $left = 0;
    $right = count($arr)-1;
    while ($left<$right){
        $mid = intval($left+($right-$left)/2);
        if($target>$arr[$mid]){
            //target在左边，left从mid+1开始算 左区间是闭合的
            $left = $mid +1;
        }else{
            $right = $mid;
        }
    }
    return $left;
}

/**
 * 返回第一个大于 $target的index
 * @param $arr
 * @param $target
 * @return int
 */
function up_bound($arr,$target){
    var_dump('up_bound');
    $left = 0;
    $right = count($arr)-1;
    while ($left<$right){
        $mid = intval($left+($right-$left)/2);
        if($target>=$arr[$mid]){
            // 大于或者等于都不满足情况，
            $left = $mid +1;
        }else{
            $right = $mid;
        }
    }
    return $left;
}
function binarySearch($arr,$target){
    $left = 0;
    $right = count($arr)-1;
    while ($left<$right){
        $mid = intval($left+($right-$left)/2);
        if($target==$arr[$mid])  return $mid;
        if($target > $arr[$mid]){
            $left = $mid +1;
        }else{
            //$target < $arr[$mid]
            $right = $mid;
        }
    }
    return $left; //找不到则 第一个大于target的index
}
$arr = [2,5,6];
var_dump(binarySearch($arr,5));