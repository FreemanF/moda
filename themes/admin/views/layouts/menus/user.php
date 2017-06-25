<div class="nav-fixed-topright" style="visibility: hidden">
    <ul class="nav nav-user-menu">
        <li class="user-sub-menu-container">
            <a href="javascript:void(0)" title="Настройки темы">
                <i class="user-icon"></i>
                <span class="nav-user-selection">Настройки темы</span>
                <i class="icon-menu-arrow"></i>
            </a>
            <ul class="nav user-sub-menu">
                <li class="light">
                    <a href="javascript:void(0)">
                        <i class='icon-photon stop'></i>Светлая версия
                    </a>
                </li>
                <li class="dark">
                    <a href="javascript:void(0)">
                        <i class='icon-photon stop'></i>Темная версия
                    </a>
                </li>
            </ul>
        </li>
        <?php 
            if ( Yii::app()->user->checkAccess("Administrator") ) { 
                Yii::app()->getClientScript()->registerPackage('clear');
        ?>
        <li class="user-sub-menu-container">
            <a href="javascript:void(0)" title="Очистить">
                <i class="icon-trash" style="margin-top: -10px"></i>
                <span class="nav-user-selection">Очистить</span>
                <i class="icon-menu-arrow"></i>
            </a>
            <ul class="nav user-sub-menu">
                <li class="clearAssets">
                    <a href="javascript:void(0)">
                        <i class="icon-photon icon-infographic" style="margin-top: -2px"></i>assets
                    </a>
                </li>
                <li class="clearСache">
                    <a href="javascript:void(0)">
                        <i class="icon-photon icon-layers" style="margin-top: -2px"></i>кэш
                    </a>
                </li>
            </ul>
        </li>
        <?php } ?>
    </ul>
</div>

<script>
    $(function(){
        setTimeout(function(){
            $('.nav-fixed-topright').removeAttr('style');
        }, 300);
        
        $(window).scroll(function(){
            if($('.breadcrumb-container').length){
                var scrollState = $(window).scrollTop();
                if (scrollState > 0) $('.nav-fixed-topright').addClass('nav-released');
                else $('.nav-fixed-topright').removeClass('nav-released')
            }
        });
        $('.user-sub-menu-container').on('click', function(){
            $(this).toggleClass('active-user-menu');
        });
        $('.user-sub-menu .light').on('click', function(){
            if ($('body').is('.light-version')) return;
            $('body').addClass('light-version');
            setTimeout(function() {
                $.cookie('themeColor', 'light', {
                    expires: 7,
                    path: '/'
                });
            }, 500);
        });
        $('.user-sub-menu .dark').on('click', function(){
            if ($('body').is('.light-version')) {
                $('body').removeClass('light-version');
                $.cookie('themeColor', 'dark', {
                    expires: 7,
                    path: '/'
                });
            }
        });
    });
</script>

