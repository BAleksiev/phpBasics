<?php

$var = "hello";

if(is_numeric($var)) {
    echo var_dump($var);
} else {
    echo gettype($var);
}