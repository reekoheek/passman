<?php

/**
 * Bono App Configuration
 *
 * @category  PHP_Framework
 * @package   Bono
 * @author    Ganesha <reekoheek@gmail.com>
 * @copyright 2013 PT Sagara Xinix Solusitama
 * @license   https://raw.github.com/xinix-technology/bono/master/LICENSE MIT
 * @version   0.10.0
 * @link      http://xinix.co.id/products/bono
 */

use Norm\Schema\String;
use Norm\Schema\Password;
use PassMan\Schema\Pass;

return array(
    'application' => array(
        'title' => 'PassMan',
        'subtitle' => 'Password Management'
    ),
    'bono.salt' => 'this is the salt',
    'bono.providers' => array(
        '\\Norm\\Provider\\NormProvider' => array(
            'datasources' => array(
                'mongo' => array(
                    'driver' => '\\Norm\\Connection\\MongoConnection',
                    'database' => 'passman',
                ),
            ),
            'collections' => array(
                'observers' => array(
                    '\\Norm\\Observer\\Timestampable',
                    '\\Norm\\Observer\\Ownership',
                ),
                'resolvers' => array(
                    '\\Norm\\Resolver\\CollectionResolver',
                ),
            ),
        ),
    ),
    'bono.middlewares' => array(
        '\\Bono\\Middleware\\StaticPageMiddleware' => null,
        '\\Bono\\Middleware\\ControllerMiddleware' => array(
            'default' => '\\Norm\\Controller\\NormController',
            'mapping' => array(
                '/user' => null,
                '/role' => null,
                '/credential' => '\\PassMan\\Controller\\CredentialController',
            ),
        ),
        '\\Bono\\Middleware\\ContentNegotiatorMiddleware' => array(
            'extensions' => array(
                'json' => 'application/json',
            ),
            'views' => array(
                'application/json' => '\\Bono\\View\\JsonView',
            ),
        ),
        '\\Bono\\Middleware\\NotificationMiddleware',
        '\\ROH\\BonoAuth\\Middleware\\AuthMiddleware' => array(
            'driver' => '\\ROH\\BonoAuth\\Driver\\NormAuth',
        ),
        '\\Bono\\Middleware\\SessionMiddleware'
    ),
    'bono.theme' => array(
        'class' => '\\Xinix\\Theme\\NakedTheme',
        'override' => true,
    ),
);
