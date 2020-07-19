<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/5
 * Time: 上午9:20
 */

//给定一个包含红色、白色和蓝色，一共 n 个元素的数组，原地对它们进行排序，使得相同颜色的元素相邻，并按照红色、白色、蓝色顺序排列。
//
//此题中，我们使用整数 0、 1 和 2 分别表示红色、白色和蓝色。
//
//注意:
//不能使用代码库中的排序函数来解决这道题。
//
//示例:
//
//输入: [2,0,2,1,1,0]
//输出: [0,0,1,1,2,2]
//进阶：
//
//一个直观的解决方案是使用计数排序的两趟扫描算法。
//首先，迭代计算出0、1 和 2 元素的个数，然后按照0、1、2的排序，重写当前数组。
//你能想出一个仅使用常数空间的一趟扫描算法吗？
//https://leetcode-cn.com/problems/sort-colors/description/


function sortColors(&$nums)
{

    $c1 = $c2 = $c3 = [];
    foreach ($nums as $v) {
        switch ($v) {
            case 0:
                $c1[] = 0;
                break;
            case 1:
                $c2[] = 1;
                break;
            case 2:
                $c3[] = 2;
                break;
        }
    }
    $nums = array_merge($c1,$c2,$c3);
}

/**
 * 最优解
 * User luishuang
 * Class Solution
 */
class Solution{
    function sortColors(&$nums)
    {
        /**
         * @var $curr int 当前指针
         * @var $left int 0的右边界的下一位
         * @var $right int 2的左边界的前一位
         */
        $curr = $left = 0;
        $right = count($nums)-1;
        while ($curr<=$right){
            switch ($nums[$curr]) {
                case 0:
                    $this->swap($nums,$left,$curr); //将当前的值和 0的右边界的下一位交换
                    $curr++;
                    $left++;
                    break;
                case 1:
                    $curr++; //不处理，移动指针
                    break;
                case 2:
                    $this->swap($nums,$right,$curr);//将当前的值和 2的左边界的前一位交换
                    $right--;
                    //这里不能移动指针，因为要处理新的 $nums【$curr】(2的左边界的前一位)
                    break;
            }
        }
    }
    public function swap(&$nums,$i,$j)
    {
        $tmp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] =$tmp;
    }
}


$nums = [2,0,1];
$e  = new Solution();
$e->sortColors($nums);
var_dump($nums);
