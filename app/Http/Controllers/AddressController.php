<?php

namespace App\Http\Controllers;

use App\Http\Lib\ResponseFormatter;
use App\Http\Requests\AddressRequest;
use App\Http\Services\AddressService;

class AddressController extends Controller
{

    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    /**
     * This function will handled about format address
     * @param AddressRequest $request
     */
    public function addressFormatter(AddressRequest $request){
        // Validate the request
        $validated_request = $request->validated();
        $addresses = [$validated_request['address1'], $validated_request['address2'], $validated_request['address3']];
        // Validate addreess length
        $validate_address = $this->addressService->validateLength($addresses);

        // If the address is 0 or more than 90 charcter return error response;
        if(!$validate_address){
            return ResponseFormatter::error(null, 'INVALID_ADDREESS', 400);
        }
        
        // Merge all addresses line;
        $merge_address = $this->addressService->mergeFormatAddress($addresses);

        // Format address;
        $format_address = $this->addressService->addressFormatter($merge_address);
        return ResponseFormatter::success($format_address, 'SUCCESS');

    }
}
