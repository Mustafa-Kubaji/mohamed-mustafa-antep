<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SoapClient;

class SmsController extends Controller
{
    private $soapClient;

    public function __construct()
    {
        $this->soapClient = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");
    }

    public function sendPasswordWithMessage($gsm = array())
    {
        try {
            $password = mt_rand(100000,999999);
            $newPass =Hash::make($password);//veritabana kaydet

            //user şifresi guncelle

            $message = 'Yeni şifreniz:' .$password . 'bu şifre sisteme girdikten sonra  değiştir';
            $this->soapClient->smsGonder1NV2([
                'username' =>'KULLANCI ADINIZ',
                'password' =>'ŞİFRENİZ',
                'header' => 'Mustafa',
                'msg' => $message,
                'gsm' => $gsm,
                'filter' => '',
                'startdate'  => '',
                'stopdate'  => '',
                'encoding' => 'TR'
            ]);

        }
        catch (\Exception $error){

            // Hata olusursa yakala
            echo "sms gonderme Hatasi Olustu:" . $error->getMessage();
        }
    }
}

