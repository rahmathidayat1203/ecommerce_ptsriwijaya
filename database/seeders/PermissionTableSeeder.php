<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /** 
     * Run the database seeds. 
     * 
     * @return void 
     */
    public function run()
    {
        // 
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'kategori-list',
            'kategori-create',
            'kategori-edit',
            'kategori-delete',
            'produk-list',
            'produk-create',
            'produk-edit',
            'produk-delete',
            'pembeli-list',
            'pembeli-create',
            'pembeli-edit',
            'pembeli-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'payment-list',
            'payment-create',
            'payment-edit',
            'payment-delete',
            'review-list',
            'review-create',
            'review-edit',
            'review-delete',
            'pengiriman-list',
            'pengiriman-create',
            'pengiriman-edit',
            'pengiriman-delete',
            'landing',
            'cart',
            'review'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
