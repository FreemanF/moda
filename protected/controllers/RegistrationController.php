<?php

class RegistrationController extends MetaController
{
    public $layout         = '//layouts/news';
    public $side_content = '';
    public $page_content = '';
    const onPage = 4;
    
    public function actionIndex(){
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'=>'tender',
            'is_published'=>1,
            'is_delete'=>0
        ));
        $this->side_content = $this->model->side_content;
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
            
        $this->breadcrumbs[] = 'Новости';
        if (isset($this->model->meta))
            $this->pushMeta(array(
                'title'       => $this->model->meta['e_title'],
                'keywords'    => $this->model->meta['e_keywords'],
                'description' => $this->model->meta['e_description']
            ));
            
//        $criteria = array();
//        $totalItemCount = News::model()->count($criteria);
//        $this->dataProvider=new CActiveDataProvider('News',array(
//            'criteria'       => $criteria,
//            'totalItemCount' => $totalItemCount,
//            'pagination'     =>array(
//                //Количество отзывов на страницу
//                'pageSize'=> self::onPage,
//                'pageVar'=>'page',
//            ),
//        ));
        
        $this->render('index');
    }
    
    public function actionSendt(){
    $Fail = false;
        if(Yii::app()->request->isPostRequest){
            $login = '';
            $name = '';
            $lastname = '';
            $secname = '';
            $mail = '';
            $site = '';
            $phone =  '';
            $organisation = '';
            $post = '';
            $capcha = '';
            $login = $_POST['login'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $secname = $_POST['secname'];
            $mail = $_POST['mail'];
            $site = $_POST['site'];
            $phone =  $_POST['phone'];
            $organisation =  $_POST['organisation'];
            $post =  $_POST['post'];
            $capcha =  $_POST['capcha'];
            
            
            $subject = 'Заявление на регистрацию на сайте от : '.$name;
            $s_message = "<br/><br/>Заявка на регистрацию пользователя<br/><br/>"
                    . "Логин: ".$login."<br/>"
                    . "Имя: ".$name
                    . "<br>"
                    . "Фамилия: ".$lastname
                    . "<br>"
                    . "Отчество: ".$secname
                    . "<br>"
                    . "E-mail: ".$mail
                    . "<br>"
                    . "Сайт: ".$site
                    . "<br>"
                    . "Телефон: ".$phone
                    . "<br>"
                    . "Наименование организации: ".$organisation
                    . "<br>"
                    . "Должность: ".$post
                    . "<br>"
                    . "<br>\n";
            

            
            if( ($phone != '') && ($name != '') && ($login != '') && ($lastname != '') && ($mail != '') && ($organisation != '')){
                if (Message::SendMail($s_message,'Заявка на регистрацию', Setting::getParam('admin-email', 'freemanf@bk.ru'),'krontif@noreply.ru')) {
                    $user = new \Users;
                    $user->us_login = $login;
                    $user->us_name = $name;
                    $user->us_family = $lastname;
                    $user->us_otchestvo = $secname;
                    $user->us_phone = $phone;
                    $user->us_email = $mail;
                    $user->us_site = $site;
                    $user->us_organization = $organisation;
                    $user->us_profession = $post;
                    if ($user->save()){
                        Yii::log('ERRORS: '.print_r($user->getErrors(),true));
                        $Result = array('status' => 'success');
                        echo json_encode($Result);
                        Yii::app()->end();
//                        $this->redirect('/');
//                        $this->refresh();
                    } else {
                        Yii::log('ERRORS: '.print_r($user->getErrors(),true));
                        $Result = array('status' => 'error');
                        echo json_encode($Result);
//                        $this->redirect('/');
                        $user->unsetAttributes();
                        Yii::app()->end();
//                        $this->refresh();
                    }
//                    $Result = 'success';
//                    echo json_encode($Result);
//                    Yii::app()->end();
//                    $this->redirect('/');
//                    $this->refresh();
                }
            }else{
//                $settings->unsetAttributes();
//                $Fail = 'Не корректная операция';
//                $this->redirect('/');
//                $this->refresh();
                  $Result = array('status' => 'error');
                  echo json_encode($Result);
                  $user->unsetAttributes();
                  Yii::app()->end();
            }
            
        }
    }
    
    public function actionTestLog(){
    $Result = array('status' => 'error');
        if(Yii::app()->request->isPostRequest){
            $login = $_POST['login'];
            if ($login !== ''){
                $usr = Users::model()->find('t.us_login = "'.$login.'"');
                if ($usr){
                    $Result = array('status' => 'error');
                    echo json_encode($Result);
                    Yii::app()->end();
                } else {
                    $Result = array('status' => 'success');
                    echo json_encode($Result);
                    Yii::app()->end();
                }
            }
        }
    }

    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
}