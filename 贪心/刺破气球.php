<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/18
 * Time: 下午4:04
 */
//
//452. 用最少数量的箭引爆气球
//在二维空间中有许多球形的气球。对于每个气球，提供的输入是水平方向上，气球直径的开始和结束坐标。由于它是水平的，所以y坐标并不重要，因此只要知道开始和结束的x坐标就足够了。开始坐标总是小于结束坐标。平面内最多存在104个气球。
//
//一支弓箭可以沿着x轴从不同点完全垂直地射出。在坐标x处射出一支箭，若有一个气球的直径的开始和结束坐标为 xstart，xend， 且满足  xstart ≤ x ≤ xend，则该气球会被引爆。可以射出的弓箭的数量没有限制。 弓箭一旦被射出之后，可以无限地前进。我们想找到使得所有气球全部被引爆，所需的弓箭的最小数量。
//
//Example:
//
//输入:
//[[10,16], [2,8], [1,6], [7,12]]
//
//输出:
//2
//
//解释:
//对于该样例，我们可以在x = 6（射爆[2,8],[1,6]两个气球）和 x = 11（射爆另外两个气球）。
//https://leetcode-cn.com/problems/minimum-number-of-arrows-to-burst-balloons/


class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function findMinArrowShots($points) {
        $cnt = count($points);
        if($cnt==0) return 0;
        if($cnt==1) return 1;
        $need = 1;
        $points = $this->sort($points);
        $end = $points[0][1];
        for($i=1;$i<$cnt;$i++){
            $item = $points[$i];
            if($item[0]>$end){
                $end = $item[1];
                $need ++;
            }else{
                continue;
            }
        }
        return $need;
    }

    /**右断点从小到达排序
     * User: luishuang
     * @param $points
     */
    public function sort($points)
    {
        $res = [];
        foreach ($points as $v){
            $s = $v[1];
            $res[$s][]=$v;
        }
        
        ksort($res);
        $arr = [];
        foreach ($res as $v){
            foreach ($v as $item){
                $arr[] = $item;
            }
        }
        return $arr;
    }
}


/** 按 左断点从小到大排序
 * User luishuang
 * Class Solution2
 */
class Solution2 {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function findMinArrowShots($points) {
        $cnt = count($points);
        if($cnt==0) return 0;
        if($cnt==1) return 1;
        $need = 1;
        $points = $this->sort($points);
        $end = $points[0][1];
        for($i=1;$i<$cnt;$i++){
            $item = $points[$i];
            if($item[0]>$end){
                $end = $item[1];
                $need ++;
            }else{
               if($item[1]<$end){
                   //需要考虑 【0，9】 【0，6】 这种也要更新end
                   $end = $item[1];
               }
            }
        }
        return $need;
    }

    /**从小到达排序
     * User: luishuang
     * @param $points
     */
    public function sort($points)
    {
        $res = [];
        foreach ($points as $v){
            $s = $v[0];
            $res[$s][]=$v;
        }

        ksort($res);
        $arr = [];
        foreach ($res as $v){
            foreach ($v as $item){
                $arr[] = $item;
            }
        }
        return $arr;
    }
}

$arg = [[3,9],[7,12],[3,8],[6,8],[9,10],[2,9],[0,9],[3,9],[0,6],[2,8]];

$s = new Solution2();
$data = $s->findMinArrowShots($arg);
var_dump($data);