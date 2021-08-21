<?php

namespace NiceTheme\Providers;

use Plenty\Plugin\Events\Dispatcher;
use IO\Extensions\Functions\Partial;
use NiceTheme\Providers\NiceThemeRouteServiceProvider;
use Plenty\Modules\Webshop\Template\Providers\TemplateServiceProvider;

class NiceThemeServiceProvider extends TemplateServiceProvider
{
    const EVENT_LISTENER_PRIORITY = 99;

    public function boot(Dispatcher $eventDispatcher)
    {
        $this->overrideTemplate("Ceres::Widgets.Header.TopBarWidget", "NiceTheme::Widgets.Header.TopBarWidget");

        $eventDispatcher->listen('IO.init.templates', function (Partial $partial) {
            $partial->set('head', 'NiceTheme::PageDesign.Partials.Head');
        }, self::EVENT_LISTENER_PRIORITY);
    }
}