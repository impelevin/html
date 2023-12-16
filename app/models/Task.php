<?php

namespace Models;

use Core\Model;

class Task extends Model
{
    const DEFAULT_PER_PAGE = 3;

    protected $fillable = ['complated', 'username', 'email', 'description', 'description_updated'];

    protected $casts = [
        'created' => 'datetime',
        'complated' => 'datetime',
        'description_updated' => 'datetime',
    ];

    public static function getList(array $params)
    {
        $params = self::parseParams($params);

        $query = self::query();

        $query->orderBy($params['order_col'], $params['order_status'] ? 'desc' : 'asc');

        $paginate = $query->paginate(self::DEFAULT_PER_PAGE, ['*'], 'page', $params['page'])
            ->appends($params)
            ->toArray();

        return [
            'items' => $paginate['data'],
            'links' => $paginate['links'],
            'params' => [
                'order' => [
                    'col' => $params['order_col'],
                    'status' => $params['order_status']
                ],
                'current_page' => $params['page']
            ],
        ];
    }


    public static function updateTask(int $id, array $data)
    {
        $task = Task::findOrFail($id);

        if (!empty($data['complated']) && !$task->complicated) {
            $data['complated'] = time();
        }

        $task->fill($data);

        if ($task->isDirty('description'))
            $task->description_updated = time();

        $task->save();
    }

    public static function getValidationRules()
    {
        return [
            'email' => 'required|email|max:100',
            'username' => 'required|max:20',
            'description' => 'required|max:255',
        ];
    }

    private static function parseParams(array $params): array
    {
        if (empty($params['page']))
            $params['page'] = 1;

        if (empty($params['order_col']))
            $params['order_col'] = 'complated';

        if (empty($params['order_status']))
            $params['order_status'] = false;

        return $params;
    }
}