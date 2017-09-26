<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 25/09/2017
 * Time: 11:03
 */

namespace App\manager;

use Core\Database;
use App\model\Article;

class ArticleManager
{
    private $_db;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->_db = $db;
    }

    public function hydrate(array $data)
    {}

    public function getAll()
    {
        $articles = [];

        $req = $this->_db->getConnection()->query('
            SELECT id, titre, chapo, contenu, date_creation, date_modification
            FROM article
            ORDER BY id
            DESC
            ');

        while ($data = $req->fetch()){
            $articles [] = $data;
        }

        return $articles;
    }

    public function getById($id)
    {
        $req = $this->_db->getConnection()->prepare('SELECT * FROM article WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();
    }

    public function add(Article $article)
    {
        $req = $this->_db->getConnection()->prepare('
            INSERT INTO article (titre, chapo, date_creation, date_modification, contenu, auteur) 
            VALUE (NULL, :title, :intro, :dating, :dateUpdate, :content, :author)
            ');

        $req->bindValue(':title', $article->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':intro', $article->getIntro(), \PDO::PARAM_STR);
        $req->bindValue(':dating', $article->getDating(), \PDO::PARAM_STR);
        $req->bindValue(':dateUpdate', $article->getDateUpdate(), \PDO::PARAM_STR);
        $req->bindValue(':content', $article->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':author', $article->getAuthor(), \PDO::PARAM_STR);

        $req->execute();
    }

    public function update(Article $article)
    {
        $req = $this->_db->getConnection()->prepare('
            UPDATE article 
            SET titre = :title, chapo = :intro, auteur = :author, contenu = :content, date_modification = :dateUpdate  
            WHERE id = :id
            ');

        $req->bindValue(':title', $article->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':intro', $article->getIntro(), \PDO::PARAM_STR);
        $req->bindValue(':author', $article->getAuthor(), \PDO::PARAM_STR);
        $req->bindValue(':content', $article->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':dateUpdate', $article->getDateUpdate(), \PDO::PARAM_STR);

        $req->execute();
    }

    public function delete(Article $article)
    {
        $req = $this->_db->getConnection()->prepare('DELETE FROM article WHERE id = :id');

        $req->bindValue(':id', $article->getId(), \PDO::PARAM_INT);

        $req->execute();
    }
}