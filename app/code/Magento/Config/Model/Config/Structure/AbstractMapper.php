<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * System Configuration Converter Mapper Interface
 */
namespace Magento\Config\Model\Config\Structure;

abstract class AbstractMapper implements MapperInterface
{
    /**
     * Check value existence
     *
     * @param string $key
     * @param array $target
     * @return bool
     */
    protected function _hasValue($key, $target)
    {
        if (false == is_array($target)) {
            return false;
        }

        $paths = explode('/', $key);
        foreach ($paths as $path) {
            if (array_key_exists($path, $target)) {
                $target = $target[$path];
            } else {
                return false;
            }
        }
        return true;
    }
}
