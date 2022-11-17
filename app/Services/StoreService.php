<?php

namespace App\Services;

use App\Repositories\StoreRepository;
use Google\Cloud\Core\Timestamp;
use Illuminate\Support\Facades\Auth;
use DateTime;

class StoreService
{
    private StoreRepository $storeRepository;

    /**
     * @param StoreRepository $storeRepository
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function all()
    {
        return $this->storeRepository->all();
    }

    public function store($request)
    {

       $store_found = count($this->storeRepository->where('phoneNumber',"=",$request->phoneNumber)->limit(1)->documents()->rows());
       if($store_found){
           return 422 ; // store found in database status
       }
        $data['coverImagePath'] = '';
        $data['logoImagePath'] = '';
        if($request->file('coverImagePath')) {
            $data['coverImagePath'] = upload_file($request->file('coverImagePath'),'stores/');
        }
        if($request->file('logoImagePath')) {
            $data['logoImagePath'] = upload_file($request->file('logoImagePath'),'stores/');
        }
        $data =[
            "address" => (object)[
                    'closestLandmark'=>$request->closestLandmark,
                    'district'=> $request->district,
                    'governorate' => $request->governorate,
                    'location'=> [$request->longitude.'° N', $request->lat.'° E']
            ],
            'coverImagePath' =>$data['logoImagePath'],
            'createdDate' => new Timestamp(new DateTime()),
            'created_by' => Auth::user()->firestore_user_id,
            'deliveryCost' => $request->deliveryCost,
            'description' => "",
            'favCount' => 0,
            'fbCount' => 0,
            "filters" => (object)[],
            'igCount' => 0,
            'isPageStore'=> false,
            'locationCount' => 0,
            'logoImagePath' =>$data['logoImagePath'],
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'phoneNumberCount' => 0,
            'publicId' => "Store_l860tdy4",
            'socialMedia' => $request->socialMedia,
            'status' => 0,
            'storeCategoryId' =>'',
            'storeCurrency' => $request->storeCurrency,
            'storeSubCategoryId' => '',
            'subscriptionDate' => new Timestamp(new DateTime()),
            'subscriptionType' => 0,
            'type' => '',
            'viewCount' => 0,
            'wpCount'=> 0
        ];
        $store = $this->storeRepository->create($data);
        if($store){
            return 201;
        }
        return 0;
    }

}
