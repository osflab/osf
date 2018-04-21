#!/usr/bin/env php
<?php 
include '/web/library/trunk/osf/vendor/autoload.php';

use Osf\Github\SubtreeManager;
use Osf\Github\SubtreeConfig as Config;
use Osf\Github\Sync\Components as OsfComponents;

SubtreeManager::setConfig((new Config())
    ->setGithubComponentsAddress('git@github.com:osflab')
    ->setGithubContainerAddress('git@github.com:osflab/osf')
    ->setComponentsPrefixDir('src')
    ->setCurrentBranch('3.0')
    ->setWorkDir(realpath(__DIR__ . '/..'))
    ->setComponents(OsfComponents::COMPONENT_LIST));

SubtreeManager::run();
