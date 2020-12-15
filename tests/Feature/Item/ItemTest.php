<?php

declare(strict_types=1);

namespace Tests\Feature\Item;

use App\Models\Category;
use App\Repository\UserRepository;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @var Category
     */
    protected Category $category;

    public function testCanCreateItem()
    {
        $admin = $this->userRepository->findOneByName('admin');
        $this->actingAs($admin)
            ->visit('/items')
            ->see('Create')
            ->click('Create')
            ->type('Item 1', 'name')
            ->select($this->category->id, 'category_id')
            ->type('1.6', 'price')
            ->type('2', 'quantity')
            ->press('Submit')
            ->seePageIs('/items')
            ->see('Item 1')
            ->see($this->category->name)
            ->see('1.6')
            ->see('2')
        ;
    }

    /**
     * @depends testCanCreateItem
     */
    public function testCanUpdateItem()
    {
        $this->testCanCreateItem();
        $admin = $this->userRepository->findOneByName('admin');
        $this->actingAs($admin)
            ->visit('/items')
            ->see('Item 1')
            ->see('Edit')
            ->click('Edit')
            ->type('Item updated', 'name')
            ->type('2.6', 'price')
            ->type('3', 'quantity')
            ->press('Submit')
            ->seePageIs('/items')
            ->see('Item updated')
            ->see('2.6')
            ->see('3')
        ;
    }

    /**
     * @depends testCanUpdateItem
     */
    public function testCanDeleteItem()
    {
        $this->testCanUpdateItem();
        $admin = $this->userRepository->findOneByName('admin');
        $this->actingAs($admin)
            ->visit('/items')
            ->see('Delete')
            ->see('Item updated')
            ->press('Delete')
            ->seePageIs('/items')
            ->dontSee('Item updated')
        ;
    }

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->userRepository = app(UserRepository::class);
        $this->category = Category::factory()->create();
    }

    protected function tearDown(): void
    {
        $this->category->delete();
        parent::tearDown(); // TODO: Change the autogenerated stub
    }
}
