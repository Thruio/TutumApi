<?php

require_once("vendor/autoload.php");

\VCR\VCR::configure()
    ->setMode('once')
    ->enableLibraryHooks(array('curl','stream_wrapper'));