<?php

class ElFinderConnectorAction extends CAction
{
    /**
     * @var array
     */
    public $settings = array();

    public function run()
    {
        require_once(dirname(__FILE__) . '/php/elFinder.class.php');
        // Протокол подключаем после импорта elFinder.class, т.к. там описан интерфейс elFinderILogger
        $this->settings['logger'] = new elFinderLogger();
        $fm = new elFinder($this->settings);
        $fm->run();

    }
}
