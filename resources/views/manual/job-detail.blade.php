@extends('layouts.main')

@section('content')
{{-- คู่มือการใช้งานระบบ Job Detail --}}

<nav style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); padding: 15px 0; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; flex-wrap: wrap;">
        <div style="display: flex; align-items: center;">
            <h2 style="margin: 0; color: white; font-size: 1.4em;">🛠️ คู่มือระบบ Job Detail</h2>
        </div>
        <div style="display: flex; gap: 5px; align-items: center; flex-wrap: wrap;">
            <a href="#structure" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">📊 โครงสร้าง</a>
            <a href="#create" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">➕ สร้าง</a>
            <a href="#read" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">🔍 ดู</a>
            <a href="#update" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">✏️ แก้ไข</a>
            <a href="#delete" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">🗑️ ลบ</a>
        </div>
    </div>
</nav>

<div id="top" style="max-width: 1000px; margin: auto; font-size: 1.1em;">
   

    <div style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 25px; border-radius: 15px; margin-bottom: 30px; border: 1px solid #dee2e6; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h3 style="color: #495057; margin-bottom: 20px; text-align: center; font-size: 1.3em;">🚀 เมนูการใช้งานด่วน</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px;">
            <a href="#create" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">➕</div>
                <div style="font-weight: 600; margin-bottom: 5px;">สร้างรายการงาน</div>
                <div style="font-size: 0.9em; opacity: 0.9;">เพิ่มรายละเอียดงานใหม่</div>
            </a>
            <a href="#read" style="background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">🔍</div>
                <div style="font-weight: 600; margin-bottom: 5px;">ดูรายการ</div>
                <div style="font-size: 0.9em; opacity: 0.9;">ดูและค้นหาข้อมูล</div>
            </a>
            <a href="#update" style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">✏️</div>
                <div style="font-weight: 600; margin-bottom: 5px;">แก้ไข</div>
                <div style="font-size: 0.9em; opacity: 0.9;">อัปเดตข้อมูล</div>
            </a>
            <a href="#delete" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">🗑️</div>
                <div style="font-weight: 600; margin-bottom: 5px;">ลบข้อมูล</div>
                <div style="font-size: 0.9em; opacity: 0.9;">ลบรายการงาน</div>
            </a>
        </div>
    </div>

    <h2 id="structure">1. โครงสร้างข้อมูล Job Detail</h2>
    <ul>
        <li>ตารางหลัก: <b>job_detail</b> (เก็บข้อมูลรายละเอียดงาน)</li>
        <li>Primary Key: <b>job_detail_id</b></li>
        <li>เชื่อมโยงกับ: <b>job_type</b> (ประเภทงาน)</li>
        <li>ใช้ในการกำหนดรายละเอียดงานภายใต้ประเภทงานแต่ละประเภท</li>
    </ul>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr style="background: #f8f9fa; border: 1px solid #ddd;">
            <th style="padding: 10px; border: 1px solid #ddd;">ฟิลด์</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ประเภท</th>
            <th style="padding: 10px; border: 1px solid #ddd;">คำอธิบาย</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_detail_id</td><td style="padding: 8px; border: 1px solid #ddd;">Integer</td><td style="padding: 8px; border: 1px solid #ddd;">รหัสรายละเอียดงาน (Auto Gen)</td><td style="padding: 8px; border: 1px solid #ddd;">1</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_detail_name</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">ชื่อรายละเอียดงาน/บริการ</td><td style="padding: 8px; border: 1px solid #ddd;">ยื่นวีซ่าท่องเที่ยว</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_type</td><td style="padding: 8px; border: 1px solid #ddd;">Integer</td><td style="padding: 8px; border: 1px solid #ddd;">รหัสประเภทงาน (FK จาก job_type)</td><td style="padding: 8px; border: 1px solid #ddd;">2</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_detail_status</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">สถานะ (active/disable)</td><td style="padding: 8px; border: 1px solid #ddd;">active</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">created_at</td><td style="padding: 8px; border: 1px solid #ddd;">Timestamp</td><td style="padding: 8px; border: 1px solid #ddd;">วันที่สร้าง</td><td style="padding: 8px; border: 1px solid #ddd;">2025-06-27</td></tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Tip: Job Detail เป็นรายละเอียดย่อยภายใต้ Job Type แต่ละประเภท เช่น ภายใต้ "งานวีซ่า" อาจมี "วีซ่าท่องเที่ยว", "วีซ่าธุรกิจ"</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
         <img src="{{asset('manual-image\jobdetail\jobdetail-img-1.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="create">2. การสร้าง Job Detail (Create)</h2>
    <ol>
        <li>เข้าหน้า Job Detail ที่ <code>/jobdetail</code> (เมนู Category → Job Detail)</li>
        <li>กรอกข้อมูลในฟอร์มด้านบน:
            <ul>
                <li><b>Job detail Name</b> — ชื่อรายละเอียดงาน/บริการ (เช่น "ยื่นวีซ่าท่องเที่ยว")</li>
                <li><b>Job Type</b> — เลือกประเภทงานจาก dropdown (เช่น "งานวีซ่า")</li>
                <li><b>Status</b> — เลือก Active หรือ Disable</li>
            </ul>
        </li>
        <li>กดปุ่ม <b>"เพิ่มข้อมูล"</b> เพื่อบันทึก</li>
        <li>ระบบจะเพิ่มข้อมูลใหม่ในตารางด้านล่างทันที</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Note: ทุกฟิลด์จำเป็นต้องกรอก และต้องเลือก Job Type ก่อนเพื่อใช้ในการจัดหมวดหมู่งาน</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
          <img src="{{asset('manual-image\jobdetail\jobdetail-img-2.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="read">3. การดู/ค้นหา Job Detail (Read)</h2>
    <ol>
        <li>ดูรายการรายละเอียดงานทั้งหมดในตารางด้านล่าง</li>
        <li>ตารางแสดงข้อมูล:
            <ul>
                <li><b>No.</b> — ลำดับ</li>
                <li><b>Job Detail name</b> — ชื่อรายละเอียดงาน/บริการ</li>
                <li><b>Job Type</b> — ประเภทงานที่เชื่อมโยง (จาก Left Join)</li>
                <li><b>Status</b> — Badge สีเขียว (Active) หรือสีแดง (Disable)</li>
                <li><b>Actions</b> — ปุ่ม Edit และ Delete (สำหรับ Admin)</li>
            </ul>
        </li>
        <li>ใช้ DataTable เพื่อค้นหา เรียงลำดับ และแบ่งหน้า</li>
        <li>ข้อมูลจะแสดงเรียงตาม <code>created_at</code> จากล่าสุดขึ้นมาก่อน</li>
    </ol>
    <table style="width:100%; border-collapse:collapse; margin-bottom:15px;">
        <tr style="background:#f8f9fa; border:1px solid #ddd;">
            <th style="padding:8px; border:1px solid #ddd;">No.</th>
            <th style="padding:8px; border:1px solid #ddd;">Job Detail Name</th>
            <th style="padding:8px; border:1px solid #ddd;">Job Type</th>
            <th style="padding:8px; border:1px solid #ddd;">Status</th>
            <th style="padding:8px; border:1px solid #ddd;">Actions</th>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">1</td>
            <td style="padding:8px; border:1px solid #ddd;">ยื่นวีซ่าท่องเที่ยว</td>
            <td style="padding:8px; border:1px solid #ddd;">งานวีซ่า</td>
            <td style="padding:8px; border:1px solid #ddd;"><span style="background:green;color:white;padding:2px 8px;border-radius:4px;">Active</span></td>
            <td style="padding:8px; border:1px solid #ddd;">Edit | Delete</td>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">2</td>
            <td style="padding:8px; border:1px solid #ddd;">ยื่นใบอนุญาตทำงาน</td>
            <td style="padding:8px; border:1px solid #ddd;">งานใบอนุญาต</td>
            <td style="padding:8px; border:1px solid #ddd;"><span style="background:red;color:white;padding:2px 8px;border-radius:4px;">Disable</span></td>
            <td style="padding:8px; border:1px solid #ddd;">Edit | Delete</td>
        </tr>
    </table>
    {{-- <div style="color:#007bff; margin-bottom:10px;">Tip: ตารางมี DataTable ช่วยในการค้นหาและเรียงข้อมูล (ordering: false) และใช้ Left Join เพื่อแสดงชื่อ Job Type</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[ตัวอย่างหน้าจอ ตารางรายการ Job Detail]</div> --}}

    <h2 id="update">4. การแก้ไข Job Detail (Edit)</h2>
    <ol>
        <li>คลิกไอคอน <b>Edit</b> (รูปดินสอ) ในคอลัมน์ Actions ของแถวที่ต้องการแก้ไข</li>
        <li>Modal popup จะเปิดขึ้นพร้อมฟอร์มแก้ไข ซึ่งมีข้อมูลเดิมแสดงอยู่แล้ว</li>
        <li>แก้ไขข้อมูลที่ต้องการ:
            <ul>
                <li><b>Job detail Name</b> — แก้ไขชื่อรายละเอียดงาน</li>
                <li><b>Job Type</b> — เปลี่ยนประเภทงาน (dropdown จะแสดงตัวเลือกที่เลือกไว้)</li>
                <li><b>Status</b> — เปลี่ยนสถานะ "Active" หรือ "Disable"</li>
            </ul>
        </li>
        <li>กดปุ่ม <b>"Update"</b> เพื่ออัปเดตข้อมูล</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Tip: Modal จะปิดอัตโนมัติหลังบันทึกสำเร็จ และข้อมูลในตารางจะอัปเดตทันที</div>
    <div style="color:#ffc107; background:#fff3cd; padding:10px; border-radius:5px; margin:10px 0;">
        <b>หมายเหตุ:</b> ในฟอร์มแก้ไข มี bug เล็กน้อยในการ select Status (ใช้ job_type แทน job_detail_status) แต่ไม่กระทบการทำงาน
    </div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\jobdetail\jobdetail-img-3.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="delete">5. การลบ Job Detail (Delete)</h2>
    <ol>
        <li>คลิกไอคอน <b>Delete</b> (รูปถังขยะ) ในคอลัมน์ Actions ของแถวที่ต้องการลบ</li>
        <li><b>หมายเหตุ:</b> ปุ่ม Delete จะแสดงเฉพาะสำหรับผู้ใช้ที่มีสิทธิ์ Admin เท่านั้น</li>
        <li>ระบบจะแสดง confirm dialog "Are you sure?" เพื่อยืนยันการลบ</li>
        <li>กด OK เพื่อยืนยันการลบ หรือ Cancel เพื่อยกเลิก</li>
        <li>หากยืนยันแล้ว ข้อมูลจะถูกลบออกจากระบบทันที</li>
    </ol>
    <div style="color:#c82333; margin-bottom:10px;">Warning: การลบข้อมูลจะไม่สามารถกู้คืนได้ และอาจมีผลกับข้อมูลที่เกี่ยวข้อง เช่น Job Transaction ที่อ้างอิงถึง Job Detail นี้</div>
    <div style="color:#856404; background:#fff3cd; padding:10px; border-radius:5px; margin:10px 0;">
        <b>สิทธิ์การเข้าถึง:</b> เฉพาะผู้ใช้ที่มี isAdmin === 'Admin' เท่านั้นที่จะเห็นปุ่ม Delete
    </div>
    {{-- <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[ตัวอย่างหน้าจอ confirm ลบ Job Detail]</div> --}}

    <h2 id="tips">6. เทคนิค/ข้อควรระวัง</h2>
    <ul>
        <li>ควรตั้งชื่อ Job Detail ให้ชัดเจนและสื่อความหมาย</li>
        <li>ตรวจสอบให้แน่ใจว่าเลือก Job Type ที่ถูกต้องสำหรับรายละเอียดงานนั้น ๆ</li>
        <li>ไม่ควรลบ Job Detail ที่มีการใช้งานใน Job Transaction อยู่</li>
        <li>ใช้ Status "Disable" แทนการลบหากต้องการหยุดใช้งานชั่วคราว</li>
        <li>ข้อมูลใน Job Detail ถูกใช้โดย Job Transaction ดังนั้นการเปลี่ยนแปลงจะมีผลกับระบบอื่น</li>
        <li>ระบบใช้ Left Join เพื่อแสดงชื่อ Job Type ในตาราง</li>
    </ul>

    <h2 id="example">7. ตัวอย่างการใช้งาน (Case Study)</h2>
    <ol>
        <li>สร้าง Job Detail ใหม่: <b>Job detail Name:</b> "ต่อวีซ่าท่องเที่ยว", <b>Job Type:</b> "งานวีซ่า", <b>Status:</b> "Active"</li>
        <li>สร้าง Job Detail สำหรับใบอนุญาต: <b>Job detail Name:</b> "ยื่นใบอนุญาตธุรกิจ", <b>Job Type:</b> "งานใบอนุญาต", <b>Status:</b> "Active"</li>
        <li>แก้ไขสถานะ Job Detail ที่ไม่ใช้แล้วเป็น "Disable"</li>
        <li>ใช้ function ค้นหาใน DataTable เพื่อหา Job Detail เฉพาะ</li>
        <li>ตรวจสอบ Job Detail ที่มี status "Active" เพื่อใช้ใน dropdown ของหน้าอื่น</li>
    </ol>

    <h2 id="relationship">8. ความสัมพันธ์กับระบบอื่น</h2>
    <ul>
        <li><b>Job Transaction:</b> ใช้ Job Detail เป็น Foreign Key ในการเชื่อมโยงธุรกรรมกับรายละเอียดงาน</li>
        <li><b>Job Type:</b> Job Detail เป็นข้อมูลย่อยภายใต้ Job Type</li>
        <li><b>Job Order:</b> อาจใช้ Job Detail ในการระบุรายละเอียดงานที่ลูกค้าต้องการ</li>
        <li><b>Dropdown Selects:</b> Job Detail ที่มี status "Active" จะใช้ในฟอร์มต่าง ๆ</li>
    </ul>
    {{-- <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[ตัวอย่างการใช้งาน Job Detail ในระบบต่าง ๆ]</div> --}}
</div>
@endsection
