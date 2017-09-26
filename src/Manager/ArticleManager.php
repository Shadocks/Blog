<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 25/09/2017
 * Time: 11:03
 */

namespace App\Manager;

use Core\Database;
use App\Model\Article;

class ArticleManager
{
    private $_db;

    public function __construct()
    {
        $this->_db = new Database();
    }

    public function hydrate(array $data)
    {
        $article = new Article();
        $article->setId($data['id']);
        $article->setTitle($data['titre']);
        $article->setIntro($data['chapo']);
        $article->setAuthor($data['auteur']);
        $article->setContent($data['contenu']);
        $article->setDating($data['date_creation']);
        $article->setDateUpdate($data['date_modification']);

        return $article;
    }

    public function getAll()
    {
        $articles = [];

        $req = $this->_db->getDb()->query('
            SELECT id, titre, chapo, auteur, contenu, date_creation, date_modification
            FROM article
            ORDER BY id
            DESC
            ');

        while ($data = $req->fetch()){
            $articles [] = $this->hydrate($data);
        }

        return $articles;
    }

    public function getById($id)
    {
        $req = $this->_db->getDb()->prepare('SELECT * FROM article WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();

        $data = $req->fetch();

        return $this->hydrate($data);
    }

    public function add(array $data)
    {
        $article = $this->hydrate($data);

        $req = $this->_db->getDb()->prepare('
            INSERT INTO article (titre, chapo, date_creation, contenu, auteur) 
            VALUE (:title, :intro, NOW(), :content, :author)
            ');

        $req->bindValue(':title', $article->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':intro', $article->getIntro(), \PDO::PARAM_STR);
        $req->bindValue(':content', $article->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':author', $article->getAuthor(), \PDO::PARAM_STR);

        $req->execute();
    }

    public function update(array $data)
    {
        $article = $this->hydrate($data);

        $req = $this->_db->getDb()->prepare('
            UPDATE article 
            SET titre = :title, chapo = :intro, auteur = :author, contenu = :content, date_modification = NOW()  
            WHERE id = :id
            ');

        $req->bindValue(':title', $article->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':intro', $article->getIntro(), \PDO::PARAM_STR);
        $req->bindValue(':author', $article->getAuthor(), \PDO::PARAM_STR);
        $req->bindValue(':content', $article->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':id', $article->getId(), \PDO::PARAM_INT);

        $req->execute();
    }

    public function delete($id)
    {
        $req = $this->_db->getDb()->prepare('DELETE FROM article WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();
    }
}