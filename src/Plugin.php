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
 * @file: Plugin.php
 * @author: Alban LAISNÉ <alban.laisne@univ-lehavre.fr>
 * created: 26/07/19 11:54
 * updated: 26/07/19 15:49
 */
namespace Alareis\Composer\Cleanup;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Installer\PackageEvent;
use Composer\Installer\PackageEvents;
use Composer\Package\BasePackage;
use Composer\Plugin\PluginInterface;
use Composer\Util\Filesystem;

/**
 * Class Plugin
 * @package Alareis\Composer\Cleanup
 */
class Plugin implements PluginInterface, EventSubscriberInterface
{
    /** @var  \Composer\Composer $composer */
    protected $composer;

    /** @var  \Composer\IO\IOInterface $io */
    protected $io;

    /** @var  \Composer\Config $config */
    protected $config;

    /** @var  \Composer\Util\Filesystem $filesystem */
    protected $filesystem;

    /** @var  array $rules */
    protected $rules;

    /** @inheritdoc */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
        $this->config = $composer->getConfig();

        $this->filesystem = new Filesystem();

        $this->rules = Rules::getDefault();

        if (\is_array($this->config->get('cleanup'))) {
            $this->rules = array_merge($this->rules, $this->config->get('cleanup'));
        }
    }

    /** @inheritdoc */
    public static function getSubscribedEvents()
    {
        return [
            PackageEvents::POST_PACKAGE_INSTALL  => [
                ['onPostPackageInstall', 0]
            ],
            PackageEvents::POST_PACKAGE_UPDATE  => [
                ['onPostPackageUpdate', 0]
            ],
        ];
    }

    /**
     * Function to run after a package has been installed
     * @param PackageEvent $event
     */
    public function onPostPackageInstall(PackageEvent $event)
    {
        /** @var \Composer\DependencyResolver\Operation\InstallOperation $operation */
        $operation = $event->getOperation();
        /** @var \Composer\Package\CompletePackage $package */
        $package = $operation->getPackage();

        $this->cleanup($package);
    }

    /**
     * Function to run after a package has been updated
     * @param PackageEvent $event
     */
    public function onPostPackageUpdate(PackageEvent $event)
    {
        /** @var \Composer\DependencyResolver\Operation\UpdateOperation $operation */
        $operation = $event->getOperation();

        /** @var \Composer\Package\CompletePackage $package */
        $package = $operation->getTargetPackage();

        $this->cleanup($package);
    }

    /**
     * Clean a package, based on its rules.
     *
     * @param BasePackage $package The package to clean
     * @return bool
     */
    protected function cleanup(BasePackage $package)
    {
        // Only clean 'dist' packages
        if ($package->getInstallationSource() !== 'dist') {
            return false;
        }

        $vendorDir = $this->config->get('vendor-dir');
        $targetDir = $package->getTargetDir();
        $packageName = $package->getPrettyName();
        $packageDir = $targetDir ? $packageName . DIRECTORY_SEPARATOR . $targetDir : $packageName ;

        $dir = $this->filesystem->normalizePath(realpath($vendorDir . DIRECTORY_SEPARATOR . $packageDir));
        if (!is_dir($dir)) {
            return false;
        }

        /** @var Cleaner $cleaner */
        $cleaner = new Cleaner($dir, $this->filesystem);

        if (isset($this->rules[$packageName])) {
            $rules = $this->rules[$packageName];
            foreach ($rules as $pattern) {
                $cleaner->addPattern($pattern);
            }
        }

        $bowerFile = $dir . DIRECTORY_SEPARATOR . 'bower.json';
        if (file_exists($bowerFile)) {
            $bowerConfig = json_decode(file_get_contents($bowerFile));
            if (property_exists($bowerConfig, 'ignore')) {
                foreach ($bowerConfig->ignore as $pattern) {
                    $cleaner->addPattern($pattern);
                }
            }

        }

        return $cleaner->execute();
    }
}
