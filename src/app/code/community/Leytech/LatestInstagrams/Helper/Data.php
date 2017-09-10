<?php
/**
 * @package    Leytech_LatestInstagrams
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2017 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
 */
class Leytech_LatestInstagrams_Helper_Data extends Mage_Core_Helper_Abstract
{

    protected $module_enabled;
    protected $cache_lifetime;

    protected $user_id;
    protected $access_token;

    function __construct()
    {
        // set the variables as per admin config
        $this->module_enabled = ( Mage::getStoreConfig('leytech_latestinstagrams/general/enabled') ? true : false);
        $this->cache_lifetime = Mage::getStoreConfig('leytech_latestinstagrams/general/cache_lifetime');

        $this->user_id = Mage::getStoreConfig('leytech_latestinstagrams/api_settings/userid');
        $this->access_token = Mage::getStoreConfig('leytech_latestinstagrams/api_settings/accesstoken');

    }

    public function isModuleEnabled() {
        return $this->module_enabled;
    }

}