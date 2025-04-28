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
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Inline edit action.
 */
class InlineEdit extends Action
{
    /**
     * @param Action\Context $context
     * @param QuestionRepository $questionRepository
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Action\Context $context,
        protected QuestionRepository $questionRepository,
        protected JsonFactory $jsonFactory
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
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);

            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $id) {
                    $model = $this->questionRepository->get($id);

                    try {
                        $model->setData(array_merge($model->getData(), $postItems[$id]));
                        $this->questionRepository->save($model);
                    } catch (\Exception $e) {
                        $messages[] = '[Item ID: ' . $model->getId() . '] ' . __($e->getMessage());
                        $error = true;
                    }
                }
            }
        }

        $resultJson = $this->jsonFactory->create();
        $resultJson->setData(['messages' => $messages,'error' => $error]);
        return $resultJson;
    }
}
