<?php declare(strict_types=1);
/**
 * This file is part of the Magebit_Faq package
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit_Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2025 Magebit (https://magebit.com/)
 * @author    Janis Engers <info@magebit.com>
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * New item action.
 */
class NewAction extends Action
{
    /**
     * @param Action\Context $context
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Action\Context $context,
        protected ForwardFactory $resultForwardFactory
    ) {
        parent::__construct($context);
    }

    /**
     * Execute Action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
