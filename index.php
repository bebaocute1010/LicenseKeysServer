<?php 
    if ($_GET['id'] != null){
        include "connect-db.php";
        $productID = $_GET['id'];
        
try {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $d = date("Y-m-d h:i:s");
        $sql = 'SELECT `key`, `date_due` FROM toolsblu_toolstore.bills where product_id = \''.$productID.'\' and date_due > \''.$d.'\'';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $key = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // set the resulting array to associative
         if ( $key != null){
        $json = json_encode($key);
        echo "KEY LIST<br/> $json";}
         else{ echo "NOTTHING";}
} catch(PDOException $e) {
    echo "ERROR";
}
finally{
    $pdo = null;
}
    }
    else{
        echo "NOTTHING";
        $pdo = null;
    }
?>

