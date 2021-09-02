<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    // use DatabaseTransactions;
    // use CreatesApplication;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_success()
    {
        $this->withoutExceptionHandling();
        $customers = Customer::all();
        $response = $this->get('customer-index');
        $response->assertViewHas('customers',$customers);
        $response->assertStatus(200);
        $response->assertSee("Nama");
    }

    public function test_create_success()
    {
        $data =[
            'nama' => "ariadi ahmad",
            'email' => "ariadi.ahmadd@gmail.com"
        ];
        $this->withoutExceptionHandling();

        $response = $this->post('customer-store/',$data);
        $response->assertStatus(302);
    }

    /**
     * name parameter is wrong
     * should nama
     * @var string nama
     */
    public function test_create_insert_parameter_wrong_name()
    {
        $data =[
            'name' => "j",
            'email' => "ariadi.ahmadd@gmail.com"
        ];
        // $this->withoutExceptionHandling();

        $response = $this->post('customer-store/',$data);
        $response->assertStatus(500);
    }

    public function test_create_insert_parameter_wrong_email()
    {
        $data =[
            'nama' => "j",
            'emaill' => "ariadi.ahmadd@gmail.com"
        ];
        // $this->withoutExceptionHandling();

        $response = $this->post('customer-store/',$data);
        $response->assertStatus(500);
    }

    public function test_show_edit_success()
    {
        $this->withoutExceptionHandling();

        $customer = Customer::create(
            [
                "name" => "Php indonesia",
                "email" => "php@gmail.com"
            ]
            );
        $response = $this->get(route('customer.edit',$customer->id));
        $response->assertViewHas('customer',$customer);
        $response->assertStatus(200);
    }

    public function test_update_success()
    {
        $this->withoutExceptionHandling();

        $customer = Customer::create([
            'name' => "sasuke",
            'email' => "sasuke@gmail.com",
        ]);

        $data =[
            'nama' => "sasuke",
            'email' => "sasuke4@gmail.com",
        ];

        $response = $this->post(route('customer.update',$customer->id),$data);
        $response->assertStatus(302);
    }

    public function test_delete_success()
    {
        $this->withoutExceptionHandling();
        $customer = Customer::create([
            'name' => "naruto",
            'email' => "naruto@gmail.cm",
        ]);
        $response = $this->get(route('customer.delete',$customer->id));

        $this->assertDatabaseMissing('customers',[
            'name' => "naruto",
            'email' => "naruto@gmail.cm",
        ]);

        $response->assertStatus(302);
    }

    public function test_required_name()
    {
        $data =[
            'nama' => null,
            'email' => null
        ];
        // $this->withoutExceptionHandling();

        $response = $this->post('customer-store/',$data);
        $response->assertSessionHasErrors();

    }




}
