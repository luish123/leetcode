<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/18
 * Time: 下午8:10
 */
//406. 根据身高重建队列
//6. 买卖股票的最大收益 II
//122. Best Time to Buy and Sell Stock II (Easy)
//
//Leetcode / 力扣
//
//题目描述：可以进行多次交易，多次交易之间不能交叉进行，可以进行多次交易。
//https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-ii/description/

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $cnt = count($prices);
        if($cnt==0) return 0;
        if($cnt==1) return 0;
        $get = 0;
        for ($i=1;$i<$cnt;$i++){
            if($prices[$i]>$prices[$i-1]){
                $get+=$prices[$i]-$prices[$i-1];
            }

        }
        return $get;
    }
}

$arg = [7,1,5,3,6,4];
$s = new Solution();
$data = $s->maxProfit($arg);
var_dump($data);