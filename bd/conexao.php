<?php
    
    function conexaoMysql(){
        
        $server = (string) "localhost";
        $user = (string) "root";
        $password = (string) "";
        $database = (string) "dbcontatos2019projeto";
        $conexao = mysqli_connect($server, $user, $password, $database);
        return $conexao;
        
    }

?>