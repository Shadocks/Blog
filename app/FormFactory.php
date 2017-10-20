<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 27/09/2017
 * Time: 13:47
 */

namespace Core;

use App\Model\Article;

class FormFactory
{
    private $data;
    private $entity;

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

    public function getData()
    {
        return $this->data;
    }

    public function request(array $request)
    {
        if ($this->entity != null) {
            $this->entity->setTitle($request['title']);
            $this->entity->setIntro($request['intro']);
            $this->entity->setAuthor($request['author']);
            $this->entity->setContent($request['content']);
        }

        if ($this->data != null) {
            $this->data->setTitle($request['title']);
            $this->data->setIntro($request['intro']);
            $this->data->setAuthor($request['author']);
            $this->data->setContent($request['content']);
        }
    }

    public function getEntity()
    {
        return $this->entity;
    }
}