<?php
namespace App\Handlers\Countries;

use App\Handlers\CountryCodeHandler;
use App\Handlers\ValidNumber;
class MozambiqueHandler extends CountryCodeHandler {

    public function handle($num)
    {
        $code = new ValidNumber();
        $country_code = $code->getCountryCode($num);
        $phoneNumber = $code->getPhoneNumber($num);
        if ($country_code === '258') {
            $num->code = $country_code;
            $num->country = 'Mozambique';
            $num->state = preg_match('/\('.$num->code.'\)\ ?[28]\d{7,8}$/', $num->phone) ? 'OK' : 'NOK';
            $num->phone_num = $phoneNumber;
            return $num;
        } else {
            return parent::handle($num);
        }
    }
}
