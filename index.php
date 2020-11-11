<?php
ob_start();
define('API_KEY','1404667742:AAGxq7aw8lxrk0MT2N-YBoSfE_AQsg7u83w');
$admin = "1171894731";// id raqam adminniki// Koder_off

function ty($ch){
return bot('sendChatAction', [
'chat_id' => $ch,
'action' => 'typing',
]);
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!

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
// @Koder_off tomonidan yasalgan Manba bilan oling !!!
$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id;
$mid2 = $update->callback_query->message->message_id;

$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$fid = $message->from->id;
$fuser = $message->from->username;
$fname = $message->from->first_name;
$tx = $message->text;
$photo_id=$message->photo[1]->file_id;
// @Koder_off tomonidan yasalgan Manba bilan oling !!!

$reply = $message->reply_to_message->text;
$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);
// @Koder_off tomonidan yasalgan Manba bilan oling !!!
$joy = file_get_contents("$cid/$cid.joy");
$step = file_get_contents("$cid/$cid.step");

$button = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🗂 Fayl menedjer"],['text'=>"💻 Server haqida"],],
[['text'=>"♻️ Servis"],['text'=>"📰 Yangiliklar"],],
[['text'=>"📝 Chat"],['text'=>"⁉️Help"],],
]
]);

// @Koder_off tomonidan yasalgan Manba bilan oling !!!
$faylm = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📥 Fayl Yuklash"],['text'=>"📑 Fayllarim"],],
[['text'=>"🗑 Faylni  o`chirish"],['text'=>"⚙️ Webhook sozlash"],],
[['text'=>"Ortga"],],
]
]);
// @Koder_off tomonidan yasalgan Manba bilan oling !!!

$buttonn = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔐Ro'yxatdan o'tish"],],
]
]);


$webhook = json_encode([
'inline_keyboard'=>[
   [['text'=>'🛠Webhook sozlash', 'callback_data' => "web"]],

]
]);
// @Koder_off tomonidan yasalgan Manba bilan oling !!!

$tekwir = json_encode([
'inline_keyboard'=>[
[['text'=>'❌', 'callback_data' => "net"]],
]
]);


$tekk = file_get_contents("papka/$cid.txt");





$admo = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"💫BEKOR QILISH"]],
]
]);




if($tx == "📥 Fayl Yuklash"){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>" 📁Fayl Yuklang...",
'parse_mode'=>'html',
]);
mkdir("tek");
mkdir("tek2");
mkdir("tek_id");
file_put_contents("tek2/$cid.txt","go");
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!

$trr = file_get_contents("tek2/$cid.txt");

