<?php
/**
 * Created by PhpStorm.
 * User: STOK
 * Date: 14/06/2019
 * Time: 6:21 PM
 */

namespace App\Classes;


class VideoHelper
{
    private static $currentId = 1;

    public static function getVideoTag( $videoURL, $videoLoop = false, $videoAddControls = true, $autoplayDesktop = false,
                                        $autoplayMobile = false, $videoBackground = false, $class = "" )
    {
        if (empty($videoURL)) {
            return false;
        }

        // Determine video provider through URL
        if ( strpos( $videoURL, "youtube" ) !== false || strpos( $videoURL, "youtu.be" ) !== false ) {
            $videoSource = "youtube";
        } elseif ( strpos( $videoURL, "vimeo" ) !== false ) {
            $videoSource = "vimeo";

            if ( strpos( $videoURL, "external" ) !== false ) {
                $videoSource = "vimeo-external";
            }
        } elseif ( strpos( $videoURL, ".mp4" ) !== false ) {
            $videoSource = "mp4";
        } else {
            throw new \Exception( "Cannot get video source from URL." );
        }

        // Extract video ID and convert to embed to URL
        if ( $videoSource === "vimeo" ) {
            $videoID = substr( $videoURL, strrpos( $videoURL, "/" ) + 1 );

            $videoURL = "https://player.vimeo.com/video/$videoID?title=0&byline=0&portrait=0";

            if ( $videoLoop ) {
                $videoURL .= "&loop=1";
            }

            if ( $autoplayDesktop ) {
                $videoURL .= "&autoplay=1";
            }

            if ( $videoBackground ) {
                $videoURL .= "&background=1";
            }

            return '<iframe data-autoplayMobile="1" data-autoplay="1" class="hero-iframe-video is-vimeo js-video-iframe is-video-hidden" style="z-index:1;opacity:0.000001;background-color:black"; data-source="vimeo" src="https://player.vimeo.com/external/323460867.hd.mp4?s=6386bff00f0b9898e3fb3b84182057fdbcd3117d&profile_id=175" frameborder="0" allow="autoplay; fullscreen"></iframe>';
        } elseif ( $videoSource === "youtube" ) {
            $breakString = "watch?v=";

            if ( strpos( $videoURL, $breakString ) ) {
                $videoID = substr( $videoURL, strpos( $videoURL, $breakString ) + strlen( $breakString ) );
            } else {
                $videoID = substr( $videoURL, strrpos( $videoURL, "/" ) + 1 );
            }

            $videoURL = "https://www.youtube.com/embed/$videoID?rel=0&showinfo=0&controls=0&enablejsapi=1";

            if ( $videoLoop ) {
                $videoURL .= "&loop=1&playlist=$videoID";
            }

            if ( $autoplayDesktop ) {
                $videoURL .= "&autoplay=1";
            }

            if ( isset( $videoAddControls ) && $videoAddControls ) {
                $videoURL = str_replace( "controls=0", "controls=1", $videoURL );
            }

            return sprintf('<iframe data-autoplayMobile="1" data-autoplay="1" class="hero-iframe-video is-yt js-video-iframe" style="opacity:0.000001;background-color:black"; data-source="youtube" src="%s" frameborder="0"></iframe>', $videoURL);
        } elseif ( in_array( $videoSource, array( "vimeo-external", "mp4" ) ) ) {
            $videoLoop = $videoLoop ? "loop" : "";
            $autoplayDesktop = $autoplayDesktop ? "autoplay" : "";

//            return "<video id="video-tag-" . self::$currentId++ . "" class="hero-video js-video-tag " . $class
//            . "" playsinline " . $autoplayDesktop . " muted " . $videoLoop
//            . " style="width:100 %;height:100 %;background - color:black" data-autoplayMobile="" . $autoplayMobile . "">"
//            . "<source src="" . $videoURL . "" type="video / mp4">Your browser does not support the video tag.</video>";
            return '<video class="hero-video js-video-tag" data-autoplayMobile="1" autoplay="autoplay" muted="muted" loop="loop"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></video>';
        }

//        return "<iframe id="video-iframe-" . self::$currentId++ . "" class="js-video-iframe " . $class
//        . "" data-source="" . $videoSource . "" data-autoplay="" . $autoplayDesktop . "" data-autoplayMobile=""
//        . $autoplayMobile . "" frameborder="0" allow="autoplay; fullscreen" src="" . $videoURL
//        . "" style="z-index:1;opacity:0.000001;background-color:black"></iframe>";
    }
}