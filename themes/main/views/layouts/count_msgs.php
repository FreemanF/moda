<div id="counter_div">
    <div id="ajax_count">
                <?php
                $message_list = Messages::model()->findAllByAttributes(array('ms_recipient'=>Yii::app()->user->id,'ms_readed'=>0));
                if (!empty($message_list))
                {
                    $count_new_messages = count($message_list);
                    echo "<span class='b-header-links__counter'>$count_new_messages</span>";
                }
                ?>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('feed-updater', '
    function updater() {
        $("#counter_div").load("'.$this->createUrl('msg/ajaxcount').' #ajax_count", function(){
            setTimeout(updater, 15000);
        });
    }
    setTimeout(updater, 15000);
    console.log("updated");

');