<?php

require_once("vendor/autoload.php");

\Thru\TutumApi\Client::configure('matthewbaggett', 'decea003584f7df33be57f547f63f2cccd8e3188');

\VCR\VCR::configure()
    //->setMode('new_episodes')
    ->enableLibraryHooks(array('curl','stream_wrapper'));