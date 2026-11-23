<?php

namespace Tests\Feature;

use App\Models\Cours;
use App\Models\SousFormation;
use Tests\TestCase;

class CgvIntegrationTest extends TestCase
{
    public function test_soutien_scolaire_contains_cgvsc()
    {
        $response = $this->get('/primaire');
        $response->assertOk();
        $response->assertSee('CGVSC.pdf');
        $response->assertSee('Conditions Générales de Vente');
    }

    public function test_activite_scolaire_contains_cgvae()
    {
        $response = $this->get('/minimetier');
        $response->assertOk();
        $response->assertSee('CGVAE.pdf');
        $response->assertSee('Conditions Générales de Vente');

        $responseCodage = $this->get('/codage');
        $responseCodage->assertOk();
        $responseCodage->assertSee('CGVAE.pdf');
    }

    public function test_cours_sidebar_contains_cgvf()
    {
        $cours = Cours::first();
        if ($cours) {
            $response = $this->get(route('cours', ['id' => $cours->id]));
            $response->assertOk();
            $response->assertSee('CGVF.pdf');
            $response->assertSee('Conditions Générales de Vente');
        }
    }
}
