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

use Magento\Cms\Api\Data\PageInterface;
use Magento\Cms\Api\PageRepositoryInterface as PageRepository;
use Magento\Cms\Helper\Page as PageHelper;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Block responsible for displaying list of CMS page links.
 */
class PageList extends Template implements BlockInterface
{
    /** @var string */
    protected $_template = 'page-list.phtml';

    /**
     * @param Template\Context $context
     * @param PageRepository $pageRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param PageHelper $pageHelper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        private PageRepository $pageRepository,
        private SearchCriteriaBuilder $searchCriteriaBuilder,
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
     * @return PageInterface[]
     */
    public function getPages(): array
    {
        $pages = $this->getData('selected_pages');

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('identifier', $pages, 'in')
            ->create();

        $items = $this->pageRepository->getList($searchCriteria);
        return $items->getItems();
    }

    /**
     * Get CMS page data by identifier.
     *
     * @param string $identifier
     *
     * @return string|null
     */
    public function getPageUrl(string $identifier): ?string
    {
        return $this->pageHelper->getPageUrl($identifier);
    }
}
