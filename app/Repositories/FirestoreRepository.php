<?php

namespace App\Repositories;

use App\Repositories\Base\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FirestoreRepository implements RepositoryInterface
{
    protected $model;


    public function all()
    {
        return app('firebase.firestore')->database()->collection($this->model);
    }

    public function find($id)
    {
        return app('firebase.firestore')->database()->collection($this->model)->document($id);
    }

    public function where(array $data)
    {
        $model = app('firebase.firestore')->database()->collection($this->model)->where($data);

        return $model;
    }

    public function create(array $data)
    {
        $user = app('firebase.firestore')->database()->collection($this->model)->newDocument()->set($data);
       return $user->id;
    }

    public function update(array $data)
    {
        $model = app('firebase.firestore')->database()->collection($this->model)->document($data['id'] ?? 0);
        if(!$model)
            return null;

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        return  app('firebase.firestore')->database()->collection($this->model)->document($id)->delete();
    }


    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

}
