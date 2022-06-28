<?php
$content =  file_get_contents("./test.txt");
$content = str_replace("\r\n","<br>", $content);
echo $content;