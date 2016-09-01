<?php

namespace site\components;

class Html extends \yii\helpers\Html{

    /**
     * Render inspinia icon
     *
     * @param string $icon_id
     * @param string $class
     *
     * @return string
     */
    public static function icon($icon_id, $class = ''){
        return self::tag('i', '', ['class' => "fa fa-$icon_id $class"]);
    }

    /**
     * Render loader
     *
     * @param int $size
     * @param string $class
     * @param bool|true $hide
     *
     * @return string
     */
    public static function loader($size = 20, $class = '', $hide = true){
        $content = '';
        for($i = 1; $i <= 4; $i++){
            $content .= self::tag('div', '', ['class' => "s-cube$i s-cube"]) . "\n";
        }
        return self::tag('div', $content, [
            'class' => "s-loader $class",
            'style' => "width: {$size}px; height: {$size}px;" . ($hide ? '; display: none;' : '')
        ]);
    }

}