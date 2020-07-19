<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/29
 * Time: 下午11:12
 */

/**topk  */
//在未排序的数组中找到第 k 个最大的元素。请注意，你需要找的是数组排序后的第 k 个最大的元素，而不是第 k 个不同的元素。
//
//示例 1:
//
//输入: [3,2,1,5,6,4] 和 k = 2
//输出: 5
//示例 2:
//
//输入: [3,2,3,1,2,4,5,5,6] 和 k = 4
//输出: 4


//https://leetcode-cn.com/problems/kth-largest-element-in-an-array/description/

/**
leetcode 答案
 * 优先队列 小顶堆
 */
class Solution1 {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        $heap = new SplMinHeap();
        for( $i=0;$i<count($nums);$i++ ){
            if( $heap->count() < $k ){
                //堆未满
                $heap->insert($nums[$i]);
            }else if( $heap->top() < $nums[$i] ){
                //堆满，且读到的数大与堆顶，则插入
                $heap->extract(); //堆顶弹出
                $heap->insert($nums[$i]);
            }
        }
        return $heap->top();
    }
}

/**
 * 快速排序 判断
 */
class Solution2 {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        return $this->quickSelect($nums, 0, count($nums)-1, count($nums) - $k);
    }
    protected function swap(&$arr, $i, $j) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    protected function quickSelect(&$nums, $left, $right, $index) {
        $pivotPos = $this->randomPartition($nums, $left, $right);
        if ($pivotPos == $index) {
            return $nums[$pivotPos];
        } else {
            return $pivotPos < $index ? $this->quickSelect($nums, $pivotPos+1, $right, $index) : $this->quickSelect($nums, $left, $pivotPos - 1, $index);
        }
    }
    protected function randomPartition(&$nums, $left, $right) {
        $i = mt_rand($left, $right);
        $this->swap($nums, $i, $right);
        return $this->partition($nums, $left, $right);
    }
    protected function partition(&$nums, $left, $right) {
        $pivotKey = $nums[$left];
        while ($left < $right) {
            while ($left < $right && $nums[$right] >= $pivotKey) $right--;
            $nums[$left] = $nums[$right];

            while ($left < $right && $nums [$left] <= $pivotKey) $left++;
            $nums[$right] = $nums[$left];
        }
        $nums[$left] = $pivotKey;
        return $left;
    }
}


//class Solution {
//    function findKthLargest ($nums,$k=0){
//        $cnt = count($nums);
//        if($cnt==1) return $nums[0];
//        $base = $nums[0];
//        $left =$right  = [];
//        for ($i=1;$i<$cnt;$i++){
//            if($base<=$nums[$i]){
//                $right[]=$nums[$i];
//            }else{
//                $left[]=$nums[$i];;
//            }
//        }
//        $cnt_rigth = count($right);
//        if($cnt_rigth==$k) {
//            return $this->findKthLargest($right,$k);
//        }
//        if($cnt_rigth+1==$k) {
//            return $base;
//        }
//        if($cnt_rigth>$k){
//            return $this->findKthLargest($right,$k);
//        }else if($cnt_rigth<$k){
//            return $this->findKthLargest($left,$k-count($right)-1);
//        }
//    }
//}

$s = new Solution();
//$data = $s->findKthLargest([10,1,11,2,12,3,13,4],2);
//var_dump($data);

/**快速排序
 * User: luishuang
 * @param $arr
 * @return array
 */
function q1($arr){
    $cnt = count($arr);
    if($cnt<=1) return $arr;
    $pivot = $arr[0];
    $left = $right = [];
    for ($i=1;$i<$cnt;$i++){
        if($arr[$i]>=$pivot) $right[]=$arr[$i];
        if($arr[$i]<$pivot) $left[]=$arr[$i];
    }
    $left = q1($left);
    $right = q1($right);
    return array_merge($left,[$pivot],$right);
}
function q2($arr){
    $cnt = count($arr);
    $boardStack[]=[0,$cnt-1];
    while ($boardStack){
        $board = array_pop($boardStack);
        $left = $board[0];
        $right = $board[1];
        $pivot = $arr[$left];
        while ($left<$right){

            if($left<$right && $arr[$right]>$pivot) $right --;
            $arr[$left] =$arr[$right];
            if($left<$right && $arr[$left]<$pivot) $left ++;
            $arr[$right] =$arr[$left];
        }
        $arr[$left] = $pivot;

        if($board[0] <$left-1) $boardStack[]=[$board[0],$left-1];
        if($board[1] >$left+1) $boardStack[]=[$left+1,$board[1]];
    }

    return $arr;

}
$a = q2([10,1,11,2,12,3,13,4]);
var_dump($a);