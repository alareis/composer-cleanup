Composer Cleanup Plugin
=======================

Delete unnecessary file from the vendor dir. Based on [composer-cleanup-plugin by barryvdh](https://github.com/barryvdh/composer-cleanup-plugin).

> **Note:** This package is still experimental, usage in production is not recommended.

## Install

Require this package in your composer.json:

      composer global require alareis/composer-cleanup
      
## Usage

This plugin will work automatically on any packages installed as `dist`. Therefore, if you are using it to build a package archive, simply run `composer install` with the `--prefer-dist` option.

## What does it do?

For every installed or updated package in the default list, in general:

1. Remove documentation, such as README files, docs folders, etc.
2. Remove tests, PHPUnit configs, and other build/CI configuration.
3. Remove bower ignored files
