<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FruitsTest extends TestCase
{
    use DatabaseMigrations;

    public function testItPraisesTheFruits()
    {
        $this->get('/api')
            ->seeJson(['Fruits' => 'Delicious and healthy!']);
    }

    /**
     * Test: GET / api/fruits.
     */
    public function testItFetchesFruits()
    {
        $this->seed('FruitsTableSeeder');

        $this->get('/api/fruits')
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'name', 'color', 'weight', 'delicious'
                        ]
                    ]
                ]);
    }

    /**
     * Test: GET /api/fruit/1.
     */
    public function testItFetchesASingleFruit()
    {
        $this->seed('FruitsTableSeeder');

        $this->get('/api/fruit/1')
             ->seeJson([
                'data' => [
                    'id' => 1,
                    'name' => "Apple",
                    'color' => "Green",
                    'weight' => "150 grams",
                    'delicious' => true
                ]
            ]);
    }

    /**
     * Test: GET /api/authenticate
     */
    public function testItAuthenticateAUser()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('foo')]);

        $this->post('/api/authenticate',
            [
                'email' => $user->email,
                'password' => 'foo'
            ])->seeJsonStructure(['token']);
    }

    /**
     * Test: POST /api/fruits.
     */
    public function testItSavesAFruit()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('foot')]);

        $fruit = ['name' => 'peache', 'color' => 'peache', 'weight' => 175, 'delicious' => true];

        $this->post('/api/fruits', $fruit, $this->headers($user))
             ->seeStatusCode(201);
    }

    /**
     * Test: POST /api/fruits.
     */
    public function testIt401sWheNotAuthorized()
    {
        $fruit = App\Fruit::create(
            [
                'name' => 'peache',
                'color' => 'peache',
                'weight' => 175,
                'delicious' => true
            ]
        )->toArray();

        $this->post('/api/fruits', $fruit)
            ->seeStatusCode(401);
    }

    /**
     * Test: POST /api/fruits.
     */
    public function testIt422WhenValidationFails()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('foo')]);

        $fruit = ['name' => 'peache', 'color' => 'peache', 'weight' => 175, 'delicious' => true];

        $this->post('/api/fruits', $fruit, $this->headers($user))
            ->seeStatusCode(201);

        $this->post('/api/fruits', $fruit, $this->headers($user))
            ->seeStatusCode(422);
    }

    /**
     * Test: DELETE /api/fruits/$id.
     */
    public function testItDeletesAFruit()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('foo')]);

        $fruit = App\Fruit::create(['name' => 'peache', 'color' => 'peache', 'weight' => 175, 'delicious' => true]);

        $this->delete('/api/fruits/' . $fruit->id, [], $this->headers($user))
            ->seeStatusCode(204);
    }
}
