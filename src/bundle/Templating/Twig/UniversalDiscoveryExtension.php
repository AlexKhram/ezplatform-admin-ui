<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace EzSystems\EzPlatformAdminUiBundle\Templating\Twig;

use EzSystems\EzPlatformAdminUi\UniversalDiscovery\ConfigResolver;
use Twig_Extension;
use Twig_SimpleFunction;

class UniversalDiscoveryExtension extends Twig_Extension
{
    /** @var ConfigResolver */
    protected $udwConfigResolver;

    /**
     * @param ConfigResolver $udwConfigResolver
     */
    public function __construct(
        ConfigResolver $udwConfigResolver
    ) {
        $this->udwConfigResolver = $udwConfigResolver;
    }

    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction(
                'ez_udw_config',
                [$this, 'renderUniversalDiscoveryWidgetConfig'],
                ['is_safe' => ['json']]
            ),
        ];
    }

    /**
     * @param string $configName
     * @param array $context
     *
     * @return string
     */
    public function renderUniversalDiscoveryWidgetConfig(string $configName, array $context = [])
    {
        $config = $this->udwConfigResolver->getConfig($configName, $context);

        $udwConfig = [
            'multiple' => $config['multiple'],
            'activeTab' => $config['active_tab'],
            'visibleTabs' => $config['visible_tabs'],
            'selectedItemsLimit' => $config['selected_items_limit'],
            'startingLocationId' => $config['starting_location_id'],
            'searchResultsPerPage' => $config['search']['results_per_page'],
            'allowContainersOnly' => $config['containers_only'],
            'cotfAllowedLanguages' => $config['content_on_the_fly']['allowed_languages'],
            'cotfPreselectedContentType' => $config['content_on_the_fly']['preselected_content_type'],
            'cotfAllowedContentTypes' => $config['content_on_the_fly']['allowed_content_types'],
            'cotfPreselectedLocation' => $config['content_on_the_fly']['preselected_location'],
            'cotfAllowedLocations' => $config['content_on_the_fly']['allowed_locations'],
        ];

        return json_encode($udwConfig);
    }
}
