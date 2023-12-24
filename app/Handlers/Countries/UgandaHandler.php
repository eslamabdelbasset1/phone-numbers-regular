<?php
namespace App\Handlers\Countries;
use App\Handlers\CountryCodeHandler;
use App\Handlers\ValidNumber;
class UgandaHandler extends CountryCodeHandler {

    public function handle($num)
    {
        $code = new ValidNumber();
        $country_code = $code->getCountryCode($num);
        if ($country_code === '256') {
            $num->code = $country_code;
            $num->country = 'Uganda';
            $num->state = preg_match('/\('.$num->code.'\)\ ?\d{9}$/', $num->phone) ? 'OK' : 'NOK';
            $num->phone_num = $num->phone;
            return $num;
        } else {
            return parent::handle($num);
        }
    }
}

