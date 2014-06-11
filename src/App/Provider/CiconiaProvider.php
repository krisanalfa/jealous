<?php namespace App\Provider;

use Bono\Provider\Provider;
use Ciconia\Ciconia;
use Ciconia\Extension\Gfm;

/**
 * Basic URI mapping that not handled by NormController
 */
class CiconiaProvider extends Provider
{
    /**
     * Initialize the provider
     *
     * @return void
     */
    public function initialize()
    {
        $app = $this->app;

        $app->kraken->register('ciconia', function() {
            $ciconia = new Ciconia();
            $ciconia->addExtension(new Gfm\FencedCodeBlockExtension());
            $ciconia->addExtension(new Gfm\TaskListExtension());
            $ciconia->addExtension(new Gfm\InlineStyleExtension());
            $ciconia->addExtension(new Gfm\WhiteSpaceExtension());
            $ciconia->addExtension(new Gfm\TableExtension());
            $ciconia->addExtension(new Gfm\UrlAutoLinkExtension());

            return $ciconia;
        });
    }
}
