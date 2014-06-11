<?php namespace App\Entry\Repository;

use App\Entry\Contract\TagsRepositoryInterface;
use Norm\Norm;

class TagsRepository implements TagsRepositoryInterface
{
    public function __construct()
    {
        $this->collection = Norm::factory('Tags');
    }

    public function create($tags)
    {
        $tags       = array_filter(explode(',', $tags));
        $tagsId     = array();
        $collection = $this->collection;

        foreach ($tags as $key => $value) {
            $value     = trim($value);
            $criteria  = array('name' => $value);
            $checkTags = $collection->findOne($criteria);

            if (is_null($checkTags)) {
                $tag = $collection->newInstance();

                $tag->set($criteria);
                $tag->save();

                $checkTags = $tag;
            }

            $tagsId[] = $checkTags->getId();
        }

        return $tagsId;
    }

    public function __call($method, $args)
    {
        $collection = $this->collection;

        return call_user_func_array(array($collection, $method), $args);
    }
}
