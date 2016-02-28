<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="posts")
 **/
class Post
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $title;

    /**
     * @OneToMany(targetEntity="Comment", mappedBy="post", cascade={"persist"})
     */
    protected $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function addComment($comment)
    {
        $this->comments->add($comment);
    }
}
