<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{

    public static function discountOff($originalPrice, $sellingPrice)
    {
    	$diff = $originalPrice - $sellingPrice;
    	$percentOff = (($diff / $originalPrice) * 100);
    	return round($percentOff);
    }
}