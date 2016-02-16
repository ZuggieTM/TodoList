<?php
namespace JesperAndersen\TodoList\Http\Controllers;

use App\Http\Controllers\Controller;

class TodoListController extends Controller {

    public function getTodoList() {
        return view('todolist::todolist');
    }
}