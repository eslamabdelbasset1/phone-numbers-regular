<?php
namespace App\Handlers\Countries;
use App\Handlers\CountryCodeHandler;
use App\Handlers\ValidNumber;
class UgandaHandler extends CountryCodeHandler {

    public function handle($num)
    {
        $country_code = $this->getCountryCode($num);
        $phoneNumber = $this->getPhoneNumber($num);
        if ($country_code === '256') {
            $num->code = $country_code;
            $num->country = 'Uganda';
            $num->state = preg_match('/\('.$num->code.'\)\ ?\d{9}$/', $num->phone) ? 'OK' : 'NOK';
            $num->phone_num = $phoneNumber;
            return $num;
        } else {
            return parent::handle($num);
        }
    }
}

