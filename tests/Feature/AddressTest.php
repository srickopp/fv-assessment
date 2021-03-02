<?php

namespace Tests\Feature;

use Tests\TestCase;

class AddressTest extends TestCase
{
    /**
     * A Test for format valid address
     *
     * @return void
     */
    public function testFormatValidAddress()
    {
        $response = $this->post('api/question3',[
            "address1" => "Jl. Locari No.17, Krajan, Sumbersekar, Kec. Dau, Malang, Jawa Timur 65151",
            "address2" => "Hayo siapa",
            "address3" => "Yang"
        ]);
        $response->assertStatus(200);
    }

    /**
     * A Test for format invalid address
     *
     * @return void
     */
    public function testFormatInvalidAddress()
    {
        $response = $this->post('api/question3',[
            "address1" => "Jl. Locari No.17, Krajan, Sumbersekar, Kec. Dau, Malang, Jawa Timur 65151",
            "address2" => "It will we to long address",
            "address3" => "So it must be return an error"
        ]);
        $response->assertStatus(400);
    }


}
