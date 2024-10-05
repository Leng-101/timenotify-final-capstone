<?php 

    function connect(){

        $con = new mysqli('localhost', 'root', '', 'time_notify');

        if($con->connect_error)
        {
            echo $con->connect_error;
        }
        else 
        {
            return $con;
        }
    }

?>
