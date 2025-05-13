<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin' => [],
            'editor' => [],
        ];

        // Get all permissions
        $allPermissions = Permission::pluck('name')->toArray();

        // Assign all permissions to admin
        $roles['admin'] = $allPermissions;

        // Assign permissions to editor (all except Role and User permissions)
        $editorPermissions = collect($allPermissions)->filter(function ($permission) {
            $permissionLower = strtolower($permission);

            // Define patterns for User and Role related permissions
            $userPermissionPatterns = [
                'view_any_user',
                'view_user',
                'create_user',
                'update_user',
                'delete_user',
                'restore_user',
                'force_delete_user',
                'userresource::' // Covers App\Filament\Resources\UserResource::*
            ];

            $rolePermissionPatterns = [
                'view_any_role',
                'view_role',
                'create_role',
                'update_role',
                'delete_role',
                'roleresource::',         // Covers App\Filament\Resources\RoleResource::* (if any)
                'shieldroleresource::', // Covers BezhanSalleh\FilamentShield\Resources\RoleResource::*
                'shield::role'            // Covers BezhanSalleh\FilamentShield\Pages\ViewShieldSettings
            ];

            $isUserPermission = false;
            foreach ($userPermissionPatterns as $pattern) {
                if (Str::contains($permissionLower, $pattern)) {
                    $isUserPermission = true;
                    break;
                }
            }

            $isRolePermission = false;
            if (!$isUserPermission) { // Only check role if not already excluded by user
                foreach ($rolePermissionPatterns as $pattern) {
                    if (Str::contains($permissionLower, $pattern)) {
                        $isRolePermission = true;
                        break;
                    }
                }
            }

            return !$isUserPermission && !$isRolePermission;
        })->toArray();
        $roles['editor'] = $editorPermissions;

        foreach ($roles as $roleName => $permissions) {
            $role = Role::where('name', $roleName)->first();

            if ($role) {
                // Role exists, ask to overwrite
                if ($this->command->confirm("Role '{$roleName}' already exists. Do you want to overwrite it?", true)) {
                    $role->syncPermissions($permissions);
                    $this->command->info("Role '{$roleName}' permissions overwritten.");
                } else {
                    $this->command->info("Skipping overwrite for role '{$roleName}'.");
                }
            } else {
                // Role does not exist, create it
                $role = Role::create(['name' => $roleName]);
                $role->givePermissionTo($permissions);
                $this->command->info("Role '{$roleName}' created with permissions.");
            }
        }
    }
}