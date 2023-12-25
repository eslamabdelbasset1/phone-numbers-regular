<?php
namespace App\Handlers\Countries;
use App\Handlers\CountryCodeHandler;
use App\Handlers\ValidNumber;

class EthiopiaHandler extends CountryCodeHandler {

    public function handle($num)
    {
        $code = new ValidNumber();
        $country_code = $code->getCountryCode($num);
        $phoneNumber = $code->getPhoneNumber($num);
        if ($country_code === '251') {
            $num->code = $country_code;
            $num->country = 'Ethiopia';
            $num->state = preg_match('/\('.$country_code.'\)\ ?[1-59]\d{8}$/', $num->phone) ? 'OK' : 'NOK';
            $num->phone_num = $phoneNumber;
            return $num;
        } else {
            return parent::handle($num);
        }
    }
}
