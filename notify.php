

<?PHP
function sendMessage(){
   
    $content = array(
        "en" => 'Recieved New order please assign a delivery boy or deliver the item ASAP'
        );
    $headings= array(
        "en" => 'New Order Recieved Please take action'
        );

    $fields = array(
        'app_id' => "36934c31-dd60-4b28-9be8-171ff92ba652",
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
                                              'Authorization: Basic MDFmYTg3YWUtMGE5My00YzE3LWFiMGYtZjgyNzIxYmNkNmIx'));
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
if($return==true) header("location:success.php");
?>