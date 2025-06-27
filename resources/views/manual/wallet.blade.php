@extends('layouts.main')

@section('content')
{{-- คู่มือการใช้งานระบบ Wallet --}}

<nav style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); padding: 15px 0; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; flex-wrap: wrap;">
       
        <div style="display: flex; gap: 5px; align-items: center; flex-wrap: wrap;">
            <a href="#structure" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">📊 โครงสร้าง</a>
            <a href="#create" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">➕ สร้างกระเป๋า</a>
            <a href="#transaction" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">💸 ธุรกรรม</a>
            <a href="#transfer" style="color: white; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 0.9em; background: rgba(255,255,255,0.1);">🔄 โอนเงิน</a>
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
                <div style="font-weight: 600; margin-bottom: 5px;">สร้างกระเป๋า</div>
                <div style="font-size: 0.9em; opacity: 0.9;">เพิ่มบัญชี/กระเป๋าใหม่</div>
            </a>
            <a href="#transaction" style="background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">💸</div>
                <div style="font-weight: 600; margin-bottom: 5px;">ดูธุรกรรม</div>
                <div style="font-size: 0.9em; opacity: 0.9;">ตรวจสอบรายรับ-รายจ่าย</div>
            </a>
            <a href="#transfer" style="background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">🔄</div>
                <div style="font-weight: 600; margin-bottom: 5px;">โอนเงิน</div>
                <div style="font-size: 0.9em; opacity: 0.9;">โยกย้ายเงินระหว่างกระเป๋า</div>
            </a>
            <a href="#update" style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">✏️</div>
                <div style="font-weight: 600; margin-bottom: 5px;">แก้ไขกระเป๋า</div>
                <div style="font-size: 0.9em; opacity: 0.9;">อัปเดตข้อมูลบัญชี</div>
            </a>
            <a href="#delete" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center;">
                <div style="font-size: 2em; margin-bottom: 10px;">🗑️</div>
                <div style="font-weight: 600; margin-bottom: 5px;">ลบกระเป๋า</div>
                <div style="font-size: 0.9em; opacity: 0.9;">ลบบัญชี/กระเป๋า</div>
            </a>
        </div>
    </div>

    <div style="background: #f8f9fa; padding: 25px; border-radius: 10px; margin-bottom: 30px; border: 1px solid #e9ecef;">
        <h3 style="color: #495057; margin-bottom: 20px; text-align: center; border-bottom: 2px solid #007bff; padding-bottom: 10px;">📋 สารบัญ</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px;">
            <div>
                <h4 style="color: #007bff; margin-bottom: 15px; font-size: 1.1em;">🏗️ พื้นฐานและการจัดการ</h4>
                <ol style="line-height: 1.8; color: #495057;">
                    <li><a href="#structure" style="color: #007bff; text-decoration: none;">โครงสร้างข้อมูล Wallet</a></li>
                    <li><a href="#create" style="color: #007bff; text-decoration: none;">การสร้างกระเป๋า (Create)</a></li>
                    <li><a href="#transaction" style="color: #007bff; text-decoration: none;">การดูธุรกรรม (Transaction)</a></li>
                    <li><a href="#transfer" style="color: #007bff; text-decoration: none;">การโอนเงินระหว่างกระเป๋า</a></li>
                    <li><a href="#update" style="color: #007bff; text-decoration: none;">การแก้ไขกระเป๋า (Update)</a></li>
                    <li><a href="#delete" style="color: #007bff; text-decoration: none;">การลบกระเป๋า (Delete)</a></li>
                </ol>
            </div>
            <div>
                <h4 style="color: #28a745; margin-bottom: 15px; font-size: 1.1em;">🔗 ข้อมูลเชิงลึกและเทคนิค</h4>
                <ol start="7" style="line-height: 1.8; color: #495057;">
                    <li><a href="#tips" style="color: #28a745; text-decoration: none;">เทคนิค/ข้อควรระวัง</a></li>
                    <li><a href="#example" style="color: #28a745; text-decoration: none;">ตัวอย่างการใช้งาน</a></li>
                </ol>
            </div>
        </div>
    </div>

    <h2 id="structure">1. โครงสร้างข้อมูล Wallet</h2>
    <ul>
        <li>ตารางหลัก: <b>wallet_type</b> (เก็บข้อมูลกระเป๋าแต่ละใบ)</li>
        <li>Primary Key: <b>wallet_type_id</b></li>
        <li>ฟิลด์สำคัญ: <b>ชื่อกระเป๋า</b>, <b>เลขบัญชี</b>, <b>ยอดเงินคงเหลือ</b></li>
    </ul>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr style="background: #f8f9fa; border: 1px solid #ddd;">
            <th style="padding: 10px; border: 1px solid #ddd;">ฟิลด์</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ประเภท</th>
            <th style="padding: 10px; border: 1px solid #ddd;">คำอธิบาย</th>
            <th style="padding: 10px; border: 1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">wallet_type_id</td><td style="padding: 8px; border: 1px solid #ddd;">Integer</td><td style="padding: 8px; border: 1px solid #ddd;">รหัสกระเป๋า (Auto Gen)</td><td style="padding: 8px; border: 1px solid #ddd;">1</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">wallet_type_name</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">ชื่อกระเป๋า/บัญชี เช่น "เงินสด", "Bangkok Bank"</td><td style="padding: 8px; border: 1px solid #ddd;">Cash, Bangkok Bank</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">wallet_type_account_no</td><td style="padding: 8px; border: 1px solid #ddd;">String</td><td style="padding: 8px; border: 1px solid #ddd;">เลขบัญชี (ถ้ามี)</td><td style="padding: 8px; border: 1px solid #ddd;">123-456-7890</td></tr>
        <tr><td style="padding: 8px; border: 1px solid #ddd;">wallet_type_price</td><td style="padding: 8px; border: 1px solid #ddd;">Decimal</td><td style="padding: 8px; border: 1px solid #ddd;">ยอดเงินคงเหลือ (อัปเดตอัตโนมัติเมื่อมีธุรกรรม/โอนเงิน)</td><td style="padding: 8px; border: 1px solid #ddd;">10,000.00</td></tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Tip: สามารถมีหลายกระเป๋า เช่น เงินสด, บัญชีธนาคาร, พร้อมเพย์ ฯลฯ เพื่อแยกการเงินแต่ละประเภท</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\wallet\wallet-img-1.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="create">2. การสร้างกระเป๋า (Create)</h2>
    <ol>
        <li>กดปุ่ม <b>New Wallet</b> ด้านขวาบนของตาราง wallet</li>
        <li>กรอก <b>Account No</b>, <b>A/C Name</b>, <b>Starting balance</b> ในฟอร์ม (modal)</li>
        <li>กด <b>OK</b> เพื่อบันทึก ระบบจะเพิ่มกระเป๋าใหม่ในตาราง</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Note: Account No และชื่อกระเป๋าต้องไม่ซ้ำกันในระบบ</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
         <img src="{{asset('manual-image\wallet\wallet-img-2.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="transaction">3. การดูธุรกรรมในกระเป๋า (Transaction)</h2>
    <ol>
        <li>คลิก <b>"ตรวจสอบธุรกรรม"</b> ในแถวกระเป๋าที่ต้องการ หรือคลิกที่ลิงก์ <code>/wallet/wallettransaction/index/{walletModel}</code> (เช่น <code>/wallet/wallettransaction/index/55</code>)</li>
        <li><b>Action ที่เกิดขึ้น:</b> ระบบจะเปิดหน้ารายการธุรกรรมของกระเป๋านั้นทันที โดยแสดงข้อมูลธุรกรรมทั้งหมดที่เกี่ยวข้องกับกระเป๋านี้</li>
    </ol>
    <div style="margin: 15px 0 10px 0; font-weight: bold; color: #007bff;">ตารางคอลัมน์ที่แสดงในหน้ารายการธุรกรรม</div>
    <table style="width:100%; border-collapse:collapse; margin-bottom:15px;">
        <tr style="background:#f8f9fa; border:1px solid #ddd;">
            <th style="padding:8px; border:1px solid #ddd;">คอลัมน์</th>
            <th style="padding:8px; border:1px solid #ddd;">คำอธิบาย</th>
            <th style="padding:8px; border:1px solid #ddd;">ตัวอย่าง</th>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">วันที่</td>
            <td style="padding:8px; border:1px solid #ddd;">วันที่ทำรายการ</td>
            <td style="padding:8px; border:1px solid #ddd;">2025-06-27</td>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">ประเภท</td>
            <td style="padding:8px; border:1px solid #ddd;">ประเภทธุรกรรม (Credit/รับเงิน, Debit/จ่ายเงิน, โอน, ถอน ฯลฯ)</td>
            <td style="padding:8px; border:1px solid #ddd;">Credit, Debit, โอน</td>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">รายละเอียด</td>
            <td style="padding:8px; border:1px solid #ddd;">คำอธิบายหรือหมายเหตุของธุรกรรม</td>
            <td style="padding:8px; border:1px solid #ddd;">รับเงินค่าบริการ</td>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">ยอดเงิน</td>
            <td style="padding:8px; border:1px solid #ddd;">จำนวนเงินที่รับเข้า (+) หรือจ่ายออก (-)</td>
            <td style="padding:8px; border:1px solid #ddd;">+5,000.00 / -1,000.00</td>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">ยอดคงเหลือ</td>
            <td style="padding:8px; border:1px solid #ddd;">ยอดเงินคงเหลือหลังแต่ละรายการ (ถ้ามี)</td>
            <td style="padding:8px; border:1px solid #ddd;">10,000.00</td>
        </tr>
        <tr>
            <td style="padding:8px; border:1px solid #ddd;">เลขที่อ้างอิง</td>
            <td style="padding:8px; border:1px solid #ddd;">หมายเลขอ้างอิงของธุรกรรม (ถ้ามี)</td>
            <td style="padding:8px; border:1px solid #ddd;">TRX-20250627-001</td>
        </tr>
    </table>
    <div style="color:#007bff; margin-bottom:10px;">Tip: ธุรกรรมแต่ละรายการจะอัปเดตยอดเงินกระเป๋าให้อัตโนมัติ และสามารถตรวจสอบย้อนหลังได้ตลอดเวลา</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\wallet\wallet-img-3.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="transfer">4. การโอน/ถอนเงินระหว่างกระเป๋า</h2>
    <ol>
        <li>คลิก "โอน-ถอนเงิน" ในแถวกระเป๋าที่ต้องการ</li>
        <li>เลือกประเภท (โอนเงิน/ถอนเงิน), กรอกจำนวน, เลือกปลายทาง (ถ้าโอน)</li>
        <li>กด <b>OK</b> ระบบจะอัปเดตยอดเงินทั้งสองกระเป๋าอัตโนมัติ</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Note: หากยอดเงินไม่พอ ระบบจะแจ้งเตือนและไม่สามารถโอนได้</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\wallet\wallet-img-4.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="update">5. การแก้ไขกระเป๋า (Edit)</h2>
    <ol>
        <li>คลิก "แก้ไข" ในแถวกระเป๋าที่ต้องการ</li>
        <li>แก้ไขข้อมูลในฟอร์ม (modal) แล้วกด <b>OK</b></li>
        <li>ระบบจะอัปเดตข้อมูลกระเป๋าทันที</li>
    </ol>
    <div style="color:#007bff; margin-bottom:10px;">Tip: ไม่ควรเปลี่ยนชื่อหรือเลขบัญชีถ้ามีธุรกรรมผูกอยู่แล้ว</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\wallet\wallet-img-5.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="delete">6. การลบกระเป๋า (Delete)</h2>
    <ol>
        <li>คลิก "ลบ" ในแถวกระเป๋าที่ต้องการ</li>
        <li>ยืนยันการลบใน popup ระบบจะลบกระเป๋าและข้อมูลที่เกี่ยวข้อง</li>
    </ol>
    <div style="color:#c82333; margin-bottom:10px;">Warning: ไม่สามารถลบกระเป๋าที่มีธุรกรรมค้างอยู่ได้ ต้องโอนหรือปิดยอดให้เรียบร้อยก่อน</div>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\wallet\wallet-img-6.jpg')}}" alt="" style="width: 100%">
    </div>

    <h2 id="tips">7. เทคนิค/ข้อควรระวัง</h2>
    <ul>
        <li>ควรตั้งชื่อกระเป๋าให้สื่อความหมาย เช่น "เงินสด", "Bangkok Bank" เพื่อป้องกันสับสน</li>
        <li>ตรวจสอบยอดเงินก่อนโอนหรือถอนทุกครั้ง</li>
        <li>ไม่สามารถลบกระเป๋าที่มีธุรกรรมค้างอยู่ได้</li>
        <li>การแก้ไข/ลบกระเป๋าจะมีผลกับธุรกรรมที่เกี่ยวข้อง</li>
        <li>ควรสำรองข้อมูลก่อนลบหรือโอนเงินจำนวนมาก</li>
    </ul>

    <h2 id="example">8. ตัวอย่างการใช้งาน (Case Study)</h2>
    <ol>
        <li>สร้างกระเป๋าใหม่ชื่อ <b>Bangkok Bank</b> เลขบัญชี <b>123-456-7890</b> ยอดเงินเริ่มต้น <b>10,000.00</b></li>
        <li>รับเงินค่าบริการเข้า <b>Cash</b> 5,000 บาท</li>
        <li>โอนเงิน 3,000 บาท จาก <b>Cash</b> ไป <b>Bangkok Bank</b></li>
        <li>ตรวจสอบยอดเงินและธุรกรรมในแต่ละกระเป๋า</li>
    </ol>
    <div style="border:1px dashed #aaa; padding:10px; margin:10px 0; text-align:center; color:#888;">
        <img src="{{asset('manual-image\wallet\wallet-img-7.jpg')}}" alt="" style="width: 100%">
    </div>
</div>
@endsection
