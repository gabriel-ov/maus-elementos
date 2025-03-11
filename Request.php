<?php    
    $msg = file_get_contents('php://input');
    
    if(true)
    {
        // Log request
        $myfile = fopen("log.txt", "a") or die("Unable to open file!");
        fwrite($myfile, date("Y.m.d h:i:s")." - Request: $msg\r\n");
        fclose($myfile);
    }
        
    // Send TCP/IP Message to Talespire Remote Control Plugin
    $fp = fsockopen("127.0.0.1", 11000, $errno, $errstr, 30);
    if (!$fp) 
    {
        echo "Failed To Send $msg";
    } 
    else 
    {
        fwrite($fp, $msg."\n");
        fclose($fp);
        echo "Sent $msg";
    }    
?>