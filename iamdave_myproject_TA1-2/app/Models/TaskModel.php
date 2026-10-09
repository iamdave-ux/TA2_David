<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];

    // Method to grab only today's tasks for the Welcome page
    public function getTodaysTasks()
    {
        return $this->where('task_date', date('Y-m-d'))->findAll();
    }

    // Method to grab all tasks ordered by date for the Task List page
    public function getAllTasksOrdered()
    {
        return $this->orderBy('task_date', 'ASC')->findAll();
    }
}