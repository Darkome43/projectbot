<?php
////////BENCHAMIN LUIS//////
//CHANNEL:- T.ME/SPACEHACKIN///
error_reporting(0);

set_time_limit(0);

flush();
$API_KEY = $_ENV['BOT_TOKEN']; 
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
//==============BENCHAM======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$name = $from_id = $message->from->first_name;
$from_id = $message->from->id;
$text = $message->text;
$fromid = $update->callback_query->from->id;
$username = $update->message->from->username;
$chatid = $update->callback_query->message->chat->id;
$callback_query = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$reply = $update->message->reply_to_message->message_id;
$START_MESSAGE = $_ENV['START_MESSAGE'];
//===============BENCHAM=============//
if ($text == "/start") {

            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"***🔶Hello, I hope you have a beautiful day.

🔶writes*** `/cmds` ***for More Info.
✨$START_MESSAGE***",
 'parse_mode'=>'MarkDown',
            
        ]);
 }if ($text == "/cmds") {

    bot('sendmessage', [
        'chat_id' =>$chat_id,
        'text' =>"***🔶 GEN ADRESS:*** `/fake country`***

        Country's:*** `AU`, `BR`, `CA`, `CH`, `DE`, `DK`, `ES`, `FI`, `FR`, `GB`, `IE`, `IR`, `NO`, `NL`, `NZ`, `TR`, `US`.***

        🔶 BIN INFO:*** `/bin xxxxxx` ***
        ✨ Bot By: @Shein0425 ***",
'parse_mode'=>'MarkDown',
    
       ]);
} 
    if(strpos($text,"/fake") !== false){ 
$bin = trim(str_replace("/fake","",$text)); 

$data = json_decode(file_get_contents("https://randomuser.me/api/1.3/?nat=$bin"),true);
$gender =  $data['results']['gender'];
$name = $data['results']['name'];
$country =  $data['results']['country'];
$city =  $data['results']['city'];
$adress =  $data['results']['street'];
$state =  $data['results']['state'];
$zip =  $data['results']['postcode'];
$email =  $data['results']['email'];
$phone =  $data['results']['phone'];
$cell =  $data['results']['cell'];

 if($data['data']){
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"***successfully generated✅
               
➤ Gender : *** `$gender` ***
➤ Name : *** `$name` ***
➤ Country : *** `$country` ***
➤ City : *** `$city` ***
➤ Adress : *** `$adress` ***
➤ State : *** `$state` ***
➤ PostCode : *** `$zip` ***
➤ Email : *** `$email` ***
➤ Phone : *** `$phone` ***
➤ Cell : *** `$cell` ***
🔺Owner bot: @Shein0425🔻***",
'parse_mode'=>"MarkDown",
]);
    }
else {
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"❌INVALID COUNTRY❌",
               
]);
}
}
?>
