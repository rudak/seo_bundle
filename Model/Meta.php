<?php
namespace Rudak\SeoBundle\Model;

/**
 * Meta
 */
class Meta
{
    private $id;

    private $title;

    private $description;

    private $author;

    private $url;

    private $og_title;

    private $og_description;

    private $og_type;

    private $og_image;

    private $og_locale;

    #TODO: Add alternate locale

    private $fb_app_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getOgTitle()
    {
        return $this->og_title;
    }

    /**
     * @param mixed $og_title
     */
    public function setOgTitle($og_title)
    {
        $this->og_title = $og_title;
    }

    /**
     * @return mixed
     */
    public function getOgDescription()
    {
        return $this->og_description;
    }

    /**
     * @param mixed $og_description
     */
    public function setOgDescription($og_description)
    {
        $this->og_description = $og_description;
    }

    /**
     * @return mixed
     */
    public function getOgType()
    {
        return $this->og_type;
    }

    /**
     * @param mixed $og_type
     */
    public function setOgType($og_type)
    {
        $this->og_type = $og_type;
    }

    /**
     * @return mixed
     */
    public function getOgImage()
    {
        return $this->og_image;
    }

    /**
     * @param mixed $og_image
     */
    public function setOgImage($og_image)
    {
        $this->og_image = $og_image;
    }

    /**
     * @return mixed
     */
    public function getOgLocale()
    {
        return $this->og_locale;
    }

    /**
     * @param mixed $og_locale
     */
    public function setOgLocale($og_locale)
    {
        $this->og_locale = $og_locale;
    }

    /**
     * @return mixed
     */
    public function getFbAppId()
    {
        return $this->fb_app_id;
    }

    /**
     * @param mixed $fb_app_id
     */
    public function setFbAppId($fb_app_id)
    {
        $this->fb_app_id = $fb_app_id;
    }

}

