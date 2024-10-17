<?php 

    //require './core/Config.php';
    namespace Core;

    class ConfigController extends Config{
        
        private string $url;
        private array $urlArray;
        private string $urlController;
        private string $urlMetodo;
        private string $urlParameter;
        private string $classLoad;
        private array $format;


        public function __construct()
        {
            $this->configAdm();

            if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT ))){
               $this->url= filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
               var_dump($this->url);
               $this-> clearUrl();

               $this->urlArray=explode("/", $this->url);
               var_dump($this->urlArray);

               if(isset($this->urlArray[0])){
                    $this->urlController = $this->urlArray[0];
               }else{
                $this->urlController = CONTROLLER;
               }

               if(isset($this->urlArray[1])){
                        $this->urlMetodo = $this->urlArray[1];
                    }else{
                    $this->urlMetodo = METODO;
                    }

                if(isset($this->urlArray[2])){
                    $this->urlParameter = $this->urlArray[2];
                }else{
            $this->urlParameter = "";
                }
            ///quando nao buscar nada pela url, vai exibir:
                }else{
                    $this->urlController = CONTROLLERERRO;
                    $this->urlMetodo = METODO;
                    $this->urlParameter = "";
                }
                echo "Controller: {$this->urlController}<br>";
                echo "Metodo: {$this->urlMetodo}<br>";
                echo "Parametro: {$this->urlParameter}<br>";

            }

            private function clearUrl(): void{
                
                //eliminar as tags
                $this->url = strip_tags($this->url);

                //eliminar espaco em branco
                $this->url = trim($this->url);

                //eliminar a barra no final da url
                $this->url = rtrim($this->url,'/');

                //trocar os caracteres especiais
                $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
                $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';
                $this->url =  strtr(utf8_decode($this->url), utf8_decode($this->format['a']), $this->format['b']  );

            }

            


            public function loadPage():void
            
            {
                echo "carregando pagina: {$this->urlController}<br>";
                //criando o endereço dinamico
                $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
                $classePage = new $this->classLoad();
                $classePage->{$this->urlMetodo}();

                
                /*$login = new \App\adms\Controllers\Login();
                $login ->index();

                $users = new \App\adms\Controllers\Users();
                $users ->index();*/
                
            }
        }
?>