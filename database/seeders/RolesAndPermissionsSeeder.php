<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // 1) Очищаем кеш пакета Spatie
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2) Создаем все права
        $permissions = [
            'client.view',
            'client.create',
            'client.update',
            'client.delete',
            'deal.view',
            'deal.create',
            'deal.update',
            'deal.delete',
            'task.view',
            'task.create',
            'task.update',
            'task.delete',
            'analytics.view',
            'settings.manage',
            'audit.view',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 3) Создаем роли и назначаем права
        $roles = [
            'Admin'   => $permissions, // все права
            'Manager' => [
                'client.view',
                'client.create',
                'client.update',
                'deal.view',
                'deal.create',
                'deal.update',
                'task.view',
                'task.create',
                'task.update',
                'analytics.view',
            ],
            'Sales'   => [
                'client.view',
                'client.create',
                'client.update',
                'deal.view',
                'deal.create',
                'deal.update',
                'task.view',
                'task.create',
            ],
            'Support' => [
                'client.view',
                'task.view',
                'task.update',
                'audit.view',
            ],
            'Auditor' => [
                'client.view',
                'deal.view',
                'task.view',
                'analytics.view',
                'audit.view',
            ],
        ];

        foreach ($roles as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($perms);
        }
    }
}
