<?php
    try{
        $link = new PDO ('mysql:host=localhost;dbname=t5','root','root');
    }catch(PDOException $e){
        echo $e;
    }
?>