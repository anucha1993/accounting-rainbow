{{-- คู่มือการใช้งานระบบ Customer --}}

{{-- แถบเมนูนำทางหลัก --}}
<nav style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); padding: 15px 0; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; flex-wrap: wrap;">
        <div style="display: flex; align-items: center;">
            <h2 style="margin: 0; color: white; font-size: 1.4em;">📖 คู่มือระบบ Customer</h2>
        </div>
        <div style="display: flex; gap: 5px; align-items: center; flex-wrap: wrap;">
            <a href="#structure" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; transition: all 0.3s ease; background: rgba(255,255,255,0.1);">📊 โครงสร้าง</a>
            <a href="#create" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; transition: all 0.3s ease; background: rgba(255,255,255,0.1);">➕ เพิ่มข้อมูล</a>
            <a href="#update" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; transition: all 0.3s ease; background: rgba(255,255,255,0.1);">✏️ แก้ไข</a>
            <a href="#delete" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; transition: all 0.3s ease; background: rgba(255,255,255,0.1);">🗑️ ลบข้อมูล</a>
            <a href="#search" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; transition: all 0.3s ease; background: rgba(255,255,255,0.1);">🔍 ค้นหา</a>
            <a href="#relationships" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; transition: all 0.3s ease; background: rgba(255,255,255,0.1);">🔗 ความสัมพันธ์</a>
            <a href="#troubleshooting" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; transition: all 0.3s ease; background: rgba(255,255,255,0.1);">🛠️ แก้ปัญหา</a>
        </div>
    </div>
</nav>

