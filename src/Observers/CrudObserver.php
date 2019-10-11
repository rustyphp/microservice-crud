<?php
/**
 * @file
 * Contains \biliboobrian\MicroServiceCrud\Observers\CrudObserver
 */

namespace biliboobrian\MicroServiceCrud\Observers;

use biliboobrian\MicroServiceModelUtils\Contracts\Cacheable;
use biliboobrian\MicroServiceModelUtils\Traits\MicroServiceCacheTrait;

/**
 * Observer class to act on CRUD item modifications.
 *
 * @package biliboobrian\MicroServiceCrud\Observers.
 */
class CrudObserver
{
    use MicroServiceCacheTrait;

    /**
     * Listen to the model saved event.
     *
     * @param Cacheable $model
     * @return void
     */
    public function saved(Cacheable $model)
    {
        $this->cacheForget($model);
    }

    /**
     * Listen to the model deleted event.
     *
     * @param Cacheable $model
     * @return void
     */
    public function deleted(Cacheable $model)
    {
        $this->cacheForget($model);
    }
}
