<?php


if(isset($_POST['DeleteOwner'])){
    $delOwnerID = $_POST['ownerID'];
    $sqldelOwner = "DELETE FROM owner WHERE owner.ownerID = $delOwnerID";



}































?>