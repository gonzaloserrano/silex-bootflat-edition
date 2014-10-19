<?php

$app['app.root_dir'] = realpath(__DIR__ . '/../');
$app['twig.path']    = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');
