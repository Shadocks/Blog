<?php

namespace App\Model;


/**
 * Class Article
 * @package App\Model
 */
class Article
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    private $_title;

    /**
     * @var
     */
    private $_intro;

    /**
     * @var
     */
    private $_author;

    /**
     * @var
     */
    private $_content;

    /**
     * @var
     */
    private $_dating;

    /**
     * @var
     */
    private $_dateUpdate;

    public function __construct()
    {
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = (int) $id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $title = (string) $title;

        if (is_string($title) && strlen($title) <= 255) {
            $this->_title = $title;
        }
    }

    /**
     * @param string $intro
     */
    public function setIntro($intro)
    {
        $intro = (string) $intro;

        if (is_string($intro) && strlen($intro) <= 800) {
            $this->_intro = $intro;
        }
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $author = (string) $author;

        if (is_string($author) && strlen($author) <= 255){
            $this->_author = $author;
        }
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $content = (string) $content;

        if (is_string($content)){
            $this->_content = $content;
        }
    }

    /**
     * @param string $dating
     */
    public function setDating($dating)
    {
        $this->_dating = $dating;
    }

    /**
     * @param string $dateUpdate
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->_dateUpdate = $dateUpdate;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return string
     */
    public function getIntro()
    {
        return $this->_intro;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * @return string
     */
    public function getDating()
    {
        return $this->_dating;
    }

    /**
     * @return string
     */
    public function getDateUpdate()
    {
        return $this->_dateUpdate;
    }
}
