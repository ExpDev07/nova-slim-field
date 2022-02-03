<?php

namespace ExpDev07\NovaSlimField;

use Laravel\Nova\Fields\Image;

class Slim extends Image
{

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'slim-field';

    /**
     * Whether the image is croppable.
     *
     * @var bool
     */
    protected $cropable = true;

    /**
     * The image ratio.
     *
     * @var string
     */
    protected $ratio;

    /**
     * The image size.
     *
     * @var string
     */
    protected $size;

    /**
     * Sets whether the image is croppable.
     *
     * @param bool $cropable
     * @return Slim
     */
    public function cropable(bool $cropable = true): Slim
    {
        $this->cropable = $cropable;

        return $this;
    }

    /**
     * Sets the image ratio. Null means free ratio.
     *
     * @param ?string $ratio
     * @return $this
     */
    public function ratio(?string $ratio = null): Slim
    {
        $this->ratio = $ratio;

        return $this;
    }

    /**
     * Sets the image ratio. Null means free size.
     *
     * @param ?string $size
     * @return $this
     */
    public function size(?string $size = null): Slim
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Prepare the field element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'cropable' => $this->cropable,
            'ratio' => $this->ratio,
            'size' => $this->size,
        ]);
    }

}
