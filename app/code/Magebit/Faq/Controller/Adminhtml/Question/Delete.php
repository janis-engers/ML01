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

use Magebit\Faq\Api\QuestionRepositoryInterface as QuestionRepository;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultInterface;

/**
 * Delete action.
 */
class Delete extends Action
{
    /**
     * @param Action\Context $context
     * @param QuestionRepository $questionRepository
     */
    public function __construct(
        Action\Context $context,
        protected QuestionRepository $questionRepository
    ) {
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');

        if (!$id) {
            $this->messageManager->addErrorMessage(__('We can\'t find a question to delete.'));
            return $resultRedirect->setPath('*/*/');
        }

        try {
            $model = $this->questionRepository->get((int)$id);
            $this->questionRepository->delete($model);
            $this->messageManager->addSuccessMessage(__('You deleted the question.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
