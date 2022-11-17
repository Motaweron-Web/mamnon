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
        return app('firebase.firestore')->database()->collection($this->model)->document($id)->snapshot();
    }

    public function where($key,$operator,$value)
    {
        $model = app('firebase.firestore')->database()->collection($this->model)->where($key,$operator,$value);

        return $model;
    }

    public function orderBy($data)
    {
        $model = app('firebase.firestore')->database()->collection($this->model)->orderBy($data);

        return $model;
    }

    public function create(array $data)
    {
        $document_id = app('firebase.firestore')->database()->collection($this->model)->newDocument();
        $addedDoc = $document_id->set($data);
        if($addedDoc){
            return $document_id->id();
        }
       return 0;
    }

    public function update($data)
    {
        $array_to_update = [];
        $model = app('firebase.firestore')->database()->collection($this->model)->document($data['id']);

        unset($data['id']);
        if(!$model)
            return null;

        foreach($data as $key => $value) {
         $array_to_update[] = ['path' => $key, 'value' => $value];
        }
//        dd($array_to_update);
        $model->update($array_to_update);

        return true;
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
