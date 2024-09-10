<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'completed',
    ];

    public static function storeTask($request)
    {
        try {
            Task::create($request->validated());
            return redirect()->back()->with('success', 'Task inserted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add new task');
        }
    }

    public static function updateTask($id)
    {
        try {
            $task = Task::find($id);
            $task->complete = 1;
            $task->save();
            return redirect()->route('task.index')->with('success', 'Task updated successfully');
        } catch (Exception $e) {
            return redirect()->route('task.index')->with('error', 'Failed to Update Task');
        }    
    }

    public static function deleteTask($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();
            return redirect()->route('task.index')->with('success', 'Task deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('task.index')->with('error', 'Failed to Delete Task');
        }  
    
    }
}
