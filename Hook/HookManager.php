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

namespace Markdown\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

/**
 * Class HookManager
 *
 * @package Markdown\Hook
 * @author Michaël Espeche <michael.espeche@gmail.com>
 */
class HookManager extends BaseHook {

    public function onJsWysiwyg(HookRenderEvent $event)
    {
        $content = $this->render("markdown_init.tpl");
        $event->add($content);
    }
} 