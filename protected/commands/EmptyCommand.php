<?php 
 
class EmptyCommand extends CConsoleCommand
{
    public $description = 'Сайт Empty.kpd';
    
    private $args;
    
    public function getTasks() {
        return array();
    }
    
    public function run($args)
    {
        $this->args = $args;
        try {
            if(!isset($args[0]))
                    $this->usageError('the configuration file is not specified.');
            $task = ucfirst($args[0]);
            $actiontask = 'action'.$task;
            if (method_exists($this, $actiontask))
                $this->{$actiontask}();
            else throw new Exception('Задача "'.$task.'" не определена');
        } catch (Exception $exc) {
            Yii::log('ERROR:'.$task.':'.$exc->getMessage());
        }
    }

    public function actionClearMedia() {
        set_time_limit(0);
        $rootDir  = dirname(dirname(__DIR__));
        $mediaDir = $rootDir.'/media';
        system('find "'.$mediaDir.'" -type f | grep -v /original/ | sed \'s/.*/"&"/\' | xargs rm');
        system('find "'.$mediaDir.'" -type d -empty -delete');
        system('cp "'.$rootDir.'"/protected/runtime/.gitignore "'.$mediaDir.'/"');
    }
}
