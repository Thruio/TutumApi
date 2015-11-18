<?php

require_once("vendor/autoload.php");

function arrayify($object)
{
    return json_decode(json_encode($object), true);
}

function var_export_compact($object)
{
    $data = var_export($object, true);
    $data = str_replace("array (", "[", $data);
    $data = str_replace(")", "]", $data);
    $data = str_replace("\n", " ", $data);
    $data = str_replace("\t", "", $data);
    $data = preg_replace('/(\s)+/', ' ', $data);
    $data = str_replace(", ]", "]", $data);
    $data = str_replace("[ ", "[", $data);


    return $data;
}
\Thru\TutumApi\Client::configure('matthewbaggett', 'decea003584f7df33be57f547f63f2cccd8e3188');

\VCR\VCR::configure()
    ->setMode('new_episodes')
    ->enableLibraryHooks(array('curl','stream_wrapper'));
