<?php

namespace Tests\Feature;

use App\Actions\CreateNewProduct;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
   public function test_action_create_product(): void
   {

       $user = User::factory()->create();
       $this->actingAs($user);

       CreateNewProduct::run([
           'product_name' => 'Milk',
           'allowed' => true,
           'comment' => 'kaif'
       ]);

       $this->assertDatabaseHas('products',[
           'title' => 'Milk',
           'user_id' => $user->id
       ]);
   }

    public function test_action_create_product_fail(): void
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $this->expectException(\ErrorException::class);

        CreateNewProduct::run([
            'allowed' => true,
            'comment' => 'kaif'
        ]);

        $this->assertDatabaseMissing('products',[
            'user_id' => $user->id
        ]);
    }
}
