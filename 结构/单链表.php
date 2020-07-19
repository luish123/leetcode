<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/26
 * Time: 下午2:28
 */

/**
 * User luishuang
 * Class ListNode
 * Class LinkList 单向链表
 */
class ListNode{

    public $value;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
    }
}
class LinkList {

    public $head;

    /**
     * User: luishuang
     * @param $value
     * @param null $pos  环向列表
     */
    public function insert($value,$pos = null){
        $head = $this->head;
        $node = new ListNode($value);
        if(!$head){
            $this->head =$node;
        }else{
            /**
             * @var  $head     ListNode
             * @var  $current  ListNode
             * @var  $next     ListNode
             */
            $current = $head;
            while ($next = $current->next){
                // if: 设置末尾的环。环指向pos的value所在的item
                if($pos){
                    if($pos ==$next->value){
                        $node->next = $next;
                    }
                }
                $current = $next;
            }
            $current->next = $node;
        }
    }

    public function reverse(){
        $head = $this->head;
        if($head){
            $current = $head;
            $pre = null;
            while ($current ){
                $tmp = $current->next;
                $current->next=$pre;
                $pre = $current;
                $current = $tmp;
            }
            $this->head = $pre;
        }
    }
    public function show()
    {
        $head = $this->head;
        if($head){
            echo $head->value.PHP_EOL;
            $next = $head;
            while ($next = $next->next ){
                echo $next->value.PHP_EOL;
            }
        }
    }
}

$linkList = new LinkList();
$linkList->insert(1);
$linkList->insert(2);
$linkList->insert(3);
$linkList->insert(5);
$linkList->insert(8);
//$linkList->insert(10,5);
//$linkList->reverse();
$linkList->show();
