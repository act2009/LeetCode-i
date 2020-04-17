<?php
/**
 * 堆排序
 * 数据结构----------------数组
 * 最差时间复杂度-----------O(nlogn)
 * 最优时间复杂度-----------O(nlogn)
 * 平均时间复杂度-----------O(nlogn)
 * 空间复杂度--------------O(1)
 * 稳定性-----------------不稳定
————————————————
版权声明：本文为CSDN博主「lxxxxxl_」的原创文章，遵循 CC 4.0 BY-SA 版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/qq_36045946/article/details/80751831
 *
 * 由输入的无序数组构造一个最大堆，作为初始的无序区
把堆顶元素（最大值）和堆尾元素互换
把堆（无序区）的尺寸缩小1，并调用heapify(A, 0)从新的堆顶元素开始进行堆调整
重复步骤2，直到堆的尺寸为1
 */

$arr = [1, 3, 34, 2, 32, 2, 78, -43, 53, -35, 0];
$length=count($arr);
class Solution
{
    //队列中$arr[$i]与$arr[$j]互换
    function swap(&$arr,$i,$j){
        $temp=$arr[$i];
        $arr[$i]=$arr[$j];
        $arr[$j]=$temp;
    }
    //从$arr[$i]向下进行堆调整
    function Heapify(&$arr,$i,$heap_size){
        $left_child=$i*2+1;
        $right_child=$i*2+2;
        $max=$i;
        if($left_child<$heap_size && $arr[$left_child]>$arr[$max]){
            $max=$left_child;
        }
        if($right_child<$heap_size && $arr[$right_child]>$arr[$max]){
            $max=$right_child;
        }
        if($max!=$i){
           swap($arr,$i,$max);//当前节点与最大值进行交换
           Heapify($arr,$max,$heap_size);//递归，继续跳整
        }

    }

    // 建堆,时间复杂度O(n)
    function BuildHeap(&$arr,$length){
        $heap_size=$length;
        for($i=floor($heap_size/2)-1;$i>=0;$i--){// 从每一个非叶子结点开始向下进行堆调整
            Heapify($arr,$i,$heap_size);
        }
        return $heap_size;
    }

    //堆排序
    function HeapSort($arr,$length){
        $heap_size=BuildHeap($arr,$length);//建立最大堆，无序区
        while($heap_size>1){
            swap($arr,0,--$heap_size);// 将堆定元素沉到堆底(成为有序区)，堆(无序区)-1
            Heapify($arr,0,$heap_size);// 从新的栈顶元素开始向下调整
        }
        return $arr;
    }



}