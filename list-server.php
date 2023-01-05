<?php 
    include "connect-db.php";
    
    try {
        
    $sql = 'select * from toolsblu_toolstore.list_server';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $list_server = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($list_server);
    echo $json;
    $pdo = null;
} catch(PDOException $e) {
    echo "ERROR";
}
finally{
    $pdo = null;
}
?>