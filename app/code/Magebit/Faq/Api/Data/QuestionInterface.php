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

namespace Magebit\Faq\Api\Data;

/**
 * Interface for FAQ question entity
 *
 * @api
 * @since 1.0.0
 */
interface QuestionInterface
{
    /**
     * Database table name
     */
    public const TABLE = 'magebit_faq_question';

    /**#@+
     * Database table field
     */
    public const ID = 'id';
    public const QUESTION = 'question';
    public const ANSWER = 'answer';
    public const STATUS = 'status';
    public const POSITION = 'position';
    public const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**#@+
     * Question status
     */
    public const ENABLED = 1;
    public const DISABLED = 0;
    /**#@-*/

    /**
     * Get question id
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Get question
     *
     * @return string|null
     */
    public function getQuestion(): ?string;

    /**
     * Get question answer
     *
     * @return string|null
     */
    public function getAnswer(): ?string;

    /**
     * Get question status
     *
     * @return int|null
     */
    public function getStatus(): ?int;

    /**
     * Get question position
     *
     * @return int|null
     */
    public function getPosition(): ?int;

    /**
     * Get timestamp when question was last updated
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * Set question
     *
     * @param string $question
     *
     * @return QuestionInterface
     */
    public function setQuestion(string $question): QuestionInterface;

    /**
     * Set question answer
     *
     * @param string $answer
     *
     * @return QuestionInterface
     */
    public function setAnswer(string $answer): QuestionInterface;

    /**
     * Set question status
     *
     * @param int $status
     *
     * @return QuestionInterface
     */
    public function setStatus(int $status): QuestionInterface;

    /**
     * Set question position
     *
     * @param int $position
     *
     * @return QuestionInterface
     */
    public function setPosition(int $position): QuestionInterface;
}
