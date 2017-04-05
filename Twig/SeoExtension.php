<?php
namespace Rudak\SeoBundle\Twig;

use Rudak\SeoBundle\Core\HtmlPatterns;
use Rudak\SeoBundle\Core\MetaBuilder;
use Twig_Extension;
use Twig_SimpleFunction;

class SeoExtension extends Twig_Extension
{

    private $meta;

    public function __construct(MetaBuilder $metaBuilder)
    {
        $this->meta = $metaBuilder->getMetaObject();
    }

    public function getFunctions()
    {
        $option = ['is_safe' => ['html']];
        return [
            new Twig_SimpleFunction('seo_title', [$this, 'getTitle'], $option),
            new Twig_SimpleFunction('seo_description', [$this, 'getDescription'], $option),
            new Twig_SimpleFunction('seo_author', [$this, 'getAuthor'], $option),
            new Twig_SimpleFunction('seo_og_title', [$this, 'getOgTitle'], $option),
            new Twig_SimpleFunction('seo_og_description', [$this, 'getOgDescription'], $option),
            new Twig_SimpleFunction('seo_og_image', [$this, 'getOgImage'], $option),
            new Twig_SimpleFunction('seo_og_type', [$this, 'getOgType'], $option),
            new Twig_SimpleFunction('seo_og_type', [$this, 'getOgType'], $option),
            new Twig_SimpleFunction('seo_og_locale', [$this, 'getOgLocale'], $option),
            new Twig_SimpleFunction('seo_fb_app_id', [$this, 'getFbAppId'], $option),
            new Twig_SimpleFunction('seo_all', [$this, 'getAllMetas'], $option),
        ];
    }

    /**
     * Renvoie le meta title avec les données de l'objet Meta
     * @return string
     */
    public function getTitle()
    {
        return sprintf(HtmlPatterns::getTitlePattern(), $this->meta->getTitle());
    }

    public function getDescription()
    {
        return sprintf(HtmlPatterns::getDescriptionPattern(), $this->meta->getDescription());
    }

    public function getAuthor()
    {
        return sprintf(HtmlPatterns::getAuthorPattern(), $this->meta->getAuthor());
    }

    public function getOgTitle()
    {
        return sprintf(HtmlPatterns::getOgTitlePattern(), $this->meta->getOgTitle());
    }

    public function getOgDescription()
    {
        return sprintf(HtmlPatterns::getOgDescriptionPattern(), $this->meta->getOgDescription());
    }

    public function getOgType()
    {
        return sprintf(HtmlPatterns::getOgTypePattern(), $this->meta->getOgType());
    }

    public function getOgImage()
    {
        return sprintf(HtmlPatterns::getOgImagePattern(), $this->meta->getOgImage());
    }

    public function getOgLocale()
    {
        return sprintf(HtmlPatterns::getOgLocalePattern(), $this->meta->getOgLocale());
    }

    public function getFbAppId()
    {
        return sprintf(HtmlPatterns::getFbAppIdPattern(), $this->meta->getFbAppId());
    }

    public function getAllMetas()
    {
        $out = sprintf(HtmlPatterns::getTitlePattern(), $this->meta->getTitle()) . "\n";
        $out .= sprintf(HtmlPatterns::getDescriptionPattern(), $this->meta->getDescription()) . "\n";
        $out .= sprintf(HtmlPatterns::getAuthorPattern(), $this->meta->getAuthor()) . "\n";
        $out .= sprintf(HtmlPatterns::getOgTitlePattern(), $this->meta->getOgTitle()) . "\n";
        $out .= sprintf(HtmlPatterns::getOgDescriptionPattern(), $this->meta->getOgDescription()) . "\n";
        $out .= sprintf(HtmlPatterns::getOgTypePattern(), $this->meta->getOgType()) . "\n";
        $out .= sprintf(HtmlPatterns::getOgImagePattern(), $this->meta->getOgImage());
        $out .= sprintf(HtmlPatterns::getOgLocalePattern(), $this->meta->getOgLocale()) . "\n";
        $out .= sprintf(HtmlPatterns::getFbAppIdPattern(), $this->meta->getFbAppId()) . "\n";
        return $out;
    }
}