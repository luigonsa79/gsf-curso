<?php

function base_url()
{
    return base_url;
}

function media()
{
    return base_url . "/Assets";
}

function headerAdmin($data = "")
{
    $view_header = "Views/Templates/header.php";
    require_once($view_header);
}

function footerAdmin($data = "")
{
    $view_footer = "Views/Templates/footer.php";
    require_once($view_footer);
}

function debug($data)
{
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}