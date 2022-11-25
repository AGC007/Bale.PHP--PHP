<?php

/********** -Info- **********/
$BotToken = "-- Bale Bot Token --";
$BotMainURL = "https://tapi.bale.ai/bot" . $BotToken;
define('BotMainAPI', $BotMainURL);
/********** -Info- **********/

/**********************************************/

/********** -GetUpdate- **********/

$Update = file_get_contents('php://input');
file_put_contents('data/bot.Txt', $Update);
$Update = json_decode($Update, TRUE);

if (isset($Update['callback_query'])) {
    $BotMassegeId = $Update['callback_query']['message']['message_id'];
    $BotChatID = $Update['callback_query']['from']['id'];
    $BotMessageText = $Update['message']['text'];
    $BotData = $Update['callback_query']['data'];
}
else
{
    $BotMassegeId = $Update['message']['message_id'];
    $BotChatID = $Update['message']['chat']['id'];
    $BotMessageText = $Update['message']['text'];
}

/********** -GetUpdate- **********/

/**********************************************/

/********** -Api- **********/

function getMe() ///// getMe /////
{
    return file_get_contents(BotMainAPI."/getMe");
}

function getUpdates() ///// getUpdates /////
{
    return file_get_contents(BotMainAPI."/getUpdates");
}

function getChat($ChatID) ///// getChat /////
{
    file_get_contents(BotMainAPI."/sendMessage?chat_id=".$ChatID);
}

function sendMessage($ChatID, $MassegeText) ///// sendMessage /////
{
    file_get_contents(BotMainAPI."/sendMessage?chat_id=".$ChatID."&text=".$MassegeText);
}

function editMessage($ChatID, $MassegeID, $MessageText) ///// editMessage /////
{
    file_get_contents(BotMainAPI."/editMessageText?chat_id=".$ChatID."&message_id=".$MassegeID."&text=".$MessageText);
}

function deleteMessage($ChatID, $MassegeID) ///// deleteMessage /////
{
    file_get_contents(BotMainAPI."/deleteMessage?chat_id=".$ChatID."&message_id=".$MassegeID);
}

function sendPhotoCaption($ChatID, $PhotoFile , $Caption) ///// sendPhotoCaption /////
{
    file_get_contents(BotMainAPI."/sendPhoto?chat_id=".$ChatID."&photo=".$PhotoFile."&caption=".$Caption);
}

function sendVideoCaption($ChatID, $VideoFile , $Caption) ///// sendVideoCaption /////
{
    file_get_contents(BotMainAPI."/sendVideo?chat_id=".$ChatID."&video=".$VideoFile."&caption=".$Caption);
}

function sendAudioCaption($ChatID, $AudioFile , $Caption) ///// sendAudioCaption /////
{
    file_get_contents(BotMainAPI."/sendAudio?chat_id=".$ChatID."&audio=".$AudioFile."&caption=".$Caption);
}

function sendVoiceCaption($ChatID, $VoiceFile , $Caption) ///// sendVoiceCaption /////
{
    file_get_contents(BotMainAPI."/sendVoice?chat_id=".$ChatID."&voice=".$VoiceFile."&caption=".$Caption);
}

function sendDocumentCaption($ChatID, $DocumentFile , $Caption) ///// sendDocumentCaption /////
{
    file_get_contents(BotMainAPI."/sendDocument?chat_id=".$ChatID."&document=".$DocumentFile."&caption=".$Caption);
}


/********** -Api- **********/
?>