<?php

namespace App\Http\Controllers;

use App\Type;
use Carbon\Carbon;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class testController extends Controller
{


   public function commande(Request $request){




      
      $a=Artisan::call($request["commande"]);
      $a=Artisan::output();

     echo $a;
   dd();}



   public function index()
   
   {




    return view("test");


    $days = array();
    $days[]="more";



    for ($i=1; $i <=10 ; $i++) { 
      $array[]=$i;
    }
    $total=count($array)/10;
    $dd=ceil($total);
    $a=0;
    $b=$a+10;
    for ($i=1; $i <$dd+1 ; $i++) { 
    ${"array".$i}=array(); 
    while ($a<$b && $a<count($days) ) { 
      ${"array".$i}[]=$days[$a];
    $a++;
    }
    $b=$a+10;
 }


foreach (${"array"."1"} as $key ) {
echo $key;}



dd();




      date_default_timezone_set("Africa/Algiers");

$debut="16:00";
$fin="22:00";
/* return view('test'); */
$pas=60*30;
$arr=array();



$debut=date("Y-m-d ").$debut.":00";
$debut=date("Y-m-d H:i:s", strtotime(date($debut)));

$fin=date("Y-m-d ").$fin.":00";
$fin=date("Y-m-d H:i:s", strtotime(date($fin)));
$arr2=array();

$d="18:00";
$d=date("Y-m-d ").$d.":00";
$d=date("Y-m-d H:i:s", strtotime(date($d)));


$f="19:00";
$f=date("Y-m-d ").$f.":00";
$f=date("Y-m-d H:i:s", strtotime(date($f)));


while ($debut <= $fin) {
     $arr[]=$debut;

     $debut=date("Y-m-d H:i:s", (strtotime(date($debut)) + $pas));

}

 



  foreach ($arr as $key ) { 
  if ($d<=$key && $key<$f) {



  }
  else{

    $arr2[]=$key;
  }




   

} foreach ($arr2 as $key2) {
  echo $key2."<p></p>";}

} }