<div id="top" style="max-width: 1000px; margin: auto; font-size: 1.1em;">
    {{-- เมนูด่วนสำหรับการเข้าถึงฟีเจอร์หลัก --}}
    <div style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 25px; border-radius: 15px; margin-bottom: 30px; border: 1px solid #dee2e6; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h3 style="color: #495057; margin-bottom: 20px; text-align: center; font-size: 1.3em;">🚀 เมนูการใช้งานด่วน</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px;">
            <a href="#create" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s ease; box-shadow: 0 3px 10px rgba(40, 167, 69, 0.3);">
                <div style="font-size: 2em; margin-bottom: 10px;">➕</div>
                <div style="font-weight: 600; margin-bottom: 5px;">เพิ่มลูกค้าใหม่</div>
                <div style="font-size: 0.9em; opacity: 0.9;">สร้างข้อมูลลูกค้าใหม่</div>
            </a>
            <a href="#search" style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s ease; box-shadow: 0 3px 10px rgba(0, 123, 255, 0.3);">
                <div style="font-size: 2em; margin-bottom: 10px;">🔍</div>
                <div style="font-weight: 600; margin-bottom: 5px;">ค้นหาลูกค้า</div>
                <div style="font-size: 0.9em; opacity: 0.9;">ค้นหาและกรองข้อมูล</div>
            </a>
            <a href="#update" style="background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s ease; box-shadow: 0 3px 10px rgba(255, 193, 7, 0.3);">
                <div style="font-size: 2em; margin-bottom: 10px;">✏️</div>
                <div style="font-weight: 600; margin-bottom: 5px;">แก้ไขข้อมูล</div>
                <div style="font-size: 0.9em; opacity: 0.9;">อัปเดตข้อมูลลูกค้า</div>
            </a>
            <a href="#visa-types" style="background: linear-gradient(135deg, #6f42c1 0%, #563d7c 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s ease; box-shadow: 0 3px 10px rgba(111, 66, 193, 0.3);">
                <div style="font-size: 2em; margin-bottom: 10px;">📄</div>
                <div style="font-weight: 600; margin-bottom: 5px;">ประเภทวีซ่า</div>
                <div style="font-size: 0.9em; opacity: 0.9;">ดูรายละเอียดวีซ่า</div>
            </a>
            <a href="#file-management" style="background: linear-gradient(135deg, #fd7e14 0%, #e85d04 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s ease; box-shadow: 0 3px 10px rgba(253, 126, 20, 0.3);">
                <div style="font-size: 2em; margin-bottom: 10px;">📁</div>
                <div style="font-weight: 600; margin-bottom: 5px;">จัดการไฟล์</div>
                <div style="font-size: 0.9em; opacity: 0.9;">อัปโหลดและจัดเก็บ</div>
            </a>
            <a href="#troubleshooting" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s ease; box-shadow: 0 3px 10px rgba(220, 53, 69, 0.3);">
                <div style="font-size: 2em; margin-bottom: 10px;">🛠️</div>
                <div style="font-weight: 600; margin-bottom: 5px;">แก้ไขปัญหา</div>
                <div style="font-size: 0.9em; opacity: 0.9;">แก้ไขข้อผิดพลาด</div>
            </a>
        </div>
    </div>

    {{-- เมนูคู่มือหลัก --}}
    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h3 style="color: white; margin-bottom: 15px; text-align: center;">📚 คู่มือการใช้งานระบบ Customer</h3>
        <p style="text-align: center; margin-bottom: 20px; opacity: 0.9;">คู่มือฉบับสมบูรณ์สำหรับการจัดการข้อมูลลูกค้า</p>
        
        {{-- Quick Menu --}}
        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-bottom: 20px;">
            <a href="#create" style="background: rgba(255,255,255,0.2); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 0.9em; transition: all 0.3s;">
                ➕ สร้างลูกค้า
            </a>
            <a href="#search" style="background: rgba(255,255,255,0.2); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 0.9em; transition: all 0.3s;">
                🔍 ค้นหา
            </a>
            <a href="#update" style="background: rgba(255,255,255,0.2); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 0.9em; transition: all 0.3s;">
                ✏️ แก้ไข
            </a>
            <a href="#troubleshooting" style="background: rgba(255,255,255,0.2); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 0.9em; transition: all 0.3s;">
                🛠️ แก้ไขปัญหา
            </a>
        </div>
    </div>

    {{-- เมนูสารบัญแบบ 2 คอลัมน์ --}}
    <div style="background: #f8f9fa; padding: 25px; border-radius: 10px; margin-bottom: 30px; border: 1px solid #e9ecef;">
        <h3 style="color: #495057; margin-bottom: 20px; text-align: center; border-bottom: 2px solid #007bff; padding-bottom: 10px;">📋 สารบัญ</h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px;">
            {{-- คอลัมน์ซ้าย --}}
            <div>
                <h4 style="color: #007bff; margin-bottom: 15px; font-size: 1.1em;">🏗️ พื้นฐานและการจัดการ</h4>
                <ol style="line-height: 1.8; color: #495057;">
                    <li><a href="#structure" style="color: #007bff; text-decoration: none;">โครงสร้างข้อมูล Customer</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#structure" style="color: #6c757d; text-decoration: none;">ตารางหลักและฟิลด์สำคัญ</a></li>
                        </ul>
                    </li>
                    <li><a href="#create" style="color: #007bff; text-decoration: none;">การสร้างข้อมูลลูกค้า (Create)</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#create" style="color: #6c757d; text-decoration: none;">เข้าสู่หน้าสร้างลูกค้า</a></li>
                            <li><a href="#create" style="color: #6c757d; text-decoration: none;">ขั้นตอนการกรอกข้อมูล</a></li>
                            <li><a href="#create" style="color: #6c757d; text-decoration: none;">ตัวอย่างการกรอกข้อมูล</a></li>
                        </ul>
                    </li>
                    <li><a href="#update" style="color: #007bff; text-decoration: none;">การแก้ไขข้อมูลลูกค้า (Update)</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#update" style="color: #6c757d; text-decoration: none;">วิธีเข้าถึงฟอร์มแก้ไข</a></li>
                            <li><a href="#update" style="color: #6c757d; text-decoration: none;">ข้อควรระวังในการแก้ไข</a></li>
                        </ul>
                    </li>
                    <li><a href="#delete" style="color: #007bff; text-decoration: none;">การลบข้อมูลลูกค้า (Delete)</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#delete" style="color: #6c757d; text-decoration: none;">เงื่อนไขและสิทธิ์การลบ</a></li>
                            <li><a href="#delete" style="color: #6c757d; text-decoration: none;">ผลกระทบของการลบ</a></li>
                        </ul>
                    </li>
                    <li><a href="#search" style="color: #007bff; text-decoration: none;">การค้นหาและแสดงผล (Search & Table)</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#search" style="color: #6c757d; text-decoration: none;">ฟอร์มค้นหาและฟิลเตอร์</a></li>
                            <li><a href="#search" style="color: #6c757d; text-decoration: none;">ตารางแสดงผลและฟีเจอร์</a></li>
                        </ul>
                    </li>
                </ol>
            </div>

            {{-- คอลัมน์ขวา --}}
            <div>
                <h4 style="color: #28a745; margin-bottom: 15px; font-size: 1.1em;">🔗 ข้อมูลเชิงลึกและเทคนิค</h4>
                <ol start="6" style="line-height: 1.8; color: #495057;">
                    <li><a href="#relationships" style="color: #28a745; text-decoration: none;">ความสัมพันธ์ข้อมูลและการเลือก</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#relationships" style="color: #6c757d; text-decoration: none;">การเชื่อมโยงข้อมูล</a></li>
                            <li><a href="#relationships" style="color: #6c757d; text-decoration: none;">Step-by-Step การใช้งาน</a></li>
                        </ul>
                    </li>
                    <li><a href="#visa-types" style="color: #28a745; text-decoration: none;">รายละเอียดประเภทวีซ่า</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#visa-types" style="color: #6c757d; text-decoration: none;">Retirement, Education, Tourist</a></li>
                        </ul>
                    </li>
                    <li><a href="#file-management" style="color: #28a745; text-decoration: none;">การจัดการไฟล์เอกสาร</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#file-management" style="color: #6c757d; text-decoration: none;">อัปโหลด, ประเภท, จัดเก็บ</a></li>
                        </ul>
                    </li>
                    <li><a href="#tips" style="color: #28a745; text-decoration: none;">เคล็ดลับการใช้งาน</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#tips" style="color: #6c757d; text-decoration: none;">ค้นหาอย่างมีประสิทธิภาพ</a></li>
                            <li><a href="#tips" style="color: #6c757d; text-decoration: none;">ป้องกันข้อผิดพลาด</a></li>
                        </ul>
                    </li>
                    <li><a href="#troubleshooting" style="color: #28a745; text-decoration: none;">การแก้ไขปัญหา</a>
                        <ul style="margin: 5px 0 10px 20px; font-size: 0.9em;">
                            <li><a href="#troubleshooting" style="color: #6c757d; text-decoration: none;">ปัญหาที่พบบ่อย</a></li>
                            <li><a href="#troubleshooting" style="color: #6c757d; text-decoration: none;">วิธีขอความช่วยเหลือ</a></li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>

        {{-- เมนูด่วน --}}
        <div style="background: white; padding: 15px; border-radius: 8px; margin-top: 20px; border-left: 4px solid #ffc107;">
            <h5 style="color: #856404; margin-bottom: 10px;">⚡ เมนูด่วน</h5>
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                <a href="#create" style="background: #d4edda; color: #155724; padding: 5px 10px; border-radius: 15px; text-decoration: none; font-size: 0.85em;">สร้างลูกค้าใหม่</a>
                <a href="#search" style="background: #d1ecf1; color: #0c5460; padding: 5px 10px; border-radius: 15px; text-decoration: none; font-size: 0.85em;">ค้นหาลูกค้า</a>
                <a href="#visa-types" style="background: #f8d7da; color: #721c24; padding: 5px 10px; border-radius: 15px; text-decoration: none; font-size: 0.85em;">ประเภทวีซ่า</a>
                <a href="#file-management" style="background: #e2e3e5; color: #383d41; padding: 5px 10px; border-radius: 15px; text-decoration: none; font-size: 0.85em;">จัดการไฟล์</a>
                <a href="#tips" style="background: #fff3cd; color: #856404; padding: 5px 10px; border-radius: 15px; text-decoration: none; font-size: 0.85em;">เคล็ดลับ</a>
                <a href="#troubleshooting" style="background: #f5c6cb; color: #721c24; padding: 5px 10px; border-radius: 15px; text-decoration: none; font-size: 0.85em;">แก้ไขปัญหา</a>
            </div>
        </div>
    </div>

    {{-- แถบนำทาง --}}
    <div id="navigation-bar" style="position: sticky; top: 0; background: white; padding: 10px 0; border-bottom: 1px solid #e9ecef; margin-bottom: 20px; z-index: 100; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
            <a href="#structure" style="color: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 20px; background: #f8f9fa; font-size: 0.9em; transition: all 0.3s;" onmouseover="this.style.background='#007bff'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#007bff'">โครงสร้าง</a>
            <a href="#create" style="color: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 20px; background: #f8f9fa; font-size: 0.9em; transition: all 0.3s;" onmouseover="this.style.background='#007bff'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#007bff'">สร้าง</a>
            <a href="#update" style="color: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 20px; background: #f8f9fa; font-size: 0.9em; transition: all 0.3s;" onmouseover="this.style.background='#007bff'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#007bff'">แก้ไข</a>
            <a href="#delete" style="color: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 20px; background: #f8f9fa; font-size: 0.9em; transition: all 0.3s;" onmouseover="this.style.background='#007bff'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#007bff'">ลบ</a>
            <a href="#search" style="color: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 20px; background: #f8f9fa; font-size: 0.9em; transition: all 0.3s;" onmouseover="this.style.background='#007bff'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#007bff'">ค้นหา</a>
            <a href="#visa-types" style="color: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 20px; background: #f8f9fa; font-size: 0.9em; transition: all 0.3s;" onmouseover="this.style.background='#007bff'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#007bff'">วีซ่า</a>
            <a href="#tips" style="color: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 20px; background: #f8f9fa; font-size: 0.9em; transition: all 0.3s;" onmouseover="this.style.background='#007bff'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#007bff'">เคล็ดลับ</a>
            <a href="#troubleshooting" style="color: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 20px; background: #f8f9fa; font-size: 0.9em; transition: all 0.3s;" onmouseover="this.style.background='#007bff'; this.style.color='white'" onmouseout="this.style.background='#f8f9fa'; this.style.color='#007bff'">แก้ปัญหา</a>
        </div>
    </div>
    
    <h2 id="structure">1. โครงสร้างข้อมูล Customer</h2>
    <h3>1.1 ตารางหลัก</h3>
    <ul>
        <li>ตารางหลัก: <b>customer</b></li>
        <li>Primary Key: <b>customer_id</b></li>
        <li>ตารางเชื่อมโยง: <b>nationality</b>, <b>visa_type</b>, <b>customer_file</b></li>
    </ul>

    <h3>1.2 ฟิลด์สำคัญ</h3>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr style="background: #f8f9fa; border: 1px solid #ddd;">
            <th style="padding: 10px; border: 1px solid #ddd;">ฟิลด์</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ประเภท</th>
            <th style="padding: 10px; border: 1px solid #ddd;">คำอธิบาย</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>customer_prefix</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">String</td>
            <td style="padding: 8px; border: 1px solid #ddd;">คำนำหน้าชื่อ</td>
            <td style="padding: 8px; border: 1px solid #ddd;">Mr., Mrs., Ms.</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>customer_name</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">String</td>
            <td style="padding: 8px; border: 1px solid #ddd;">ชื่อ-นามสกุล</td>
            <td style="padding: 8px; border: 1px solid #ddd;">John Smith</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>customer_nationality</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Integer</td>
            <td style="padding: 8px; border: 1px solid #ddd;">รหัสสัญชาติ (FK)</td>
            <td style="padding: 8px; border: 1px solid #ddd;">1 (Thai), 2 (USA)</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>customer_passport</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">String</td>
            <td style="padding: 8px; border: 1px solid #ddd;">เลขหนังสือเดินทาง</td>
            <td style="padding: 8px; border: 1px solid #ddd;">AB1234567</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>customer_visa_type</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Integer</td>
            <td style="padding: 8px; border: 1px solid #ddd;">ประเภทวีซ่า (FK)</td>
            <td style="padding: 8px; border: 1px solid #ddd;">1 (Retirement), 2 (ED)</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>customer_contact</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">String</td>
            <td style="padding: 8px; border: 1px solid #ddd;">ข้อมูลติดต่อ</td>
            <td style="padding: 8px; border: 1px solid #ddd;">Tel: 081-234-5678</td>
        </tr>
    </table>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\customer\customer-img-1.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="create">2. การสร้างข้อมูลลูกค้า (Create)</h2>
    
    <h3>2.1 เข้าสู่หน้าสร้างลูกค้า</h3>
    <ol>
        <li>ไปที่เมนู <b>Customer</b> ในแถบเมนูหลัก</li>
        <li>กดปุ่ม <b>เพิ่มข้อมูล</b> (สีเขียว มีไอคอน +)</li>
        <li>ระบบจะพาไปยังหน้าฟอร์มสร้างลูกค้าใหม่</li>
    </ol>

    <h3>2.2 ขั้นตอนการกรอกข้อมูล</h3>
    <div style="background: #fff3cd; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>⚠️ สำคัญ:</b> ต้องเลือก <b>Visa Type</b> ก่อนเสมอ เพราะระบบจะเปลี่ยนฟอร์มตามประเภทวีซ่า
    </div>

    <ol>
        <li><b>เลือก Visa Type:</b>
            <ul>
                <li>Retirement Visa (สำหรับผู้เกษียณอายุ)</li>
                <li>Education Visa (สำหรับนักเรียน/นักศึกษา)</li>
                <li>Tourist Visa (สำหรับนักท่องเที่ยว)</li>
            </ul>
        </li>
        <li><b>กรอกข้อมูลส่วนตัว:</b>
            <ul>
                <li>Prefix: Mr., Mrs., Ms., Dr.</li>
                <li>ชื่อ-นามสกุล: ตัวอย่าง "John Smith"</li>
                <li>วันเกิด: รูปแบบ DD/MM/YYYY</li>
                <li>สัญชาติ: เลือกจาก Dropdown</li>
            </ul>
        </li>
        <li><b>ข้อมูลเอกสาร:</b>
            <ul>
                <li>เลข Passport: ตัวอย่าง "AB1234567"</li>
                <li>วันหมดอายุ Passport</li>
                <li>วันหมดอายุวีซ่า</li>
            </ul>
        </li>
        <li><b>ข้อมูลติดต่อ:</b>
            <ul>
                <li>เบอร์โทร: ตัวอย่าง "081-234-5678"</li>
                <li>อีเมล: ตัวอย่าง "john@email.com"</li>
                <li>ที่อยู่ในไทย: ที่อยู่ปัจจุบัน</li>
            </ul>
        </li>
        <li><b>แนบไฟล์เอกสาร</b> (ถ้ามี):
            <ul>
                <li>สแกน Passport</li>
                <li>สแกนวีซ่า</li>
                <li>เอกสารอื่น ๆ</li>
            </ul>
        </li>
        <li><b>บันทึกข้อมูล:</b>
            <ul>
                <li>กด <b>Save</b> เพื่อบันทึกข้อมูลทั่วไป</li>
                <li>กด <b>Save and Add Job Order</b> เพื่อบันทึกและสร้างงานต่อเนื่อง</li>
            </ul>
        </li>
    </ol>

    <h3>2.3 ตัวอย่างการกรอกข้อมูล</h3>
    <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>ตัวอย่างข้อมูลลูกค้า Retirement Visa:</b><br>
        • Prefix: Mr.<br>
        • Name: John Smith<br>
        • Nationality: American<br>
        • Passport: AB1234567<br>
        • Date of Birth: 15/03/1955<br>
        • Contact: Tel: 081-234-5678, Line: johnsmith<br>
        • Email: john.smith@email.com<br>
        • Address: 123/45 Sukhumvit Road, Bangkok<br>
    </div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\customer\customer-img-2.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="update">3. การแก้ไขข้อมูลลูกค้า (Update)</h2>
    
    <h3>3.1 วิธีเข้าถึงฟอร์มแก้ไข</h3>
    <ol>
        <li><b>จากหน้ารายการลูกค้า:</b>
            <ul>
                <li>ค้นหาลูกค้าที่ต้องการแก้ไข</li>
                <li>กดปุ่ม <b>Edit</b> (รูปดินสอ สีฟ้า) ในคอลัมน์ Control</li>
            </ul>
        </li>
        <li><b>จากหน้ารายละเอียดลูกค้า:</b>
            <ul>
                <li>กดปุ่ม <b>View</b> (รูปตา) เพื่อดูรายละเอียด</li>
                <li>จากนั้นกดปุ่ม <b>Edit</b> ในหน้ารายละเอียด</li>
            </ul>
        </li>
    </ol>

    <h3>3.2 ขั้นตอนการแก้ไข</h3>
    <ol>
        <li><b>ตรวจสอบข้อมูลเดิม:</b> ระบบจะแสดงข้อมูลเดิมในฟอร์ม</li>
        <li><b>แก้ไขข้อมูลที่ต้องการ:</b>
            <ul>
                <li>สามารถแก้ไขได้ทุกฟิลด์ ยกเว้น ID และวันที่สร้าง</li>
                <li>หากเปลี่ยน Visa Type ฟอร์มจะปรับตามประเภทใหม่</li>
            </ul>
        </li>
        <li><b>เพิ่มหรือลบไฟล์:</b>
            <ul>
                <li>สามารถเพิ่มไฟล์ใหม่ได้</li>
                <li>ลบไฟล์เดิมที่ไม่ใช้แล้ว</li>
            </ul>
        </li>
        <li><b>บันทึกการเปลี่ยนแปลง:</b> กดปุ่ม <b>Save</b></li>
    </ol>

    <h3>3.3 ข้อควรระวังในการแก้ไข</h3>
    <div style="background: #f8d7da; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>⚠️ คำเตือน:</b><br>
        • หากลูกค้ามี Job ที่ยังไม่เสร็จสิ้น การเปลี่ยนแปลงข้อมูลอาจส่งผลต่อ Job นั้น<br>
        • ควรตรวจสอบข้อมูลให้ถูกต้องก่อนบันทึก เพราะอาจมีระบบอื่นใช้ข้อมูลนี้<br>
        • การเปลี่ยน Passport Number ควรระวังเป็นพิเศษ
    </div>

    <h3>3.4 ตัวอย่างการแก้ไขข้อมูล</h3>
    <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>สถานการณ์:</b> ลูกค้าย้ายที่อยู่และเปลี่ยนเบอร์โทร<br><br>
        <b>ข้อมูลเดิม:</b><br>
        • Address: 123/45 Sukhumvit Road, Bangkok<br>
        • Contact: Tel: 081-234-5678<br><br>
        <b>ข้อมูลใหม่:</b><br>
        • Address: 789/12 Silom Road, Bangkok<br>
        • Contact: Tel: 082-345-6789<br><br>
        <b>วิธีแก้ไข:</b> แก้ไขเฉพาะฟิลด์ที่เปลี่ยนแปลง แล้วกด Save
    </div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
         <img src="{{asset('manual-image\customer\customer-img-3.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="delete">4. การลบข้อมูลลูกค้า (Delete)</h2>
    
    <h3>4.1 ขั้นตอนการลบ</h3>
    <ol>
        <li><b>ค้นหาลูกค้าที่ต้องการลบ</b> ในตารางรายการ</li>
        <li><b>กดปุ่ม Delete</b> (รูปถังขยะ สีแดง) ในคอลัมน์ Control</li>
        <li><b>ระบบจะแสดงกล่องยืนยัน</b> "Do you want to Delete Customer?"</li>
        <li><b>เลือกการดำเนินการ:</b>
            <ul>
                <li>กด <b>Confirm</b> เพื่อยืนยันการลบ</li>
                <li>กด <b>Don't Delete</b> เพื่อยกเลิก</li>
            </ul>
        </li>
        <li><b>ระบบจะแสดงผลลัพธ์:</b>
            <ul>
                <li>"Delete customer Successfully!" หากลบสำเร็จ</li>
                <li>"Delete customer Error!" หากเกิดข้อผิดพลาด</li>
            </ul>
        </li>
    </ol>

    <h3>4.2 เงื่อนไขการลบ</h3>
    <div style="background: #f8d7da; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>🚫 ไม่สามารถลบได้หาก:</b><br>
        • ลูกค้ามี Job Order ที่ยังไม่เสร็จสิ้น<br>
        • ลูกค้ามี Transaction ที่เชื่อมโยงอยู่<br>
        • ลูกค้าถูกอ้างอิงในระบบอื่น<br><br>
        <b>💡 วิธีแก้ไข:</b> ต้องลบหรือโอนย้าย Job/Transaction ก่อน จึงจะลบลูกค้าได้
    </div>

    <h3>4.3 สิทธิ์การลบ</h3>
    <ul>
        <li><b>Admin:</b> สามารถลบได้ทุกข้อมูล (หากไม่มีข้อจำกัด)</li>
        <li><b>Operator:</b> ไม่สามารถลบข้อมูลลูกค้าได้</li>
        <li><b>Loyal:</b> ไม่สามารถลบข้อมูลลูกค้าได้</li>
    </ul>

    <h3>4.4 ผลของการลบ</h3>
    <div style="background: #fff3cd; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>⚠️ เมื่อลบลูกค้าแล้ว:</b><br>
        • ข้อมูลในตาราง customer จะถูกลบถาวร<br>
        • ไฟล์เอกสารที่แนบจะถูกลบออกจากเซิร์ฟเวอร์<br>
        • ไม่สามารถกู้คืนข้อมูลได้ (ต้องสร้างใหม่)<br>
        • รายการที่เชื่อมโยงจะอ้างอิงไม่ได้
    </div>

    <h3>4.5 ตัวอย่างการลบ</h3>
    <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>สถานการณ์:</b> ต้องการลบข้อมูลลูกค้าที่ใส่ข้อมูลผิด<br><br>
        <b>ขั้นตอน:</b><br>
        1. ค้นหาลูกค้า "John Smith" ในตาราง<br>
        2. กดปุ่มถังขยะสีแดงในแถวของ John Smith<br>
        3. ระบบถาม "Do you want to Delete Customer?"<br>
        4. กด "Confirm" เพื่อยืนยัน<br>
        5. ระบบแสดง "Delete customer Successfully!"<br>
        6. แถวของ John Smith หายไปจากตาราง
    </div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[แทรกรูปภาพปุ่มลบลูกค้า]</div>

    <h2 id="search">5. การค้นหาและแสดงผล (Search & Table)</h2>
    
    <h3>5.1 ฟอร์มค้นหา</h3>
    <p>ระบบมีฟิลเตอร์การค้นหาหลากหลายรูปแบบ:</p>
    
    <h4>5.1.1 ช่องค้นหาต่าง ๆ</h4>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr style="background: #f8f9fa; border: 1px solid #ddd;">
            <th style="padding: 10px; border: 1px solid #ddd;">ฟิลด์</th>
            <th style="padding: 10px; border: 1px solid #ddd;">รูปแบบ</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>Visa Type</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Dropdown</td>
            <td style="padding: 8px; border: 1px solid #ddd;">Retirement, Education</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>Nationality</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Select2 Dropdown</td>
            <td style="padding: 8px; border: 1px solid #ddd;">US : United States</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>CODE</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Text Input</td>
            <td style="padding: 8px; border: 1px solid #ddd;">CUS001, CUS002</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>Name</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Text Input</td>
            <td style="padding: 8px; border: 1px solid #ddd;">John, Smith, Alan</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>Passport No.</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Text Input</td>
            <td style="padding: 8px; border: 1px solid #ddd;">AB1234567</td>
        </tr>
        <tr style="border: 1px solid #ddd;">
            <td style="padding: 8px; border: 1px solid #ddd;"><b>Visa Expired</b></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Date Range</td>
            <td style="padding: 8px; border: 1px solid #ddd;">01/01/2024 - 31/12/2024</td>
        </tr>
    </table>

    <h4>5.1.2 วิธีการค้นหา</h4>
    <ol>
        <li><b>เลือก Visa Type:</b> ระบบจะเปลี่ยนตารางตามประเภทวีซ่า</li>
        <li><b>กรอกเงื่อนไขค้นหา:</b> สามารถใส่หลายเงื่อนไขพร้อมกันได้</li>
        <li><b>กดปุ่ม Search:</b> ระบบจะแสดงผลในตารางด้านล่าง</li>
        <li><b>ล้างเงื่อนไข:</b> ล้างข้อมูลในฟอร์มแล้วค้นหาใหม่</li>
    </ol>

    <h3>5.2 ตารางแสดงผล</h3>
    
    <h4>5.2.1 คอลัมน์ในตาราง (Retirement Visa)</h4>
    <ul>
        <li><b>Prefix:</b> คำนำหน้าชื่อ</li>
        <li><b>Name:</b> ชื่อ-นามสกุลลูกค้า</li>
        <li><b>Nationality:</b> สัญชาติ</li>
        <li><b>Passport No:</b> เลขหนังสือเดินทาง</li>
        <li><b>Date of Birth:</b> วันเกิด</li>
        <li><b>Passport Expiry Date:</b> วันหมดอายุ Passport</li>
        <li><b>Visa Expiry:</b> วันหมดอายุวีซ่า</li>
        <li><b>Re-Entry:</b> ข้อมูล Re-Entry Permit</li>
        <li><b>Contact:</b> ข้อมูลติดต่อ (แสดงบางส่วน)</li>
        <li><b>Address In Thai:</b> ที่อยู่ในไทย (แสดง/ซ่อนได้)</li>
        <li><b>E-Mail:</b> อีเมล</li>
        <li><b>Note:</b> หมายเหตุ (แสดง/ซ่อนได้)</li>
        <li><b>Control:</b> ปุ่มจัดการ (View, Edit, Delete)</li>
    </ul>

    <h4>5.2.2 ฟีเจอร์ตาราง</h4>
    <ul>
        <li><b>DataTable:</b> มี pagination, sorting อัตโนมัติ</li>
        <li><b>Show/Hide:</b> คลิก "Show" เพื่อดูข้อมูลเต็ม, "Hide" เพื่อซ่อน</li>
        <li><b>Responsive:</b> ปรับขนาดตามหน้าจอ</li>
        <li><b>Real-time:</b> ข้อมูลอัปเดตทันทีหลังจากแก้ไข/ลบ</li>
    </ul>

    <h3>5.3 ตัวอย่างการค้นหา</h3>
    <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>ตัวอย่างที่ 1: ค้นหาลูกค้าชาวอเมริกันที่มีวีซ่าหมดอายุในเดือนหน้า</b><br>
        • Visa Type: Retirement<br>
        • Nationality: US : United States<br>
        • Visa Expired: 01/01/2025 - 31/01/2025<br>
        • กด Search<br><br>

        <b>ตัวอย่างที่ 2: ค้นหาลูกค้าด้วยชื่อ</b><br>
        • Visa Type: Education<br>
        • Name: John<br>
        • กด Search<br><br>

        <b>ตัวอย่างที่ 3: ค้นหาด้วยเลข Passport</b><br>
        • Passport No.: AB1234567<br>
        • กด Search
    </div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\customer\customer-img-4.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="relationships">6. ความสัมพันธ์ของข้อมูลและขั้นตอนการเลือก</h2>
    
    <h3>6.1 การเชื่อมโยงข้อมูล</h3>
    <ul>
        <li><b>Customer → Job Order:</b> ลูกค้าหนึ่งคนสามารถมีหลาย Job ได้</li>
        <li><b>Customer → Transaction:</b> เชื่อมโยงผ่าน Job Order</li>
        <li><b>Customer → Nationality:</b> ความสัมพันธ์แบบ Many-to-One</li>
        <li><b>Customer → Visa Type:</b> ความสัมพันธ์แบบ Many-to-One</li>
        <li><b>Customer → Customer Files:</b> ความสัมพันธ์แบบ One-to-Many</li>
    </ul>

    <h3>6.2 ขั้นตอนการเลือกข้อมูล (Data Dependencies)</h3>
    
    <h4>6.2.1 การสร้างลูกค้าใหม่</h4>
    <div style="background: #e7f3ff; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>ลำดับที่ 1: เลือก Visa Type</b><br>
        → ระบบจะโหลดฟอร์มที่เหมาะสมกับประเภทวีซ่า<br>
        → ฟิลด์บางอันจะแสดง/ซ่อนตามประเภทวีซ่า<br><br>

        <b>ลำดับที่ 2: เลือก Nationality</b><br>
        → ระบบจะโหลดรายการสัญชาติจากตาราง nationality<br>
        → แสดงในรูปแบบ "รหัสประเทศ : ชื่อประเทศ"<br><br>

        <b>ลำดับที่ 3: กรอกข้อมูลอื่น ๆ</b><br>
        → สามารถกรอกได้ตามลำดับใด ๆ<br>
        → ระบบจะ validate ข้อมูลก่อนบันทึก
    </div>

    <h4>6.2.2 การใช้ข้อมูลลูกค้าในระบบอื่น</h4>
    <ol>
        <li><b>สร้าง Job Order:</b>
            <ul>
                <li>เลือก Customer จาก Dropdown</li>
                <li>ระบบจะดึงข้อมูลลูกค้ามาแสดงอัตโนมัติ</li>
                <li>ไม่สามารถแก้ไขข้อมูลลูกค้าในหน้านี้ได้</li>
            </ul>
        </li>
        <li><b>สร้าง Transaction:</b>
            <ul>
                <li>เชื่อมโยงผ่าน Job Order</li>
                <li>ข้อมูลลูกค้าจะแสดงในรายงาน</li>
            </ul>
        </li>
        <li><b>รายงานต่าง ๆ:</b>
            <ul>
                <li>ข้อมูลลูกค้าใช้ในการ filter และ group ข้อมูล</li>
                <li>แสดงในรายงานสถิติ</li>
            </ul>
        </li>
    </ol>

    <h3>6.3 ตัวอย่างการใช้งานแบบ Step-by-Step</h3>
    <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>สถานการณ์:</b> ลูกค้าใหม่มาขอทำ Retirement Visa และต้องการสร้าง Job<br><br>

        <b>Step 1: สร้างข้อมูลลูกค้า</b><br>
        1. เข้าเมนู Customer → เพิ่มข้อมูล<br>
        2. เลือก Visa Type: "Retirement"<br>
        3. เลือก Nationality: "US : United States"<br>
        4. กรอกข้อมูลส่วนตัว<br>
        5. กด "Save and Add Job Order"<br><br>

        <b>Step 2: ระบบจะพาไป Job Order</b><br>
        1. ข้อมูลลูกค้าจะถูกเลือกไว้แล้ว<br>
        2. เลือก Job Type และรายละเอียด<br>
        3. เพิ่ม Transaction<br>
        4. บันทึก Job Order<br><br>

        <b>Step 3: ผลลัพธ์</b><br>
        • ระบบมีข้อมูลลูกค้าใหม่<br>
        • มี Job Order ที่เชื่อมโยง<br>
        • สามารถติดตามงานได้
    </div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
         <img src="{{asset('manual-image\customer\customer-img-5.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="visa-types">7. รายละเอียดประเภทวีซ่า</h2>
    
    <h3>7.1 Retirement Visa</h3>
    <ul>
        <li><b>เป้าหมาย:</b> คนต่างชาติอายุ 50 ปีขึ้นไป</li>
        <li><b>ฟิลด์พิเศษ:</b> Bank Account, Income Certificate</li>
        <li><b>เอกสารจำเป็น:</b> Bank Statement, Medical Certificate</li>
        <li><b>ระยะเวลา:</b> 1 ปี (ต่ออายุได้)</li>
    </ul>

    <h3>7.2 Education Visa (ED)</h3>
    <ul>
        <li><b>เป้าหมาย:</b> นักเรียน นักศึกษา</li>
        <li><b>ฟิลด์พิเศษ:</b> School Name, Course Details</li>
        <li><b>เอกสารจำเป็น:</b> Acceptance Letter, Academic Records</li>
        <li><b>ระยะเวลา:</b> ตามหลักสูตร</li>
    </ul>

    <h3>7.3 Tourist Visa</h3>
    <ul>
        <li><b>เป้าหมาย:</b> นักท่องเที่ยว</li>
        <li><b>ฟิลด์พิเศษ:</b> Hotel Booking, Return Ticket</li>
        <li><b>เอกสารจำเป็น:</b> Passport, Photo</li>
        <li><b>ระยะเวลา:</b> 30-60 วัน</li>
    </ul>

    <h2 id="file-management">8. การจัดการไฟล์เอกสาร</h2>
    
    <h3>8.1 การอัปโหลดไฟล์</h3>
    <ol>
        <li>ในส่วน "Note & File Attach"</li>
        <li>กดปุ่ม "Choose File"</li>
        <li>เลือกไฟล์จากคอมพิวเตอร์</li>
        <li>ใส่ชื่อไฟล์ (ถ้าต้องการ)</li>
        <li>กดปุ่ม "Add More File" สำหรับไฟล์เพิ่มเติม</li>
    </ol>

    <h3>8.2 ประเภทไฟล์ที่รองรับ</h3>
    <ul>
        <li><b>รูปภาพ:</b> JPG, PNG, GIF</li>
        <li><b>เอกสาร:</b> PDF, DOC, DOCX</li>
        <li><b>ขนาดไฟล์:</b> สูงสุด 10 MB ต่อไฟล์</li>
    </ul>

    <h3>8.3 การจัดเก็บไฟล์</h3>
    <ul>
        <li>ไฟล์จะถูกเก็บในโฟลเดอร์ <code>public/storage/customer/{customer_id}/</code></li>
        <li>ชื่อไฟล์จะถูกเปลี่ยนเป็น unique name</li>
        <li>สามารถดาวน์โหลดหรือดูไฟล์ได้ผ่านลิงก์</li>
    </ul>

    <h2 id="tips">9. เคล็ดลับการใช้งาน</h2>
    
    <h3>9.1 การค้นหาอย่างมีประสิทธิภาพ</h3>
    <ul>
        <li>ใช้ Date Range เพื่อหาลูกค้าที่วีซ่าใกล้หมดอายุ</li>
        <li>ค้นหาด้วยบางส่วนของชื่อ เช่น "John" จะหา "John Smith"</li>
        <li>ใช้ Nationality filter เพื่อจัดกลุ่มลูกค้า</li>
    </ul>

    <h3>9.2 การป้องกันข้อผิดพลาด</h3>
    <ul>
        <li>ตรวจสอบเลข Passport ให้ถูกต้องก่อนบันทึก</li>
        <li>ใส่วันหมดอายุที่ถูกต้อง</li>
        <li>ตรวจสอบการสะกดชื่อ</li>
    </ul>

    <h3>9.3 การบำรุงรักษาข้อมูล</h3>
    <ul>
        <li>อัปเดตข้อมูลติดต่อเมื่อลูกค้าเปลี่ยน</li>
        <li>เพิ่มหมายเหตุเมื่อมีข้อมูลสำคัญ</li>
        <li>ลบไฟล์เก่าที่ไม่ใช้แล้ว</li>
    </ul>

    <h2 id="troubleshooting">10. การแก้ไขปัญหา</h2>
    
    <h3>10.1 ปัญหาที่พบบ่อย</h3>
    <div style="background: #fff3cd; padding: 15px; border-radius: 5px; margin: 10px 0;">
        <b>ปัญหา:</b> ไม่สามารถลบลูกค้าได้<br>
        <b>สาเหตุ:</b> ลูกค้ามี Job ที่ยังไม่เสร็จสิ้น<br>
        <b>วิธีแก้:</b> ปิด Job หรือโอนย้าย Job ให้ลูกค้าอื่นก่อน<br><br>

        <b>ปัญหา:</b> ไม่เจอข้อมูลลูกค้าในการค้นหา<br>
        <b>สาเหตุ:</b> เลือก Visa Type ไม่ถูกต้อง<br>
        <b>วิธีแก้:</b> เปลี่ยน Visa Type หรือค้นหาด้วยเงื่อนไขอื่น<br><br>

        <b>ปัญหา:</b> อัปโหลดไฟล์ไม่ได้<br>
        <b>สาเหตุ:</b> ไฟล์ใหญ่เกินไปหรือประเภทไฟล์ไม่รองรับ<br>
        <b>วิธีแก้:</b> ลดขนาดไฟล์หรือแปลงเป็น PDF
    </div>

    <h3>10.2 การติดต่อขอความช่วยเหลือ</h3>
    <ul>
        <li>ติดต่อ Admin หากมีปัญหาด้านสิทธิ์</li>
        <li>ติดต่อ IT Support หากมีปัญหาทางเทคนิค</li>
        <li>อ่านคู่มือนี้อีกครั้งเพื่อหาวิธีแก้ไข</li>
    </ul>

    <hr>
    <div style="color:#888; font-size:0.95em; text-align: center;">
        <p><b>คู่มือการใช้งานระบบ Customer</b></p>
        <p>เวอร์ชัน 1.0 | ปรับปรุงล่าสุด: 27 มิถุนายน 2025</p>
        <p>สำหรับผู้ใช้งานระบบ Accounting Rainbow</p>
    </div>
