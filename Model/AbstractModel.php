<?php
/**
 * @author Mygento
 * @copyright See COPYING.txt for license details.
 * @package Mygento_Kkm
 */
namespace Mygento\Kkm\Model;

use \Magento\Framework\Model\AbstractExtensibleModel;

/**
 * Abstract class AbstractModel
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractModel
{

    /** Constants */
    const ORDER_KKM_FAILED_STATUS = 'kkm_failed';
    const CONFIG_CODE             = 'mygento_kkm';

    /** @var \Mygento\Kkm\Helper\Data */
    protected $_kkmHelper;

    /** @var \Mygento\Kkm\Helper\Discount */
    protected $_kkmDiscount;

    /** @var \Magento\Framework\Stdlib\DateTime\DateTime */
    protected $_date;

    /** @var \Magento\Store\Model\StoreManagerInterface */
    protected $_storeManager;

    /** @var \Mygento\Kkm\Model\StatusFactory */
    protected $_statusFactory;

    abstract protected function sendCheque($invoice, $order);
    abstract protected function cancelCheque($creditmemo, $order);
    abstract protected function updateCheque($invoice);
    
    /**
     * Constructor
     *
     * @param \Mygento\Kkm\Helper\Data $kkmHelper
     * @param \Mygento\Kkm\Helper\Discount $kkmDiscount
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Mygento\Kkm\Model\StatusFactory $statusFactory
     */
    public function __construct(
        \Mygento\Kkm\Helper\Data $kkmHelper,
        \Mygento\Kkm\Helper\Discount $kkmDiscount,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Mygento\Kkm\Model\StatusFactory $statusFactory
    ) {
        $this->_kkmHelper     = $kkmHelper;
        $this->_kkmDiscount   = $kkmDiscount;
        $this->_date          = $date;
        $this->_storeManager  = $storeManager;
        $this->_statusFactory = $statusFactory;
    }

    /**
     * @param string $param
     * @return mixed
     */
    protected function getConfig($param)
    {
        return $this->_kkmHelper->getConfig(self::CONFIG_CODE . '/' . $param);
    }

    /** @return string */
    protected function getVendor()
    {
        return $this->getConfig('general/vendor');
    }
}