$doc=$message->document;
$doc_id=$doc->file_id;
$dname = $doc->file_name;
if($message->document){
if(strpos($trr,"go") !==false){
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$type = strtolower(strrchr($file,'.'));
$type=str_replace('.','',$type);
$okey = file_put_contents("Xost/$tekk/$dname",file_get_contents($file));
file_put_contents("tek/$cid.txt","$dname");
file_put_contents("tek_id/$cid.txt","$doc_id");
if($okey){
$te = file_get_contents("tek_id/$cid.txt");
$tekw = file_get_contents("tek/$cid.txt");
$tekw2 = file_get_contents("Xost/$tekk/$tekw");
if(mb_stripos($tekw2,"php://input") !==false){
if(mb_stripos($tekw2,"https://api.telegram.org/bot") !==false){
if(mb_stripos($tekw2,"CURLOPT_URL") !==false){
if(mb_stripos($tekw2,"json_decode") !==false){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Anti SHell dan o`tdi !
📁FAYL YUKLAB OLINDI✅",
     'reply_markup'=> $webhook,
]);
bot('sendDocument',[
'chat_id'=>$admin,
'document'=>"$te",
'caption'=>"✅
$fname
@$fuser
<code>Xost/$tekk/$tekw</code>",
'parse_mode'=>'html',
'reply_markup'=>$tekwir,
]);
unlink("tek2/$cid.txt");
}
}
}
}else{
unlink("Xost/$tekk/$tekw");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"⚠️ Error #1.
🚫Anti Shell dan o`ta olmadiz
🗑Fayl o`chirib yuborildi

Madline
Soat
avto-otvet
html va boshqalar mumkin emas

hozirda faqat bot php mumkin",
'parse_mode'=>'html',
]);
unlink("tek2/$cid.txt");
bot('sendDocument',[
'chat_id'=>$admin,
'document'=>"$te",
'caption'=>"❌

$fname
@$fuser
<code>Xost/$tekk/$tekw</code>",
'parse_mode'=>'html',
]);
}
}
}
}

// @Koder_off tomonidan yasalgan Manba bilan oling !!!
if($data == "net"){
bot('sendMessage',[
'chat_id'=>$admin,
'message_id'=>$mid2,
'text'=>"Manzil kiriting:",
'parse_mode'=>'markdown',
'reply_markup'=>$rpl
]);
}

if($reply=="Manzil kiriting:"){

$goo = "$tx";
$del = unlink($goo);
if($del){
bot('sendmessage', [
'chat_id' => $admin,
'text' =>"🗑Ochirildi✅ n $goo",
]);
}else{
bot('sendmessage', [
'chat_id' => $admin,
'text' =>"🗑Xato❌ n $goo",
]);
}
}



$nom = file_get_contents("tek/$cid.txt");
if($data == "web"){
bot('sendMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"Token kiriting...",
'parse_mode'=>'markdown',
 'reply_markup'=>$rpl
]);
}

if($reply=="Token kiriting..."){
$nom = file_get_contents("tek/$cid.txt");
file_put_contents("tek/$cid.txt1","$tx");

$get = json_decode(file_get_contents("http://api.telegram.org/bot".$tx."/getme"));
$user = $get->result->username;
$id = $get->result->id;
$name = $get->result->first_name;

$gett = json_decode(file_get_contents("https://api.telegram.org/bot".$tx."/setwebhook?url=https://github.com/new/$tekk/$nom"));
$ok = $gett->ok;
if($ok){
bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"✅Sozlandi

📎Bot nomi: $name
🆔Bot id: $id
📲Bot user: @$user

@WebGostbot",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
   [['text'=>$name, 'url' => "https://t.me/$user"]]
]
])
]);
bot('sendMessage',[
     'chat_id'=>$admin,
     'text'=>"✅ Webhook qilindi

      $fname
     @$fuser
     $fid

📎Bot nomi: $name
🆔Bot id: $id
📲Bot user: @$user",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
   [['text'=>$name, 'url' => "https://t.me/$user"]]
]
])
]);
}else{
bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"⛔️ Webhook sozlanmadi
Bot php da Xato qilgansiz yoki tokent no`tug`ri kiritdingiz",
'parse_mode'=>'html',
]);
}
}

// @Koder_off tomonidan yasalgan Manba bilan oling !!!


if($tx == "/start"){
if(strpos($tekk,"$tekk") !==false){
$tekg =str_replace("$cid-","",$tekk);


     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"🔐Login: $tekg

💾Tarif: Unlimited
💳Balans: Cheklanmagan
",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
}else{
 bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"@WebGostbot ga Xush Kelibsiz !",
 'reply_markup'=> $buttonn,
]);
}
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!
if($tx == "Ortga"){
if(strpos($tekk,"$tekk") !==false){
 $tekg =str_replace("$cid-","",$tekk);
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"🔐Login: $tekg

💾Tarif: Unlimited
💳Balans: Cheklanmagan",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
}else{
 bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"@WebGostbot ga Xush Kelibsiz !",
 'reply_markup'=> $buttonn,
]);
}
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!



if($tx == "⚙️ Webhook sozlash"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"Webhook sozlash uchun token yuboring",
     'parse_mode'=>'markdown',
     'reply_markup'=> $rpl,
     ]);
}
if($reply=="Webhook sozlash uchun token yuboring"){
Mkdir("webhook");

file_put_contents("webhook/$cid.txt","$tx");
bot('sendMessage',[
     'chat_id'=>$cid,
'text'=>"Webhook sozlash uchun manzil yuboring https:// bilan",
]);
}



if($reply=="Webhook sozlash uchun manzil yuboring https:// bilan"){
$tokw = file_get_contents("webhook/$cid.txt");

$get = json_decode(file_get_contents("http://api.telegram.org/bot".$tokw."/getme"));
$user = $get->result->username;
$id = $get->result->id;
$name = $get->result->first_name;

$gett = json_decode(file_get_contents("https://api.telegram.org/bot".$tokw."/setwebhook?url=$tx"));
$okk = $gett->ok;
if($okk){
bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"✅Sozlandi

📎Bot nomi: $name
🆔Bot id: $id
📲Bot user: @$user

@WebGostbot",
]);
bot('sendMessage',[
     'chat_id'=>$admin,
     'text'=>"✅ Webhook Sozlandi alohida

      $fname
     @$fuser
     $fid

📎Bot nomi: $name
🆔Bot id: $id
📲Bot user: @$user",
]);
}else{
bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"⛔️ Webhook sozlanmadi
Bot php da Xato qilgansiz yoki tokent no`tug`ri kiritdingiz",
'parse_mode'=>'html',
]);
}
}

// @Koder_off tomonidan yasalgan Manba bilan oling !!!
if($tx == "🔐Ro'yxatdan o'tish"){
if(!$tekk){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"Login uchun nom yozing...",
     'parse_mode'=>'markdown',
     'reply_markup'=> $rpl,
     ]);

}else{
bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"Siz oldin login yaratgansiz !",
     'parse_mode'=>'markdown',
     ]);

}
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!

if($tx == "🗂 Fayl menedjer"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"🗂Fayl Menedjer bo`limi",
     'parse_mode'=>'html',
     'reply_markup'=> $faylm,
     ]);
}


if($tx == "💻 Server haqida"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"<b>Локация: Америка
Процессор: Intel(R) Atom(TM) CPU N2800 @ 1.86GHz (4 cores)
Жесткий диск: SATA
Память: 500Gb DDR3
Операционная система: CentOS 7
Порт связи: 250 mb/сек (Unlimited)</b>",
     'parse_mode'=>'html',
     'reply_markup'=> $button,
     ]);
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!
if($tx == "♻️ Servis"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"<b>♻️ Servis Xizmatida siz o`z pul mablag'ingizni boshqa loginingizga o`tkaziwingiz yoki pulni referal orqali kopaytirishingiz mumkin

Xizmat tezkunda chiqariladi !</b>",
     'parse_mode'=>'html',
     'reply_markup'=> $button,
     ]);
}

if($tx == "📰 Yangiliklar"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"<b>📰 Yangiliklar:
#Yangilik_1: WebGostbot bu yili free(Tekin) ga ishlashini ma`lum qilamiz!

#Yangilik_2: Yangi WEBHOOK SOZLASH bo`limi qo`shildi!

#Yangilik_3: Yangi 🗑Faylni o`chirish bo`limi qo`shildi!</b>",
     'parse_mode'=>'html',
     'reply_markup'=> $button,
     ]);
}

