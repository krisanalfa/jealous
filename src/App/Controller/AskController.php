<?php namespace App\Controller;

use KrisanAlfa\Kraken\Controller\NormController;
use Slim\Exception\Stop;
use Exception;
use Norm\Norm;
use Bono\App;

class AskController extends NormController
{
    public function initialize(App $app, $uri)
    {
        parent::initialize($app, $uri);

        $this->collection = Norm::factory('Question');
    }

    public function create()
    {
        $entry = $this->getCriteria();

        if ($this->request->isPost()) {
            try {
                $entry  = array_merge($entry, $this->request->post());
                
                $model  = $this->collection->newInstance();
                $tagsId = array();
                $tags = array();

                if (isset($entry['tags'])) {
                    $tags = explode(',', $entry['tags']);
                }
                
                $tagsCollection = Norm::factory('Tags');
                foreach ($tags as $key => $value) {
                    $value = trim($value);

                    if ($value !== '') {
                        $criteria = array('name' => $value);
                        $checkTags = $tagsCollection->findOne($criteria);
                        if (is_null($checkTags)) {
                            $tag = $tagsCollection->newInstance();
                            $tag->set($criteria);
                            $tag->save();
                            $checkTags = $tag;
                        }

                        $tagsId[] = $checkTags->getId();
                    }
                }

                unset($entry['tags']);
                $result = $model->set($entry)->save();

                if (! empty($tagsId)) {
                    foreach ($tagsId as $key => $value) {
                        $questionTagsCollection = Norm::factory('QuestionTags');
                        $questionTags = $questionTagsCollection->newInstance();
                        $questionTags->set('tag_id', $value);
                        $questionTags->set('question_id', $model->getId());
                        $questionTags->save();
                    }
                }

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
