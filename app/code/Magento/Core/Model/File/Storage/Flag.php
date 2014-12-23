<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Synchronize process status flag class
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Core\Model\File\Storage;

class Flag extends \Magento\Framework\Flag
{
    /**
     * There was no synchronization
     */
    const STATE_INACTIVE = 0;

    /**
     * Synchronize process is active
     */
    const STATE_RUNNING = 1;

    /**
     * Synchronization finished
     */
    const STATE_FINISHED = 2;

    /**
     * Synchronization finished and notify message was formed
     */
    const STATE_NOTIFIED = 3;

    /**
     * Flag time to life in seconds
     */
    const FLAG_TTL = 300;

    /**
     * Synchronize flag code
     *
     * @var string
     */
    protected $_flagCode = 'synchronize';

    /**
     * Pass error to flag
     *
     * @param \Exception $e
     * @return $this
     */
    public function passError(\Exception $e)
    {
        $data = $this->getFlagData();
        if (!is_array($data)) {
            $data = [];
        }
        $data['has_errors'] = true;
        $this->setFlagData($data);
        return $this;
    }
}