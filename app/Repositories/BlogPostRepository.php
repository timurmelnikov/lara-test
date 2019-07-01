<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;

/**
 * Class BlogPostRepository
 *
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
     * (Админка).
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = 25)
    {

        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
            ->select($columns)
            //->with(['user', 'category'])
            ->with([
                // Можно так:
                'category' => function ($q) {
                    $q->select(['id', 'title']);
                },
                // Или так:
                'user:id,name'
            ])
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $result;

    }
}