<?php

use Illuminate\Support\Facades\Route;

const TIME_INTERVAL_MINUTE = 10;
const TIME_INTERVAL_HOUR = 20;
const TIME_INTERVAL_DAY = 30;
const TIME_INTERVAL_MONTH = 40;
const TIME_INTERVAL_YEAR = 50;

if (!function_exists('array_to_list')) {
    function array_to_list($array, $value = 'name', $key = 'id')
    {
        $list = [];
        foreach ($array as $item) {
            if (is_array($array)) {
                $list[$item[$key]] = $item[$value];
            } else {
                $list[$item->$key] = $item->$value;
            }
        }
        return $list;
    }  
}

if (!function_exists('active_link')) {
    function active_link($routes, $slug = null) {
        $currentRouteName = Route::currentRouteName();
        if (!$slug) {
            if (is_array($routes)) {
                foreach ($routes as $route) {
                    if ($currentRouteName == $route) {
                        return 'active';
                    }
                }
            } elseif($currentRouteName == $routes) {
                return 'active';
            }
        } elseif(Route::current()->slug == $slug) {
            return 'active';
        }
    }
}

if (!function_exists('listOfTimeIntervals')) {
    function listOfTimeIntervals($value = null, $interval = null)
    {
        $lang = \App::getLocale();
        $interval_singular_list = [
            TIME_INTERVAL_MINUTE => [
                'id' => TIME_INTERVAL_MINUTE,
                'ru' => 'минут',
                'en' => 'minute',
                'hy' => 'րոպե'
            ],
            TIME_INTERVAL_HOUR => [
                'id' => TIME_INTERVAL_HOUR,
                'ru' => 'час',
                'en' => 'hour',
                'hy' => 'ժամ'
            ],
            TIME_INTERVAL_DAY => [
                'id' => TIME_INTERVAL_DAY,
                'ru' => 'день',
                'en' => 'day',
                'hy' => 'օր'
            ],
            TIME_INTERVAL_MONTH => [
                'id' => TIME_INTERVAL_MONTH,
                'ru' => 'месяц',
                'en' => 'month',
                'hy' => 'ամիս'
            ],
            TIME_INTERVAL_YEAR => [
                'id' => TIME_INTERVAL_YEAR,
                'ru' => 'год',
                'en' => 'year',
                'hy' => 'տարի'
            ],
        ];
        $interval_plural_list = [
            TIME_INTERVAL_MINUTE => [
                'id' => TIME_INTERVAL_MINUTE,
                'ru' => 'минут',
                'en' => 'minute',
                'hy' => 'րոպե'
            ],
            TIME_INTERVAL_HOUR => [
                'id' => TIME_INTERVAL_HOUR,
                'ru' => 'часа',
                'en' => 'hours',
                'hy' => 'ժամ'
            ],
            TIME_INTERVAL_DAY => [
                'id' => TIME_INTERVAL_DAY,
                'ru' => 'дней',
                'en' => 'days',
                'hy' => 'օր'
            ],
            TIME_INTERVAL_MONTH => [
                'id' => TIME_INTERVAL_MONTH,
                'ru' => 'месяц',
                'en' => 'month',
                'hy' => 'ամիս'
            ],
            TIME_INTERVAL_YEAR => [
                'id' => TIME_INTERVAL_YEAR,
                'ru' => 'год',
                'en' => 'year',
                'hy' => 'տարի'
            ],
        ];

        if($interval) {
            if(str_contains($value,'-') || $value > 1) {
                return $interval_plural_list[$interval][$lang];
            } elseif($value == 1) {
                return $interval_singular_list[$interval][$lang];
            }
        } else {
            return array_column($interval_singular_list, $lang, 'id');
        }
    }
}
