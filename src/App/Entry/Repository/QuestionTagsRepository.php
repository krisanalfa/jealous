<?php namespace App\Entry\Repository;

use App\Entry\Contract\QuestionTagsRepositoryInterface;
use Norm\Norm;

class QuestionTagsRepository implements QuestionTagsRepositoryInterface
{
    public function __construct()
    {
        $this->collection = Norm::factory('QuestionTags');
    }

    public function create($questionId, array $tagsId)
    {
        foreach ($tagsId as $key => $value) {
            $questionTags = $this->collection->newInstance();

            $questionTags->set('tag_id', $value);
            $questionTags->set('question_id', $questionId);

            $questionTags->save();
        }
    }

    public function __call($method, $args)
    {
        $collection = $this->collection;

        return call_user_func_array(array($collection, $method), $args);
    }
}
