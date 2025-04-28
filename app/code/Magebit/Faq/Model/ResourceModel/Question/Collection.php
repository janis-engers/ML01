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

namespace Magebit\Faq\Model\ResourceModel\Question;

use Magebit\Faq\Model\Question;
use Magebit\Faq\Model\ResourceModel\Question as QuestionResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * FAQ Question Collection
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Question::class, QuestionResource::class);
    }
}
