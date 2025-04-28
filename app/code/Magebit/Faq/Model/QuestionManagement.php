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

use Magebit\Faq\Api\QuestionManagementInterface;
use Magebit\Faq\Api\QuestionRepositoryInterface as QuestionRepository;

class QuestionManagement implements QuestionManagementInterface
{
    /**
     * @param QuestionRepository $repository
     */
    public function __construct(
        protected QuestionRepository $repository
    ) {
    }

    /**
     * Enable question
     *
     * @param integer $id
     * @return void
     */
    public function enableQuestion(int $id): void
    {
        $question = $this->repository->get($id);
        $question->setStatus(1);
        $this->repository->save($question);
    }

    /**
     * Disable question
     *
     * @param integer $id
     * @return void
     */
    public function disableQuestion(int $id): void
    {
        $question = $this->repository->get($id);
        $question->setStatus(0);
        $this->repository->save($question);
    }
}
