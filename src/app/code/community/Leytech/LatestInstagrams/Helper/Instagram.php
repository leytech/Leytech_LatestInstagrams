<?php
/**
 * @package    Leytech_LatestInstagrams
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2017 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
 */
class Leytech_LatestInstagrams_Helper_Instagram extends Leytech_LatestInstagrams_Helper_Data
{
    // some default values
    const RESPONSE_LIMIT            = 5;

    private function fetchData($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function getPosts($limit = self::RESPONSE_LIMIT)
    {
        $coreHelper   = Mage::helper('core');
        $username     = trim($this->user_id);
        $limit        = intval($limit);
        $cacheKey     = 'instagram_' . md5($username);
        $cacheTags    = array('instagram', $cacheKey);
        $posts        = array();
        if (!$username || !$limit || $limit <= 0) {
            return array();
        }
        // try to load posts from cache
        $responseJson = $this->_loadCache($cacheKey . '_' . $limit);
        if (empty($responseJson)) {
            $responseJson = $this->fetchData("https://api.instagram.com/v1/users/".$this->user_id."/media/recent/?access_token=".$this->access_token);
            // TODO probably should check the response before saving it (it includes response codes etc)
            // save posts to cache
            $this->_saveCache($responseJson,
                $cacheKey . '_' . $limit,
                $cacheTags,
                $this->cache_lifetime);
        }
        // decode JSON response
        $posts = $coreHelper->jsonDecode($responseJson);
        return ($limit == 1 ? $posts['data'][0] : $posts['data']);
    }
}