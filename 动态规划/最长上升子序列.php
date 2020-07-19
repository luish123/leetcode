<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/13
 * Time: 下午7:01
 */


/**
 * User luishuang
 * Class Solution
 * 动态规划
 * 1状态表示
 * 2状态计算
 * 3边界设置
 * 4问题答案
 */
//300. 最长上升子序列
//给定一个无序的整数数组，找到其中最长上升子序列的长度。
//
//示例:
//
//输入: [10,9,2,5,3,7,101,18]
//输出: 4
//解释: 最长的上升子序列是 [2,3,7,101]，它的长度是 4。
//https://leetcode-cn.com/problems/longest-increasing-subsequence/


//方法一：动态规划
//思路与算法
//
//定义 dp[i]dp[i] 为考虑前 ii 个元素，以第 ii 个数字结尾的最长上升子序列的长度，注意 \textit{nums}[i]nums[i] 必须被选取。
//
//我们从小到大计算 dp[]dp[] 数组的值，在计算 dp[i]dp[i] 之前，我们已经计算出 dp[0 \ldots i-1]dp[0…i−1] 的值，则状态转移方程为：
//
//dp[i] = \text{max}(dp[j]) + 1, \text{其中} \, 0 \leq j < i \, \text{且} \, \textit{num}[j]<\textit{num}[i]
//dp[i]=max(dp[j])+1,其中0≤j<i且num[j]<num[i]
//
//即考虑往 dp[0 \ldots i-1]dp[0…i−1] 中最长的上升子序列后面再加一个 \textit{nums}[i]nums[i]。由于 dp[j]dp[j] 代表 \textit{nums}[0 \ldots j]nums[0…j] 中以 \textit{nums}[j]nums[j] 结尾的最长上升子序列，所以如果能从 dp[j]dp[j] 这个状态转移过来，那么 \textit{nums}[i]nums[i] 必然要大于 \textit{nums}[j]nums[j]，才能将 \textit{nums}[i]nums[i] 放在 \textit{nums}[j]nums[j] 后面以形成更长的上升子序列。
//
//最后，整个数组的最长上升子序列即所有 dp[i]dp[i] 中的最大值。
//
//\text{LIS}_{\textit{length}}= \text{max}(dp[i]), \text{其中} \, 0\leq i < n
//LIS
//length
//​
//    =max(dp[i]),其中0≤i<n






class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums) {
        $dp = [];
        $cnt = count($nums);
        if($cnt<=1) return 1;
        $dp[0] = 1;
        $max = 0;
        for ($i=1;$i<$cnt;$i++){
            $dp_i = 0;
            for ($j=0;$j<$i;$j++){
                if($nums[$i]>$nums[$j]){
                    $dp_i = max($dp[$j],$dp_i);
                }
            }

            $dp[$i] = $dp_i+1;
            $max = max($max,$dp[$i]);
        }
        return $max;
    }


    /**
     * User: luishuang
     * @param $nums
     * @return int
     *
     * 贪心加二分
     * https://blog.csdn.net/lxt_Lucia/article/details/81206439
     */
    function lengthOfLIS2($nums) {

        //1 ，3，4，2，5
//        [0=>1]
//        [0=>1,1=>3]
//        [0=>1,1=>3,2=>4]
//        [0=>1,1=>2,2=>4]
//        [0=>1,1=>2,2=>5]

        $cnt = count($nums);
        if($cnt==0) return 0;
        if($cnt==1) return 1;
        $arr_len = 1;
        $dp = [];
        $dp[0] =  $nums[0];
        for ($i=1;$i<$cnt;$i++){
            $curr = $nums[$i];
            var_dump($dp);
            if($curr>$dp[$arr_len-1]){
                $dp[$arr_len++]=$curr;
            }else{
                //二分查找
                $dp = $this->binarySearch($dp,$curr,0,$arr_len-1);
            }
        }
        return $arr_len;
    }

    public function binarySearch($arr,$target,$left, $right)
    {
        while ($left<$right){
            $mid = ($left + $right) >> 1;
            var_dump($mid);
            if($arr[$mid]==$target) {
                return $arr;
            }
            if($arr[$mid]<$target){
                $left = $mid +1;
            }else if($arr[$mid]>$target){
                $right = $mid ;
            }
        }
        $arr[$left] =$target;
        return $arr;

//        while($left < $right) {
//            $mind = ($left + $right) >> 1;
//            if ($arr[$mind] < $target) {
//                $left = $mind + 1;
//            } else {
//                $right = $mind;
//            }
//        }
//        $arr[$left] = $target;
//        return $arr;
    }

    function lengthOfLIS3($nums) {
        if (count($nums) < 1) {
            return 0;
        }
        $list[0] = $nums[0];
        $end = 0;
        for ($i = 1; $i < count($nums); $i++) {
            if ($list[$end] < $nums[$i]) {
                $end++;
                $list[$end] = $nums[$i];
            } else {
                $left = 0;
                $right = $end;
                while($left < $right) {
                    $mind = ($left + $right) >> 1;
                    if ($list[$mind] < $nums[$i]) {
                        $left = $mind + 1;
                    } else {
                        $right = $mind;
                    }
                }
                $list[$left] = $nums[$i];
            }
        }
        $end++;
        return $end;

    }

}


//贪心 +二分

//1 ，3，4，2，5
//1 ,2,5,8,10,11   4


$e = new Solution();
$intervals =  [3,5,6,2,5,4,19,5,6,7,12];
//$data = $e->lengthOfLIS3($intervals);
$arr = [2,4,6];
$data = $e->binarySearch($arr,5,0,count($arr)-1);
var_dump($data);