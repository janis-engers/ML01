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
use Magebit\Faq\Model\ResourceModel\Question as QuestionResource;
use Magento\Framework\Model\AbstractModel;

/**
 * Question Model
 *
 * @api
 * @since 1.0.0
 */
class Question extends AbstractModel implements QuestionInterface
{
    protected function _construct()
    {
        $this->_init(QuestionResource::class);
    }

    /**
     * Get question ID
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        $val = $this->_getData(self::ID);
        return $val ? (int)$val : null;
    }

    /**
     * Get question text
     *
     * @return string|null
     */
    public function getQuestion(): ?string
    {
        $val = $this->_getData(self::QUESTION);
        return $val ? (string)$val : null;
    }

    /**
     * Get question answer
     *
     * @return string|null
     */
    public function getAnswer(): ?string
    {
        $val = $this->_getData(self::ANSWER);
        return $val ? (string)$val : null;
    }

    /**
     * Get question status
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        $val = $this->_getData(self::STATUS);
        return $val ? (int)$val : null;
    }

    /**
     * Get question position
     *
     * @return int|null
     */
    public function getPosition(): ?int
    {
        $val = $this->_getData(self::POSITION);
        return $val ? (int)$val : null;
    }

    /**
     * Get timestamp of when question was last updated
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        $val = $this->_getData(self::UPDATED_AT);
        return $val ? (string)$val : null;
    }

    /**
     * Set question text
     *
     * @param string $question
     * @return QuestionInterface
     */
    public function setQuestion(string $question): QuestionInterface
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * Set question answer
     *
     * @param string $answer
     * @return QuestionInterface
     */
    public function setAnswer(string $answer): QuestionInterface
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * Set question status
     *
     * @param int $status
     * @return QuestionInterface
     */
    public function setStatus(int $status): QuestionInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Set question position
     *
     * @param int $position
     * @return QuestionInterface
     */
    public function setPosition(int $position): QuestionInterface
    {
        return $this->setData(self::POSITION, $position);
    }
}
