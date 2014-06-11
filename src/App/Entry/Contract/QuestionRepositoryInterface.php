<?php namespace App\Entry\Contract;


interface QuestionRepositoryInterface
{
    public function getTags($id);
    public function create($entry);
}
