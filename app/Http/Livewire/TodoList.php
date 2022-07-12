<?php

namespace App\Http\Livewire;

use App\Models\TodoList as TodoItem;
use Livewire\Component;

class TodoList extends Component
{
    public $todos;
    public string $todoText = '';

    public function mount()
    {
        $this->selectTodos();
    }

    protected $rules = [
        'todoText' => 'required|min:6',
       
    ];

    public function addTodo()
    {
        $this->validate();
        $todo = new TodoItem();
        $todo->todo = $this->todoText;
        $todo->completed = false;
        $todo->save();

        $this->todoText = '';
        $this->selectTodos();
        session()->flash('message', 'Todo Item Inserted successfully');
    }

    public function toggleTodo($id)
    {
        $todo = TodoItem::where('id', $id)->first();

        if(!$todo) {
            return;
        }

        $todo->completed = !$todo->completed;
        $todo->save();
        $this->selectTodos();
    }

    public function deleteTodo($id)
    {
        $todo = TodoItem::where('id', $id)->first();

        if(!$todo) {
            return;
        }

        $todo->delete();
        $this->selectTodos();
    }



    public function render()
    {
        return view('livewire.todo-list');
    }

    public function selectTodos()
    {
        $this->todos = TodoItem::orderBy('created_at', 'desc')->get();
    }
}
