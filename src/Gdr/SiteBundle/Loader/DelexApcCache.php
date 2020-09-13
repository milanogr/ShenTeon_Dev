<?php

namespace Gdr\SiteBundle\Loader;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\CacheProvider;

class DelexApcCache extends CacheProvider
{
    /**
     * @var bool
     */
    protected $isApcu = false;

    public function __construct()
    {
        $this->setNamespace("void");
        $this->isApcu = extension_loaded('apcu');
    }

    /**
     * {@inheritdoc}
     */
    public function setNamespace($namespace)
    {
        parent::setNamespace(\AppKernel::getCacheNamespace()."[Doctrine]");
    }

    /**
     * {@inheritdoc}
     */
    protected function doFetch($id)
    {
        return $this->isApcu ? apcu_fetch($id) : apc_fetch($id);
    }

    /**
     * {@inheritdoc}
     */
    protected function doContains($id)
    {
        return $this->isApcu ? apcu_exists($id) : apc_exists($id);
    }

    /**
     * {@inheritdoc}
     */
    protected function doSave($id, $data, $lifeTime = 0)
    {
        return $this->isApcu ? apcu_store($id, $data, $lifeTime) : apc_store($id, $data, $lifeTime);
    }

    /**
     * {@inheritdoc}
     */
    protected function doDelete($id)
    {
        // apc_delete returns false if the id does not exist
        return $this->isApcu ? (apcu_delete($id) || ! apcu_exists($id)) : (apc_delete($id) || ! apc_exists($id));
    }

    /**
     * {@inheritdoc}
     */
    protected function doFlush()
    {
        if($this->isApcu){
            return apcu_clear_cache();
        }

        return apc_clear_cache() && apc_clear_cache('user');
    }

    /**
     * {@inheritdoc}
     */
    protected function doFetchMultiple(array $keys)
    {
        return $this->isApcu ? apcu_fetch($keys) : apc_fetch($keys);
    }

    /**
     * {@inheritdoc}
     */
    protected function doGetStats()
    {
        if($this->isApcu){
            $info = apcu_cache_info('', true);
            $sma  = apcu_sma_info();
        } else {
            $info = apc_cache_info('', true);
            $sma  = apc_sma_info();
        }

        // @TODO - Temporary fix @see https://github.com/krakjoe/apcu/pull/42
        if (PHP_VERSION_ID >= 50500) {
            $info['num_hits']   = isset($info['num_hits'])   ? $info['num_hits']   : $info['nhits'];
            $info['num_misses'] = isset($info['num_misses']) ? $info['num_misses'] : $info['nmisses'];
            $info['start_time'] = isset($info['start_time']) ? $info['start_time'] : $info['stime'];
        }

        return array(
            Cache::STATS_HITS             => $info['num_hits'],
            Cache::STATS_MISSES           => $info['num_misses'],
            Cache::STATS_UPTIME           => $info['start_time'],
            Cache::STATS_MEMORY_USAGE     => $info['mem_size'],
            Cache::STATS_MEMORY_AVAILABLE => $sma['avail_mem'],
        );
    }
}