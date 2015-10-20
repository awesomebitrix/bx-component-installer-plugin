<?php

namespace Bx\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;


class ComponentInstallerPlugin implements PluginInterface
{
    /**
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new ComponentInstaller ($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
