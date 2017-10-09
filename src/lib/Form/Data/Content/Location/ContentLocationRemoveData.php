<?php

declare(strict_types=1);

namespace EzSystems\EzPlatformAdminUi\Form\Data\Content\Location;

use eZ\Publish\API\Repository\Values\Content\ContentInfo;
use Symfony\Component\Validator\Constraints as Assert;

class ContentLocationRemoveData
{
    /**
     * @Assert\NotBlank()
     * @var ContentInfo|null
     */
    public $contentInfo;

    /**
     * @todo add more validation constraints
     *
     * @Assert\NotBlank()
     *
     * @var array
     */
    public $locations;

    /**
     * @param ContentInfo|null $contentInfo
     * @param array $selectedLocations
     */
    public function __construct(
        ?ContentInfo $contentInfo = null,
        array $selectedLocations = []
    ) {
        $this->contentInfo = $contentInfo;
        $this->locations = $selectedLocations;
    }

    /**
     * @return ContentInfo|null
     */
    public function getContentInfo(): ?ContentInfo
    {
        return $this->contentInfo;
    }

    /**
     * @param ContentInfo|null $contentInfo
     */
    public function setContentInfo(?ContentInfo $contentInfo)
    {
        $this->contentInfo = $contentInfo;
    }

    /**
     * @return array
     */
    public function getLocations(): array
    {
        return $this->locations;
    }

    /**
     * @param array $locations
     */
    public function setLocations(array $locations)
    {
        $this->locations = $locations;
    }
}
