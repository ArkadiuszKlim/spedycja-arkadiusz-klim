<?php
    require_once('db_connect.php');
    require_once('session-control.php');
    if(isset($_POST['nazwa']) && isset($_POST['haslo'])){
        $query = $db -> prepare('SELECT haslo FROM uzytkownicy WHERE nazwa = ?');
        $query -> execute([$_POST['nazwa']]);
        if($query -> rowCount() == 1){
            $hash = md5($_POST['haslo']);
            $row = $query -> fetch(PDO::FETCH_ASSOC);
            if($row['haslo'] == $hash){
                $_SESSION['user-permissions'] = 1;
                header('Location: index.php');
                exit;
            }
        }
    }
    header('Location: login.html');
?>