<?php

namespace App\Conversations;


use App\Type;
use DateTime;
use App\Client;
use DateTimeZone;
use Carbon\Carbon;
use App\Appointment;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Config;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;

class ExampleConversation extends Conversation
{
    protected $facebook;
    protected $number;


    public function __construct(string $facebook ,string $number,string $fb_id) {

        $this->facebook = $facebook;
        $this->type = $number;
        $this->fb_id = $fb_id;

    }
    public function askType()

    
    { 
        date_default_timezone_set("Africa/Algiers");
        $this->today=date("Y-m-d");



        $question = Question::create('اليوم')
    
        ->addButtons([
            Button::create('اليوم')->value('D0'),
            Button::create('غدا')->value('D1'),
            Button::create('بعد غد')->value('D2'),

        ]);

    $this->ask($question, function (Answer $answer) {
        // Detect if button was clicked:
        if ($answer->isInteractiveMessageReply()) {
            $selectedValue = $answer->getValue();
            if($selectedValue == 'D0') {
                $this->day=$this->today;
                 $this->AskTime(0);
           
            }
                elseif($selectedValue == 'D1') {  
                    $this->day=date('Y-m-d', strtotime($this->today. ' + 1 day'));
                   
                    $this->AskTime(1);

                }
                else {  $this->day=date('Y-m-d', strtotime($this->today. ' + 2 day'));
                  
                    $this->AskTime(2);

                } 


        }
    });





    }
public function AskTime($shift){

$this->debut="00:22";
$this->fin="00:32";
$this->jour="";
/* return view('test'); */
$pas=60*1;
$arr=array();



$this->debut=date("Y-m-d ").$this->debut.":00";
$this->debut=date("Y-m-d H:i:s", strtotime(date($this->debut)));
$this->fin=date("Y-m-d ").$this->fin.":00";
$this->fin=date("Y-m-d H:i:s", strtotime(date($this->fin)));
$arr2=array();
$arr3=array();


date_default_timezone_set("Africa/Algiers");

$time_now = date("Y-m-d H:i:s");



while ($this->debut < $this->fin) {


  
    $arr[]=$this->debut;
$this->debut=date("Y-m-d H:i:s", (strtotime(date($this->debut)) + $pas));
}

    
   
foreach ($arr as $key ) {
    $this->bot->reply($key);
}
return;
  

   







 $apps=Appointment::where('ActiveType','1')->whereJour($this->day)->get();
  foreach ($arr3 as $key ) {
    if ($apps->count()>0) {
    foreach ($apps as $app ) {
    $d=date("Y-m-d ").$app->debut.":00";
    $d=date("Y-m-d H:i:s", strtotime(date($d)));
    $f=date("Y-m-d ").$app->fin.":00";
    $f=date("Y-m-d H:i:s", strtotime(date($f)));
  if ($d<=$key && $key<$f) {}
  else{
    $time_now = date("h:i");
    $key2=date("H:i", strtotime(date($key)));
    if ($time_now<$key2) {
    $arr2[]= Button::create($key2)->value($key);
    }}}}
else {
    $key2=date("H:i", strtotime(date($key)));
    $arr2[]= Button::create($key2)->value($key);
    }
    }

$question = Question::create("المواعيد المتاحة   ")
->addButtons($arr2);
$this->ask($question, function (Answer $answer) {
                $this->reponse=$answer->getValue();
                if ($answer->isInteractiveMessageReply()) {
                $type=Type::whereId($this->type)->first();
                $pas=$type->temps*60;
                 $this->jour=date("Y-m-d", strtotime(date($this->reponse)));
                 $this->debut=date("H:i", strtotime(date($this->reponse)));
                 $this->fin=date("Y-m-d H:i:s", (strtotime(date($this->debut)) + $pas));
                 $this->fin=date("H:i", strtotime(date($this->fin)));}});






       /*  $this->somme=0;
        $this->total=0;
        $this->debut=0;
        $this->temps=0;
        $this->date=date("l");
        if ($this->date=='Friday') {
            $this->debut="09:00";
            $this->mx="15:00";
            $this->mi="12:00";
            $this->total="600";
        }elseif($this->date=='Saturday'){
             $this->total="720";
             $this->debut="09:00";
             $this->mx="13:00";
             $this->mi="12:00";   
        }else{
            $this->total="360";
            $this->debut="16:00";
            $this->mx="13:00";
            $this->mi="12:00";
        }
date_default_timezone_set("Africa/Algiers");
        $this->max=date("Y-m-d ").$this->mx.":00";
        $this->max=date("Y-m-d H:i:s",strtotime(date($this->max)));
        $this->min=date("Y-m-d ").$this->mi.":00";
        $this->min=date("Y-m-d H:i:s",strtotime(date($this->min)));

$Tos=Appointment::where('ActiveType','1')->latest('created_at')->first();

    $this->now=date("Y-m-d H:i:s");
if($Tos){

    if ($this->now>$Tos->temps) {
        $this->temps= $this->now;
        $this->mgg=date("H:i",strtotime(date($this->temps)));

    } 
               
      }
            else {
                $this->debut=date("Y-m-d ").$this->debut.":00";

                $this->debut=date("Y-m-d H:i:s", strtotime(date($this->debut)));


                if ($this->now>$this->debut) {
                    $this->temps=$this->now;
                    $seconds = 15*60;
                    $this->temps=date("Y-m-d H:i:s", (strtotime(date($this->temps)) + $seconds));
                    $this->mgg=date("H:i",strtotime(date($this->temps)));

                } 
                             else {

                $this->temps=$this->debut;
                $this->mgg=date("H:i",strtotime(date($this->temps)));

            }}


            if ($this->min < $this->temps &&  $this->temps < $this->max) {
                $this->temps=$this->max;
                $this->mgg=date("H:i",strtotime(date($this->temps)));

                
              }
    $this->say(' ⏰ موعد حلاقتك في حوالي  '.  $this->mgg);
    $question = Question::create("تأكيد الموعد ")
    ->addButtons([
                Button::create(' ✅ تأكيد')->value('yes'),
                Button::create(' ❎ إلغاء')->value('no')]);
                return $this->ask($question, function (Answer $answer) {
                    $this->reponse=$answer->getValue();
                    if ($answer->isInteractiveMessageReply()) {
                    if ($this->reponse==="yes") {
                       $this->stepTwo();}
                    else{ $this->say('لقد تم إلغاء موعدك بنجاح  ');
                            }
                    }
                });



 */
                
                  
      
       
    }


    public function stepTwo()
    {


 
       
        $this->config=Config::get('app.url');


        
      $client=Client::whereFacebook($this->facebook)->first();
          
                $app=new Appointment();
                $app->facebook=$this->facebook;
                $app->type_id=intval($this->type);
                $app->ActiveType="1";
                $app->client_id=$client->id;
                $app->debut=$this->debut;
                $app->fin=$this->fin;
                $app->jour=$this->jour;
                $app->fb_id=$this->fb_id;
                $app->save(); 
                $this->say('شكرا لك  '.$this->facebook);
                $this->say('لقد تم حجز موعدك بنجاح ');
                $DbUsername=Client::whereFacebook($this->facebook)->first();

                $this->say(ButtonTemplate::create(' ⏰ موعد حلاقتك  ')
                ->addButton(ElementButton::create(' 📅 الزمن المتبقي لموعدي')
                ->url($this->config.'/client/'.$DbUsername->slug)
            
                )
                ->addButton(ElementButton::create(' 🎁 نقاطي')
                ->url($this->config.'/client/'.$DbUsername->slug)
                )
            );
               
            
    
    }
    /**
     * Start the conversation
     */
    public function run()
    
    {


       

        $this->askType();
    }
}
