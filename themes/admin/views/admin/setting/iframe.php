<script type="text/javascript">
    if ('saveUpdateDeferred' in window.parent) {
        window.parent.$('#modal-dialog-image').modal('hide');
        window.parent.$('.fileupload.fileupload-exists')
            .removeClass('fileupload-exists')
            .toggleClass('fileupload-new',true)
            .find('.fileupload-preview').text('');
        window.parent.saveUpdateDeferred.resolve({
            type : 4,
            text : '<?php echo CHtml::encode($url);?>'
        });
    }
</script>