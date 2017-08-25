<?php
require("phpMQTT.php");
function MQTT_send($topic,$text){
  $mqtt = new phpMQTT("m10.cloudmqtt.com", 19518, "clientId-CdGZeZUz5f"); //Change client name to something unique
  if ($mqtt->connect(true,null,'eqvihjxj','Ki2b6SmTWqgM')) {
    $mqtt->publish($topic,$text,0);
    $mqtt->close();
  }

}

$access_token = 'l+XJmEK4S3PQW9NQRGhnqFff7WmFj9k2MMMGrif2EsWALWh+cn6URu3l0dEjpphbjHyk3013gsq/wgEp5lMBQhWtUsPK0D8VbmjlBOg4W4ST9ipMQ8EuW7HAZVHglPn4OIDbufKT2VEkKTet+n5lKgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
$replyToken = $event['replyToken'];

// Validate parsed JSON data
if (!is_null($events['events'])) {

	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		// if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
      MQTT_send("/svnh/ev",json_encode($event));
		// }
		// if($event['type'] == 'beacon'){
      // MQTT_send("/svnh/beacon2",json_encode($event));
		// }
    // $url="http://10.105.10.29:1880/lineapi";
    // $post = json_encode($event);
    // $headers = array('Content-Type: application/json');

    // $ch = curl_init($url);
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    // $result = curl_exec($ch);
    //
    // curl_close($ch);




	}
}
// MQTT_send("/svnh/fco","test");
echo "That's right\n";

?>
