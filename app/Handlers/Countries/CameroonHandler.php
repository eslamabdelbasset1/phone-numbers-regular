<?php
namespace App\Handlers\Countries;
use App\Handlers\CountryCodeHandler;
use App\Handlers\ValidNumber;

class CameroonHandler extends CountryCodeHandler {

    public function handle($num)
    {
        $country_code = $this->getCountryCode($num);
        $phoneNumber = $this->getPhoneNumber($num);
        if ($country_code === '237') {
            $num->code = $country_code;
            $num->country = 'Cameroon';
            $num->state = preg_match('/\('.$country_code.'\)\ ?[2368]\d{7,8}$/', $num->phone) ?
                'OK' : 'NOK';
            $num->phone_num = $phoneNumber;
            return $num;
        } else {
            return parent::handle($num);
        }
    }


}
