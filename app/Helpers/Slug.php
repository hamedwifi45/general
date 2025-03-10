<?php


namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class Slug{
    public static function unquiSlug($slug , $table){
        $slug = self::createslug($slug);

        $item = DB::table($table)->select('slug')->whereRaw("slug LIKE '%$slug%'")->get();
        $count = count($item)+1;
        return $slug.'_'.$count;
    }
    protected static function createslug($str){
        $string = preg_replace("/[^a-z0-9_\s\-۰۱۲۳۴۵۶۷۸۹يءاأإآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهی]/u", '', $str);

        $string = preg_replace("/[\s\-_]+/", ' ', $string);

        $string = preg_replace("/[\s_]/", '-', $string);

        return $string;
        }
}