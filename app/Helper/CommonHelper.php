<?php


namespace App\Helper;


use Illuminate\Support\Facades\File;

class CommonHelper
{
    public static function getSvg($path)
    {
        return File::get($path);
    }
}
