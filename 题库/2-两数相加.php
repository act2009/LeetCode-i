<?php
/**
两数相加
给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。

如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。

您可以假设除了数字 0 之外，这两个数都不会以 0 开头。

示例：

输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
输出：7 -> 0 -> 8
原因：342 + 465 = 807

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/add-two-numbers
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
}
 */
class Solution {

    /**
     * @intro 方法一
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $obj=null;
        $addtional=0;
        do{
            $value=$l1->val+$l2->val+$addtional;
            if($value<10){
                $addtional=0;
            }else{
                $value-=10;
                $addtional=1;
            }
            $temp_obj=new ListNode($value);
            if(is_null($obj)){
                $obj=$temp_obj;
            }else{
                $next->next=$temp_obj;
            }
            $next=$temp_obj;
            $l1=$l1->next;
            $l2=$l2->next;
        }while($l1 || $l2 ||$addtional);

        return $obj;
    }


    /**
     * @intro 方法2
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers2($l1, $l2) {
        $result = '';
        $tmp = &$result;
        $carry = 0;
        while (true) {
            if ($l1 == null && $l2 == null) {
                if ($carry) {
                    $tmp = new ListNode($carry);
                }
                break;
            }
            if ($l1 != null) {
                $value1 = $l1->val;
                $l1 = $l1->next;
            } else {
                $value1 = 0;
            }
            if ($l2 != null) {
                $value2 = $l2->val;
                $l2 = $l2->next;
            } else {
                $value2 = 0;
            }
            $sum = $value1 + $value2 + $carry;
            if($sum >=10){
                $tmp = new ListNode($sum - 10);
                $carry = 1;
            }else{
                $tmp = new ListNode($sum);
                $carry = 0;
            }
            $tmp = &$tmp->next;
        }
        return $result;
    }

/*作者：ruo-xiang-shou-qing-xiang-xi
链接：https://leetcode-cn.com/problems/add-two-numbers/solution/phpjie-fa-by-ruo-xiang-shou-qing-xiang-xi-2/
来源：力扣（LeetCode）
著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。

这道题考得是引用传值。
一开始没搞懂链表的概念，拿数组在做，一直报错，后面打印了一下$l1才明白怎么回事，然后开头注释里提供了实例化链表的类。

先不管链表，如果说这是一个数组，那简单了，遍历一个长的，然后依次相加，碰到大于10的进位就完事。

然后这题是链表，

按照刚才的思路，

第一个元素:$l1->val+$l2->val;

第二个元素:$l1->next->val+$l2->next->val;

第三个个元素:$l1->next->next->val+$l2->next->next->val;

...

直接这么写会很麻烦。

换一个思路，第一个元素加完之后，用另一个变量$a把$l1->next存起来，计算第二个元素的时候就可以直接用$a->val了。

答案中直接用的$l1本身，因为第一个元素加完之后已经没有用了。

同样的道理，保存计算结果的$result也是同样的办法，引入了一个中间量$tmp用来保存next的值


参考其他人答案，发现用$sum>10做判断比直接$sum%10和$sum/10得出余数和进位要快

作者：ruo-xiang-shou-qing-xiang-xi
链接：https://leetcode-cn.com/problems/add-two-numbers/solution/phpjie-fa-by-ruo-xiang-shou-qing-xiang-xi-2/
来源：力扣（LeetCode）
著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。







*/

}