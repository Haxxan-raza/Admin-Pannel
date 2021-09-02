<?php
namespace App\SocialMedia\Facades;
use Illuminate\Support\Facades\facade;

class Google extends Facade{
    public static function getFacadeAccessor() {
        return "google";
    }
}