<?php namespace App\Controller;

use KrisanAlfa\Kraken\Controller\NormController;
use Slim\Exception\Stop;
use Exception;

class AskController extends NormController
{
    public function create()
    {
        $entry = $this->getCriteria();

        if ($this->request->isPost()) {
            try {
                $entry  = array_merge($entry, $this->request->post());
                $model  = $this->collection->newInstance();
                $result = $model->set($entry)->save();

                $entry = $model;

                h('notification.info', $this->clazz.' created.');

                h('controller.create.success', array(
                    'model' => $model
                ));
            } catch (Stop $e) {
                throw $e;
            } catch (Exception $e) {
                h('notification.error', $e);

                h('controller.create.error', array(
                    'model' => $model,
                    'error' => $e,
                ));
            }
        }

        $this->data['entry'] = $entry;
    }
}
