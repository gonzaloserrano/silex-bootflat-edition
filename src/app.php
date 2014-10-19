<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;

$app = new Application();

$app->register(new TwigServiceProvider());
$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return sprintf('%s/assets/%s',
            $app['request']->getBasePath(),
            ltrim($asset, '/')
        );
    }));

    return $twig;
}));

return $app;
