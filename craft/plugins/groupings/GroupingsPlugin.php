<?php
namespace Craft;

/**
 * Groupings by Jared Meyering
 *
 * @package   Groupings
 * @author    Jared Metering
 * @link      http://jaredmeyering.com
 */

class GroupingsPlugin extends BasePlugin
{


    const groupStart = "groupStart";
    const groupEnd = "groupEnd";
    const sectionStart = "sectionStart";
    const sectionEnd = "sectionEnd";


    public function getName()
    {
        return Craft::t("Groupings");
    }

    public function getVersion()
    {
        return "1.0.0";
    }

    public function getSchemaVersion()
    {
        return "1.0.0";
    }

    public function getDescription()
    {
        return Craft::t("Enable Grouping Block Type Display Elements");
    }

    public function getDeveloper()
    {
        return "Jared Meyering";
    }

    public function getDeveloperUrl()
    {
        return "http://jaredmeyering.com";
    }

    public function init()
    {
        if ( craft()->request->isCpRequest() && craft()->userSession->isLoggedIn() ) {
            craft()->templates->includeJsResource('groupings/sections.js');
            craft()->templates->includeCssResource('groupings/sections.css');
            craft()->templates->includeJsResource('groupings/groupings.js');
            craft()->templates->includeCssResource('groupings/groupings.css');
        }
        craft()->on("entries.onBeforeSaveEntry", function(Event $event) {
            $entry = $event->params["entry"];
            $contentBuilderField = $entry->getContent()->getAttribute("contentBuilder");

            if (is_null($contentBuilderField)) {
                return;
            }
            
            $inGroup = false;
            $groupType = null;

            $len = count($contentBuilderField);
            foreach ($contentBuilderField as $key => $block) {
                $handle = $block->getType()->getAttribute("handle");

                if ($inGroup) {
                    if ($handle === self::groupStart) {
                        $block->addError("handle", "Cannot nest groups");
                        $event->performAction = false;
                    }
                    if ($handle !== $groupType && $handle !== self::groupEnd) {
                        $block->addError("handle", "Grouped block types must be of the same type");
                        $event->performAction = false;
                    }
                } else {
                    if ($handle === self::groupEnd) {
                        $block->addError("handle", "Cannot end a group that has not been started");
                        $event->performAction = false;
                    }
                }

                if ($handle === self::groupStart) {
                    $inGroup = true;
                    $groupType = $contentBuilderField[$key + 1]->getType()->getAttribute("handle");
                }

                if ($handle === self::groupEnd) {
                    $inGroup = false;
                    $groupType = null;
                }
            }
        });
    }
}
