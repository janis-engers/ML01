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

namespace Magebit\Faq\Model\Question\Source;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    /**
     * Get options array
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            [
                'value' => QuestionInterface::ENABLED,
                'label' => __('Enabled'),
            ],
            [
                'value' => QuestionInterface::DISABLED,
                'label' => __('Disabled'),
            ]
        ];
    }
}
