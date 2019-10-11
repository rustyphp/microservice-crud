<?php
/**
 * @file
 * Contains \biliboobrian\MicroServiceCrud\Models\CrudModelInterface.
 */

namespace biliboobrian\MicroServiceCrud\Models;

/**
 * Interface that all CRUD models must implement.
 *
 * @package biliboobrian\MicroServiceCrud\Models
 */
interface CrudModelInterface
{
    /**
     * Get the validation rules to apply to an instance modification.
     *
     * @param string $mode
     *   The mode of operation being carried out on the model instance.
     * @param int|null $primaryKeyValue
     *   The value of the primary key (usually ID) for the instance. Optional.
     * @return array
     *
     * @see https://laravel.com/docs/master/validation
     */
    public function getValidationRules($mode = 'create', $primaryKeyValue = null);
}