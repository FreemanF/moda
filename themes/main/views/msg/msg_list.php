<?php
//echo var_dump($data->messages);
//Yii::app()->end();
$userName = '';
if (!empty($data))
{
    $user_recipient = Users::model()->findByPk($data->ms_recipient);
    
    $msg = $data;
//    foreach ($data as $key => $msg) {
        $class_my = ' ';
        if ( $data->sender->usid == Yii::app()->user->id )
        {
            $class_my = 'b-messages__item_type_my';
            $usID = $data->sender->usid;
            $userName = $data->sender->usid;
            $userName = $data->sender->us_name;
        }
        if ($data->recipient->usid == Yii::app()->user->id){
            $class_my = '';
//            }
//            $user_recipient = $data->recipient;
            $usID = $data->recipient->usid;
            $userName = $data->recipient->us_name;
//            Yii::app()->end();
        }

        echo '<li class="b-messages__item '.$class_my.'" id="last-message" style="list-style:none;">
                                    <a class="b-messages__image-link" href="/m/'.$msg->msid.'">
                                        <span class="b-messages__image-wrapper">
                                            <img src="https://image.flaticon.com/icons/png/128/145/145845.png" class="b-messages__image" alt="'.$userName.'">
                                        </span>
                                    </a>
                                    <div class="b-messages__info">
                                        <time class="b-messages__time"
                                              datetime="'.$msg->dt_start.'"
                                              title="'.$msg->dt_start.'">
                                            26 мая
                                        </time>

                                        <a class="b-messages__link" href="/m/'.$usID.'">'.$data->sender->us_name.'</a>

                                        <div class="b-messages__text">
                                            <p>'.$msg->content_long.'</p>
                                        </div>';
        
        $attachments = Attachment::model()->findAll('at_message='.$data->msid);
        if (!empty($attachments)){
                ?>

                                                <p class="b-messages__photos-title">Вложения:</p>
                                                <ul class="b-messages__photos-list js-gallery-magnific">
                                                    <?php
                                                    foreach ($attachments as $attach => $image_one) {
                                                        ?>
                                                    
                                                    <li class="b-messages__photos-item">
                                                        <a href="<?php echo Yii::app()->getBaseUrl()."/uploads/".$msg->msid.'/'.$image_one->at_name; ?>" target="_blank" class="b-messages__photos-link js-gallery-magnific-item">
                                                            <span class="b-messages__photos-wrapper">
                                                                <img src="<?php echo Yii::app()->getBaseUrl()."/uploads/".$msg->msid.'/'.$image_one->at_name; ?>" data-src="<?php echo Yii::app()->getBaseUrl()."/uploads/".$msg->msid.'/'.$image_one->at_name; ?>" class="b-messages__photos-image js-lazy-img lazy-loaded">
                                                                <noscript>
                                                                    <img src="<?php echo Yii::app()->getBaseUrl()."/uploads/".$msg->msid.'/'.$image_one->at_name; ?>"
                                                                     class="b-messages__photos-image">
                                                                </noscript>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            
                    <?php
                                   echo '</div>';
//                                       $attachments = Attachment::model()->findAll('at_message='.$data->msid);
//                                        if (!empty($attachments)){
                                            //foreach ($attachments as $attach => $image_one) {
                                            //    echo "<img src='".Yii::app()->getBaseUrl()."/uploads/".$image_one->at_name."' style='height:70px;width:auto;'/>";
                                            //}
                                        //}
                               echo '</li>';

//        $replye = Replyes::model()->findAllByAttributes(array('rp_message'=>$msg->msid));
//        echo print_r($replye,true);
//        Yii::app()->end();
        
//        if(!empty($replye))
//        {
//        //$class_my = 'b-messages__item_type_my';
//            
//            foreach ($replye as $all => $one) {
//                if ($one->rp_sender == Yii::app()->user->id)
//                {
//                    $class_my = 'b-messages__item_type_my';
//                } else {
//                    $class_my = '';
//                }
//                echo '<li class="b-messages__item '.$class_my.'" id="last-message">
//                            <a class="b-messages__image-link" href="/m/'.$one->rpid.'">
//                                <span class="b-messages__image-wrapper">
//                                    <img src="https://image.flaticon.com/icons/png/128/145/145845.png" class="b-messages__image" alt="Avatar">
//                                </span>
//                            </a>
//                            <div class="b-messages__info">
//                                <time class="b-messages__time"
//                                      datetime="'.$one->dt_start.'"
//                                      title="'.$one->dt_start.'">
//                                    '.$one->dt_start.'
//                                </time>
//
//                                <a class="b-messages__link" href="/m/'.$one->rpid.'">'.$msg->recipient->us_name.'</a>
//
//                                <div class="b-messages__text">
//                                    <p>'.$one->content_long.'</p>
//                                </div>
//
//
//                            </div>
//                        </li>';
//            }
//        }
//    }
}

?>