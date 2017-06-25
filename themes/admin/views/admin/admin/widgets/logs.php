<div class="widget-holder">
    <div class="widget-flipper">
        <div class="widget-area widget-latest-users widget-front">
            <div class='widget-tip-template'>
                <div class='text-section'>
                    <span class='user-name'></span>
                    <span class='user-location'></span>
                    <span class='user-info'></span>
                </div>
            </div>

            <div class="widget-head">
                Протокол изменений
                <div>
                    <img src="<?php echo $this->themeImages.'photon/w_latest@2x.png'; ?>" alt="Протокол изменений"/>
                </div>
            </div>
            <ul>
                <?php
                    $logs = Log::model()->findAll(array(
                        'limit' => 5,
                    ));
                    if ( !empty($logs) )
                        foreach ($logs as $log)
                            echo '
                                <li>
                                    <span data-name="'.$log->z_name.'" 
                                          data-type="'.Object::getPlural($log->z_object_type).'" 
                                          data-event="'.$log->event->l_name.'" 
                                          data-date="'.Comportable::str_date_format($log->dt_event, 'd.m.Y').'&nbsp;&nbsp;'.Comportable::str_date_format($log->dt_event, 'H:i').'">'.
                                        Comportable::html_mb_substr($log->z_name, 0, 25).'
                                    </span> 
                                    <div>'.Comportable::timeAgo(strtotime($log->dt_event)).'</div>
                                </li>';
                ?>
            </ul>
        </div>
    </div>
</div>