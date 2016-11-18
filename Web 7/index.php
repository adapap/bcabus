<?php

if(isset($_POST['expression'])){
       if(((endswith(";ls" , $_POST['expression']) && strlen($_POST['expression']) < 6)) || (endswith("; ls", $_POST['expression']) && strlen($_POST['expression']) < 6)) {
            $anwser = system("expr " . $_POST['expression']);
            echo($answer);

         
        }
        else{
            $answer = exec("expr " . escapeshellcmd($_POST['expression']));   
            echo($answer);
        }

    
}

function endswith($string, $test) {
    $strlen = strlen($string);
    $testlen = strlen($test);
    if ($testlen > $strlen) return false;
    return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
}

    ?>

<html>
<head>
  <link rel="stylesheet" href="main.css">
    <script type="text/javascript" src="calc.js"></script>

    </head>
    </body>
    <center><h3 style="color: black; font-size: 40px">Web 8</h3></center>
<div class="box">
<div class="display">
    <form action='.' method="post">
    <input type="text" name="expression" readonly size="18" id="d"></div>
<div class="keys">
    <p><input type="button" class="button gray"
    value="mrc" onclick='c("Created....................")'>
    <input type="button" class="button gray"
    value="m-" onclick='c("...............by............")'>
    <input type="button" class="button gray" value="
    m+" onclick='c(".....................Anoop")'>
    <input type="button" class="button pink"
    value="/ " onclick='v("/ ")'></p>
    <p><input type="button" class="button black"
    value="7 " onclick='v("7 ")'><input type="button"
    class="button black" value="8" onclick='v("8 ")'>
    <input type="button" class="button black" value="9 "
    onclick='v("9 ")'><input type="button"
    class="button pink" value="* " onclick='v("* ")'></p>
    <p><input type="button" class="button black"
    value="4" onclick='v("4 ")'><input type="button"
    class="button black" value="5 " onclick='v("5 ")'>
    <input type="button" class="button black" value="6 "
    onclick='v("6 ")'><input type="button"
    class="button pink" value="- " onclick='v("- ")'></p>
    <p><input type="button" class="button black"
    value="1 " onclick='v("1 ")'><input type="button"
    class="button black" value=" 2" onclick='v("2 ")'>
    <input type="button" class="button black" value=" 3"
    onclick='v("3 ")'><input type="button"
    class="button pink" value=" +" onclick='v("+ ")'></p>
    <p><input type="button" class="button black"
    value=" 0" onclick='v("0 ")'><input type="button"
    class="button black" value="." onclick='v(".")'>
    <input type="button" class="button black" value="C"
    onclick='c("")'><input type="submit"
    class="button orange" value="="></p>
</div>
</div>
</body>
</html>

