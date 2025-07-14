<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Http\Resources\VendorResource;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VendorController extends Controller
{
    public function register(VendorRequest $request)
    {
        try {
            $vendor = Vendor::create($request->validated());

            return (new VendorResource($vendor));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function getVendors()
    {
        $vendors = Vendor::all();
        return response()->json($vendors);
    }
}
