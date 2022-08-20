<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $sidebar = [
            'Dashboard' => '/admin/home',
        ];

        $masterdata = [
            'Customer' => '',
            'Partner' => '',
        ];

        $masterlayanan = [
            'Kategori Layanan' => '/admin/servcat',
            'Layanan' => '/admin/services',
            'Portfolio Layanan' => '/admin/portfolio',
        ];

        $masterblog = [
            'Kategori Post' => '/admin/postcat',
            'Posts' => '/admin/dbpost',
        ];

        $laporan = [
            'Penjualan' => '',
            'Laba Penjualan' => '',
        ];

        $ownerSidebar = [
            'Dashboard' => '/owner/home',
        ];

        $ownerMasterdata = [
            'Admin' => '/owner/admin',
            'Customer' => '/owner/user',
            // 'Partner' => '',
        ];

        $ownerMasterlayanan = [
            'Kategori Layanan' => '/owner/servcat',
            'Layanan' => '/owner/services',
            'Portfolio Layanan' => '/owner/portfolio',
            'Promo ' => '/owner/promo',
        ];

        $ownerMasterblog = [
            'Kategori Post' => '/owner/postcat',
            'Posts' => '/owner/dbpost',
        ];

        $ownerLaporan = [
            'Penjualan' => '',
            'Laba Penjualan' => '',
        ];

        return view('components.admin.sidebar', compact(
            'sidebar',
            'masterdata',
            'masterlayanan',
            'masterblog',
            'laporan',
            'ownerSidebar',
            'ownerMasterdata',
            'ownerMasterlayanan',
            'ownerMasterblog',
            'ownerLaporan'
        ));
    }
}
