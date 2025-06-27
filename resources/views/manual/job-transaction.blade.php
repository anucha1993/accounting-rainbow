@extends('layouts.main')

@section('content')
{{-- คู่มือการใช้งานระบบ Job Transaction --}}

<nav style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); padding: 15px 0; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; flex-wrap: wrap;">
        <div style="display: flex; align-items: center;">
            <h2 style="margin: 0; color: white; font-size: 1.4em;">📝 คู่มือระบบ Job Transaction</h2>
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
    

    <h2 id="structure">1. โครงสร้างข้อมูล Job Transaction</h2>
    <ul>
        <li>ตารางหลัก: <b>job_trasaction</b> (เก็บข้อมูลธุรกรรมงาน)</li>
        <li>Primary Key: <b>job_trasaction_id</b></li>
        <li>เชื่อมโยงกับ: <b>job_detail</b>, <b>job_type</b></li>
    </ul>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr style="background: #f8f9fa; border: 1px solid #ddd;">
            <th style="padding: 10px; border: 1px solid #ddd;">ฟิลด์</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ประเภท</th>
            <th style="padding: 10px; border: 1px solid #ddd;">คำอธิบาย</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_trasaction_id</td><td style="padding: 8px; border: 1px solid #ddd;">Integer</td><td style="padding: 8px; border: 1px solid #ddd;">รหัสธุรกรรม (Auto Gen)</td><td style="padding: 8px; border: 1px solid #ddd;">1</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_trasaction_name</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">ชื่อธุรกรรม</td><td style="padding: 8px; border: 1px solid #ddd;">ค่าบริการวีซ่า</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_trasaction_type</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">ประเภท (+ = รับเงิน, - = จ่ายเงิน)</td><td style="padding: 8px; border: 1px solid #ddd;">+, -</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_detail</td><td style="padding: 8px; border: 1px solid #ddd;">Integer</td><td style="padding: 8px; border: 1px solid #ddd;">รหัส Job Detail ที่เกี่ยวข้อง</td><td style="padding: 8px; border: 1px solid #ddd;">5</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_type</td><td style="padding: 8px; border: 1px solid #ddd;">Integer</td><td style="padding: 8px; border: 1px solid #ddd;">รหัส Job Type (Auto จาก Job Detail)</td><td style="padding: 8px; border: 1px solid #ddd;">3</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_trasaction_status</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">สถานะ (active/disable)</td><td style="padding: 8px; border: 1px solid #ddd;">active</td></tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Tip: Job Type จะถูกเลือกอัตโนมัติเมื่อเลือก Job Detail แล้ว</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
          <img src="{{asset('manual-image\jobtrasactions\jobtrasactions-img-1.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="create">2. การสร้าง Job Transaction (Create)</h2>
    <ol>
        <li>เข้าหน้า Job Transaction ที่ <code>/jobtrasactions</code></li>
        <li>กรอกข้อมูลในฟอร์มด้านบน:
            <ul>
                <li><b>Job Transaction Name</b> — ชื่อธุรกรรม (เช่น "ค่าบริการวีซ่า")</li>
                <li><b>Transaction Type</b> — เลือก + (รับเงิน) หรือ - (จ่ายเงิน)</li>
                <li><b>Job Detail</b> — เลือกงานที่เกี่ยวข้อง (dropdown)</li>
                <li><b>Job Type</b> — จะแสดงอัตโนมัติเมื่อเลือก Job Detail</li>
                <li><b>Transaction Status</b> — เลือก Active หรือ Disable</li>
            </ul>
        </li>
        <li>กดปุ่ม <b>"เพิ่มข้อมูล"</b> เพื่อบันทึก</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Note: ฟิลด์ที่มี * จำเป็นต้องกรอก และ Job Type จะถูกเติมอัตโนมัติจาก Job Detail ที่เลือก</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\jobtrasactions\jobtrasactions-img-2.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="read">3. การดู/ค้นหา Job Transaction (Read)</h2>
    <ol>
        <li>ดูรายการธุรกรรมทั้งหมดในตารางด้านล่าง</li>
        <li>ตารางแสดงข้อมูล:
            <ul>
                <li><b>No.</b> — ลำดับ</li>
                <li><b>Job Transaction Name</b> — ชื่อธุรกรรม</li>
                <li><b>Transaction Type</b> — ไอคอน + (รับเงิน) หรือ - (จ่ายเงิน)</li>
                <li><b>Job Detail</b> — รายละเอียดงาน</li>
                <li><b>Job Type</b> — ประเภทงาน</li>
                <li><b>Status</b> — สถานะ (Active = เขียว, Disable = แดง)</li>
                <li><b>Actions</b> — ปุ่ม Edit และ Delete (สำหรับ Admin)</li>
            </ul>
        </li>
        <li>ใช้ DataTable เพื่อค้นหา เรียงลำดับ และแบ่งหน้า</li>
    </ol>
    <table style="width:100%; border-collapse:collapse; margin-bottom:15px;">
        <tr style="background:#f8f9fa; border:1px solid #ddd;">
            <th style="padding:8px; border:1px solid #ddd;">No.</th>
            <th style="padding:8px; border:1px solid #ddd;">Transaction Name</th>
            <th style="padding:8px; border:1px solid #ddd;">Type</th>
            <th style="padding:8px; border:1px solid #ddd;">Job Detail</th>
            <th style="padding:8px; border:1px solid #ddd;">Status</th>
            <th style="padding:8px; border:1px solid #ddd;">Actions</th>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">1</td>
            <td style="padding:8px; border:1px solid #ddd;">ค่าบริการวีซ่า</td>
            <td style="padding:8px; border:1px solid #ddd;">+</td>
            <td style="padding:8px; border:1px solid #ddd;">วีซ่าท่องเที่ยว</td>
            <td style="padding:8px; border:1px solid #ddd;"><span style="background:green;color:white;padding:2px 8px;border-radius:4px;">Active</span></td>
            <td style="padding:8px; border:1px solid #ddd;">Edit | Delete</td>
        </tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Tip: ตารางมี DataTable ช่วยในการค้นหาและเรียงข้อมูล</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
         <img src="{{asset('manual-image\jobtrasactions\jobtrasactions-img-3.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="update">4. การแก้ไข Job Transaction (Edit)</h2>
    <ol>
        <li>คลิกไอคอน <b>Edit</b> (รูปดินสอ) ในคอลัมน์ Actions ของแถวที่ต้องการแก้ไข</li>
        <li>Modal popup จะเปิดขึ้นพร้อมฟอร์มแก้ไข ซึ่งมีข้อมูลเดิมแสดงอยู่แล้ว</li>
        <li>แก้ไขข้อมูลที่ต้องการ:
            <ul>
                <li><b>Job Transaction Name</b> — แก้ไขชื่อธุรกรรม</li>
                <li><b>Transaction Type</b> — เปลี่ยน + หรือ -</li>
                <li><b>Job Detail</b> — เลือกงานใหม่</li>
                <li><b>Job Type</b> — จะอัปเดตอัตโนมัติตาม Job Detail</li>
                <li><b>Transaction Status</b> — เปลี่ยนสถานะ</li>
            </ul>
        </li>
        <li>กดปุ่ม <b>บันทึก</b> เพื่ออัปเดตข้อมูล</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Tip: Modal จะปิดอัตโนมัติหลังบันทึกสำเร็จ และข้อมูลในตารางจะอัปเดตทันที</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\jobtrasactions\jobtrasactions-img-4.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="delete">5. การลบ Job Transaction (Delete)</h2>
    <ol>
        <li>คลิกไอคอน <b>Delete</b> (รูปถังขยะ) ในคอลัมน์ Actions ของแถวที่ต้องการลบ</li>
        <li><b>หมายเหตุ:</b> ปุ่ม Delete จะแสดงเฉพาะสำหรับผู้ใช้ที่มีสิทธิ์ Admin เท่านั้น</li>
        <li>ระบบจะแสดง confirm dialog "Are you sure?" เพื่อยืนยันการลบ</li>
        <li>กด OK เพื่อยืนยันการลบ หรือ Cancel เพื่อยกเลิก</li>
        <li>หากยืนยันแล้ว ข้อมูลจะถูกลบออกจากระบบทันที</li>
    </ol>
    <div style="color:#c82333; margin-bottom:10px;">Warning: การลบข้อมูลจะไม่สามารถกู้คืนได้ และจะมีผลกับข้อมูลที่เกี่ยวข้อง</div>
    <div style="color:#856404; background:#fff3cd; padding:10px; border-radius:5px; margin:10px 0;">
        <b>สิทธิ์การเข้าถึง:</b> เฉพาะผู้ใช้ที่มี isAdmin === 'Admin' เท่านั้นที่จะเห็นปุ่ม Delete
    </div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\jobtrasactions\jobtrasactions-img-5.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="tips">6. เทคนิค/ข้อควรระวัง</h2>
    <ul>
        <li>ควรตรวจสอบข้อมูลก่อนบันทึกหรือแก้ไขทุกครั้ง</li>
        <li>การลบข้อมูลจะมีผลกับรายงานและยอดรวม</li>
        <li>ควรสำรองข้อมูลก่อนลบหรือแก้ไขจำนวนมาก</li>
    </ul>
</div>
@endsection
