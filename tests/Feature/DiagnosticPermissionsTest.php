<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\SuperAdmin;
use App\Models\User;
use Tests\TestCase;

class DiagnosticPermissionsTest extends TestCase
{
    public function test_guest_cannot_access_admin_leads()
    {
        $response = $this->get(route('admin.leads.index'));
        // Doit rediriger vers le login admin
        $response->assertRedirect(route('admin.login.form'));
    }

    public function test_guest_cannot_access_superadmin_diagnostic()
    {
        $response = $this->get(route('superadmin.diagnostic.analytics'));
        // Doit rediriger vers le login superadmin
        $response->assertRedirect(route('superadmin.login.form'));
    }

    public function test_admin_can_access_leads_dashboard()
    {
        $admin = Admin::first();
        if (!$admin) {
            $admin = Admin::create([
                'name' => 'Admin Test',
                'email' => 'admintest_' . uniqid() . '@test.com',
                'password' => bcrypt('password'),
            ]);
        }

        $response = $this->actingAs($admin, 'admin')->get(route('admin.leads.index'));
        $response->assertStatus(200);
        $response->assertSee('Gestion des Leads', false);
    }

    public function test_admin_cannot_access_superadmin_diagnostic()
    {
        $admin = Admin::first();
        if (!$admin) {
            $admin = Admin::create([
                'name' => 'Admin Test',
                'email' => 'admintest_' . uniqid() . '@test.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Un admin connecté avec le guard admin ne doit PAS pouvoir accéder au superadmin
        $response = $this->actingAs($admin, 'admin')->get(route('superadmin.diagnostic.analytics'));
        $response->assertRedirect(route('superadmin.login.form'));
    }

    public function test_superadmin_can_access_diagnostic_management()
    {
        $superadmin = SuperAdmin::first();
        if (!$superadmin) {
            $superadmin = SuperAdmin::create([
                'name' => 'Super Admin Test',
                'email' => 'superadmintest_' . uniqid() . '@test.com',
                'password' => bcrypt('password'),
            ]);
        }

        $response = $this->actingAs($superadmin, 'superadmin')->get(route('superadmin.diagnostic.analytics'));
        $response->assertStatus(200);
        $response->assertSee('Statistiques', false);
    }
}
