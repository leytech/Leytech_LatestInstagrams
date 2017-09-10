<?php
/**
 * @package    Leytech_LatestInstagrams
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2017 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
 */

$installer = $this;
$installer->startSetup();

// Update config paths
$installer->run("UPDATE IGNORE `{$this->getTable('core_config_data')}` SET `path` = REPLACE(`path`,'twitter_settings/','api_settings/') WHERE `path` LIKE 'leytech_latestinstagrams/twitter_settings/%'");
$installer->run("UPDATE IGNORE `{$this->getTable('core_config_data')}` SET `path` = 'leytech_latestinstagrams/general/enabled' WHERE `path` LIKE 'leytech_latestinstagrams/general/active'");

$installer->endSetup();