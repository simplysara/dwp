<?php

declare(strict_types=1);

/**
 * PHP CS Fixer 2 Config File.
 *
 * References:
 * - https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/config.rst
 * - https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/list.rst
 * - https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/3de1d1bbd53b95201ff627c01e6a16b981cf7612/doc/ruleSets/Symfony.rst
 * - https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/3de1d1bbd53b95201ff627c01e6a16b981cf7612/doc/ruleSets/PHP81Migration.rst
 * - https://github.com/DocFX/symfony-website-checklist/blob/main/files-you-will-need/.php-cs-fixer.dist.php
 */

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('migrations')
    ->exclude('node_modules')
    ->exclude('var')
    ->exclude('vendor')
    ->exclude('public/bundles')
    ->exclude('public/build')
    ->notPath('bin/console')
    ->notPath('public/index.php')
    ->notPath('public/index.php');

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        '@PHP80Migration' => true,
        'line_ending' => true,
        // there's a bug in this function that will reformat `function(A &$in)` to `function(A & $in)`
        'function_typehint_space' => false,
        'phpdoc_to_comment' => false,
    ])
    ->setFinder($finder)
    ->setHideProgress(false)
    ->setUsingCache(false)
    ->setLineEnding("\n")
    ->setRiskyAllowed(true);
