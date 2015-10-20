<?php
namespace Bx\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ComponentInstaller extends LibraryInstaller {
    const PACKAGE_TYPE = 'bx-component-installer';

    public function getPackageBasePath(PackageInterface $package)
    {
        $extras = $package->getExtra();

        if ((array_key_exists('bx_component_name', $extras)) && (!empty($extras['bx_component_name']))) {
            $name = (string)$extras['bx_component_name'];
        } else {
            throw new \Exception(
                'Unable to install component, composer.json must contain module name declaration like this: ' .
                '"extra": { "bx_component_name": "name" } '
            );
        }

        return 'local/components/' . $name;
    }

    public function supports($packageType)
    {
        return self::PACKAGE_TYPE === $packageType;
    }
}
