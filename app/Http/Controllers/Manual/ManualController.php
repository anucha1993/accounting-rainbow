<?php

namespace App\Http\Controllers\Manual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManualController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }
    /**
     * แสดงหน้าคู่มือระบบ Customer
     */
    public function customer()
    {
        return view('manual.customer', [
            'title' => 'คู่มือการใช้งานระบบ Customer',
            'description' => 'คู่มือฉบับสมบูรณ์สำหรับการจัดการข้อมูลลูกค้า'
        ]);
    }

    /**
     * แสดงหน้าคู่มือระบบ Job Order (เตรียมไว้สำหรับอนาคต)
     */
    public function jobOrder()
    {
        return view('manual.job-order', [
            'title' => 'คู่มือการใช้งานระบบ Job Order',
            'description' => 'คู่มือฉบับสมบูรณ์สำหรับการจัดการงานและออเดอร์'
        ]);
    }

    /**
     * แสดงหน้าคู่มือระบบ Transaction (เตรียมไว้สำหรับอนาคต)
     */
    public function transaction()
    {
        return view('manual.transaction', [
            'title' => 'คู่มือการใช้งานระบบ Transaction',
            'description' => 'คู่มือฉบับสมบูรณ์สำหรับการจัดการธุรกรรมและการเงิน'
        ]);
    }

    /**
     * แสดงหน้าคู่มือทั่วไป (เตรียมไว้สำหรับอนาคต)
     */
    public function general()
    {
        return view('manual.general', [
            'title' => 'คู่มือการใช้งานทั่วไป',
            'description' => 'คู่มือการใช้งานระบบโดยรวมและเคล็ดลับต่าง ๆ'
        ]);
    }

    /**
     * แสดงหน้าคู่มือระบบ Wallet (เตรียมไว้สำหรับอนาคต)
     */
    public function wallet()
    {
        return view('manual.wallet', [
            'title' => 'คู่มือการใช้งานระบบ Wallet',
            'description' => 'คู่มือฉบับสมบูรณ์สำหรับการจัดการกระเป๋าเงินและการโอนเงิน'
        ]);
    }

    /**
     * แสดงหน้าคู่มือระบบ Job Transaction
     */
    public function jobTransaction()
    {
        return view('manual.job-transaction', [
            'title' => 'คู่มือการใช้งานระบบ Job Transaction',
            'description' => 'คู่มือฉบับสมบูรณ์สำหรับการจัดการธุรกรรมงาน (CRUD)'
        ]);
    }

    /**
     * แสดงหน้าคู่มือระบบ Visa Type
     */
    public function visaType()
    {
        return view('manual.visa-type', [
            'title' => 'คู่มือการใช้งานระบบ Visa Type',
            'description' => 'คู่มือฉบับสมบูรณ์สำหรับการจัดการประเภทวีซ่า (CRUD)'
        ]);
    }

    /**
     * แสดงหน้าดัชนีคู่มือทั้งหมด
     */
    public function index()
    {
        $manuals = [
            [
                'title' => 'คู่มือระบบ Customer',
                'description' => 'การจัดการข้อมูลลูกค้า, เพิ่ม, แก้ไข, ลบ, ค้นหา',
                'icon' => 'mdi-account-multiple',
                'route' => 'manual.customer',
                'status' => 'available',
                'color' => 'primary'
            ],
            [
                'title' => 'คู่มือระบบ Job Order',
                'description' => 'การจัดการงานและออเดอร์, สร้างงาน, ติดตามสถานะ',
                'icon' => 'mdi-briefcase',
                'route' => 'manual.job-order',
                'status' => 'coming-soon',
                'color' => 'warning'
            ],
            [
                'title' => 'คู่มือระบบ Transaction',
                'description' => 'การจัดการธุรกรรมและการเงิน, รายรับ, รายจ่าย',
                'icon' => 'mdi-cash-multiple',
                'route' => 'manual.transaction',
                'status' => 'coming-soon',
                'color' => 'success'
            ],
            [
                'title' => 'คู่มือทั่วไป',
                'description' => 'เคล็ดลับการใช้งาน, การแก้ไขปัญหา, FAQ',
                'icon' => 'mdi-help-circle',
                'route' => 'manual.general',
                'status' => 'coming-soon',
                'color' => 'info'
            ],
            [
                'title' => 'คู่มือระบบ Wallet',
                'description' => 'การจัดการกระเป๋าเงินและการโอนเงิน',
                'icon' => 'mdi-wallet',
                'route' => 'manual.wallet',
                'status' => 'coming-soon',
                'color' => 'danger'
            ],
            [
                'title' => 'คู่มือระบบ Job Transaction',
                'description' => 'การจัดการธุรกรรมงาน (CRUD), เพิ่ม, แก้ไข, ลบ, ค้นหา',
                'icon' => 'mdi-file-document-edit',
                'route' => 'manual.job-transaction',
                'status' => 'available',
                'color' => 'secondary'
            ],
            [
                'title' => 'คู่มือระบบ Visa Type',
                'description' => 'การจัดการประเภทวีซ่า (CRUD), เพิ่ม, แก้ไข, ลบ, ค้นหา',
                'icon' => 'mdi-passport',
                'route' => 'manual.visa-type',
                'status' => 'available',
                'color' => 'info'
            ]
        ];

        return view('manual.index', [
            'title' => 'คู่มือการใช้งานระบบ',
            'manuals' => $manuals
        ]);
    }
}
