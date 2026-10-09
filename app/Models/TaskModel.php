<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'task_date', 'status', 'is_archived'];

    // Method to grab only today's active tasks for the Welcome page
    public function getTodaysTasks()
    {
        $today = date('Y-m-d');
        return $this->where('task_date', $today)
                    ->where('is_archived', 0)
                    ->findAll();
    }

    // Method to grab all active tasks ordered by date for the Task List page
    public function getAllTasksOrdered()
    {
        return $this->where('is_archived', 0)
                    ->orderBy('task_date', 'ASC')
                    ->findAll();
    }
}