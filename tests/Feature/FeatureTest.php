<?php

declare(strict_types=1);

use App\Enums\UserRole;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('redirects to login page when filament is requested being guest', function (): void {
    $response = $this->get('/');

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

it('renders filament dashboard when logged in', function (): void {
    /** @var User $admin */
    $admin = User::factory()->create(['role' => UserRole::Admin]);
    actingAs($admin);

    $response = $this->get('/');
    $response->assertOk();
});

it('returns 403 if user try to access filament dashboard', function (): void {
    /** @var User $user */
    $user = User::factory()->create(['role' => UserRole::User]);
    actingAs($user);

    $response = $this->get('/');
    $response->assertStatus(403);
});
