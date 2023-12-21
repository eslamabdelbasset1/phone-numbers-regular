<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $table = 'customer';
    static $country = [
        '237' => ['Cameroon', '/\(237\)\ ?[2368]\d{7,8}$/'],
        '251' => ['Ethiopia', '/\(251\)\ ?[1-59]\d{8}$/'],
        '212' => ['Morocco', '/\(212\)\ ?[5-9]\d{8}$/'],
        '258' => ['Mozambique', '/\(258\)\ ?[28]\d{7,8}$/'],
        '256' => ['Uganda', '/\(256\)\ ?\d{9}$/']
    ];
    static $codes = [
        'Cameroon' => '237',
        'Ethiopia' => '251',
        'Morocco' => '212',
        'Mozambique' => '258',
        'Uganda' => '256',
    ];

    public static function getCountry()
    {
        return self::$country;
    }
    public static  function getCodes()
    {
        return self::$codes;
    }
}
