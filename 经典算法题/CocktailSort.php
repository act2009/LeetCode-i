<?php
/**

 * 鸡尾酒排序
 * 数据结构----------------数组
 * 最差时间复杂度-----------O(n^2)
 * 最优时间复杂度-----------O(n)
 * 平均时间复杂度-----------O(n^2)
 * 空间复杂度--------------O(1)
 * 稳定性-----------------稳定

鸡尾酒排序也就是定向冒泡排序, 鸡尾酒搅拌排序, 搅拌排序 (也可以视作选择排序的一种变形), 涟漪排序, 来回排序 or 快乐小时排序, 是冒泡排序的一种变形。此演算法与冒泡排序的不同处在于排序时是以双向在序列中进行排序。

原理：数组中的数字本是无规律的排放，先找到最小的数字，把他放到第一位，然后找到最大的数字放到最后一位。然后再找到第二小的数字放到第二位，再找到第二大的数字放到倒数第二位。以此类推，直到完成排序。
————————————————
版权声明：本文为CSDN博主「lxxxxxl_」的原创文章，遵循 CC 4.0 BY-SA 版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/qq_36045946/article/details/80751831
 *
 */


$arr = [1, 3, 34, 2, 32, 2, 78, -43, 53, -35, 0];
class Solution
{
    function CocktailSort($arr){
        $left=0;//定义左边界
        $right=count($arr)-1;

        while($left<$right){
         for($i=left;$i<$right;$i++){
             if($arr[$i]>$arr[$i+1]){
                 $temp=$arr[$i];
                 $arr[$i]=$arr[$i+1];
                 $arr[$i+1]=$temp;
             }
         }
         $right--;
         for($j=$right;$j>$left;$j--){
             if($arr[$j-1]>$arr[$j]){
                 $temp=$arr[$j-1];
                 $arr[$j-1]=$arr[$j];
                 $arr[$j]=$temp;
             }
         }
         $left++;
        }

        return $arr;

    }

}