<?php
namespace Concrete\Package\Chronos;

use Package;
use BlockType;
use View;
use Loader;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends \Package {

  	protected $pkgHandle = 'chronos';
    protected $appVersionRequired = '5.7.4';
    protected $pkgVersion = '0.0.1';
    public function getPackageDescription()
    {
        return t("Chronos / dates historiques du jour sur vos pages.");
    }
    public function getPackageName()
    {
        return t("Chronos");
    }

	/**
	 * This function is executed during initial installation of the package.
	 *
	 * @param void
	 * @return void
	 * @author AN 05/16/2016
	 */

   /*
	public function install()
	{
        $pkg = parent::install();
        $bt = BlockType::getByHandle('chronos');
        if (!is_object($bt)) {
            $bt = BlockType::installBlockType('chronos', $pkg);
        }
	}
*/


  	public function install()
  	{
  		$pkg = parent::install();

  		// install block
  		BlockType::installBlockTypeFromPackage('chronos', $pkg);

  		return $pkg;
  	}
	/**
	 * This function is executed during uninstallation of the package.
	 *
	 * @param void
	 * @return void
	 * @author AN 05/16/2016
	 */
	public function uninstall()
	{
	    $pkg = parent::uninstall();
	}


/*
public function install()
	{
			if (!file_exists(__DIR__ . '/vendor')) {
					throw new \Exception('Please install composer dependencies before you install this package. ' .
							'Run `cd "' . __DIR__ . '" && composer install`');
			}
			parent::install();
			// Make sure we load everything.
			$this->on_start();
	}


		*/

}

?>
