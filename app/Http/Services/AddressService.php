<?php

namespace App\Http\Services;

class AddressService {
    
    /**
     * This is the main function to format the address as the requirement
     * 3 lines with maximum length for each line maximums 30 characters;
     */
    public function addressFormatter($addresses = []){
        // Initiate object of formated_address
        $formated_address['address1'] = '';
        $formated_address['address2'] = '';
        $formated_address['address3'] = '';
        $index = 1;
        foreach($addresses as $address){
            // Check is the length for current line is less than 30 character  
            if(strlen($formated_address['address'.$index]) < 30){
                // And if the length of the current line is 0, 
                // is mean that the word is a first word for the line. 
                if(strlen($formated_address['address'.$index]) == 0){
                    $formated_address['address'.$index] .= $address;
                }else{
                    $formated_address['address'.$index] .= " ".$address;
                }
            // If is already reach 30 character for the current line
            // move into the next lines.
            }else{
                $index++;
            }
        }

        // Return formated address;
        return $formated_address;
    }

    /**
     * This function is used to merge all line of address
     */
    public function mergeFormatAddress($addresses = []){
        $merged_address = ''; // Initiate variable
        foreach ($addresses as $address) {
            // If the address is not empty string or null
            // append string to initation var
            if($address != '' && $address != null){
                // If the initate variable fill with not empty string,
                // append a white space to $merged_address variables then the words;
                if($merged_address != ''){
                    $merged_address .= " ".$address;
                }else{
                    $merged_address .= $address;
                }
            }
        }

        // Explode the long string with white space delimiter as an array list;
        return explode(" ", $merged_address);
    }

    /**
     * This function is to validate length of the length of all address lines
     */
    public function validateLength($addresses = []){
        $total_length = 0;
        foreach($addresses as $address){
            $total_length += strlen($address);
        }

        if($total_length > 90 || $total_length <= 0){
            return false;
        }else{
            return true;
        }
    }
}