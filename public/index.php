<?php
    //echo "Hello World!";
    require_once '../app/bootstrap.php';
    
    #      in many file there are many format that might be required to include 
    #      Thus it is important to sum up the required files 
    #      connected to one file and inculed that one file 
    #      in this case, we connected all the required file 
    #      into bootstrp.php file and include that file onece 
    #      using 'require_once' statement

    $mycore = new Core;