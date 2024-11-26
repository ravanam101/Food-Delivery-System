

<?PHP
function sendMessage(){
   
    $content = array(
        "en" => 'This is a demo app created by Invikta coders club Pvt.Ltd. If You are interested to take this kind of app for your business then Contact Us'
        );
    $headings= array(
        "en" => 'Socho mat order karo.. 😂 😂'
        );

    $fields = array(
        'app_id' => "3378a7cb-d4e5-4672-8e78-8310018bc37f",
        'included_segments' => array('All'),
        'data' => array("foo" => "bar"),
        'large_icon' =>"https://onionbox.in/app/login-logo.png",
        'contents' => $content,
        'headings' => $headings
    );

    $fields = json_encode($fields);
print("\nJSON sent:\n");
print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                              'Authorization: Basic ODM5ZmUzNWItZmU1ZS00MjRlLTg0YWMtYTMxNDQ0NGY1OGE2'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$response = sendMessage();
$return["allresponses"] = $response;
$return = json_encode( $return);
print("\n\nJSON received:\n");
if($return==true) header("location:dashboard.php");
?>