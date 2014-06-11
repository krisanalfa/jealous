<?php namespace App\Entry\Contract;


interface QuestionTagsRepositoryInterface
{
    public function create($questionId, array $tagsId);
}
