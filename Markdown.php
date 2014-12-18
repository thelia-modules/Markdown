<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace Markdown;

use Propel\Runtime\Connection\ConnectionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Thelia\Module\BaseModule;

class Markdown extends BaseModule
{

    private $jsPath, $webJsPath;

    public function __construct()
    {
        $this->jsPath = __DIR__ . DS .'Resources' . DS . 'js';

        $this->webJsPath = THELIA_WEB_DIR . 'markdown';
    }
    /**
     * @inheritdoc
     */
    public function postActivation(ConnectionInterface $con = null)
    {
        $fs = new Filesystem();

        // Create symbolic links in the web directory, to make the Markdown code available.
        if (false === $fs->exists($this->webJsPath)) {
            $fs->symlink($this->jsPath, $this->webJsPath);
        }
    }

    /**
     * @inheritdoc
     */
    public function postDeactivation(ConnectionInterface $con = null)
    {
        $fs = new Filesystem();

        $fs->remove($this->webJsPath);
    }
}