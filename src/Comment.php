<?php

/**
 * @Entity @Table(name="comments")
 **/
class Comment
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $body;

    /**
     * @ManyToOne(targetEntity="Post", inversedBy="comments")
     * @JoinColumn(name="post_id", referencedColumnName="id")
     */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $post->addComment($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getPost()
    {
        return $this->post;
    }
}
