<?php

namespace Tests\Feature;

use App\Models\Admin;
use Tests\TestCase;

class AdminFacturationDashboardTest extends TestCase
{
    public function test_admin_can_view_facturation_recap_dashboard()
    {
        $admin = Admin::first();
        if (!$admin) {
            $admin = Admin::create([
                'name' => 'Admin Facture Test',
                'email' => 'admin_facture_' . uniqid() . '@test.com',
                'password' => bcrypt('password'),
            ]);
        }

        $response = $this->actingAs($admin, 'admin')->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Récapitulatif de Facturation', false);
        $response->assertSee('Total Encaissé', false);
        $response->assertSee('facturesTable', false);
        $response->assertSee('invoiceDetailModal', false);
        $response->assertSee('Exporter CSV', false);
    }
}
