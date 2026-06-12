<?php

namespace Tests\Feature;

use App\Actions\DestroyProduct;
use App\Livewire\Modals\ProductModal;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_action_delete_product_(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        DestroyProduct::run($product->id);

        $this->assertDatabaseMissing('products', [
            'user_id' => $user->id
        ]);
    }

    public function test_action_cannot_delete_another_user_product(): void
    {
        $owner = User::factory()->create();
        $product = Product::factory()->create(['user_id' => $owner->id]);
        $attacker = User::factory()->create();

        $this->actingAs($attacker);

        Livewire::test(ProductModal::class, ['product' => $product])
            ->call('delete')
            ->assertForbidden();

        $this->assertDatabaseHas('products', ['id' => $product->id]);

    }
}
