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

namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete implements ButtonProviderInterface
{
    public function __construct(
        protected UrlInterface $urlBuilder,
        protected RequestInterface $request
    ) {
    }

    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData(): array
    {
        $id = $this->request->getParam('id');
        if (!$id) {
            return [];
        }

        return [
            'label' => __('Delete'),
            'class' => 'delete',
            'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to delete this item?') . '\', \'' . $this->getDeleteUrl($id) . '\')',
            'sort_order' => 20,
        ];
    }

    /**
     * Get delete url
     *
     * @param int $id
     * @return string
     */
    private function getDeleteUrl($id): string
    {
        return $this->urlBuilder->getUrl('faq/question/delete', ['id' => $id]);
    }
}
