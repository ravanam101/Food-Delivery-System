<?php
session_save_path('/home/u971358288/domains/muttchik.com/public_html/app/sessions');

session_start();  // Start the session to manage session-based cart

include 'pay/db.php';  // Include the database connection

// Get product details from the URL
$sid = mysqli_real_escape_string($conn, $_GET['sid']);
$lid = mysqli_real_escape_string($conn, $_GET['lid']);
$pvi = mysqli_real_escape_string($conn, $_GET['pvi']);
$pid = mysqli_real_escape_string($conn, $_GET['pid']);

// Fetch product details
$qry1 = "SELECT * FROM `products` WHERE pid=$pid";
$raw1 = mysqli_query($conn, $qry1);
$res1 = mysqli_fetch_assoc($raw1);
$pname = $res1['pname'];
$punit = $res1['punit'];
$price = $res1['price'];

// Fetch variant price if applicable
$qry2 = "SELECT * FROM `protuct_varient` WHERE pvi=$pvi";
$raw2 = mysqli_query($conn, $qry2);
$res2 = mysqli_fetch_assoc($raw2);
$vprice = $res2['price'];

// Determine the final price
$fprice = ($pvi == 0) ? $price : $vprice;

// Check if user is logged in using cookie
if (isset($_COOKIE['phone'])) {
    $uphone = $_COOKIE['phone'];

    // Fetch user ID based on the phone number
    $sql = "SELECT * FROM `user` WHERE userphone='$uphone'";
    $getuid = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($getuid);
    $uid = $result['userid'];

    // Insert the product into the database-backed cart
    $sql = "INSERT INTO `cart` (`cartid`, `sid`, `pid`, `uid`, `qty`, `price`, `pprice`, `pvi`) 
            VALUES (NULL, '$sid', '$pid', '$uid', '1', '$fprice', '$fprice', '$pvi')";
    $qry = mysqli_query($conn, $sql);

    if ($qry) {
        // Redirect to the product page after successful insertion
        header("location:product.php?pid=$pid");
        exit;
    }

// If user is not logged in, manage the session-based cart
} else {
    // Initialize session cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Create the item array
    $item = array(
        'sid' => $sid,
        'pid' => $pid,
        'pvi' => $pvi,
        'price' => $fprice,
        'quantity' => 1
    );

    // Check if the item is already in the cart
    $itemExists = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['pid'] == $pid && $cartItem['pvi'] == $pvi) {
            $cartItem['quantity'] += 1;  // If item exists, update quantity
            $itemExists = true;
            break;
        }
    }

    // If the item doesn't exist, add it to the session cart
    if (!$itemExists) {
        $_SESSION['cart'][] = $item;
    }

    // Redirect to the product page
    header("location:product.php?pid=$pid");
    exit;
}

// Handle login and merging the session cart with the database cart
if (isset($_COOKIE['phone']) && isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $uphone = $_COOKIE['phone'];

    // Fetch user ID again after login
    $sql = "SELECT * FROM `user` WHERE userphone='$uphone'";
    $getuid = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($getuid);
    $uid = $result['userid'];

    // Loop through the session cart and insert/update items in the database cart
    foreach ($_SESSION['cart'] as $item) {
        $sid = $item['sid'];
        $pid = $item['pid'];
        $pvi = $item['pvi'];
        $fprice = $item['price'];
        $quantity = $item['quantity'];

        // Check if the item already exists in the user's cart
        $checkCartSql = "SELECT * FROM `cart` WHERE uid='$uid' AND pid='$pid' AND pvi='$pvi'";
        $cartCheck = mysqli_query($conn, $checkCartSql);

        if (mysqli_num_rows($cartCheck) > 0) {
            // Update the quantity if the item exists in the user's cart
            $updateCartSql = "UPDATE `cart` SET qty = qty + '$quantity' WHERE uid='$uid' AND pid='$pid' AND pvi='$pvi'";
            mysqli_query($conn, $updateCartSql);
        } else {
            // Insert the item into the user's cart if it doesn't exist
            $insertCartSql = "INSERT INTO `cart` (`cartid`, `sid`, `pid`, `uid`, `qty`, `price`, `pprice`, `pvi`) 
                              VALUES (NULL, '$sid', '$pid', '$uid', '$quantity', '$fprice', '$fprice', '$pvi')";
            mysqli_query($conn, $insertCartSql);
        }
    }

    // Clear the session cart after merging with the database cart
    unset($_SESSION['cart']);
}

// Error handling
if (!$qry) {
    echo "Error: " . mysqli_error($conn);
}

?>
