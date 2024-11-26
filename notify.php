<?php
include '../pay/db.php';
$did=mysqli_real_escape_string($conn,$_GET['did']);
$sql="SELECT * FROM `dboy` where did=$did";
$qry=mysqli_query($conn,$sql);
$raw=mysqli_fetch_assoc($qry);
$notify=$raw['notify'];

?>
<form action="update-notify.php" method="GET">
    <lebel>Enter Notifier ID</lebel>
    <input type="hidden" name="did" value="<?php echo $did; ?>">
    <input type="number" value="<?php echo $notify; ?>" name="notify">
    <button type="submit">Update Notifier ID</button>
</form>