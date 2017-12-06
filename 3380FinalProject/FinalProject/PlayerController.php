<?php
//Require statements later
require ('PlayerView.php');
require ('PlayerModel.php');

//Controller class
class StatController{
  private $model;
  private $views;

  private $orderby = '';
  private $view = '';
  private $action = '';
  private $message = '';
  private $data = array();

  public function __construct(){
    $this->model = new StatModel();
    $this->view = new StatView();

      $this->view = $_GET['view'] ? $_GET['view'] : 'Statlist';
      $this->action = $_POST['action'];  }

  public function __destruct(){
      $this->model = null;
      $this->views = null;
  }

  public function run(){
    if ($error = $this->model->getError()) {
      print $error;
      exit;
    }

    $this->processOrderBy();

    switch($this->action) {
        case 'delete':
          $this->handleDelete();
          break;
        case 'add':
          $this->handleAddPlayer();
          break;
        case 'edit':
          $this->handleEditPlayer();
          break;
        case 'update':
          $this->handleUpdatePlayer();
          break;
      }

        case 'taskform':
          print $this->views->taskFormView($this->data, $this->message);
          break;
        default: // 'tasklist'
          list($orderBy, $orderDirection) = $this->model->getOrdering();
          list($tasks, $error) = $this->model->getTasks();
          if ($error) {
            $this->message = $error;
          }
          print $this->views->taskListView($tasks, $orderBy, $orderDirection, $this->message);
      }

  }

  private function processOrderby() {
      if ($_GET['orderby']) {
        $this->model->toggleOrder($_GET['orderby']);
      }     
    }
    
    private function handleDelete() {
      if ($error = $this->model->deleteTask($_POST['id'])) {
        $this->message = $error;
      }
      $this->view = 'playerlist';
    }
    
    private function handleAddTask() {
      if ($_POST['cancel']) {
        $this->view = 'tasklist';
        return;
      }
      
      $error = $this->model->addTask($_POST);
      if ($error) {
        $this->message = $error;
        $this->view = 'taskform';
        $this->data = $_POST;
      }
    }
    
    private function handleEditTask() {
      list($task, $error) = $this->model->getTask($_POST['id']);
      if ($error) {
        $this->message = $error;
        $this->view = 'tasklist';
        return;
      }
      $this->data = $task;
      $this->view = 'taskform';
    }
    
    private function handleUpdateTask() {
      if ($_POST['cancel']) {
        $this->view = 'tasklist';
        return;
      }
      
      if ($error = $this->model->updateTask($_POST)) {
        $this->message = $error;
        $this->view = 'taskform';
        $this->data = $_POST;
        return;
      }
      
      $this->view = 'tasklist';
    }


}
?>
