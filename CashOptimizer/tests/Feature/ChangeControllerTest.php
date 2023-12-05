<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ChangeControllerTest extends TestCase
{
    /**
     * Teste le rendu de monnaie pour le montant de 10 $.
     */
    public function testChangeFor10()
    {
        $response = $this->post('/calculate-change', ['amount' => 10]);
        $response->assertStatus(200);
        $response->assertSee('1 billet de 10 €');
    }

    /**
     * Teste le rendu de monnaie pour le montant de 11 $.
     */
    public function testChangeFor11()
    {
        $response = $this->post('/calculate-change', ['amount' => 11]);
        $response->assertStatus(200);
        $response->assertSee('1 billet de 5 €, 3 pièces de 2 €');
    }

    /**
     * Teste le rendu de monnaie pour le montant de 21 $.
     */
    public function testChangeFor21()
    {
        $response = $this->post('/calculate-change', ['amount' => 21]);
        $response->assertStatus(200);
        $response->assertSee('1 billet de 10 €, 1 billet de 5 €, 3 pièces de 2 €');
    }

    /**
     * Teste le rendu de monnaie pour le montant de 23 $.
     */
    public function testChangeFor23()
    {
        $response = $this->post('/calculate-change', ['amount' => 23]);
        $response->assertStatus(200);
        $response->assertSee('1 billet de 10 €, 1 billet de 5 €, 4 pièces de 2 €');
    }

    /**
     * Teste le rendu de monnaie pour le montant de 31 $.
     */
    public function testChangeFor31()
    {
        $response = $this->post('/calculate-change', ['amount' => 31]);
        $response->assertStatus(200);
        $response->assertSee('2 billets de 10 €, 1 billet de 5 €, 3 pièces de 2 €');
    }

    /**
     * Teste le rendu de monnaie pour le montant de 9007199254740991 $.
     */
    public function testChangeFor9007199254740991()
    {
        $response = $this->post('/calculate-change', ['amount' => 9007199254740991]);
        $response->assertStatus(200);
        $response->assertSee('900719925474098 billets de 10 €, 1 billet de 5 €, 3 pièces de 2 €');
    }

    /**
     * Teste le rendu de monnaie pour un montant impossible.
     */
    public function testImpossibleChange()
    {
        $response = $this->post('/calculate-change', ['amount' => 1]);
        $response->assertStatus(200);
        $response->assertSee('Impossible de rendre la monnaie pour 1 €');
    }
}
