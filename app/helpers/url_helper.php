<?php

function redirection($ruta)
{
    header('location:' . URL_PROJECT . $ruta);
    
}