<?php
    
    require('../config/config.php');
    require('../config/db.php');
    $oid = $_GET["oid"];

    $res = mysqli_query($conn,"SELECT people from offers where oid = $oid;");
    $people1 = mysqli_fetch_all($res,MYSQLI_ASSOC);
    echo "<small style='color:red;'>Hurry only "  . $people1[0]['people'] . " seats left !</small>";
    ?>