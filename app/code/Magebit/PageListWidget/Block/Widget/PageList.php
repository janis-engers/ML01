<?php
/**
 * This file is part of the Magebit package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Cms\Model\PageFactory;
use Magento\Cms\Helper\Page as PageHelper;

/**
 * Block responsible for displaying list of CMS page links.
 */
class PageList extends Template implements BlockInterface
{
    /** @var string */
    protected $_template = 'page-list.phtml';

    public function __construct(
        Template\Context $context,
        private PageFactory $pageFactory,
        private PageHelper $pageHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get list title from widget configuration.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->getData('title');
    }

    /**
     * Get list of CMS page identifiers from widget configuration.
     *
     * @return string[]
     */
    public function getPages(): array
    {
        if ($pages = $this->getData('selected_pages')) {
            return explode(',', $pages);
        }

        return [];
    }

    /**
     * Get CMS page data by identifier.
     *
     * @param string $identifier
     *
     * @return array|null
     */
    public function getPageData(string $identifier): ?array
    {
        $page = $this->pageFactory->create()->load($identifier, 'identifier');

        if (!$page->getId()) {
            return null;
        }

        return [
            'title' => $page->getTitle(),
            'url' => $this->pageHelper->getPageUrl($identifier),
        ];
    }
}
