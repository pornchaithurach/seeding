@extends('layouts.layout')
@section('custom css')
    <style>
        .area-header {
            color: #000000;
            font-size: 12pt;
        }

        .show > .dropdown-menu {
            display: block;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <br/>
        <div class="row">
            <div class="col-md-3">
                {{--search ID Card--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            ค้นหาข้อมูลด้วยเลขบัตรประจำตัวประชาชน
                        </div>
                        <div class="card-block">
                            <input type="hidden" name="projectCode" value="{{ $projectCode }}">
                            <input style="text-align: center; " class="form-control"
                                   type="text"
                                   name="national_id"
                                   id="national_id">
                            <br/>
                            <input type="hidden" id="national_id1" name="national_id1">
                            <button class="form-control btn btn-success" id="national_id_btn">ค้นหาข้อมูล</button>
                        </div>
                    </div>
                </div>
                <br/><br/>
                {{--Project register--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            พื้นที่เข้าร่วมโครงการ ไม่เกิน 15 ไร่
                        </div>
                        <div class="card-block text-center" style="color: red">
                            <h2>
                                <p style="display: inline;" id="sum_rai">0</p>&nbsp;ไร่
                            </h2>
                        </div>
                    </div>
                </div>
@if($projectCode==1)
                <br/>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            เป้าหมายของจังหวัด <p style="display: inline;" id="province_name"></p>
                        </div>
                        <div class="card-block text-center">
                            <h2>
                                <h6 style="display: inline;">โครงการข้าวโพดเลี้ยงสัตว์</h6><br/>
                                <p style="display: inline;" id="provinceTarget_1"></p>&nbsp <br/>

                            </h2>
                        </div>

                    </div>
                </div>
                @endif
                @if($projectCode==2)
                <br/>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            เป้าหมายของจังหวัด <p style="display: inline;" id="province_name"></p>
                        </div>
                        <div class="card-block text-center">
                            <h2>

                                <h6 style="display: inline;">โครงการพืชหลากหลาย</h6><br/>
                                <h6 style="display: inline;">รอบที่ 1</h6>
                                <p style="display: inline;" id="provinceTarget_2_r1"></p>&nbsp; <br>
                                <h6 style="display: inline;">รอบที่ 2</h6>
                                <p style="display: inline;" id="provinceTarget_2_r2"></p>&nbsp <br>

                            </h2>
                        </div>

                    </div>
                </div>
                    @endif


            </div>

            <div class="col-md-9" style="padding-left: 0px;">
                <h3 class="text-center">{{$title}}</h3>
                <div id="content_data"></div>
                {{--Profile--}}
            </div>
        </div>
        {{--Main Row--}}
    </div>
    <div id="div-txt-loading" class="windows8" style="display: none">
        <div class="wBall" id="wBall_1">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_2">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_3">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_4">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_5">
            <div class="wInnerBall"></div>
        </div>
    </div>
@endsection

@section('custom script')
    <script type="text/javascript">
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        var nanobar_options = {
            classname: 'my-class',
            id: 'my-id',
            target: document.getElementById('myDivId')
        };
        var nanobar = new Nanobar(nanobar_options);
        nanobar.go(20);
        $(document).ready(function () {
            $("#national_id").inputmask("9-9999-99999-99-9");
            nanobar.go(100);
        });

        $("#national_id_btn").click(function () {
            $('#div-txt-loading').show();
            nanobar.go(20);
            $.ajax({
                url: '/sing-up/getProfile',
                type: 'get',
                data: {
                    national_id: $("#national_id").val().replace(/[^0-9]/g, ''),
                    projectCode: $('[name=projectCode]').val()
                },
                success: function (data) {
                    nanobar.go(100);
                    $('#div-txt-loading').hide();
                    $('#content_data').html(data);
                },
                error: function (request) {
                    $('#div-txt-loading').hide();
                    nanobar.go(100);
                    if (request.status == 422) {
                        swal({
                            type: 'error',
                            text: request.responseText
                        });
                    } else {
                        swal({
                            type: 'error',
                            text: request.statusText
                        });
                    }
                    console.log(request.statusText);
                }
            });
        });

        $('body').on('change', ('#home_province'), function () {
            var amphur_dropdown = $(this).val();
            $.get('/api/province/' + amphur_dropdown, function (data) {
                $('#home_amphur').removeAttr('disabled', 'disabled');
                $('#home_amphur').html(data);
            })
        });

        $('body').on('change', ('#home_amphur'), function () {
            var tambon_dropdown = $(this).val();
            $.get('/api/amphur/' + tambon_dropdown, function (data) {
                $('#home_tambon').removeAttr('disabled', 'disabled');
                $('#home_tambon').html(data);
            })
        });

        $('body').on('change', ('.profile'), function () {
            $(this).removeClass("is-invalid")
        });

        $('body').on('click', ('#update_profile'), function () {
            var national_id = $('input[name=national_id1]').val().replace(/[^0-9]/g, '');
            var _token = $('meta[name=_token]').attr('content');
            var formData = $("#home_update").serialize() + "&national_id=" + national_id + "&_token=" + _token;
            $.ajax({
                url: '/profile/update',
                type: 'POST',
                data: formData,
                success: function (data) {
                    $('#HomeResult').html(data);
                    $('#home_update')[0].reset()
                    toastr["success"]("สำเร็จ");
                    nanobar.go(100);
                },
                error: function (request) {
                    toastr["error"]("ผิดพลาด");
                    console.log(request.responseJSON);
                    jQuery.each(request.responseJSON, function (i, val) {
                        if (i == 'home_number') {
                            $("#home_number").addClass("is-invalid");
                        }
                        if (i == 'home_moo') {
                            $("#home_moo").addClass("is-invalid");
                        }
                        if (i == 'home_province') {
                            $("#home_province").addClass("is-invalid");
                        }
                        if (i == 'home_amphur') {
                            $("#home_amphur").addClass("is-invalid");
                        }
                        if (i == 'home_tambon') {
                            $("#home_tambon").addClass("is-invalid");
                        }
                        if (i == 'phone') {
                            $("#phone").addClass("is-invalid");
                        }
                    });
                }
            });
        });

        $('body').on('click', (".DeleteData"), function () {
            nanobar.go(50);
            var id = $(this).attr('rnc-id');
            var national_id = $('input[name=national_id1]').val().replace(/[^0-9]/g, '');
            var _token = $('meta[name=_token]').attr('content');
            var formData = "id=" + id + "&national_id=" + national_id + "&_token=" + _token;
            $.ajax({
                url: '{{url('sing-up/delete-land')}}',
                type: 'POST',
                data: formData,
                success: function (data) {
                    var status = jQuery.parseJSON(data);
                    console.log(status);
                    if (status.status) {
                        nanobar.go(100);
                        $("#land_" + id).remove();
                        $("#sum_rai").html(status.sum_rai);
                        toastr["success"]("ลบสำเร็จ");
                        getTarget();
                    } else {
                        swal({
                            type: 'error',
                            text: status.msg
                        });
                        nanobar.go(100);
                    }
                },
                error: function (request) {
                    swal(request.getResponseHeader());
                }
            });
        });

        function getTarget() {
            $.get("{{url('get-target')}}", function(data, status){
                var target = jQuery.parseJSON( data );

                var goal = parseFloat(target.project_1_current) / parseInt(target.project_1)*100;

                var goalchange1 = parseFloat(target.project_2_r_1_current) / parseInt(target.project_2_r_1)*100;

                var goalchange2 = parseFloat(target.project_2_r_2_current) / parseInt(target.project_2_r_2)*100;

                var provinceTarget_1 = Number(parseFloat(target.project_1_current).toFixed(2)).toLocaleString()+' / '
                    + Number(parseInt(target.project_1).toFixed(2)).toLocaleString() +' ไร่ '+
                    Number(goal.toFixed(2).toLocaleString())+'%';

                var provinceTarget_2_r1 =  Number(parseFloat(target.project_2_r_1_current).toFixed(2)).toLocaleString() + ' / '
                    + Number(parseInt(target.project_2_r_1).toFixed(2)).toLocaleString()+' ไร่ '+
                    Number(goalchange1.toFixed(2).toLocaleString())+'%';

                var provinceTarget_2_r2 = Number(parseFloat(target.project_2_r_2_current).toFixed(2)).toLocaleString() + ' / '
                    + Number(parseInt(target.project_2_r_2).toFixed(2)).toLocaleString()+' ไร่ '+
                    Number(goalchange2.toFixed(2).toLocaleString())+'%';
                
                var province_name = target.province_name;
                $('#provinceTarget_1').html(provinceTarget_1);
                $('#provinceTarget_2_r1').html(provinceTarget_2_r1);
                $('#provinceTarget_2_r2').html(provinceTarget_2_r2);
                $('#province_name').html(province_name);
            });
        }
        getTarget();

    </script>
@endsection