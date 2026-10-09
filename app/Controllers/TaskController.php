<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    // Welcome page (/) - showing only today's tasks
    public function index()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTodaysTasks();
        return view('welcome_message', $data);
    }

    // Task List page (/tasks) - showing every task ordered by date
    public function listAll()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getAllTasksOrdered();
        return view('task_list', $data);
    }

    // Profile page (/profile) - showing the single demo user record
    public function profile()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->getDemoUser();
        return view('profile', $data);
    }

    // About page (/about) - static page identifying you as the developer
    public function about()
    {
        return view('about');
    }

    // Add New Task Form (/tasks/new)
    public function new()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return view('tasks/create');
    }

    // Process New Task Creation with Validation
    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $rules = [
            'title'     => 'required|min_length[3]',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('tasks/create', [
                'validation' => $this->validator
            ]);
        }

        $model = new TaskModel();
        $model->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks');
    }

    // Edit Task Page
    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $model = new TaskModel();
        $data['task'] = $model->find($id);

        if (!$data['task']) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('tasks/edit', $data);
    }

    // Update Task Process with Validation
    public function update($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $rules = [
            'title'     => 'required|min_length[3]',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            $model = new TaskModel();
            $data['task'] = $model->find($id);
            $data['validation'] = $this->validator;
            return view('tasks/edit', $data);
        }

        $model = new TaskModel();
        $model->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks');
    }

    // Soft Delete Task (Setting is_archived = 1)
    public function delete($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $model = new TaskModel();
        $model->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks');
    }
}