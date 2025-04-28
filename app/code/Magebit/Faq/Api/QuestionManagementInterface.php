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

/**
 * Interface for FAQ question management
 *
 * @api
 * @since 1.0.0
 */
interface QuestionManagementInterface
{
    /**
     * Enable question.
     *
     * @param int $id
     * @return void
     */
    public function enableQuestion(int $id): void;

    /**
     * Disable question.
     *
     * @param int $id
     * @return void
     */
    public function disableQuestion(int $id): void;
}
