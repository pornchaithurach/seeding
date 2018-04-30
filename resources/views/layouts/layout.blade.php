<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name','') }}
    </title>
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}" type="text/css"/>
    {{--
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.css')}}">
    --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/toastr/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker3.standalone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/loading.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-toggle.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">

    <style>
        .bar {
            box-shadow: 0 0 10px #00dd4b;
            background: #00ff16;
        }
    </style>
    @yield('custom css')
</head>

<body>
@if(Auth::user()->user_level != "ADMIN")
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{url('img/doae-logo.gif')}}" class="d-inline-block align-top" alt="logo" style="width: 100px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @if(Auth::user()->user_level == "A")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            รับสมัครเข้าโครงการ<span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"
                               href="{{url('sing-up/checkActivity')}}">ตรวจสอบข้อมูลทะเบียนเกษตรกร</a>
                            <a class="dropdown-item" href="{{url('sing-up/signUp/1')}}">รับสมัครเข้าโครงการข้าวโพดเลี้ยงสัตว์
                                (ปนข.01) </a>
                            <a class="dropdown-item"
                               href="{{url('sing-up/signUp/2')}}">รับสมัครเข้าโครงการพืชหลากหลาย</a>
                            <a class="dropdown-item"
                               href="{{url('sync-head-family')}}">ปรับปรุงข้อมูลหัวหน้าเครัวเรือน</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            จัดทำประกาศ
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('recheck/view')}}">พิมพ์ใบประกาศ รับสมัคร</a>
                            <a class="dropdown-item" href="{{url('recheck/view-old')}}">พิมพ์ใบประกาศ รับสมัคร
                                ย้อนหลัง</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ยืนยันการปลูก
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('check/view')}}">แบบบันทึกการยืนยันเข้าร่วมโครงการ</a>
                            <a class="dropdown-item" href="{{url('check/pdf-view')}}" disabled="disabled">การตรวจสอบพื้นที่ระดับตำบล
                                (ปนข.07 / พหล.03)</a>
                            <a class="dropdown-item" href="{{route('confirm_print_history',['history' => 'history'])}}"
                               disabled="disabled">การตรวจสอบพื้นที่ระดับตำบล (ปนข.07 / พหล.03) (ย้อนหลัง)</a>
                            <a class="dropdown-item" href="{{url('audit')}}">แบบบันทึกผลการตรวจสอบพื้นที่ ระดับตำบล
                                (ปนข.07
                                / พหล.03)</a>
                            <a class="dropdown-item" href="{{url('audit/getViewToPDF')}}">แบบรายงานผลการตรวจ สอบพื้นที่
                                ระดับอำเภอ (ปนข.08 / พหล.04)</a>
                            <a class="dropdown-item" href="{{url('approve')}}">แบบบันทึกผลการตรวจ สอบพื้นที่ ระดับอำเภอ
                                (ปนข.08 / พหล.04)</a>
                            <a class="dropdown-item" href="{{url('bureau-of-the-budget')}}">แบบรับรองสิทธิ์เกษตรกร
                                โครงการพืชหลากหลาย (พหล.05/1 และ พหล.05/2)</a>
                            <a class="dropdown-item" href="{{url('bureau-of-the-budget/upload/view')}}">Upload
                                พหล.05/1</a>
                            <a class="dropdown-item" href="{{url('bureau-of-the-budget-maize')}}">แบบรับรองสิทธิ์เกษตรกร
                                โครงการข้าวโพดเลี้ยงสัตว์ (ปนข.09/1) </a>
                            <a class="dropdown-item" href="{{url('bureau-of-the-budget-maize/print092/view')}}">แบบรายงานรับรองสิทธิ์เกษตรกร
                                โครงการข้าวโพดเลี้ยงสัตว์ (ปนข.09/2) </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            รายงาน
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('report')}}">สรุปเกษตรกรการเข้าร่วมโครงการ</a>
                            <a class="dropdown-item"
                               href="{{url('check-register/view')}}">รายชื่อเกษตรกรสมัครเข้าร่วมโครงการ</a>
                            <a class="dropdown-item" href="{{url('check-register/ricedry')}}">รายชื่อเกษตรกรสมัครเข้าร่วมโครงการพืชหลากหลาย
                                (ข้อมูลจาก ทบก.)</a>
                            <a class="dropdown-item" href="{{url('report/split-plant')}}">สรุปเกษตรกรการเข้าร่วมโครงการ
                                (แบ่งตามชนิดพืช)</a>
                            <a class="dropdown-item" href="{{url('report/list-entrant-maize')}}">รายงานรายชื่อผู้มีสิทธิ
                                -
                                ไม่มีสิทธิ เข้าร่วมโครงการข้าวโพดเลี้ยงสัตว์</a>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ตรวจสอบสถานะ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('check-status/view')}}">ตรวจสอบสถานะ</a>
                        </div>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{url('download')}}">ดาวน์โหลดเอกสาร</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"--}}
                    {{--aria-haspopup="true" aria-expanded="false">--}}
                    {{--ธกส.--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
                    {{--<a class="dropdown-item" href="#">พิมพ์ แบบรายงาน ส่งธกส.</a>--}}
                    {{--<a class="dropdown-item" href="#">อัพโหลด แบบรายงาน ส่งธกส.</a>--}}
                    {{--</div>--}}
                    {{--</li>--}}

                @elseif(Auth::user()->user_level == "P")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ตรวจสอบข้อมูลทะเบียนเกษตรกร<span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"
                               href="{{url('sing-up/checkActivity')}}">ตรวจสอบข้อมูลทะเบียนเกษตรกร</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            แก้ไขข้อมูลแปลง<span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('sing-up/signUp/1')}}">โครงการข้าวโพดเลี้ยงสัตว์</a>
                            <a class="dropdown-item" href="{{url('sing-up/signUp/2')}}">โครงการพืชหลากหลาย</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cancel')}}" style="color: red">ยกเลิกเข้าร่วมโครงการ</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            รายงาน
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('report')}}">สรุปเกษตรกรการเข้าร่วมโครงการ</a>
                            <a class="dropdown-item"
                               href="{{url('check-register/view')}}">รายชื่อเกษตรกรสมัครเข้าร่วมโครงการ</a>
                            <a class="dropdown-item" href="{{url('check-register/ricedry')}}">รายชื่อเกษตรกรสมัครเข้าร่วมโครงการพืชหลากหลาย
                                (ข้อมูลจาก ทบก.)</a>
                            <a class="dropdown-item" href="{{url('report/split-plant')}}">สรุปเกษตรกรการเข้าร่วมโครงการ
                                (แบ่งตามชนิดพืช)</a>
                            <a class="dropdown-item" href="{{url('report/list-entrant-maize')}}">รายงานรายชื่อผู้มีสิทธิ
                                -
                                ไม่มีสิทธิ เข้าร่วมโครงการข้าวโพดเลี้ยงสัตว์</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ตรวจสอบสถานะ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('check-status/view')}}">ตรวจสอบสถานะ</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ธกส.
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">พิมพ์ แบบรายงาน ส่งธกส.</a>
                            <a class="dropdown-item" href="#">อัพโหลด แบบรายงาน ส่งธกส.</a>
                        </div>
                    </li>
                @elseif(Auth::user()->user_level == "C" or Auth::user()->user_level == "RG")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ส่งสำนักงบประมาณ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('bureau-of-the-budget-change-sending')}}">Download แบบ พหล.05 ส่งสำนักงบประมาณ</a>
                            <a class="dropdown-item" href="{{url('bureau-of-the-budget-change-sending/report')}}">พิมพ์สรุปใบปะหน้า</a>
                        </div>
                    </li>

                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{url('bureau-of-the-budget-change-sending')}}" ><strong>ตัดยอดส่งสำนักงบประมาณ</strong></a>--}}
                    {{--</li>--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ตรวจสอบข้อมูลทะเบียนเกษตรกร<span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"
                               href="{{url('sing-up/checkActivity')}}">ตรวจสอบข้อมูลทะเบียนเกษตรกร</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            รายงาน
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('report')}}">สรุปเกษตรกรการเข้าร่วมโครงการ</a>
                            <a class="dropdown-item"
                               href="{{url('check-register/view')}}">รายชื่อเกษตรกรสมัครเข้าร่วมโครงการ</a>
                            <a class="dropdown-item" href="{{url('check-register/ricedry')}}">รายชื่อเกษตรกรสมัครเข้าร่วมโครงการพืชหลากหลาย
                                (ข้อมูลจาก ทบก.)</a>
                            <a class="dropdown-item" href="{{url('report/split-plant')}}">สรุปเกษตรกรการเข้าร่วมโครงการ
                                (แบ่งตามชนิดพืช)</a>
                            <a class="dropdown-item" href="{{url('report/list-entrant-maize')}}">รายงานรายชื่อผู้มีสิทธิ
                                -
                                ไม่มีสิทธิ เข้าร่วมโครงการข้าวโพดเลี้ยงสัตว์</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ตรวจสอบสถานะ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('check-status/view')}}">ตรวจสอบสถานะ</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            ธกส.
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">พิมพ์ แบบรายงาน ส่งธกส.</a>
                            <a class="dropdown-item" href="#">อัพโหลด แบบรายงาน ส่งธกส.</a>
                        </div>
                    </li>

                @elseif(Auth::user()->user_level == "CP")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            รายงาน
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('report')}}">สรุปเกษตรกรการเข้าร่วมโครงการ</a>
                            <a class="dropdown-item"
                               href="{{url('check-register/viewCp')}}">รายชื่อเกษตรกรสมัครเข้าร่วมโครงการ</a>
                        </div>
                    </li>
                @endif

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="navbar-text">
                    สวัสดีคุณ : {{ Auth::user()->fullname }}
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/logout">ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </nav>
@else

