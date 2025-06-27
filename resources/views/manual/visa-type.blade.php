@extends('layouts.main')

@section('content')
{{-- คู่มือการใช้งานระบบ Visa Type --}}

<nav style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); padding: 15px 0; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; flex-wrap: wrap;">
        <div style="display: flex; align-items: center;">
            <h2 style="margin: 0; color: white; font-size: 1.4em;">📋 คู่มือระบบ Visa Type</h2>
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
                <div style="font-weight: 600; margin-bottom: 5px;">สร้างประเภทวีซ่า</div>
                <div style="font-size: 0.9em; opacity: 0.9;">เพิ่มประเภทวีซ่าใหม่</div>
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
                <div style="font-size: 0.9em; opacity: 0.9;">ลบประเภทวีซ่า</div>
            </a>
        </div>
    </div>

    <h2 id="structure">1. โครงสร้างข้อมูล Visa Type</h2>
    <ul>
        <li>ตารางหลัก: <b>visa_type</b> (เก็บข้อมูลประเภทวีซ่า)</li>
        <li>Primary Key: <b>visa_type_id</b></li>
        <li>ใช้ในการกำหนดประเภทวีซ่าสำหรับลูกค้า</li>
    </ul>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr style="background: #f8f9fa; border: 1px solid #ddd;">
            <th style="padding: 10px; border: 1px solid #ddd;">ฟิลด์</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ประเภท</th>
            <th style="padding: 10px; border: 1px solid #ddd;">คำอธิบาย</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">visa_type_id</td><td style="padding: 8px; border: 1px solid #ddd;">Integer</td><td style="padding: 8px; border: 1px solid #ddd;">รหัสประเภทวีซ่า (Auto Gen)</td><td style="padding: 8px; border: 1px solid #ddd;">1</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">visa_type_name</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">ชื่อประเภทวีซ่า</td><td style="padding: 8px; border: 1px solid #ddd;">Tourist Visa</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">visa_type_renew</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">สามารถต่ออายุได้หรือไม่ (Y/N)</td><td style="padding: 8px; border: 1px solid #ddd;">Y, N</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">visa_type_from</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">ประเภทฟอร์ม (retirement/ed)</td><td style="padding: 8px; border: 1px solid #ddd;">retirement, ed</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">status</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">สถานะ (activate/disabled)</td><td style="padding: 8px; border: 1px solid #ddd;">activate</td></tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Tip: Visa Type ใช้เป็นข้อมูลหลักในการจำแนกประเภทวีซ่าของลูกค้า</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
          <img src="{{asset('manual-image\visa-type\visa-type-img-1.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="create">2. การสร้าง Visa Type (Create)</h2>
    <ol>
        <li>เข้าหน้า Visa Type ที่ <code>/visa/type</code></li>
        <li>กรอกข้อมูลในฟอร์มด้านบน:
            <ul>
                <li><b>Visa Name</b> — ชื่อประเภทวีซ่า (เช่น "Tourist Visa", "Retirement Visa")</li>
                <li><b>Visa Renew</b> — เลือก "ใช่" หรือ "ไม่ใช่" (สามารถต่ออายุได้หรือไม่)</li>
                <li><b>Visa Form</b> — เลือก "retirement" หรือ "ed" (ประเภทฟอร์ม)</li>
            </ul>
        </li>
        <li>กดปุ่ม <b>"เพิ่มข้อมูล"</b> เพื่อบันทึก</li>
        <li>ระบบจะเพิ่มข้อมูลใหม่ในตารางด้านล่างทันที</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Note: ทุกฟิลด์จำเป็นต้องกรอก และ Status จะถูกตั้งเป็น "activate" โดยอัตโนมัติเมื่อสร้างใหม่</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\visa-type\visa-type-img-2.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="read">3. การดู/ค้นหา Visa Type (Read)</h2>
    <ol>
        <li>ดูรายการประเภทวีซ่าทั้งหมดในตารางด้านล่าง</li>
        <li>ตารางแสดงข้อมูล:
            <ul>
                <li><b>No.</b> — ลำดับ</li>
                <li><b>Visa Name</b> — ชื่อประเภทวีซ่า</li>
                <li><b>Visa Renew</b> — แสดง "ใช่" หรือ "ไม่ใช่"</li>
                <li><b>Visa Form</b> — ประเภทฟอร์ม (retirement/ed)</li>
                <li><b>Status</b> — Badge สีเขียว (Activate) หรือสีแดง (Disabled)</li>
                <li><b>Actions</b> — ปุ่ม Edit และ Delete (สำหรับ Admin)</li>
            </ul>
        </li>
        <li>ใช้ DataTable เพื่อค้นหา เรียงลำดับ และแบ่งหน้า</li>
    </ol>
    <table style="width:100%; border-collapse:collapse; margin-bottom:15px;">
        <tr style="background:#f8f9fa; border:1px solid #ddd;">
            <th style="padding:8px; border:1px solid #ddd;">No.</th>
            <th style="padding:8px; border:1px solid #ddd;">Visa Name</th>
            <th style="padding:8px; border:1px solid #ddd;">Visa Renew</th>
            <th style="padding:8px; border:1px solid #ddd;">Visa Form</th>
            <th style="padding:8px; border:1px solid #ddd;">Status</th>
            <th style="padding:8px; border:1px solid #ddd;">Actions</th>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">1</td>
            <td style="padding:8px; border:1px solid #ddd;">Tourist Visa</td>
            <td style="padding:8px; border:1px solid #ddd;">ไม่ใช่</td>
            <td style="padding:8px; border:1px solid #ddd;">ed</td>
            <td style="padding:8px; border:1px solid #ddd;"><span style="background:green;color:white;padding:2px 8px;border-radius:4px;">Activate</span></td>
            <td style="padding:8px; border:1px solid #ddd;">Edit | Delete</td>
        </tr>
    </table>
    {{-- <div style="color:#007bff; margin-bottom:10px;">Tip: ตารางมี DataTable ช่วยในการค้นหาและเรียงข้อมูล (ordering: false)</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[ตัวอย่างหน้าจอ ตารางรายการ Visa Type]</div> --}}

    <h2 id="update">4. การแก้ไข Visa Type (Edit)</h2>
    <ol>
        <li>คลิกไอคอน <b>Edit</b> (รูปดินสอ) ในคอลัมน์ Actions ของแถวที่ต้องการแก้ไข</li>
        <li>Modal popup จะเปิดขึ้นพร้อมฟอร์มแก้ไข ซึ่งมีข้อมูลเดิมแสดงอยู่แล้ว</li>
        <li>แก้ไขข้อมูลที่ต้องการ:
            <ul>
                <li><b>Visa Name</b> — แก้ไขชื่อประเภทวีซ่า</li>
                <li><b>Visa Renew</b> — เปลี่ยน "ใช่" หรือ "ไม่ใช่"</li>
                <li><b>Visa Form</b> — เลือก "retirement" หรือ "ed"</li>
                <li><b>Status</b> — เปลี่ยนสถานะ "activate" หรือ "disabled"</li>
            </ul>
        </li>
        <li>กดปุ่ม <b>"Update"</b> เพื่ออัปเดตข้อมูล</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Tip: Modal จะปิดอัตโนมัติหลังบันทึกสำเร็จ และข้อมูลในตารางจะอัปเดตทันที</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\visa-type\visa-type-img-3.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="delete">5. การลบ Visa Type (Delete)</h2>
    <ol>
        <li>คลิกไอคอน <b>Delete</b> (รูปถังขยะ) ในคอลัมน์ Actions ของแถวที่ต้องการลบ</li>
        <li><b>หมายเหตุ:</b> ปุ่ม Delete จะแสดงเฉพาะสำหรับผู้ใช้ที่มีสิทธิ์ Admin เท่านั้น</li>
        <li>ระบบจะแสดง confirm dialog "Are you sure?" เพื่อยืนยันการลบ</li>
        <li>กด OK เพื่อยืนยันการลบ หรือ Cancel เพื่อยกเลิก</li>
        <li>หากยืนยันแล้ว ข้อมูลจะถูกลบออกจากระบบทันที</li>
    </ol>
    <div style="color:#c82333; margin-bottom:10px;">Warning: การลบข้อมูลจะไม่สามารถกู้คืนได้ และอาจมีผลกับข้อมูลลูกค้าที่ใช้ประเภทวีซ่านี้</div>
    <div style="color:#856404; background:#fff3cd; padding:10px; border-radius:5px; margin:10px 0;">
        <b>สิทธิ์การเข้าถึง:</b> เฉพาะผู้ใช้ที่มี isAdmin === 'Admin' เท่านั้นที่จะเห็นปุ่ม Delete
    </div>
    {{-- <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[ตัวอย่างหน้าจอ confirm ลบ Visa Type]</div> --}}

    <h2 id="tips">6. เทคนิค/ข้อควรระวัง</h2>
    <ul>
        <li>ควรตั้งชื่อประเภทวีซ่าให้ชัดเจนและเข้าใจง่าย</li>
        <li>ตรวจสอบว่าประเภทวีซ่านั้นสามารถต่ออายุได้หรือไม่ก่อนเลือก Visa Renew</li>
        <li>ไม่ควรลบประเภทวีซ่าที่มีลูกค้าใช้งานอยู่</li>
        <li>ใช้ Status "disabled" แทนการลบหากต้องการหยุดใช้งานชั่วคราว</li>
        <li>ประเภทฟอร์ม (retirement/ed) ต้องเลือกให้ตรงกับกฎหมายและระเบียบที่เกี่ยวข้อง</li>
    </ul>

    <h2 id="example">7. ตัวอย่างการใช้งาน (Case Study)</h2>
    <ol>
        <li>สร้างประเภทวีซ่าใหม่: <b>Visa Name:</b> "Retirement Visa", <b>Visa Renew:</b> "ใช่", <b>Visa Form:</b> "retirement"</li>
        <li>สร้างประเภทวีซ่าสำหรับนักเรียน: <b>Visa Name:</b> "Education Visa", <b>Visa Renew:</b> "ใช่", <b>Visa Form:</b> "ed"</li>
        <li>แก้ไขสถานะประเภทวีซ่าที่ไม่ใช้แล้วเป็น "disabled"</li>
        <li>ใช้ function ค้นหาใน DataTable เพื่อหาประเภทวีซ่าเฉพาะ</li>
    </ol>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\visa-type\visa-type-img-4.jpg')}}" alt="" style="width: 100%">
    </div>
</div>
@endsection
