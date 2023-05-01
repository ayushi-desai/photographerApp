<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Photographer;
use App\Http\Resources\PhotographerResource;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return PhotographerResource::collection(Photographer::all());
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return PhotographerResource::collection(Photographer::where('photographerId', $id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'bio' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $product = Photographer::create($data);
        // return new ProductResource($product);
        return response()->json("Photographer Created");
    }
}