@endif

@yield('content')
@yield('report')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<!--<editor-fold desc="Bootstrap">-->
<script src="{{asset('js/tether.min.js')}}"></script>
{{--<script src="{{url('js/popper.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
{{--
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
--}}
<script src="{{asset('js/bootstrap.js')}}"></script>
<!--</editor-fold>-->
<script src="{{asset('bower_components/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<!--<editor-fold desc="Input Mask JS">-->
<script src="{{asset('bower_components/jquery.inputmask/dist/min/inputmask/inputmask.min.js')}}"></script>
<script src="{{asset('bower_components/jquery.inputmask/dist/min/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('bower_components/jquery.inputmask/dist/min/inputmask/inputmask.date.extensions.min.js')}}"></script>
<script src="{{asset('bower_components/jquery.inputmask/dist/min/inputmask/inputmask.extensions.min.js')}}"></script>
<script src="{{asset('bower_components/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.js')}}"></script>
<script src="{{asset('bower_components/nanobar/nanobar.min.js')}}"></script>
<script src="{{asset('bower_components/toastr/toastr.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.th.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('js/is.min.js')}}"></script>
<script src="{{asset('js/download.js')}}"></script>
<script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>
<script src="http://demo.expertphp.in/js/dropzone.js"></script>
<!--</editor-fold>-->

<!--<editor-fold desc="Google Chart">-->
{{--<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>--}}
<!--</editor-fold>-->


<script>
    window.addEventListener('error', function (e) {
        var element = document.createElement('div');
        // Create Check Load Script Error
    }, true);

    function getIP() {
        var _token = $('meta[name=_token]').attr('content');
        var url = window.location.href;
        window.RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;//compatibility for Firefox and chrome
        var pc = new RTCPeerConnection({iceServers: []}), noop = function () {
        };
        pc.createDataChannel('');//create a bogus data channel
        pc.createOffer(pc.setLocalDescription.bind(pc), noop);// create offer and set local description
        pc.onicecandidate = function (ice) {
            if (ice && ice.candidate && ice.candidate.candidate) {
                var myIP = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/.exec(ice.candidate.candidate)[1];

                $.ajax({
                    url: "{{url('ip')}}",
                    type: 'post',
                    data: {
                        client_ip: myIP,
                        client_url: url,
                        _token: _token
                    },
                    cache: false,
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });
                pc.onicecandidate = noop;
            }
        };
    }

    function checkLogin() {
        var _token = $('meta[name=_token]').attr('content');
        $.ajax({
            url: "{{url('checkLogin')}}/{{Auth::guard()->id()}}",
            type: 'post',
            data: {
                _token: _token
            },
            cache: false,
            success: function (data) {
                if (data === "true") {
                    // console.log('Match !!');
                }
                if (data === "false") {
                    location.reload();
                } else {
                    // console.log(data);
                }
            },
            error: function (data) {

            }
        });
    }

    $(window).focus(function (e) {
        getIP();
        checkLogin();
    });
</script>
@yield('scripts')
@yield('custom script')
</body>

</html>
