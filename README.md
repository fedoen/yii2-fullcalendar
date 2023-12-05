# yii2-fullcalendar
Fullcalendar port to yii2

## Download

Yii2-fullcalendar can be installed using composer.
Add the following lines to composer.json

```json
    "repositories": [
        ...
        {
            "type": "vcs",
            "url": "https://github.com/fedoen/yii2-fullcalendar.git"
        }
        ...
    ]
```

Run following command to download and
install Yii2-fullcalendar:

```bash
composer require fedoen/yii2-fullcalendar
```

Example usage
## Example

In your view file:

```php
<?php

use fedoen\fullcalendar\widgets\FullCalendarWidget;

?>
<?=

FullCalendarWidget::widget([
    'options' => [
// Calendar options
// For example:
        'initialView' => 'dayGridMonth',
        'locale' => 'ro',
        'headerToolbar' => [
            'start' => 'prev,next today',
            'center' => 'title',
            'end' => 'dayGridMonth,timeGridWeek,timeGridDay',
        ],
    ],
    'events' => [
// Calendar events
// For example:
        [
            'title' => 'Event 1',
            'start' => '2022-01-01',
        ],
        [
            'title' => 'Event 2',
            'start' => '2022-01-05',
        ],
    ],
])
?>
```
