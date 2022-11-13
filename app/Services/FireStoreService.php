<?php

namespace App\Services;

use App\Repositories\Base\FirestoreRepository;

class FireStoreService
{
    private FirestoreRepository $firestoreRepository;

    public function __construct(FirestoreRepository $firestoreRepository)
    {
        $this->firestoreRepository = $firestoreRepository;
    }

    public function index(Request $request)
    {
        return $this->firestoreRepository->all();
    }

    public function show($id)
    {
        return $this->firestoreRepository->find($id);
    }
}
