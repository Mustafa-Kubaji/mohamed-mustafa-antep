<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showView(){

          $users= User::all();
        //$users= DB::table('users')->get(); // for hakkimde


 /*       $name = $users[0]->name;
        $age = "23";
        $job="öğrenciyim";
        $city="Urfa";
        $mail="mustafa.kubaji.1@gmail.com";
        $telefon= "05349172678";


        Merhaba ben {{$name ?? '' }} <br>
        {{$job ?? ''}} <br>
        {{$age ?? ''}} yasindayim <br>
        {{$city ?? ''}} da yasiyorum <br>
        E-mail: {{$mail ?? ''}}<br>
        Telefon: {{$telefon ?? ''}}<br>



*/


        return view('hakkimde',compact('users'));
        //return view('hakkimde',compact('name','job','age','city','mail','telefon'));
    }

    public function showView2(){
        $products= DB::table('products')->get();

        return view('urunler',compact('products'));
    }

}
