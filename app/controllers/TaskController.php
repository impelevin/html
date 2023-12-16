<?php

namespace Controllers;

use Core\Controller;
use Core\Exceptions\CSRFException;
use Models\Task;
use Utils\CSRF;
use Utils\FlashMassages;
use Utils\OldFormData;
use Utils\Request;
use Rakit\Validation\Validator;
use Utils\Response;

class TaskController extends Controller
{
    public function index()
    {
        $params = (new Request)->only(['page', 'order_col', 'order_status']);

        $this->render('tasks/list', [
            'tasks' => Task::getList($params)
        ]);
    }

    public function create()
    {
        $this->render('tasks/form', [
            'title' => 'Create New Task',
            'csrf' => (new CSRF)->token(),
            'data' => (new OldFormData)->get()
        ]);
    }

    public function store()
    {
        $request = new Request();

        if (!(new CSRF)->check($request->find('csrf_token'))) {
            throw new CSRFException();
        }

        $formData = $request->only(['username', 'email', 'description']);

        $validation = (new Validator)
            ->validate($formData, Task::getValidationRules());

        if ($validation->fails())
            $this->backWithError($validation, $formData);

        $task = Task::create($formData);

        FlashMassages::push(FlashMassages::SUCCESS, 'Success');

        (new Response)->redirect('/');
    }

    public function show(int $id)
    {
        $data = Task::findOrFail($id)->toArray();

        if ($oldData = (new OldFormData)->get())
            $data = array_merge($data, $oldData);

        $this->render('tasks/form', [
            'title' => "Show Task {$data['id']}",
            'csrf' => (new CSRF)->token(),
            'data' => $data
        ]);
    }

    public function update(int $id)
    {
        $request = new Request();

        if (!(new CSRF)->check($request->find('csrf_token'))) {
            throw new CSRFException();
        }

        $formData = $request->only(['username', 'email', 'description', 'complated']);

        $validation = (new Validator)
            ->validate($formData, Task::getValidationRules());

        if ($validation->fails())
            $this->backWithError($validation, $formData);

        Task::updateTask($id, $formData);

        FlashMassages::push(FlashMassages::SUCCESS, 'Updated Success');

        (new Response)->back();
    }

    private function backWithError($validation, $formData)
    {
        $errorList = $validation->errors()->firstOfAll();
        FlashMassages::push(FlashMassages::ERROR, array_shift($errorList));

        OldFormData::save($formData);

        (new Response)->back();
    }
}