<?php
namespace nethaven\invoiced\base;


use nethaven\invoiced\invoiced;
use nethaven\invoiced\variables\Invoiced as invoicedVariable;

use Craft;
use craft\web\twig\variables\CraftVariable;
use yii\log\Logger;
use yii\base\Event;

trait PluginTrait
{
    // Properties
    // =========================================================================

    /**
     * @var invoiced
     */
    public static invoiced $plugin;


    // Static Methods
    // =========================================================================

    public static function log(string $message, array $params = []): void
    {
        Craft::getLogger()->log($message, Logger::LEVEL_INFO, 'invoiced');
    }

    public static function error(string $message, array $params = []): void
    {

        Craft::getLogger()->log($message, Logger::LEVEL_ERROR, 'invoiced');
    }

    // Private Methods
    // =========================================================================

    private function _registerVariables(): void
    {
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $e) {
                /** @var CraftVariable $variable */
                $variable = $e->sender;
    
                $variable->set('invoiced', invoicedVariable::class);
            }
        );
    }
}
