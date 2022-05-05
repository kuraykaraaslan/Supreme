<?php

namespace Kuraykaraaslan\Supreme;

/**
 * @see \Kuraykaraaslan\Supreme\Skeleton\SkeletonClass
 */
class SupremeSEO
{

    private static $title = null;
    private static $description = null;
    private static $keywords = null;

    static public function setTitle($title)
    {
        self::$title = $title;
    }

    static public function setDescription($description)
    {
        return $description;
    }

    static public function setKeywords($keywords)
    {
        return $keywords;
    }

    static public function generate()
    {
        $response = '';
        if (self::$title) {
            $response .= '<title>' . self::$title . ' - ' . Supreme::settings('app.title') . '</title>';
        } else {
            $response .= '<title>' . Supreme::settings('app.title') . '</title>';
        }
        if (self::$description) {
            $response .= '<meta name="description" content="' . self::$description . '">';
        } else {
            $response .= '<meta name="description" content="' . Supreme::settings('app.description') . '">';
        }
        if (self::$keywords) {
            $response .= '<meta name="keywords" content="' . self::$keywords . '">';
        } else {
            $response .= '<meta name="keywords" content="' . Supreme::settings('app.keywords') . '">';
        }
        if (Supreme::settings('app.favicon')) {
            $response .= '<link rel="icon" href="' . Supreme::settings('app.favicon') . '">';
        }
        return $response;
    }
}
