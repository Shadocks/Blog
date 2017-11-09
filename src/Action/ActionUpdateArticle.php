<?php

namespace App\Action;


use App\Form\FormUpdate;
use App\Manager\ArticleManager;
use Core\FormFactory;
use Core\Twig;

/**
 * Class ActionUpdateArticle
 * @package App\Action
 */
class ActionUpdateArticle
{
    /**
     * @var Twig
     */
    private $twig;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var ArticleManager
     */
    private $articleManager;

    /**
     * ActionUpdateArticle constructor.
     */
    public function __construct() {
        $this->twig = new Twig();
        $this->formFactory = new FormFactory();
        $this->articleManager = new ArticleManager();
    }

    /**
     * @param $id
     */
    public function __invoke($id)
    {
        $form = $this->formFactory->buildForm(FormUpdate::class);
            $article = $this->articleManager->getById($id);
                $this->formFactory->data($article);

        echo $this->twig->getTwig()->render('articleUpdate.html.twig', ['form' => $form, 'article' => $article]);


        if ($_POST) {
            $this->formFactory->request($_POST);
                $this->articleManager->update($this->formFactory->getData());
                    header('Location: /article/detail/'.$id);
        }
    }
}
