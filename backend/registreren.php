<?php

require 'config.php';

?>
<h2>Voeg een account toe.</h2>
<form method="post" action="registrerenverwerk.php">
            <div>
                <label for="inputusername">username</label>
                <input type="text" name="inputusername">
               
            </div>
            <div>
                <label for="inputpassword">password</label>
                <input type="password" name="inputpassword">
                
            </div>
            <div>
                <label for="inputpassword2">password</label>
                <input type="password" name="inputpassword2">
                
            </div>

            <div>
                <input name="submit" type="submit">
            </div>
        </form>