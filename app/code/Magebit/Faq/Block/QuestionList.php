<?php
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

declare(strict_types=1);

namespace Magebit\Faq\Block;

use Magebit\Faq\Api\QuestionRepositoryInterface as QuestionRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\View\Element\Template;

/**
 * FAQ Question List Block
 */
class QuestionList extends Template
{
    /**
     * @param Template\Context $context
     * @param QuestionRepository $questionRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        protected QuestionRepository $questionRepository,
        private SearchCriteriaBuilder $searchCriteriaBuilder,
        private SortOrderBuilder $sortOrderBuilder,
        array $data = [],
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get FAQ questions
     *
     * @return QuestionInterface[]
     */
    public function getItems(): array
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('position')
            ->setDirection(SortOrder::SORT_ASC)
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('status', 1)
            ->addSortOrder($sortOrder)
            ->create();

        $items = $this->questionRepository->getList($searchCriteria);
        return $items->getItems();
    }
}
