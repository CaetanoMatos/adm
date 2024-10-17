<?php 
namespace Core;

    abstract class Config{
        protected function configAdm(){
            define('URL', 'http://localhost:8000/');
            define('URLADM', 'http://localhost:8000/adm/');

            define('CONTROLLER', 'Login');
            define('METODO', 'index');
            define('CONTROLLERERRO', 'Erro');
        }
    }
?>
