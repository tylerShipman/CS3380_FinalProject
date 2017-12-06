<?php
	require('TasksModel.php');
	require('TasksViews.php');

	class TasksController {
		private $model;
		private $views;

		private $orderBy = '';
		private $view = '';
		private $action = '';
		private $message = '';
		private $data = array();

		public function __construct() {
			$this->model = new TasksModel();
			$this->views = new TasksViews();

			$this->view = $_GET['view'] ? $_GET['view'] : 'tasklist';
			$this->action = $_POST['action'];
		}

		public function __destruct() {
			$this->model = null;
			$this->views = null;
		}

		public function run() {
			if ($error = $this->model->getError()) {
				print $views->errorView($error);
				exit;
			}
<<<<<<< HEAD:Team/TasksController.php
			
			$this->processOrderBy();
=======

			// Note: given order of handling and given processOrderBy doesn't require user to be logged in
			//...orderBy can be changed without being logged in
			$this->processOrderBy();

			$this->processLogout();
>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php

			switch($this->action) {
				case 'delete':
					$this->handleDelete();
					break;
				case 'set_completed':
					$this->handleSetCompletionStatus('completed');
					break;
				case 'set_not_completed':
					$this->handleSetCompletionStatus('not completed');
					break;
				case 'add':
					$this->handleAddTask();
					break;
				case 'edit':
					$this->handleEditTask();
					break;
				case 'update':
					$this->handleUpdateTask();
					break;
				
			}

			switch($this->view) {
<<<<<<< HEAD:Team/TasksController.php
=======
				case 'loginform':
					print $this->views->loginFormView($this->data, $this->message);
					break;
>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php
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
<<<<<<< HEAD:Team/TasksController.php
		
=======

		private function verifyLogin() {
			if (! $this->model->getUser()) {
				$this->view = 'loginform';
				return false;
			} else {
				return true;
			}
		}

>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php
		private function processOrderby() {
			if ($_GET['orderby']) {
				$this->model->toggleOrder($_GET['orderby']);
			}
		}
<<<<<<< HEAD:Team/TasksController.php
		
		private function handleDelete() {
=======

		private function processLogout() {
			if ($_GET['logout']) {
				$this->model->logout();
			}
		}

		private function handleLogin() {
			$loginID = $_POST['loginid'];
			$password = $_POST['password'];

			list($success, $message) = $this->model->login($loginID, $password);
			if ($success) {
				$this->view = 'tasklist';
			} else {
				$this->message = $message;
				$this->view = 'loginform';
				$this->data = $_POST;
			}
		}

		private function handleDelete() {
			if (!$this->verifyLogin()) return;

>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php
			if ($error = $this->model->deleteTask($_POST['id'])) {
				$this->message = $error;
			}
			$this->view = 'tasklist';
		}

		private function handleSetCompletionStatus($status) {
<<<<<<< HEAD:Team/TasksController.php
=======
			if (!$this->verifyLogin()) return;

>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php
			if ($error = $this->model->updateTaskCompletionStatus($_POST['id'], $status)) {
				$this->message = $error;
			}
			$this->view = 'tasklist';
		}

		private function handleAddTask() {
<<<<<<< HEAD:Team/TasksController.php
=======
			if (!$this->verifyLogin()) return;

>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php
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
<<<<<<< HEAD:Team/TasksController.php
=======
			if (!$this->verifyLogin()) return;

>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php
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
<<<<<<< HEAD:Team/TasksController.php
=======
			if (!$this->verifyLogin()) return;

>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php
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
<<<<<<< HEAD:Team/TasksController.php
	
	
?>
=======
?>
>>>>>>> origin/alex_dev:Examples/MVC Task Manager MutiUser 3 with Prepare/MVC Task Manager MutiUser 3 with Prepare/TasksController.php
