<?php
namespace Rudak\SeoBundle\Core;

class HtmlPatterns
{
    public static function getTitlePattern()
    {
        return "<title>%s</title>";
    }

    public static function getDescriptionPattern()
    {
        return '<meta name="description" content="%s">';
    }

    public static function getAuthorPattern()
    {
        return '<meta name="author" content="%s">';
    }

    public static function getImagePattern()
    {
        return '<meta property="og:image" content="%s" />';
    }

    public static function getOgTypePattern()
    {
        return '<meta property="og:type" content="%s" />';
    }

    public static function getOgTitlePattern()
    {
        return '<meta property="og:title" content="%s" />';
    }

    public static function getOgDescriptionPattern()
    {
        return '<meta property="og:description" content="%s" />';
    }

    public static function getOgImagePattern()
    {
        return '<meta property="og:image" content="%s" />';
    }

    public static function getOgLocalePattern()
    {
        return '<meta property="og:locale" content="%s" />';
    }

    public static function getFbAppIdPattern()
    {
        return '<meta property="fb:app_id" content="%s" /> ';
    }
}