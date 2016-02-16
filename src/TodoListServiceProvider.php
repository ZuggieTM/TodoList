<?php
namespace JesperAndersen\TodoList;

use Illuminate\Support\ServiceProvider;

class TodoListServiceProvider extends ServiceProvider {

    protected $namespace = 'JesperAndersen\TodoList\controllers';

    public function register() {
        $this->app->bind('todolist', function($app) {
            return new TodoLiset;
        });
    }

    public function boot() {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/views', 'todolist');
    }
}