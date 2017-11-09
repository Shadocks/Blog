<?php

namespace Core;

use App\Model\Article;

/**
 * Class FormFactory
 * @package Core
 */
class FormFactory
{
    /**
     * @var
     */
    private $data;

    /**
     * @var
     */
    private $entity;

    /**
     * @param $form
     * @return mixed
     */
    public function buildForm($form)
    {
        return new $form();
    }

    public function data($entries)
    {
        if ($entries instanceof Article) {
            $this->data = $entries;
        } else if ($entries['class']){
            $this->entity = new $entries['class'];
        }
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $request
     */
    public function request(array $request)
    {
        if ($this->entity !== null) {
            $this->entity->setTitle($request['title']);
            $this->entity->setIntro($request['intro']);
            $this->entity->setAuthor($request['author']);
            $this->entity->setContent($request['content']);
        }

        if ($this->data !== null) {
            $this->data->setTitle($request['title']);
            $this->data->setIntro($request['intro']);
            $this->data->setAuthor($request['author']);
            $this->data->setContent($request['content']);
        }
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
