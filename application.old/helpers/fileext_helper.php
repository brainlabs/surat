<?php

function get_extension($filename)
{
        $x = explode('.', $filename);
        return '.'.end($x);
}