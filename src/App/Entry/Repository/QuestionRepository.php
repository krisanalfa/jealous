<?php namespace App\Entry\Repository;

use App\Entry\Contract\QuestionRepositoryInterface;
use App\Entry\Contract\TagsRepositoryInterface;
use App\Entry\Contract\QuestionTagsRepositoryInterface;
use Norm\Norm;

class QuestionRepository implements QuestionRepositoryInterface
{
    protected $collection;
    protected $tags;
    protected $questionTags;

    public function __construct(TagsRepositoryInterface $tags, QuestionTagsRepository $questionTags)
    {
        $this->collection   = Norm::factory('Question');
        $this->tags         = $tags;
        $this->questionTags = $questionTags;
    }

    public function getTags($id)
    {
        $tags = array();

        foreach ($this->questionTags->find(array('question_id' => $id)) as $questionTag) {
            $tag = $this->tags->findOne($questionTag->get('tag_id'));

            if ($tag) {
                $tags[] = $tag;
            }
        }

        return $tags;
    }

    public function create($entry)
    {
        $model  = $this->collection->newInstance();
        $tagsId = $this->tags->create($entry['tags']);

        unset($entry['tags']);

        $result = $model->set($entry)->save();

        $this->questionTags->create($model->getId(), $tagsId);

        return $model;
    }

    public function __call($method, $args)
    {
        $collection = $this->collection;

        return call_user_func_array(array($collection, $method), $args);
    }
}