// @Koder_off tomonidan yasalgan Manba bilan oling !!!
Mkdir("coment");

$coments = file_get_contents("coment/1.txt");
$comn = substr_count($coments,"n");

$com = "$comn" + "1";



$prosmotr = file_get_contents("coment/2.txt");
$prm = substr_count($prosmotr,"n");


$uuser = file_get_contents("coment/user.txt");


if($tx=="📝 Chat"){

 bot('SendMessage',[
   'chat_id'=>$cid,
'text'=> "👀Bo`limga kirganlar soni: $prm
✏️Chat soni: $comn
--------------------------
$coments",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([
   'inline_keyboard'=>[
[['text'=>'➕Chat qo`shish','callback_data'=>"coments+"]],
]
]),
]);
file_put_contents("coment/2.txt","$prosmotrn$user");
}
$reply = $message->reply_to_message->text;
$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);
if($data=="coments+"){
 bot('SendMessage',[
   'chat_id'=>$cid2,
    'message_id'=>$mid2,
'text'=>"Chat uchun matn yozing...",
  'reply_markup'=>$rpl
]);
}

// @Koder_off tomonidan yasalgan Manba bilan oling !!!
if($reply=="Chat uchun matn yozing..."){
file_put_contents("coment/user.txt","$uusern$soat-$fuser-($cid)");
file_put_contents("coment/1.txt","$comentsn$tx-[@$fuser]");

$comnn = $comn + 1;
  bot("sendmessage",[
    'chat_id'=>$cid,
    'text'=>"Chat muafaqiyatli qo`shildi ✅
 👀Bo`limga kirganlar soni: $prm
✏️Chat soni: $comnn
--------------------------
$coments
$tx-[@$fuser]",
'reply_markup'=> $button,
]);
}

// @Koder_off tomonidan yasalgan Manba bilan oling !!!


// @Koder_off tomonidan yasalgan Manba bilan oling !!!

// @Koder_off tomonidan yasalgan Manba bilan oling !!!


if($reply=="Login uchun nom yozing..."){
if(!$tekk){
Mkdir("papka_tek");
Mkdir("papka");
Mkdir("Xost");
Mkdir("Xost/$cid-$tx");
file_put_contents("papka/$cid.txt","$cid-$tx");
bot('sendMessage',[
     'chat_id'=>$cid,
'text'=>"Xush kelibsiz",
'reply_markup'=> $button,
]);
}else{
bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"Siz oldin login yaratgansiz !",
     'parse_mode'=>'markdown',
     ]);
}
}



// @Koder_off tomonidan yasalgan Manba bilan oling !!!


// @Koder_off tomonidan yasalgan Manba bilan oling !!!


$txt = "";
$glob = glob("Xost/$tekk/*.*");
foreach($glob as $row){
$faylarim .= $row."n";
}
$trr = str_replace("Xost/$tekk/", "",$faylarim);

if($tx == "📑 Fayllarim"){

  $trr = str_replace("Xost/$tekk/", "",$faylarim);
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"$trr",
     'parse_mode'=>'markdown',
     'reply_markup'=> $faylm,
     ]);
}

if($tx == "🗑 Faylni  o`chirish"){
bot('sendmessage', [
'chat_id' => $cid,
'text'=>"Fayllaringiz:
$trr",
'parse_mode'=>'markdown',
]);
bot('sendmessage', [
'chat_id' => $cid,
'text'=>"Fayl nomini yozing !",
'parse_mode'=>'markdown',
 'reply_markup'=>$rpl
]);
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!
if($reply=="Fayl nomini yozing !"){
$goo = "Xost/$tekk/$tx";
$del = unlink($goo);
if($del){
bot('sendmessage', [
'chat_id' => $cid,
'text' =>"🗑Ochirildi✅",
'reply_markup'=> $faylm,
]);
}else{
bot('sendmessage', [
'chat_id' => $cid,
'text' =>"🗑Xato❌",
'reply_markup'=> $faylm,
]);
}
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!

mkdir("id");
$lichka = file_get_contents("lichka.db");
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("lichka.db","$lichka\n$cid");
file_put_contents("id/$cid.txt","$cid");
}

$lich = substr_count($lichka,"\n");


if($tx=="⁉️Help"){
  bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"Qanday  yordam bera olamiz iltimos yozib qoldiring",
    'parse_mode'=>"html",
      'reply_markup'=>$rpl,
  ]);
}
if($reply=="Qanday  yordam bera olamiz iltimos yozib qoldiring"){
bot('sendMessage',[
     'chat_id'=>$cid,
'text'=>"$tx

Xabaringiz Adminga yetkazildi !",
'reply_markup'=> $button,
]);
bot('sendMessage',[
     'chat_id'=>$admin,
'text'=>"Yangi Xabar:
================
$tx
===============
$fname
@$fuser
$fid",
'reply_markup'=> $button,
]);
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!

if(strpos($tx , '/send') !== false  ) {
$ex = explode("=",$tx);
$id = $ex[1];
$matn = $ex[2];
bot('sendmessage', [
'chat_id' => $ex[1],
'text' =>"Admindan xabar keldi!
===============

*$matn*",
'parse_mode'=>'MarkDown',

]);
}
// @Koder_off tomonidan yasalgan Manba bilan oling !!!