    <?php

class MiniGalleryController extends CRUDController
{
    public    $modelClass   = 'MiniGallery';
    public    $is_published = true;
    public    $date_column  = false;
    public    $defaultContentType = false;
    protected $_pageTitle   = 'Список мини галерей';
    
    public function setDefaultAttributes() {
        if ($this->is_published)
            $this->model->is_published  = 1;
        $this->_pageTitle = 'Добавление записи';
        return;
    }
    
    public function beforeUpdate() {
        $this->_pageTitle = 'Редактирование записи';
        return true;
    }
    
    public function getIndexColumns() {
        $columns = parent::getIndexColumns();
        $this->insertColumn($columns, 2, array(
           'header' => 'Код вставки',
           'name'   => 'code',
           'value'  => '"{miniGallery:".$data->mgid."}"',
           'filter' => false,
        ));
        return $columns;
    }
}
