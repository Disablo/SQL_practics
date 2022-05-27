<?php

/*

    Main bug that tasks shows after second reload page
    It depends from work mechanics of cookies

*/


function show_tasks($tasks) {

    echo "<table>";
    echo "<th>TASKS</th>";

    foreach($tasks as $key => $value) {
        echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
    }

    echo "</table>";

}

//Take task from $_POST
function handle_task($task) {
        
    //Put task in cookie file
    foreach($task as $key => $value){
    
        setcookie($key, $value, time() + (86400 * 30), "/");

    }

}

handle_task($_POST);
show_tasks($_COOKIE);

//Show markup wiht main input field
echo "
<html>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>

<style>
    body{font-family: sans-serif;}
</style>

    <body>

        <form action='index.php' method='post'>
        Enter task: <input type='textarea' name='task" . rand(1, 1000) . "' 
        style='width:450px; height:100px;'><br>

        <input type='submit'>
        </form>

    </body>

</html>";

?>