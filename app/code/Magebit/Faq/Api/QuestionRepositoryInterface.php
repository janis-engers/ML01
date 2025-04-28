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

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\InputException;

/**
 * Interface for FAQ question repository
 *
 * @api
 * @since 1.0.0
 */
interface QuestionRepositoryInterface
{
    /**
     * Retrieve question by ID
     *
     * @param int $id
     * @return QuestionInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id): QuestionInterface;

    /**
     * Save question
     *
     * @param QuestionInterface $question
     * @return QuestionInterface
     * @throws InputException
     */
    public function save(QuestionInterface $question): QuestionInterface;

    /**
     * Get question list by search criteria
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;

    /**
     * Delete question
     *
     * @param QuestionInterface $question
     * @return void
     */
    public function delete(QuestionInterface $question): void;

    /**
     * Delete question by ID
     *
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;
}
