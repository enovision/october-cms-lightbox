<?php
namespace Enovision\Lightbox\Components;

use Illuminate\Support\Facades\App;
use Enovision\Lightbox\Classes\Helpers;


class Lightbox extends \Cms\Classes\ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Lightbox',
            'description' => 'Display a lightbox, if required'
        ];
    }

    public function onRender()
    {
    }

    public function onRun()
    {
        $filterService = App::make('Enovision\FilterService');
        $filterService->add_filter('content_lightbox', [Helpers::class, 'contentLightbox'], 10, 1);

        $this->addJs('/plugins/enovision/lightbox/assets/jsOnlyLightbox/js/lightbox.js');
        $this->addCss('/plugins/enovision/lightbox/assets/jsOnlyLightbox/css/lightbox.css');
    }

}