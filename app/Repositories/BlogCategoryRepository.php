<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class BlogCategoryRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить модель для редактирования в админке.
     *
     * @param $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категорий для вывода в выпадающем списке.
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT(id, ". ", title) as id_title'
        ]);

        /*       $result[]=$this->startConditions()->all();
               $result[]=$this
                   ->startConditions()
                   ->select('blog_categories.*',
                       \DB::raw('CONCAT(id, ". ", title) as id_title'))
                   ->toBase()
                   ->get();
       */
        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();
        return $result;
    }

    /**
     * Получить категрии, для вывода пигинатором
     *
     * @param int|null $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {

        $columns = ['id', 'parent_id', 'title'];

        $result = $this->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $result;

    }


}
