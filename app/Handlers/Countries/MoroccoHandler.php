<?php
namespace App\Handlers\Countries;
use App\Handlers\CountryCodeHandler;
use App\Handlers\ValidNumber;
class MoroccoHandler extends CountryCodeHandler {

    public function handle($num)
    {
        $code = new ValidNumber();
        $country_code = $code->getCountryCode($num);
        $phoneNumber = $code->getPhoneNumber($num);
        if ($country_code === '212') {
            $num->code = $country_code;
            $num->country = 'Morocco';
            $num->state = preg_match('/\('.$num->code.'\)\ ?[5-9]\d{8}$/', $num->phone) ? 'OK' : 'NOK';
            $num->phone_num = $phoneNumber;
            return $num;
        } else {
            return parent::handle($num);
        }
    }
}
