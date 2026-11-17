<?php

namespace Database\Seeders;

use App\Enums\Permission;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Ported from USERS in stock-data.js. Note the seed data deliberately gives
     * each user a permission set that is a subset of their role's defaults —
     * this is intentional in the prototype: permissions belong to the user,
     * not just the role. Dev password for every seeded account is "password".
     */
    public function run(): void
    {
        $rows = [
            [
                'name' => 'Demo Owner',
                'email' => 'owner@example.com',
                'role' => UserRole::Owner,
                'permissions' => [Permission::ViewReports, Permission::StockMovements, Permission::EditProducts, Permission::ManageUsers],
            ],
            [
                'name' => 'Demo Manager',
                'email' => 'manager@example.com',
                'role' => UserRole::StoreManager,
                'permissions' => [Permission::ViewReports, Permission::StockMovements, Permission::EditProducts],
            ],
            [
                'name' => 'Demo Warehouse',
                'email' => 'warehouse@example.com',
                'role' => UserRole::WarehouseStaff,
                'permissions' => [Permission::StockMovements],
            ],
            [
                'name' => 'Demo Sales',
                'email' => 'sales@example.com',
                'role' => UserRole::SalesStaff,
                'permissions' => [Permission::StockMovements],
            ],
        ];

        foreach ($rows as $row) {
            User::updateOrCreate(
                ['email' => $row['email']],
                [
                    'name' => $row['name'],
                    'password' => Hash::make('password'),
                    'role' => $row['role'],
                    'permissions' => array_map(fn (Permission $p) => $p->value, $row['permissions']),
                    'active' => true,
                ]
            );
        }
    }
}
