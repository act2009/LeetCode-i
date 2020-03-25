<?php
/**
两数之和
给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。

你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。

示例:

给定 nums = [2, 7, 11, 15], target = 9

因为 nums[0] + nums[1] = 2 + 7 = 9
所以返回 [0, 1]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/two-sum
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution {

    /**
     * @intro 暴力循环解题
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $count=count($nums);
        for($i=0;$i<$count;$i++){
            for($z=$i+1;$z<$count;$z++){
                if($target==$nums[$i]+$nums[$z]){
                    return [$i,$z];
                }
            }
        }
    }

    /**
     * @intro 解题方法2
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum2($nums,$target){
        $map=[];
        $count=count($nums);
        for($i=0;$i<$count-1;$i++){
            $diff=$target-$nums[$i];
            if(isset($map[$diff])){
                return [$map[$diff],$i];
            }
            $map[$nums[$i]]=$i;
        }
        return [0,0];

}

}

 