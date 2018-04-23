<?php
use Phalcon\Mvc\View;

class RegisController extends ControllerBase{
  
  public function initialize()
    {
      parent::initialize();
	  $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
	  $this->view->setTemplateAfter('abouts');
	  
    }
	
  public function indexAction(){
	 if($this->request->isPost()){
      $event_name = trim($this->request->getPost('even_name')); // รับค่าจาก form
      $event_date = trim($this->request->getPost('datepicker'));
      $date= date('Y-m-d',strtotime($event_date));
      $event_detail = trim($this->request->getPost('detail_name')); // รับค่าจาก form
      $event_picture = trim($this->request->getPost('event_picture')); // รับค่าจาก form
      $membergis= new Event();
      $membergis->event_name=$event_name;
      $membergis->event_date=$date;
      $membergis->event_detail=$event_detail;
      $membergis->event_picture=$event_picture;
      $membergis->save();
      // var_dump($event_name);
      // exit();
      $this->response->redirect('notlogin');

      
      }
  }
 
}
