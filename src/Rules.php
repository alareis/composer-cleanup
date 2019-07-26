<?php
/**
 * This file is part of the composer-cleanup-plugin project.
 *
 * @copyright 2019 by Alban LAISNÉ
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

/**
 * @file: Rules.php
 * @author: Alban LAISNÉ <alban.laisne@univ-lehavre.fr>
 * created: 26/07/19 11:54
 * updated: 26/07/19 15:49
 */
namespace Alareis\Composer\Cleanup;

/**
 * Class Rules
 * @package Alareis\Composer\Cleanup
 */
class Rules
{
    /**
     * @return array
     */
    public static function getDefault()
    {
        $docs = [
            'README*', 'CHANGELOG*', 'FAQ*', 'CONTRIBUTING*', 'HISTORY*',
            'UPGRADING*', 'UPGRADE*', 'package*', 'demo', 'demos', 'example', 'examples',
            'doc', 'docs', 'readme*', 'changelog*', 'composer*'
        ];

        $tests = [
            '.travis.yml', '.scrutinizer.yml', 'phpcs.xml*', 'phpcs.php', 'phpunit.xml*',
            'phpunit.php', 'test', 'tests', 'Tests', 'travis', 'patchwork.json'
        ];

        return [
            'anahkiasen/former'                     => array_merge($docs, $tests),
            'anahkiasen/html-object'                => array_merge($docs, [
                'phpunit.xml*',
                'tests/*'
            ]),
            'anahkiasen/rocketeer'                  => array_merge($docs, $tests),
            'anahkiasen/underscore-php'             => array_merge($docs, $tests),
            'barryvdh/composer-cleanup-plugin'      => array_merge($docs, $tests),
            'barryvdh/laravel-debugbar'             => array_merge($docs, $tests),
            'barryvdh/laravel-ide-helper'           => array_merge($docs, $tests),
            "bower-asset/moment"                    => array_merge($docs, $tests, [
                "src"
            ]),
            "bower-asset/moment-timezone"           => array_merge($docs, $tests, [
                "data/unpacked"
            ]),
            "bower-asset/fullcalendar"              => array_merge($docs, $tests, [
                "src",
                "tasks",
                "/*lock.json"
            ]),
            "bower-asset/fullcalendar-scheduler"    => array_merge($docs, $tests, [
                "src",
                "tasks",
                "/*lock.json"
            ]),
            "bower-asset/jquery"                    => array_merge($docs, $tests, [
                "src",
                "/*lock.json"
            ]),
            "bower-asset/intl-tel-input"            => array_merge($docs, $tests, [
                "src",
                "/*lock.json"
            ]),
            "npm-asset/jsoneditor"                  => array_merge($docs, $tests, [
                "src",
            ]),
            "npm-asset/brace"                       => array_merge($docs, $tests, [
                "worker"
            ]),
            'bllim/datatables'                      => array_merge($docs, $tests),
            'cartalyst/sentry'                      => array_merge($docs, $tests),
            'classpreloader/classpreloader'         => array_merge($docs, $tests),
            'd11wtq/boris'                          => array_merge($docs, $tests),
            'danielstjules/stringy'                 => array_merge($docs, $tests),
            'dflydev/markdown'                      => array_merge($docs, $tests),
            'dnoegel/php-xdg-base-dir'              => array_merge($docs, $tests),
            'doctrine/annotations'                  => array_merge($docs, $tests, [
                'bin'
            ]),
            'doctrine/cache'                        => array_merge($docs, $tests, [
                'bin'
            ]),
            'doctrine/collections'                  => array_merge($docs, $tests),
            'doctrine/common'                       => array_merge($docs, $tests, [
                'bin',
                'lib/vendor'
            ]),
            'doctrine/dbal'                         => array_merge($docs, $tests, [
                'bin',
                'build*',
                'docs2',
                'lib/vendor'
            ]),
            'doctrine/inflector'                    => array_merge($docs, $tests),
            'dompdf/dompdf'                         => array_merge($docs, $tests, [
                'www'
            ]),
            'filp/whoops'                           => array_merge($docs, $tests),
            'guzzle/guzzle'                         => array_merge($docs, $tests),
            'guzzlehttp/guzzle'                     => array_merge($docs, $tests),
            'guzzlehttp/oauth-subscriber'           => array_merge($docs, $tests),
            'guzzlehttp/streams'                    => array_merge($docs, $tests),
            'imagine/imagine'                       => array_merge($docs, $tests, [
                'lib/Imagine/Test'
            ]),
            'intervention/image'                    => array_merge($docs, $tests, [
                'public'
            ]),
            'ircmaxell/password-compat'             => array_merge($docs, $tests),
            'jakub-onderka/php-console-color'       => array_merge($docs, $tests, [
                'build.xml',
                'example.php'
            ]),
            'jakub-onderka/php-console-highlighter' => array_merge($docs, $tests, [
                'build.xml'
            ]),
            'jasonlewis/basset'                     => array_merge($docs, $tests),
            'jeremeamia/SuperClosure'               => array_merge($docs, $tests, [
                'demo'
            ]),
            'kriswallsmith/assetic'                 => array_merge($docs, $tests),
            'laravel/framework'                     => array_merge($docs, $tests, [
                'build'
            ]),
            'leafo/lessphp'                         => array_merge($docs, $tests, [
                'Makefile',
                'package.sh'
            ]),
            'league/flysystem'                      => array_merge($docs, $tests),
            'league/stack-robots'                   => array_merge($docs, $tests),
            'maximebf/debugbar'                     => array_merge($docs, $tests, [
                'demo'
            ]),
            'mccool/laravel-auto-presenter'         => array_merge($docs, $tests),
            'mockery/mockery'                       => array_merge($docs, $tests),
            'monolog/monolog'                       => array_merge($docs, $tests),
            'mrclay/minify'                         => array_merge($docs, $tests, [
                'MIN.txt',
                'min_extras',
                'min_unit_tests',
                'min/builder',
                'min/config*',
                'min/quick-test*',
                'min/utils.php',
                'min/groupsConfig.php',
                'min/index.php'
            ]),
            'mtdowling/cron-expression'             => array_merge($docs, $tests),
            'mustache/mustache'                     => array_merge($docs, $tests, [
                'bin'
            ]),
            'nesbot/carbon'                         => array_merge($docs, $tests),
            'nikic/php-parser'                      => array_merge($docs, $tests, [
                'test_old'
            ]),
            'oyejorge/less.php'                     => array_merge($docs, $tests),
            'patchwork/utf8'                        => array_merge($docs, $tests),
            'phenx/php-font-lib'                    => array_merge($docs, $tests, [
                'www'
            ]),
            'phpdocumentor/reflection-docblock'     => array_merge($docs, $tests),
            'phpoffice/phpexcel'                    => array_merge($docs, $tests, [
                'Examples',
                'unitTests',
                'changelog.txt'
            ]),
            'phpseclib/phpseclib'                   => array_merge($docs, $tests, [
                'build'
            ]),
            'predis/predis'                         => array_merge($docs, $tests, [
                'bin'
            ]),
            'psr/log'                               => array_merge($docs, $tests),
            'psy/psysh'                             => array_merge($docs, $tests),
            'rcrowe/twigbridge'                     => array_merge($docs, $tests),
            'simplepie/simplepie'                   => array_merge($docs, $tests, [
                'build',
                'compatibility_test',
                'ROADMAP.md'
            ]),
            'stack/builder'                         => array_merge($docs, $tests),
            'swiftmailer/swiftmailer'               => array_merge($docs, $tests,[
                'build*',
                'notes',
                'test-suite',
                'create_pear_package.php'
            ]),
            'symfony/browser-kit'                   => array_merge($docs, $tests),
            'symfony/class-loader'                  => array_merge($docs, $tests),
            'symfony/console'                       => array_merge($docs, $tests),
            'symfony/css-selector'                  => array_merge($docs, $tests),
            'symfony/debug'                         => array_merge($docs, $tests),
            'symfony/dom-crawler'                   => array_merge($docs, $tests),
            'symfony/event-dispatcher'              => array_merge($docs, $tests),
            'symfony/filesystem'                    => array_merge($docs, $tests),
            'symfony/finder'                        => array_merge($docs, $tests),
            'symfony/http-foundation'               => array_merge($docs, $tests),
            'symfony/http-kernel'                   => array_merge($docs, $tests),
            'symfony/process'                       => array_merge($docs, $tests),
            'symfony/routing'                       => array_merge($docs, $tests),
            'symfony/security'                      => array_merge($docs, $tests),
            'symfony/security-core'                 => array_merge($docs, $tests),
            'symfony/translation'                   => array_merge($docs, $tests),
            'symfony/var-dumper'                    => array_merge($docs, $tests),
            'tijsverkoyen/css-to-inline-styles'     => array_merge($docs, $tests),
            'twig/twig'                             => array_merge($docs, $tests),
            'venturecraft/revisionable'             => array_merge($docs, $tests),
            'vlucas/phpdotenv'                      => array_merge($docs, $tests),
            'willdurand/geocoder'                   => array_merge($docs, $tests),
        ];
    }
}