</div>    <style>
    /* CSS สำหรับแถบเมนูนำทางหลัก */
    nav a:hover {
        background: rgba(255,255,255,0.2) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    /* CSS สำหรับเมนูด่วน */
    .quick-menu-grid a:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2) !important;
    }
    
    /* CSS สำหรับเมนูสารบัญ */
    #structure, #create, #update, #delete, #search, #relationships, 
    #visa-types, #file-management, #tips, #troubleshooting {
        scroll-margin-top: 100px;
    }
    
    /* CSS สำหรับตาราง */
    table {
        font-size: 0.9em;
    }
    
    /* CSS สำหรับกล่องข้อความ */
    .alert-warning {
        background: #fff3cd;
        border: 1px solid #ffeaa7;
        border-radius: 5px;
        padding: 15px;
        margin: 10px 0;
    }
    
    .alert-danger {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        padding: 15px;
        margin: 10px 0;
    }
    
    .alert-info {
        background: #e7f3ff;
        border: 1px solid #b3d7ff;
        border-radius: 5px;
        padding: 15px;
        margin: 10px 0;
    }

    /* CSS สำหรับเมนูคู่มือ */
    .manual-menu {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .manual-menu a:hover {
        background: rgba(255,255,255,0.3) !important;
        transform: translateY(-2px);
    }

    .navigation-bar {
        backdrop-filter: blur(10px);
        background: rgba(255,255,255,0.95) !important;
    }

    .quick-menu-item {
        transition: all 0.3s ease;
    }

    .quick-menu-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    /* CSS สำหรับการปรับแต่งตาราง */
    table th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-align: center;
        font-weight: 600;
    }

    table tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    table tr:hover {
        background-color: #e3f2fd;
        transition: background-color 0.3s ease;
    }

    /* CSS สำหรับเอฟเฟกต์ของกล่องตัวอย่าง */
    .example-box {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-left: 4px solid #007bff;
        padding: 20px;
        border-radius: 8px;
        margin: 15px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .warning-box {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        border-left: 4px solid #ffc107;
        padding: 20px;
        border-radius: 8px;
        margin: 15px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .danger-box {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        border-left: 4px solid #dc3545;
        padding: 20px;
        border-radius: 8px;
        margin: 15px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .info-box {
        background: linear-gradient(135deg, #e7f3ff 0%, #cce7ff 100%);
        border-left: 4px solid #007bff;
        padding: 20px;
        border-radius: 8px;
        margin: 15px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    /* เอฟเฟกต์ smooth scroll */
    html {
        scroll-behavior: smooth;
    }

    /* ปุ่ม Back to Top */
    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 12px 15px;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .back-to-top:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        color: white;
        text-decoration: none;
    }

    /* CSS สำหรับ responsive */
    @media (max-width: 768px) {
        /* แถบเมนูนำทาง */
        nav div:first-child h2 {
            font-size: 1.1em !important;
        }
        
        nav div:last-child {
            gap: 3px !important;
        }
        
        nav div:last-child a {
            padding: 6px 8px !important;
            font-size: 0.8em !important;
        }
        
        /* เมนูด่วน */
        .quick-menu-grid {
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)) !important;
            gap: 10px !important;
        }
        
        .quick-menu-grid a {
            padding: 15px !important;
        }
        
        .quick-menu-grid a div:first-child {
            font-size: 1.5em !important;
            margin-bottom: 8px !important;
        }
        
        .quick-menu-grid a div:nth-child(2) {
            font-size: 0.9em !important;
            margin-bottom: 3px !important;
        }
        
        .quick-menu-grid a div:last-child {
            font-size: 0.8em !important;
        }
        
        /* เมนูคู่มือเดิม */
        .manual-menu {
            padding: 15px !important;
        }
        
        .manual-menu h3 {
            font-size: 1.3em;
        }
        
        /* สารบัญ */
        .toc-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }
        
        /* ตาราง */
        table {
            font-size: 0.8em;
        }
        
        table th, table td {
            padding: 6px !important;
        }
        
        /* ปรับ container หลัก */
        #top {
            max-width: 95% !important;
            margin: 0 auto !important;
        }
    }
    
    @media (max-width: 480px) {
        nav {
            padding: 10px 0 !important;
        }
        
        nav div:first-child {
            padding: 0 10px !important;
        }
        
        nav div:last-child {
            justify-content: center !important;
            margin-top: 10px !important;
        }
        
        .quick-menu-grid {
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)) !important;
        }
    }
