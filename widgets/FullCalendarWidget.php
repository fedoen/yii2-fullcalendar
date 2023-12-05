<?php

/**
 * This class is used to embed FullCalendar JQuery Plugin to my Yii2 Projects
 * @copyright Frenzel GmbH - www.frenzel.net
 * @link http://www.frenzel.net
 * @author Philipp Frenzel <philipp@frenzel.net>
 *
 */

namespace fedoen\fullcalendar\widgets;

use Yii;
use yii\helpers\Json;
use yii\base\Widget as elWidget;
use fedoen\fullcalendar\assets\FullCalendarAsset;

class FullCalendarWidget extends elWidget
{

    /**
     * @var string HTML div ID to render the calendar into
     */
    public $calendarId = 'calendar';

    /**
     * @var array calendar options
     */
    public $options = [];

    /**
     * @var array calendar events
     */
    public $events = [];

    public function run()
    {
        $this->registerClientScript();
        return $this->render('full-calendar', [
                    'calendarId' => $this->calendarId,
        ]);
    }

    public function registerClientScript()
    {
        $view = $this->getView();
        FullCalendarAsset::register($view);

        $options = Json::encode($this->options);
        $events = Json::encode($this->events);

        $js = <<<JS
                var calendarEl = document.getElementById('{$this->calendarId}');
                var calendar = new FullCalendar.Calendar(calendarEl, $options);
                calendar.render();
                calendar.addEventSource($events);
JS;
        $view->registerJs($js);
    }
}
