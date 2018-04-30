<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name','') }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/font.css')}}">
</head>
<body>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="modal-body">
                        <h5>บราวเซอร์ นี้ไม่สนับสนุนระบบ กรุณาเปลี่ยนไปใช้ Chrome หรือ Firefox</h5>
                        <hr>
                        <a href="https://www.google.com/intl/th/chrome/browser/desktop/index.html" class="tooltip-test" title="Tooltip" target="_blank">ดาวน์โหลด Chrome</a> <br />
                        <a href="https://www.mozilla.org/th/firefox/" class="tooltip-test" title="Tooltip" target="_blank">ดาวน์โหลด Firefox</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="app">
    {{--parkiiz--}}
    <div class="row justify-content-md-center" style="margin-top: 1em">
        <div class="col-12 col-md-auto">
            <h2 class="text-center">ระบบบริหารจัดการศูนย์ขยายพันธุ์พืช</h2>
{{--            <img src="{{url('img/logoRNC.jpg')}}" align="center">--}}
            @yield('content')
        </div>
    </div>
    {{--parkiiz--}}

</div>
<script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
<!--<editor-fold desc="Bootstrap">-->
<script src="{{url('js/tether.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="{{url('js/bootstrap.js')}}"></script>
<!--</editor-fold>-->
<script src="{{url('js/sweetalert.min.js')}}"></script>
<!--<editor-fold desc="Input Mask JS">-->
<script src="/bower_components/jquery.inputmask/dist/min/inputmask/inputmask.min.js"></script>
<script src="/bower_components/jquery.inputmask/dist/min/inputmask/jquery.inputmask.min.js"></script>
<script src="/bower_components/jquery.inputmask/dist/min/inputmask/inputmask.date.extensions.min.js"></script>
<script src="/bower_components/jquery.inputmask/dist/min/inputmask/inputmask.extensions.min.js"></script>
<script src="/bower_components/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!--</editor-fold>-->
<script type="text/javascript">
    function msieversion() {

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
        {
            console.log(ua);
            $('#myModal').modal('show')
        }
        else  // If another browser, return 0
        {
        }

        return false;
    }

    msieversion();
</script>
@yield('custom script')
</body>
</html>
