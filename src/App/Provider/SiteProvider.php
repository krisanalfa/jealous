<?php namespace App\Provider;

use Bono\Helper\URL;
use Bono\Provider\Provider;
use Norm\Norm;

/**
 * Basic URI mapping that not handled by NormController
 */
class SiteProvider extends Provider
{
    /**
     * Initialize the provider
     *
     * @return void
     */
    public function initialize()
    {
        $app = $this->app;

        // When application get request to '/' path
        $app->get('/', function () use ($app) {
            $app->render('site/home');
        });

        $app->get('/ask', function () use ($app) {
            $app->render('site/ask');
        });

        $app->post('/ask', function () use ($app) {
            $app->response->redirect('soon');
        });
    }
}