</style>

{{-- ปุ่ม Back to Top --}}
<a href="#top" class="back-to-top" title="กลับไปด้านบน">
    ⬆️
</a>

<script>
    // JavaScript สำหรับ smooth scrolling และ highlight menu
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling สำหรับลิงก์ทั้งหมด
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // แสดง/ซ่อนปุ่ม Back to Top
        const backToTop = document.querySelector('.back-to-top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.style.opacity = '1';
                backToTop.style.visibility = 'visible';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.visibility = 'hidden';
            }
        });

        // เริ่มต้นซ่อนปุ่ม
        backToTop.style.opacity = '0';
        backToTop.style.visibility = 'hidden';
        backToTop.style.transition = 'all 0.3s ease';

        // ไฮไลต์เมนูในแถบนำทางตามส่วนที่กำลังดู
        const navLinks = document.querySelectorAll('nav a[href^="#"]');
        const sections = document.querySelectorAll('[id]');
        
        function highlightNavigation() {
            let currentSection = '';
            
            sections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= 150 && rect.bottom >= 150) {
                    currentSection = section.id;
                }
            });
            
            navLinks.forEach(link => {
                link.style.background = 'rgba(255,255,255,0.1)';
                link.style.fontWeight = 'normal';
                
                if (link.getAttribute('href') === '#' + currentSection) {
                    link.style.background = 'rgba(255,255,255,0.3)';
                    link.style.fontWeight = '600';
                }
            });
        }
        
        window.addEventListener('scroll', highlightNavigation);
        highlightNavigation(); // เรียกใช้ครั้งแรกเมื่อโหลดหน้า
        
        // เพิ่มเอฟเฟกต์ hover สำหรับเมนูด่วน
        const quickMenuItems = document.querySelectorAll('[style*="grid-template-columns"] a');
        quickMenuItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
                this.style.transition = 'all 0.3s ease';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    });
</script>
