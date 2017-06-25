<?php

class m140715_182833_opinion_module extends KpdMigration
{
    public static $moduleObject = Object::idVote;
    public static $moduleAlias  = 'Vote';
    
    const  visitorTable = '{{visitor}}';
    
    const  opinionTable = '{{opinion}}';
    const  prefix1  = 'pn';
    const  prefix1_ = 'pn_';
    
    const  answerTable = '{{answer}}';
    const  prefix2  = 'aw';
    const  prefix2_ = 'aw_';
    
    const  voteTable = '{{vote_answer}}';
    const  prefix3  = 'vt';
    const  prefix3_ = 'vt_';
    
    
    public static $dependences = array(self::visitorTable);
    public $dropped = array(self::voteTable,self::answerTable,self::opinionTable);
    //public $dropLists = array('AI');
    
    public function safeUp()
    {
        parent::safeUp();
        
        if ( ! $this->checkDependence(self::visitorTable))
            throw new Exception('Не найдена таблица "Посетителей". Невозможно установить модуль "Опросов"');
        
        $this->createKpdModule('Опросы'); // Голосования
        
        $columns = array(
            self::prefix1.'id'=> self::PK,
            self::prefix1_.'name' => self::STR('Наименование'),
            'dt_start' => self::DATETIME('Начало опроса',null),
            'dt_final' => self::DATETIME('Окончание опроса',null),
            'is_published' => self::BOOLEAN('Публиковать',false),
            self::prefix1_.'answer_min' => self::INT('Наименьшее число ответов',1),
            self::prefix1_.'answer_max' => self::INT('Наибольшее число ответов',1),
        );
        $this->createTable(self::opinionTable, $columns, $this->getOptions('Вопросы'));

        $columns = array(
            self::prefix2.'id'=> self::PK,
            self::prefix2_.'opinion' => self::INT('Вопрос'),
            self::prefix2_.'sort' => self::INT('Номер ответа'),
            self::prefix2_.'name' => self::STR('Текст ответа'),
        );
        $this->createTable(self::answerTable, $columns, $this->getOptions('Возможные ответы'));
        $this->addForeignKey('FK_ANSWER_OPINION', self::answerTable, self::prefix2_.'opinion', 
                self::opinionTable, self::prefix1.'id', 'CASCADE', 'CASCADE');
        
        $columns = array(
            self::prefix3_.'opinion' => self::INT('Вопрос'),
            self::prefix3_.'visitor' => self::INT('Посетитель'),
            self::prefix3_.'answer'  => self::INT('Ответ'),
        );
        $this->createTable(self::voteTable, $columns, $this->getOptions('Ответы посетителей'));
        $this->addPrimaryKey('PK_VOTE', self::voteTable, 
            self::prefix3_.'opinion, '.
            self::prefix3_.'answer, '.
            self::prefix3_.'visitor');
        $this->addForeignKey('FK_VOTE_OPINION', self::voteTable, self::prefix3_.'opinion', 
                self::opinionTable, self::prefix1.'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_VOTE_ANSWER', self::voteTable, self::prefix3_.'answer', 
                self::answerTable, self::prefix2.'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_VOTE_VISITOR', self::voteTable, self::prefix3_.'visitor', 
                self::visitorTable, 'id', 'CASCADE', 'CASCADE');
    }
}
