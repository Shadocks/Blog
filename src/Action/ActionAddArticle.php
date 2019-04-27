<?php

namespace App\Action;


use App\Form\FormAdd;
use App\Model\Article;
use App\Manager\ArticleManager;
use Core\FormFactory;
use Core\Twig;

/**
 * Class ActionAddArticle
 * @package App\Action
 */
class ActionAddArticle
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
     * ActionAddArticle constructor.
     */
    public function __construct()
    {
        $this->twig = new Twig();
        $this->formFactory = new FormFactory();
        $this->articleManager = new ArticleManager();
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke()
    {
        $form = $this->formFactory->buildForm(FormAdd::class);
        $this->formFactory->data(['class' => Article::class]);

        if ($_POST) {
            $this->articleManager->add($this->formFactory->getEntity());
                header('Location: /articles');
        }

        echo $this->twig->getTwig()->render('articleAdd.html.twig', ['form' => $form]);
    }
}
