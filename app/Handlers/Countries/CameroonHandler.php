<?php
namespace App\Handlers\Countries;
use App\Handlers\CountryCodeHandler;
use App\Handlers\ValidNumber;

class CameroonHandler extends CountryCodeHandler {

    public function handle($num)
    {
        $code = new ValidNumber();
        $country_code = $code->getCountryCode($num);
        if ($country_code === '237') {
            $num->code = $country_code;
            $num->country = 'Cameroon';
            $num->state = preg_match('/\('.$country_code.'\)\ ?[2368]\d{7,8}$/', $num->phone) ?
                'OK' : 'NOK';
            $num->phone_num = $num->phone;
            return $num;
        } else {
            return parent::handle($num);
        }
    }
}
