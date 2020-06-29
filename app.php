#!/usr/bin/php
<?php

use App\SearchCommand;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$console = new Application();
$console->add(new SearchCommand());
$console->run();