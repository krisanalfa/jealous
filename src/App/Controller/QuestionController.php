<?php namespace App\Controller;

use KrisanAlfa\Kraken\Controller\NormController;
use Slim\Exception\Stop;
use Exception;
use Norm\Norm;
use Bono\App;
use App\Entry\Contract\QuestionRepositoryInterface;

class QuestionController extends NormController
{
    protected $question;

    public function __construct(QuestionRepositoryInterface $question)
    {
        $this->question = $question;
    }

    public function create()
    {
        $entry = $this->getCriteria();

        if ($this->request->isPost()) {
            try {
                $entry = $this->question->create(array_merge($entry, $this->request->post()));

                h('controller.create.success', array(
                    'model' => $entry
                ));

                $this->response->redirect('/question/'.$entry->getId());
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

    public function read($id)
    {
        parent::read($id);

        $this->data['tags'] = $this->question->getTags($id);
    }
}
