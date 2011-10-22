<?
header('Content-type: text/javascript');
extract($_GET);
//set POST variables
$url = "$postUrl/register";
$fields = array(
            'doctor'=>urlencode($doctorId),
            'dept'=>urlencode($deptid),
            'time'=>urlencode($time),
            'id'=>urlencode($id),
            'birthday'=>urlencode($birthday),
            'first'=>urlencode($first)
            'name'=>urlencode($name)
            'gender'=>urlencode($gender)
            'nation'=>urlencode($nation)
            'marriage'=>urlencode($marriage)
        );

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string,'&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

//execute post
if(isset($callback)){
    echo $callback."(";
}
$result = curl_exec($ch);

//close connection
curl_close($ch);

if(isset($callback)){
    echo ")";
}
?>
