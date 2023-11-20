<?php

namespace fedoen\fullcalendar\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */
class FullCalendarAsset extends AssetBundle
{

    /**
     * [$sourcePath description]
     * @var string
     */
    public $sourcePath = '@fedoen/fullcalendar/web';

    /**
     * the language the calender will be displayed in
     * @var string ISO2 code for the wished display language
     */
    public $language = NULL;

    /**
     * [$autoGenerate description]
     * @var boolean
     */
    public $autoGenerate = true;

    /**
     * tell the calendar, if you like to render google calendar events within the view
     * @var boolean
     */
    public $googleCalendar = false;

    /**
     * [$css description]
     * @var array
     */
    public $css = [
        'css/main.css',
    ];

    /**
     * [$js description]
     * @var array
     */
    public $js = [        
        '//cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js',
    ];

    /**
     * [$depends description]
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',       
    ];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        $language = $this->language ? $this->language : Yii::$app->language;
        if (strtoupper($language) != 'EN-US') {
//            $this->js[] = "locales/{$language}.js";
        }

        if ($this->googleCalendar) {
            $this->js[] = 'gcal.js';
        }

        parent::registerAssetFiles($view);
    }
}
