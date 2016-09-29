<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity()
* @ORM\Table()
*/
class Reply
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @assert\NotBlank()
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @assert\NotBlank()
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     * @assert\NotBlank()

     * @var string
     */
    private $author;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $authorEmail;

    /**
     * @ORM\ManyToOne(targetEntity="Subject", inversedBy="replies")
     * @var string
     */
    private $subject;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $votes;

    public function __construct()
    {
        $this->title = "Nouvelle réponse";
        $this->description = "Description";
        $this->votes = 0;
    }

    /**
     * @return int
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
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @param string $authorEmail
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @return int
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param string $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }
    /**
     * @param string $votes
     */
    public function voteUp()
    {
        $this->votes++;
    }
}