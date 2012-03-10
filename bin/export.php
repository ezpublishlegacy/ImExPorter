<?php

require 'autoload.php';

$cli          = eZCLI::instance();

$script = eZScript::instance(array(
    'use-session'    => false,
    'use-modules'    => false,
    'use-extensions' => true
));

$cli->output('Creating snapshot ...');

$imExPorter = new ImExPorter();

try
{
    $imExPorter->export();
}
catch(Exception $exception)
{
    $cli->output($exception->getMessage());
}

//-- final shutdown
$cli->output('Done.');
$script->shutdown();