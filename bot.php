<?php
    //TOKEN
    define('TOKEN','');
    //Set Token on Telegram Url
    $url = "https://api.telegram.org/bot".TOKEN."/";
    //Get Method
    $result = file_get_contents("php://input");
    $result = json_decode($result,"TRUE");
    //from method
    $from_id = $result["message"]["from"]["id"];
    $from_first_name = $result["message"]["from"]["first_name"];
    $from_username = $result["message"]["from"]["username"];
    //chat method
    $chat_id = $result["message"]["chat"]["id"];
    $chat_first_name = $result["message"]["chat"]["first_name"];
    $chat_username = $result["message"]["chat"]["username"];
    //text method
    $text = $result["message"]["text"];
    //require functions
    if ($text == "/start"){
        $data = simplexml_load_file("https://learn-net.ir/discover/all.xml/");
       	$channel=$data->channel;
       	$i=0;
       	while($item=$channel->item[$i]){
       		$i++;
            $news = "[$item->title]($item->link)";
            $send = $url .'sendMessage?chat_id='.$chat_id.'&text='.$news.'&parse_mode=Markdown';
            file_get_contents($send);
        }
    }
?>
