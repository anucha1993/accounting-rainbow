@extends('layouts.main')

@section('content')
{{-- คู่มือการใช้งานระบบ Job Order --}}

<nav style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); padding: 15px 0; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; flex-wrap: wrap;">
        <div style="display: flex; align-items: center;">
            <h2 style="margin: 0; color: white; font-size: 1.4em;">📖 คู่มือระบบ Job Order</h2>
        </div>
        <div style="display: flex; gap: 5px; align-items: center; flex-wrap: wrap;">
            <a href="#structure" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">📊 โครงสร้าง</a>
            <a href="#create" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">➕ สร้างงาน</a>
            <a href="#transaction" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">💸 จัดการธุรกรรม</a>
            <a href="#update" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">✏️ แก้ไข</a>
            <a href="#delete" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">🗑️ ลบ</a>
            <a href="#search" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">🔍 ค้นหา</a>
            <a href="#relationships" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">🔗 ความสัมพันธ์</a>
            <a href="#compare" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">⚖️ เปรียบเทียบ</a>
            <a href="#example" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">📝 ตัวอย่าง</a>
        </div>
    </div>
</nav>

<div id="top" style="max-width: 1000px; margin: auto; font-size: 1.1em;">
    <div style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 25px; border-radius: 15px; margin-bottom: 30px; border: 1px solid #dee2e6; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h3 style="color: #495057; margin-bottom: 20px; text-align: center; font-size: 1.3em;">🚀 เมนูการใช้งานด่วน</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px;">
            <a href="#create" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">➕</div>
                <div style="font-weight: 600; margin-bottom: 5px;">สร้าง Job Order</div>
                <div style="font-size: 0.9em; opacity: 0.9;">เพิ่มงานใหม่</div>
            </a>
            <a href="#transaction" style="background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">💸</div>
                <div style="font-weight: 600; margin-bottom: 5px;">จัดการธุรกรรม</div>
                <div style="font-size: 0.9em; opacity: 0.9;">เพิ่ม/แก้ไข/ลบ รายรับ-รายจ่าย</div>
            </a>
            <a href="#search" style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">🔍</div>
                <div style="font-weight: 600; margin-bottom: 5px;">ค้นหา/กรอง</div>
                <div style="font-size: 0.9em; opacity: 0.9;">ค้นหาและกรองงาน</div>
            </a>
            <a href="#update" style="background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">✏️</div>
                <div style="font-weight: 600; margin-bottom: 5px;">แก้ไขงาน</div>
                <div style="font-size: 0.9em; opacity: 0.9;">อัปเดตข้อมูลงาน</div>
            </a>
            <a href="#delete" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">🗑️</div>
                <div style="font-weight: 600; margin-bottom: 5px;">ลบงาน</div>
                <div style="font-size: 0.9em, opacity: 0.9;">ลบข้อมูลงาน</div>
            </a>
        </div>
    </div>

    <div style="background: #f8f9fa; padding: 25px; border-radius: 10px; margin-bottom: 30px; border: 1px solid #e9ecef;">
        <h3 style="color: #495057; margin-bottom: 20px; text-align: center; border-bottom: 2px solid #007bff; padding-bottom: 10px;">📋 สารบัญ</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px;">
            <div>
                <h4 style="color: #007bff; margin-bottom: 15px; font-size: 1.1em;">🏗️ พื้นฐานและการจัดการ</h4>
                <ol style="line-height: 1.8; color: #495057;">
                    <li><a href="#structure" style="color: #007bff; text-decoration: none;">โครงสร้างข้อมูล Job Order</a></li>
                    <li><a href="#create" style="color: #007bff; text-decoration: none;">การสร้าง Job Order (Create)</a></li>
                    <li><a href="#transaction" style="color: #007bff; text-decoration: none;">การจัดการธุรกรรม (Transaction)</a></li>
                    <li><a href="#update" style="color: #007bff; text-decoration: none;">การแก้ไข Job Order (Update)</a></li>
                    <li><a href="#delete" style="color: #007bff; text-decoration: none;">การลบ Job Order (Delete)</a></li>
                    <li><a href="#search" style="color: #007bff; text-decoration: none;">การค้นหาและแสดงผล (Search & Table)</a></li>
                </ol>
            </div>
            <div>
                <h4 style="color: #28a745; margin-bottom: 15px; font-size: 1.1em;">🔗 ข้อมูลเชิงลึกและเทคนิค</h4>
                <ol start="7" style="line-height: 1.8; color: #495057;">
                    <li><a href="#relationships" style="color: #28a745; text-decoration: none;">ความสัมพันธ์ข้อมูลและการเลือก</a></li>
                    <li><a href="#compare" style="color: #28a745; text-decoration: none;">เปรียบเทียบ/ข้อควรระวัง</a></li>
                    <li><a href="#example" style="color: #28a745; text-decoration: none;">ตัวอย่างการกรอกข้อมูล</a></li>
                </ol>
            </div>
        </div>
    </div>

    <h2 id="structure">1. โครงสร้างข้อมูล Job Order</h2>
    <h3>1.1 ตารางหลัก</h3>
    <ul>
        <li>ตารางหลัก: <b>job_order</b> <br><span style="color:#888;">(ใช้เก็บข้อมูลงานแต่ละรายการ เช่น งานต่อวีซ่า งานขอใบอนุญาต ฯลฯ)</span></li>
        <li>Primary Key: <b>job_order_id</b> <br><span style="color:#888;">(รหัสงานที่ไม่ซ้ำกัน ใช้อ้างอิงถึงงานแต่ละรายการ)</span></li>
        <li>ตารางเชื่อมโยง: <b>customer</b>, <b>job_type</b>, <b>job_detail</b>, <b>transactions</b>, <b>wallet_type</b> <br><span style="color:#888;">(ใช้เชื่อมโยงข้อมูลลูกค้า ประเภทงาน รายละเอียดงาน ธุรกรรม และประเภทกระเป๋าเงิน)</span></li>
    </ul>
    <div style="color:#007bff; margin-bottom:10px;">Tip: โครงสร้างนี้ช่วยให้สามารถติดตามสถานะ รายรับ-รายจ่าย และความสัมพันธ์กับลูกค้าได้อย่างครบถ้วน</div>
    <h3>1.2 ฟิลด์สำคัญ</h3>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr style="background: #f8f9fa; border: 1px solid #ddd;">
            <th style="padding: 10px; border: 1px solid #ddd;">ฟิลด์</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ประเภท</th>
            <th style="padding: 10px; border: 1px solid #ddd;">คำอธิบาย</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_order_number</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">เลขที่งาน (Auto Gen)<br><span style="color:#888;">ระบบจะสร้างให้อัตโนมัติ ใช้สำหรับอ้างอิงงาน</span></td><td style="padding: 8px; border: 1px solid #ddd;">240601001</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_order_customer</td><td style="padding: 8px; border: 1px solid #ddd;">FK</td><td style="padding: 8px; border: 1px solid #ddd;">รหัสลูกค้า<br><span style="color:#888;">เชื่อมโยงกับข้อมูลลูกค้าโดยตรง</span></td><td style="padding: 8px; border: 1px solid #ddd;">1</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_order_type</td><td style="padding: 8px; border: 1px solid #ddd;">FK</td><td style="padding: 8px; border: 1px solid #ddd;">ประเภทงาน<br><span style="color:#888;">เช่น Visa, Work Permit</span></td><td style="padding: 8px; border: 1px solid #ddd;">Visa</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_order_detail</td><td style="padding: 8px; border: 1px solid #ddd;">FK</td><td style="padding: 8px; border: 1px solid #ddd;">รายละเอียดงาน<br><span style="color:#888;">เช่น ต่อวีซ่า 90 วัน, Re-entry</span></td><td style="padding: 8px; border: 1px solid #ddd;">ต่อวีซ่า 90 วัน</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_order_status</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">สถานะ (open/close)<br><span style="color:#888;">open = กำลังดำเนินการ, close = ปิดงานแล้ว</span></td><td style="padding: 8px; border: 1px solid #ddd;">open</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_order_income</td><td style="padding: 8px; border: 1px solid #ddd;">Decimal</td><td style="padding: 8px; border: 1px solid #ddd;">รายรับรวม<br><span style="color:#888;">คำนวณจากธุรกรรมที่เป็นรายรับ</span></td><td style="padding: 8px; border: 1px solid #ddd;">5000.00</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_order_expenses</td><td style="padding: 8px; border: 1px solid #ddd;">Decimal</td><td style="padding: 8px; border: 1px solid #ddd;">รายจ่ายรวม<br><span style="color:#888;">คำนวณจากธุรกรรมที่เป็นรายจ่าย</span></td><td style="padding: 8px; border: 1px solid #ddd;">2000.00</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">job_order_profit</td><td style="padding: 8px; border: 1px solid #ddd;">Decimal</td><td style="padding: 8px; border: 1px solid #ddd;">กำไร<br><span style="color:#888;">รายรับ - รายจ่าย (คำนวณอัตโนมัติ)</span></td><td style="padding: 8px; border: 1px solid #ddd;">3000.00</td></tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Note: ฟิลด์ที่เป็น FK (Foreign Key) จะเชื่อมโยงกับตารางอื่นเพื่อดึงข้อมูลที่เกี่ยวข้องมาแสดง</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\joborder\joborder-img-1.jpg')}}" alt="" style="width: 100%">
    </div>
    <div style="margin-bottom:20px; color:#888;"> <b>Tip:</b> การเข้าใจโครงสร้างข้อมูลจะช่วยให้สามารถแก้ไขปัญหาและตรวจสอบข้อมูลย้อนหลังได้ง่ายขึ้น</div>

    <h2 id="create">2. การสร้าง Job Order (Create)</h2>
    <h3>2.1 ขั้นตอนการสร้าง</h3>
    <ol>
        <li>ไปที่เมนู <b>Job Order</b> ในแถบเมนูหลัก<br><span style="color:#888;">(เมนูนี้จะอยู่ด้านซ้ายหรือบนสุด ขึ้นกับการตั้งค่าระบบ)</span></li>
        <li>กดปุ่ม <b>เพิ่มงาน</b> (สีเขียว มีไอคอน +)<br><span style="color:#888;">(ปุ่มนี้จะอยู่มุมขวาบนของหน้ารายการงาน)</span></li>
        <li>ระบบจะพาไปยังหน้าฟอร์มสร้างงานใหม่<br><span style="color:#888;">(หากต้องการยกเลิก สามารถกดปุ่ม Back หรือ Cancel ได้)</span></li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Tip: การสร้าง Job Order ใหม่จะช่วยให้สามารถติดตามงานและธุรกรรมที่เกี่ยวข้องได้อย่างเป็นระบบ</div>
    <h3>2.2 การกรอกข้อมูล (อธิบายตาม Label ที่ผู้ใช้เห็น)</h3>
    <ul>
        <li><b>Job Date</b> : Set the job date, e.g. <code>2025-06-27</code><br><span style="color:#888;">(วันที่เริ่มงาน สามารถเลือกจากปฏิทินได้)</span></li>
        <li><b>Choose Customer</b> : Select a customer from the list (e.g. <code>John Smith</code>, <code>Jane Doe</code>) or add a new customer<br><span style="color:#888;">(หากไม่มีชื่อลูกค้า สามารถเพิ่มใหม่ได้ทันที)</span></li>
        <li><b>Job Type</b> : Select job type, e.g. <code>Visa</code>, <code>Work Permit</code><br><span style="color:#888;">(เลือกประเภทงานให้ตรงกับบริการที่ลูกค้าต้องการ)</span></li>
        <li><b>Job detail</b> : Select job detail, e.g. <code>Visa 90 days extension</code>, <code>Visa Re-entry</code><br><span style="color:#888;">(รายละเอียดงานจะเปลี่ยนตามประเภทงานที่เลือก)</span></li>
        <li><b>Receipt No.</b> : Enter receipt number, e.g. <code>R-20250627-001</code><br><span style="color:#888;">(ใช้สำหรับอ้างอิงใบเสร็จรับเงิน/ออกเอกสาร)</span></li>
        <li><b>Source Channel</b> : Select channel, e.g. <code>Walk-in</code>, <code>FB</code>, <code>GG</code>, <code>Agent</code><br><span style="color:#888;">(ระบุช่องทางที่ลูกค้าติดต่อเข้ามาเพื่อวิเคราะห์การตลาด)</span></li>
        <li><b>Details</b> : Enter additional job details<br><span style="color:#888;">(สามารถใส่ข้อมูลเพิ่มเติม เช่น หมายเหตุพิเศษ หรือเอกสารแนบ)</span></li>
        <li><b>Finish Date</b> : System will set automatically when job is closed<br><span style="color:#888;">(ไม่ต้องกรอกเอง ระบบจะบันทึกเมื่อปิดงาน)</span></li>
        <li><b>Profit</b> : Calculated automatically<br><span style="color:#888;">(ระบบจะคำนวณจากรายรับ-รายจ่ายทั้งหมด)</span></li>
    </ul>
    <div style="color:#007bff; margin-bottom:10px;">Note: กรอกข้อมูลให้ครบถ้วนเพื่อป้องกันปัญหาในการติดตามงานและการเงิน</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\joborder\joborder-img-2.jpg')}}" alt="" style="width: 100%">
    </div>
    <h3>2.3 Using Transaction (New Transaction Example)</h3>
    <ul>
        <li>Each Job Order can have multiple transactions (income/expense).<br><span style="color:#888;">(ธุรกรรมแต่ละรายการจะถูกผูกกับงานนั้น ๆ)</span></li>
        <li>Each transaction requires:
            <ul>
                <li><b>Date</b> : Transaction date<br><span style="color:#888;">(วันที่เกิดธุรกรรม)</span></li>
                <li><b>Transaction</b> : Select type, e.g. <code>Service Fee</code>, <code>Visa Fee</code><br><span style="color:#888;">(เลือกประเภทธุรกรรมให้ตรงกับรายการจริง)</span></li>
                <li><b>Type</b> : Select <code>Income</code> or <code>Expense</code><br><span style="color:#888;">(ระบุว่าเป็นรายรับหรือรายจ่าย)</span></li>
                <li><b>Amount</b> : Enter amount<br><span style="color:#888;">(ใส่จำนวนเงินที่ถูกต้อง)</span></li>
                <li><b>Wallet</b> : Select wallet, e.g. <code>Cash</code>, <code>Bangkok Bank</code><br><span style="color:#888;">(เลือกกระเป๋าเงินที่ใช้รับ/จ่ายเงิน)</span></li>
                <li><b>Transaction Group</b> : Select group, e.g. <code>Cash</code>, <code>Transfer</code><br><span style="color:#888;">(กลุ่มธุรกรรมช่วยแยกประเภทการรับ-จ่ายเงิน)</span></li>
            </ul>
        </li>
        <li>The system will calculate total income, expense, and profit automatically.<br><span style="color:#888;">(ไม่ต้องคำนวณเอง ระบบจะสรุปยอดให้ทันที)</span></li>
        <li>You can add, edit, or delete transactions until the job is closed.<br><span style="color:#888;">(หลังปิดงานจะไม่สามารถแก้ไขธุรกรรมได้)</span></li>
    </ul>
    {{-- <div style="color:#007bff; margin-bottom:10px;">Tip: ตรวจสอบข้อมูลธุรกรรมทุกครั้งก่อนบันทึก เพื่อป้องกันข้อผิดพลาดทางบัญชี</div>
    <table style="width:100%; border-collapse:collapse; margin:15px 0;">
        <tr style="background:#f8f9fa; border:1px solid #ddd;">
            <th style="padding:8px; border:1px solid #ddd;">Date</th>
            <th style="padding:8px; border:1px solid #ddd;">Transaction</th>
            <th style="padding:8px; border:1px solid #ddd;">Type</th>
            <th style="padding:8px; border:1px solid #ddd;">Amount</th>
            <th style="padding:8px; border:1px solid #ddd;">Wallet</th>
            <th style="padding:8px; border:1px solid #ddd;">Transaction Group</th>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">2025-06-27</td>
            <td style="padding:8px; border:1px solid #ddd;">Service Fee</td>
            <td style="padding:8px; border:1px solid #ddd;">Income</td>
            <td style="padding:8px; border:1px solid #ddd;">5,000</td>
            <td style="padding:8px; border:1px solid #ddd;">Cash</td>
            <td style="padding:8px; border:1px solid #ddd;">Cash</td>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">2025-06-27</td>
            <td style="padding:8px; border:1px solid #ddd;">Visa Fee</td>
            <td style="padding:8px; border:1px solid #ddd;">Expense</td>
            <td style="padding:8px; border:1px solid #ddd;">1,900</td>
            <td style="padding:8px; border:1px solid #ddd;">Bangkok Bank</td>
            <td style="padding:8px; border:1px solid #ddd;">Transfer</td>
        </tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Note: สามารถเพิ่มธุรกรรมได้หลายรายการใน 1 งาน เพื่อแยกประเภทค่าใช้จ่ายและรายรับอย่างละเอียด</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        
    </div> --}}
    <h3>2.4 ตัวอย่างการกรอกข้อมูล</h3>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr style="background: #f8f9fa; border: 1px solid #ddd;">
            <th style="padding: 10px; border: 1px solid #ddd;">ฟิลด์</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">ลูกค้า</td><td style="padding: 8px; border: 1px solid #ddd;">นายสมชาย ใจดี</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">ประเภทงาน</td><td style="padding: 8px; border: 1px solid #ddd;">Visa</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">รายละเอียดงาน</td><td style="padding: 8px; border: 1px solid #ddd;">ต่อวีซ่า 90 วัน</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">วันที่</td><td style="padding: 8px; border: 1px solid #ddd;">2025-06-27</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">เลขใบเสร็จ</td><td style="padding: 8px; border: 1px solid #ddd;">R-20250627-001</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">ธุรกรรม</td><td style="padding: 8px; border: 1px solid #ddd;">รายรับ 5,000 บาท (เงินสด), รายจ่าย 2,000 บาท (เงินสด)</td></tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Tip: ตัวอย่างนี้แสดงการกรอกข้อมูลที่ถูกต้องและครบถ้วนสำหรับ 1 งาน</div>


    <h2 id="transaction">3. การจัดการธุรกรรม (Transaction)</h2>
    <h3>3.1 ภาพรวมธุรกรรม</h3>
    <p>ธุรกรรม (Transaction) คือการบันทึกรายรับและรายจ่ายที่เกี่ยวข้องกับแต่ละ Job Order โดยแต่ละงานสามารถมีธุรกรรมได้หลายรายการ เช่น ค่าบริการ, ค่าธรรมเนียม, ค่าใช้จ่ายต่าง ๆ</p>
    <ul>
        <li>ธุรกรรมแต่ละรายการจะถูกผูกกับงานนั้น ๆ และแสดงในหน้ารายละเอียดงาน</li>
        <li>สามารถเพิ่ม, แก้ไข, หรือลบธุรกรรมได้จนกว่างานจะถูกปิด (Close)</li>
        <li>ระบบจะคำนวณยอดรวมรายรับ รายจ่าย และกำไรให้อัตโนมัติ</li>
    </ul>
    <h3>3.2 ขั้นตอนการเพิ่ม/แก้ไข/ลบธุรกรรม</h3>
    <ol>
        <li>เปิดหน้ารายละเอียดงานที่ต้องการ</li>
        <li>ไปที่ส่วน <b>ธุรกรรม</b> ใต้รายละเอียดงาน</li>
        <li>กดปุ่ม <b>เพิ่มธุรกรรม</b> เพื่อเพิ่มรายการใหม่ หรือกด <b>Edit</b>/<b>Delete</b> ที่แถวธุรกรรมเพื่อแก้ไข/ลบ</li>
        <li>กรอกข้อมูลให้ครบถ้วน เช่น วันที่, ประเภทธุรกรรม, ประเภท (รายรับ/รายจ่าย), จำนวนเงิน, กระเป๋าเงิน, กลุ่มธุรกรรม</li>
        <li>กด <b>Save</b> เพื่อบันทึก</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Tip: ตรวจสอบข้อมูลธุรกรรมทุกครั้งก่อนบันทึก เพื่อป้องกันข้อผิดพลาดทางบัญชี</div>
    <table style="width:100%; border-collapse:collapse; margin:15px 0;">
        <tr style="background:#f8f9fa; border:1px solid #ddd;">
            <th style="padding:8px; border:1px solid #ddd;">Date</th>
            <th style="padding:8px; border:1px solid #ddd;">Transaction</th>
            <th style="padding:8px; border:1px solid #ddd;">Type</th>
            <th style="padding:8px; border:1px solid #ddd;">Amount</th>
            <th style="padding:8px; border:1px solid #ddd;">Wallet</th>
            <th style="padding:8px; border:1px solid #ddd;">Transaction Group</th>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">2025-06-27</td>
            <td style="padding:8px; border:1px solid #ddd;">Service Fee</td>
            <td style="padding:8px; border:1px solid #ddd;">Income</td>
            <td style="padding:8px; border:1px solid #ddd;">5,000</td>
            <td style="padding:8px; border:1px solid #ddd;">Cash</td>
            <td style="padding:8px; border:1px solid #ddd;">Cash</td>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">2025-06-27</td>
            <td style="padding:8px; border:1px solid #ddd;">Visa Fee</td>
            <td style="padding:8px; border:1px solid #ddd;">Expense</td>
            <td style="padding:8px; border:1px solid #ddd;">1,900</td>
            <td style="padding:8px; border:1px solid #ddd;">Bangkok Bank</td>
            <td style="padding:8px; border:1px solid #ddd;">Transfer</td>
        </tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Note: สามารถเพิ่มธุรกรรมได้หลายรายการใน 1 งาน เพื่อแยกประเภทค่าใช้จ่ายและรายรับอย่างละเอียด</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\joborder\joborder-img-3.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="update">4. การแก้ไข Job Order (Update)</h2>
    <ol>
        <li>ค้นหาและเลือกงานที่ต้องการแก้ไข<br><span style="color:#888;">(ใช้ฟังก์ชันค้นหาหรือกรองเพื่อหางานที่ต้องการ)</span></li>
        <li>กดปุ่ม <b>Edit</b> (ไอคอนดินสอ)<br><span style="color:#888;">(ปุ่มนี้จะอยู่ในแถวของงานที่เลือกในตาราง)</span></li>
        <li>แก้ไขข้อมูลที่ต้องการ แล้วกด <b>Save</b><br><span style="color:#888;">(ตรวจสอบข้อมูลก่อนบันทึกทุกครั้ง)</span></li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Note: งานที่สถานะ <b>close</b> จะไม่สามารถแก้ไขได้</div>
     <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
         <img src="{{asset('manual-image\joborder\joborder-img-5.jpg')}}" alt="" style="width: 100%">
    </div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
         <img src="{{asset('manual-image\joborder\joborder-img-4.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="delete">5. การลบ Job Order (Delete)</h2>
    <ol>
        <li>ค้นหาและเลือกงานที่ต้องการลบ<br><span style="color:#888;">(ควรตรวจสอบให้แน่ใจก่อนลบ เพราะข้อมูลจะหายถาวร)</span></li>
        <li>กดปุ่ม <b>Delete</b> (ไอคอนถังขยะ)<br><span style="color:#888;">(ปุ่มนี้จะอยู่ในแถวของงานที่เลือกในตาราง)</span></li>
        <li>ยืนยันการลบ ข้อมูลธุรกรรมที่เกี่ยวข้องจะถูกลบด้วย<br><span style="color:#c82333;">(คำเตือน: การลบงานจะลบธุรกรรมทั้งหมดที่ผูกกับงานนั้นด้วย)</span></li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Warning: การลบงานไม่สามารถกู้คืนได้ ควรสำรองข้อมูลหากจำเป็น</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\joborder\joborder-img-6.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="search">6. การค้นหาและแสดงผล (Search & Table)</h2>
    <ul>
        <li>ค้นหาด้วยชื่อ, เลขที่งาน, เลขพาสปอร์ต, สถานะ, วันที่ ฯลฯ<br><span style="color:#888;">(ใช้ช่องค้นหาหรือฟิลเตอร์เพื่อระบุข้อมูลที่ต้องการ)</span></li>
        <li>มีฟิลเตอร์ให้เลือกช่วงวันที่, สถานะงาน, ประเภทงาน ฯลฯ<br><span style="color:#888;">(ช่วยให้ค้นหางานได้รวดเร็วและแม่นยำมากขึ้น)</span></li>
        <li>ผลลัพธ์แสดงในตาราง สามารถกดดูรายละเอียด/แก้ไข/ลบ ได้ทันที<br><span style="color:#888;">(คลิกที่แถวเพื่อดูรายละเอียดเพิ่มเติม หรือใช้ปุ่ม Edit/Delete)</span></li>
    </ul>
    <div style="color:#007bff; margin-bottom:10px;">Tip: ใช้ฟิลเตอร์ร่วมกับการค้นหาเพื่อจำกัดผลลัพธ์และประหยัดเวลา</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
          <img src="{{asset('manual-image\joborder\joborder-img-7.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="relationships">7. ความสัมพันธ์ข้อมูลและ Step-by-Step</h2>
    <ol>
        {{-- <li>ต้องเลือก <b>ลูกค้า</b> ก่อน ถึงจะเลือก <b>ประเภทงาน</b> ได้<br><span style="color:#888;">(ระบบจะกรองประเภทงานตามลูกค้าที่เลือก)</span></li> --}}
        <li>เมื่อเลือก <b>ประเภทงาน (Job Type)</b> แล้ว ถึงจะเลือก <b>รายละเอียดงาน (Job detail)</b> ได้<br><span style="color:#888;">(รายละเอียดงานจะเปลี่ยนตามประเภทงานที่เลือก)</span></li>
        <li>เมื่อเลือก <b>รายละเอียดงาน</b> แล้ว ถึงจะเพิ่ม <b>ธุรกรรม (Transaction)</b> ได้<br><span style="color:#888;">(ต้องกรอกข้อมูลให้ครบตามลำดับเพื่อป้องกันข้อผิดพลาด)</span></li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Note: การเลือกข้อมูลตามลำดับจะช่วยลดความผิดพลาดและทำให้ระบบแสดงข้อมูลที่เกี่ยวข้องได้ถูกต้อง</div>
    {{-- <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[เว้นที่สำหรับแทรกรูปภาพ Flow]</div> --}}

    <h2 id="compare">8. เปรียบเทียบ/ข้อควรระวัง</h2>
    <ul>
        <li><b>งานที่ถูกปิด (Close)</b> จะไม่สามารถแก้ไขหรือเพิ่มธุรกรรมได้<br><span style="color:#c82333;">(ควรตรวจสอบข้อมูลให้ครบถ้วนก่อนปิดงาน)</span></li>
        <li><b>หากลบงาน</b> ข้อมูลธุรกรรมที่เกี่ยวข้องจะถูกลบด้วย<br><span style="color:#c82333;">(ควรสำรองข้อมูลหากจำเป็น)</span></li>
        <li><b>การเลือกข้อมูลผิดลำดับ</b> (เช่น ไม่เลือกประเภทงานก่อน) จะไม่สามารถเลือกข้อมูลถัดไปได้<br><span style="color:#c82333;">(ระบบจะป้องกันการเลือกผิดลำดับเพื่อความถูกต้อง)</span></li>
        <li style="color:#c82333"><b>ข้อแตกต่าง:</b> งานที่สถานะ <b>open</b> สามารถแก้ไข/เพิ่มธุรกรรมได้, งานที่ <b>close</b> แก้ไขไม่ได้</li>
    </ul>
    {{-- <div style="color:#007bff, margin-bottom:10px;">Tip: ตรวจสอบสถานะงานก่อนดำเนินการทุกครั้งเพื่อป้องกันข้อผิดพลาด</div> --}}
    {{-- <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[เว้นที่สำหรับแทรกรูปภาพเปรียบเทียบ]</div> --}}

    {{-- <h2 id="example">9. ตัวอย่างการกรอกข้อมูล (Case Study)</h2>
    <ol>
        <li>เลือกลูกค้า: <b>นายสมชาย ใจดี</b><br><span style="color:#888;">(เลือกจากรายชื่อลูกค้าที่มี หรือเพิ่มใหม่หากยังไม่มี)</span></li>
        <li>เลือกประเภทงาน: <b>Visa</b><br><span style="color:#888;">(เลือกประเภทงานที่ตรงกับบริการที่ลูกค้าต้องการ)</span></li>
        <li>เลือกรายละเอียดงาน: <b>ต่อวีซ่า 90 วัน</b><br><span style="color:#888;">(รายละเอียดงานจะเปลี่ยนตามประเภทงานที่เลือก)</span></li>
        <li>กรอกวันที่: <b>2025-06-27</b><br><span style="color:#888;">(เลือกวันที่เริ่มงานจากปฏิทิน)</span></li>
        <li>เลขใบเสร็จ: <b>R-20250627-001</b><br><span style="color:#888;">(กรอกเลขใบเสร็จให้ตรงกับเอกสารจริง)</span></li>
        <li>เพิ่มธุรกรรม:
            <ul>
                <li>รายรับ: <b>5,000 บาท</b> (เงินสด)<br><span style="color:#888;">(เลือกประเภทธุรกรรมและกระเป๋าเงินให้ถูกต้อง)</span></li>
                <li>รายจ่าย: <b>2,000 บาท</b> (เงินสด)<br><span style="color:#888;">(ตรวจสอบยอดเงินก่อนบันทึก)</span></li>
            </ul>
        </li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Note: ตัวอย่างนี้แสดงขั้นตอนการกรอกข้อมูลจริงในระบบ ตั้งแต่ต้นจนจบ</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">[เว้นที่สำหรับแทรกรูปภาพตัวอย่าง]</div> --}}
</div>
@endsection
