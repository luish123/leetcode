<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/25
 * Time: 下午10:43
 */

//https://leetcode-cn.com/problems/linked-list-cycle/


//判断单链表是否有环


//通过使用具有 不同速度 的快、慢两个指针遍历链表，空间复杂度可以被降低至 O(1)O(1)。慢指针每次移动一步，而快指针每次移动两步。
//
//如果列表中不存在环，最终快指针将会最先到达尾部，此时我们可以返回 false。
//
//现在考虑一个环形链表，把慢指针和快指针想象成两个在环形赛道上跑步的运动员（分别称之为慢跑者与快跑者）。而快跑者最终一定会追上慢跑者。这是为什么呢？考虑下面这种情况（记作情况 A）- 假如快跑者只落后慢跑者一步，在下一次迭代中，它们就会分别跑了一步或两步并相遇。


class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle( $head) {
        /**
         * @var $head ListNode
         */
        if(!$head) return false;
        $fast = $head;
        $slow = $head;
        while ($fast!=null && $fast->next!=null){
            $fast = $fast->next->next;
            $slow = $slow->next;
            if($fast ==$slow) {
                return true;
            }
        }
        return false;
    }
}

