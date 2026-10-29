<?php 

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $merged = array_merge($nums1, $nums2);
        sort($merged);
        $length = count($merged);
        
        $result = null;
        
        if ($length % 2 === 0) {
            $median = $length / 2; 
            $other = $median - 1;
            $demoninator = $merged[$other];

            $result = ($merged[$median] + $merged[$other]) / 2;
        } else {
            $median = floor($length / 2);
            $result = $merged[$median];
        }

        return $result;
    }
}
