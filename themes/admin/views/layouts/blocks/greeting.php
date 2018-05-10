<?php 
$greetingTitle = 'Приветствие';
$greeting = '';
if (isset(Yii::app()->session['greeting'])) {
    $greetingTitle = 'Пришло время.';
    $greeting = Yii::app()->session['greeting'];
    unset(Yii::app()->session['greeting']);
} elseif (Yii::app()->user->hasFlash('greeting')) {
    $greeting = Yii::app()->user->getFlash('greeting');
}
if ($greeting) : 
?>
<script type="text/javascript">
$(function(){setTimeout(function(){
    $.pnotify({
        title: '<?php echo $greetingTitle;?>',
        text: "<?php echo CHtml::encode($greeting);?>",
        type: 'info',
        delay: 5000,
        nonblock: true,
        nonblock_opacity: .2
    });
}, 400);});  
</script>
<?php endif;