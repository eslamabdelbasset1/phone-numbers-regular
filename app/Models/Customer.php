<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $table = 'customer';
    protected $country = [
        '237' => ['Cameroon', '/\(237\)\ ?[2368]\d{7,8}$/'],
        '251' => ['Ethiopia', '/\(251\)\ ?[1-59]\d{8}$/'],
        '212' => ['Morocco', '/\(212\)\ ?[5-9]\d{8}$/'],
        '258' => ['Mozambique', '/\(258\)\ ?[28]\d{7,8}$/'],
        '256' => ['Uganda', '/\(256\)\ ?\d{9}$/']
    ];
    protected $codes = [
        'Cameroon' => '237',
        'Ethiopia' => '251',
        'Morocco' => '212',
        'Mozambique' => '258',
        'Uganda' => '256',
    ];

    public function getCountry()
    {
        return $this->country;
    }
    public function getCodes()
    {
        return $this->codes;
    }
}
