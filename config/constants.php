<?php

return [

    'commands' => [
        'bbb' => [
            'restart_bigbluebutton' => 'bbb-conf --restart',
            'stop_bigbluebutton' => 'bbb-conf --stop',
            'start_bigbluebutton' => 'bbb-conf --start',
            'clean_bigbluebutton' => 'bbb-conf --clean',
            'check_bigbluebutton' => 'bbb-conf --check',
        ]
    ]

];
