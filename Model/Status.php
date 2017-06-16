<?php
/**
 * @author Mygento Team
 * @copyright See COPYING.txt for license details.
 * @package Mygento_Kkm
 */
namespace Mygento\Kkm\Model;

class Status extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Mygento\Kkm\Model\ResourceModel\Status');
    }

}
