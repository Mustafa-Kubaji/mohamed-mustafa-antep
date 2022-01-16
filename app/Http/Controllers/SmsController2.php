<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SmsController2 extends Controller
{
    public function send_code(Request $request)
    {
        $username = '5349172678';
        $password = 'bmlc531';
        $key = 'b2055cb97552be3259938bb416b29b10';
        $hash = hash_hmac('sha256', 'b2055cb97552be3259938bb416b29b10', '$2y$12$p2K1jS0x6LXndGbv0Tn6BewQA9OXV31B8Zzi/F6EkxqJ5iXlroWgG');
        $orgin_name = 'APITEST';

        //$tel = $_POST["telefon"];

        $tel = $request->get('telefon');
        $email =$request->get('email');

        $users = User::all();
        $filtered_email = $users->where('email',$email);
        $filtered_tel = $users->where('tel',$tel);

        //echo $filtered;
        if ($filtered_email->isEmpty() || $filtered_tel->isEmpty()){
            echo '<script type="text/javascript">
                    alert("yanliş girdiniz !!");
                    window.location.href="./sending";
                  </script>';
            //return back();
        }

        $users->each(function ($user){
            $user->update([
                'status'=>true
            ]);
        });

        $xml = <<<EOS
   		 <request>
   			 <authentication>
   				 <username>{$username}</username>
   				 <password>{$password}</password>
           <key>{$key}</key>
           <hash>{$hash}</hash>

   			 </authentication>

   			 <order>
   	    		 <sender>{$orgin_name}</sender>
   	    		 <sendDateTime>01/05/2013 18:00</sendDateTime>
   	    		 <message>
   	        		 <text>test mesaji api denemesi 1</text>
   	        		 <receipents>
   	            		 <number>{$tel}</number>
   	        		 </receipents>
   	    		 </message>
   			 </order>
   		 </request>
EOS;

        function sendRequest($site_name, $send_xml, $header_type)
        {

            //die('SITENAME:'.$site_name.'SEND XML:'.$send_xml.'HEADER TYPE '.var_export($header_type,true));
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $site_name);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $send_xml);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header_type);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 120);

            $result = curl_exec($ch);

            return $result;
        }


        //$result = sendRequest('http://api.iletimerkezi.com/v1/send-sms', $xml, array('Content-Type: text/xml'));
        $result='sadas';
        die('<pre>' . var_export($result, 1) . '</pre>');
        //echo '<script type="text/javascript">alert("mesajınız gönderilmiştir.");</script>';
        return back();

    }

    public function send(){
        return view("sending-code");
    }
}
