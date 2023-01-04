<?php 
  class DB {
     private $connect ;
     function __construct(){
        
        $dsn = 'mysql:dbname=TPSitePHP;host=localhost';
        $user = 'root';
        $password = '';
        
        $this -> connect = new PDO($dsn, $user, $password);

     }


  }
