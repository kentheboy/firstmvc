<?php

    /*App Core Class*/
    // Followings are what we define in this core.php file
    // * Create URL & loads core controller
    // * URL FORMAT - /controller/method/params

    class Core {
       protected $currentController = 'Pages';
       //here we tell that if there is no file of folder specified after "/firstmvc/", as default we loard 'Pages' 
       protected $currentMethod = 'index';
       protected $params = [];

       public function __construct(){
           //print_r($this->getUrl());

           $url = $this->getUrl();
          
           //Look in controllers for first value
           if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            //if the controller file exist, set as controller
            $this->currentController = ucwords($url[0]);
            
            //unset 0 index
            unset($url[0]);
           }
           
        //    else{
        //        echo 'page not found';
        //    }

           //Require the controller 
           require_once '../app/controllers/'.$this->currentController.'.php';
           //   note that eventhough this file is inside librars directry,
           //   this class will be instantiated at index file in public dirctry
           //   so the relative directry will be written as public/index.php perspective 

           //Instantiate controller class
           $this->currentController = new $this->currentController;
       }

       //the "currentController" and "currentMethod" changes depending on the links 
       //that is entered(↑↑　those are just a default value)
       //So we need the function(↓↓) that will obtain the link entered and save as an array(inside $params)
       public function getUrl(){
           //echo $_GET['url'];
           //since we mentioned in .htaccess file in Public folder, that "every url will be routed through 
           //index file and any link string follow after "/public/" will be stored as url value($1 as default)",
           //we can get the directly that was entered in url bar by accessing url value. 
           if(isset($_GET['url'])){
               $url = rtrim($_GET['url'], '/');
               $url = filter_var($url, FILTER_SANITIZE_URL);
               $url = explode('/', $url);
               return $url;
               // here it will return url value as link array
           }
       }
    }
    
