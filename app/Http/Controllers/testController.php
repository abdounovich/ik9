<?php

namespace App\Http\Controllers;

use App\Type;
use Carbon\Carbon;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class testController extends Controller
{




  public function bot(Request $request)
  {}

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
  public function sendTextMessage(Request $request)
  {


  


    $messageText=  $request->get('message');
    $id=  $request->get('id');

      $messageData = [
          "recipient" => [
              "id" => $id,
          ],
          "message"=>[
            "attachment"=>[
        
              "type"=>"template",
              "payload"=>[
                "template_type"=>"button",
                "text"=>$messageText,
                "buttons"=>[
                  [
                    "type"=>"web_url",
                    "url"=>"https://www.messenger.com",
                    "title"=>"Visit Messenger"
                  ],
                 
                  
                ]
              ]
            ]
          ],
      ];
      $ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token=' . env("FACEBOOK_TOKEN"));
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
      curl_exec($ch);
      curl_close($ch);

  }


   public function commande(Request $request){




      
    /*   $a=Artisan::call($request["commande"]);
      $a=Artisan::output();

     echo $a;
   dd(); */}



   public function index()
   
   {


    date_default_timezone_set("Africa/Algiers");

    $debut="16:00";
    $debut=date("Y-m-d ").$debut.":00";
    $debut=date("Y-m-d H:i:s", strtotime(date($debut)));
    
    $fin="22:00";
    $fin=date("Y-m-d ").$fin.":00";
    $fin=date("Y-m-d H:i:s", strtotime(date($fin)));
    
    $pas=60*30;
    $arr=array();
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
    
    
    
    
       
    
    } 
        return view("test")->with('arr2',$arr2);

    } }









  


/* 
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



dd(); */























 

