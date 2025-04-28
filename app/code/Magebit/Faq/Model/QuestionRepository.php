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

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\Data\QuestionSearchResultsInterfaceFactory;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\ResourceModel\Question as QuestionResource;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;

class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * @param QuestionFactory $questionFactory
     * @param QuestionResource $questionResource
     * @param CollectionFactory $collectionFactory
     * @param QuestionSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        protected QuestionFactory $questionFactory,
        protected QuestionResource $questionResource,
        protected CollectionFactory $collectionFactory,
        protected QuestionSearchResultsInterfaceFactory $searchResultsFactory,
        protected CollectionProcessorInterface $collectionProcessor
    ) {
    }

    /**
     * Get question by ID
     *
     * @param integer $id
     * @return QuestionInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id): QuestionInterface
    {
        $question = $this->questionFactory->create();
        $this->questionResource->load($question, $id);

        if (!$question->getId()) {
            throw new NoSuchEntityException(__('The question with the "%1" ID doesn\'t exist.', $id));
        }

        return $question;
    }

    /**
     * Save question
     *
     * @param QuestionInterface $question
     * @return QuestionInterface
     * @throws InputException
     */
    public function save(QuestionInterface $question): QuestionInterface
    {
        // Validate required fields
        if (empty($question->getQuestion())) {
            throw new InputException(__('The question field is required.'));
        }

        if (empty($question->getAnswer())) {
            throw new InputException(__('The answer field is required.'));
        }

        $this->questionResource->save($question);

        return $question;
    }

    /**
     * Get items
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete question
     *
     * @param QuestionInterface $question
     * @return void
     */
    public function delete(QuestionInterface $question): void
    {
        $this->questionResource->delete($question);
    }

    /**
     * Delete question by ID
     *
     * @param integer $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $question = $this->get($id);
        $this->delete($question);
    }
}
