@extends('layouts.app')

@section('content')
    <div class="container" style="height: 600px">
        <br>
        ข้อมูลการดำเนินงาน งบดำเนินงาน
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ปีงบประมาณ</th>
                <th scope="col">รายการงบประมาณ</th>
                <th scope="col">จำนวนงบประมาณ<br>(ล้านบาท)</th>
                <th scope="col">สถานะ</th>
                <th scope="col">จัดการ</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>2561</td>
                <td>ปรับปรุงโรงเรือน</td>
                <td>10.89</td>
                <td>เบิกจ่ายงบประมาณ</td>
                <td><i class="material-icons">update</i></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>2561</td>
                <td>ปรับปรุงโรงเรือน</td>
                <td>40.5</td>
                <td>ตรวจรับงวด 2</td>
                <td><i class="material-icons">update</i></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>2561</td>
                <td>ปรับปรุงโรงเรือน</td>
                <td>20.98</td>
                <td>ประกาศร่างขอบเขตงาน TOR</td>
                <td><i class="material-icons">update</i></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

