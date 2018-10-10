<?php

namespace Enovision\Lightbox;

use System\Classes\PluginBase;

use Enovision\Lightbox\Classes\LightboxImagesMiddleware;

class Plugin extends PluginBase
{

    public function registerComponents()
    {
        return [
            'Enovision\Lightbox\Components\Lightbox' => 'lightBox'
        ];
    }

    public function register()
    {
    }

    /**
     * Register TWIG extensions
     * @return array
     */
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'lightbox' => [$this, 'applyLightbox']
            ]
        ];
    }

    public function applyLightbox($content)
    {

    }
}
