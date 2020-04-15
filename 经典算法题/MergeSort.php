<?php
/**
 * 归并排序
 * 数据结构----------------数组
 * 最差时间复杂度-----------O(nlogn)
 * 最优时间复杂度-----------O(nlogn)
 * 平均时间复杂度-----------O(nlogn)
 * 空间复杂度--------------O(n)
 * 稳定性-----------------稳定
————————————————
版权声明：本文为CSDN博主「lxxxxxl_」的原创文章，遵循 CC 4.0 BY-SA 版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/qq_36045946/article/details/80751831
 *
 * 原理：归并排序的实现分为递归实现与非递归(迭代)实现。递归实现的归并排序是算法设计中分治策略的典型应用，我们将一个大问题分割成小问题分别解决，然后用所有小问题的答案来解决整个大问题。非递归(迭代)实现的归并排序首先进行是两两归并，然后四四归并，然后是八八归并，一直下去直到归并了整个数组。

归并排序算法主要依赖归并(Merge)操作。归并操作指的是将两个已经排序的序列合并成一个序列的操作，归并操作步骤如下：

申请空间，使其大小为两个已经排序序列之和，该空间用来存放合并后的序列
设定两个指针，最初位置分别为两个已经排序序列的起始位置
比较两个指针所指向的元素，选择相对小的元素放入到合并空间，并移动指针到下一位置
重复步骤3直到某一指针到达序列尾
将另一序列剩下的所有元素直接复制到合并序列尾
————————————————

 */

$arr1 = [1, 3, 34, 2, 32, 2, 78, -43, 53, -35, 0];
$arr2 = [1, 3, 34, 2, 32, 2, 78, -43, 53, -35, 0];
$length1 = count($arr1);
$length2 = count($arr2);


class Solution
{
    /*方法一：递归*/
    function MergeSortRecursion(&$arr,$left,$right){
        if($left==$right){
            return ;
        }
        $mid=floor(($left+$right)/2);
        MergeSortRecursion($arr,$left,$mid);
        MergeSortRecursion($arr,$mid+1,$right);
        Merge($arr,$left,$mid,$right);

    }

    /*方法二：迭代*/
    function MergeSortIteration(&$arr,$length){
        for($i=0;$i<$length;$i*=2){
            $left=0;
            while ($left+$i<$length){
                $mid=$left+$i-1;
                $right=$mid+$i<$length? $mid+1:$length-1;
                Merge($arr,$left,$mid,$right);
                $left=$right+1;
            }
        }
    }


    //Merge
    function Merge(&$arr,$left,$mid,$right){
        $length=$right-$left+1;
        $temp=[];
        $index=0;
        $i=$left;
        $j=$mid+1;
        while($i<=$mid && $j<=$right){
            $temp[$index++]=$arr[$i]<=$arr[$j]? $arr[$i++] : $arr[$j++];
        }
        while($i<=$mid){
            $temp[$index++]=$arr[$i++];
        }
        while ($j<=$right){
            $temp[$index++]=$arr[$j++];
        }
        //更新数组排序
        for($k=0;$k<$length;$k++){
            $arr[$left++]=$temp[$k];
        }

    }

}