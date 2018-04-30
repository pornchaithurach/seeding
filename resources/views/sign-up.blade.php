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
                            <input style="text-align: center; " class="form-control"
                                   type="text"
                                   name="national_id"
                                   id="national_id">
                            <br/>
                            <button class="form-control btn btn-success" id="national_id_btn">ค้นหาข้อมูล</button>
                        </div>
                    </div>
                </div>
                <br/><br/>
                {{--Project register--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            พื้นที่เข้าร่วมโครงการ
                        </div>
                        <div class="card-block text-center" style="color: red">
                            <h2>
                                <p style="display: inline;" id="sum_rai">0</p>&nbsp;ไร่
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9" style="padding-left: 0px;">
                <div id="content_data"></div>
                {{--Profile--}}
            </div>
        </div>
        {{--Main Row--}}
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
            nanobar.go(100);
            $('body').on('load', ("#sum_rai"), function () {
                console.log("Loaded");
            });
            $("#national_id").inputmask("9-9999-99999-99-9");

            $("#national_id_btn").click(function () {
                nanobar.go(76);
                $.ajax({
                    url: '{{url('sing-up/get-project')}}',
                    type: 'GET',
                    data: {national_id: $("#national_id").val().replace(/[^0-9]/g, '')},
                    success: function (data) {
                        try {
                            nanobar.go(100);
                            var status = jQuery.parseJSON(data);
                            swal({
                                type: 'error',
                                html: status.msg
                            });
                        }
                        catch (error) {
                            nanobar.go(100);
                            $("#content_data").html(data);
                            $("#home_moo").inputmask("99");
                            $("#phone").inputmask("9999999999");
                            SelectProject();
                        }
                    },
                    error: function (request, status, err) {
                        nanobar.go(100);
                        swal({
                            type: 'error',
                            text: err
                        });
                    }
                }); // and ajax get Project Button
            });

            $('.collapser').click(function () {
                $(this).next().collapse('toggle');
            });

//            Found Profile
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
                var national_id = $('input[name=national_id]').val().replace(/[^0-9]/g, '');
                var _token = $('meta[name=_token]').attr('content');
                var formData = $("#home_update").serialize() + "&national_id=" + national_id + "&_token=" + _token;
                nanobar.go(50);
                $.ajax({
                    url: '{{url('profile/update')}}',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        $('#HomeResult').html(data);
                        toastr["success"]("สำเร็จ");
                        nanobar.go(100);
                    },
                    error: function (request) {
                        nanobar.go(100);
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

//            Found End Profile
            function init_ajax() {
                $('.selectpicker').selectpicker({
                    style: 'btn-info',
                    size: 4
                });
                SaveData();
                DatePicker();
                Validator();
            }

            function SelectProject() {
                $('.select-project').click(function () {
                    var projectID = $(this).attr('id');
                    nanobar.go(20);
                    $.ajax({
                        url: '{{url('sing-up/save-project')}}',
                        type: 'GET',
                        data: {
                            national_id: $("#national_id").val().replace(/[^0-9]/g, ''),
                            projectID: projectID
                        },
                        success: function (data) {
                            try {
                                nanobar.go(100);
                                var status = jQuery.parseJSON(data);
                                swal({
                                    type: 'error',
                                    html: status.msg
                                });
                            }
                            catch (error) {
                                nanobar.go(100);
                                console.log(data);
                                $("#content_data").html(data);
                                $("#home_moo").inputmask("99");
                                $("#phone").inputmask("9999999999");
                                init_ajax();
                            }
                        },
                        error: function (request, status, err) {
                            nanobar.go(100);
                            swal({
                                type: 'error',
                                text: err
                            });
                        }
                    }); // and ajax get Project Button
                });
            }

            function SaveData() {
                $(".SaveData").click(function () {
                    nanobar.go(20);
                    var national_id = $('input[name=national_id]').val().replace(/[^0-9]/g, '');
                    var formID = $(this).attr("form-id");
                    var _token = $('meta[name=_token]').attr('content');
                    var formData = $("#" + formID).serialize() + "&rnc_id=" + formID + "&national_id=" + national_id + "&_token=" + _token;
                    var inputID = $(this).attr("input-id");
                    nanobar.go(20);
                    $.ajax({
                        url: '{{url('sing-up/save-project')}}',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            nanobar.go(100);
                            var status = jQuery.parseJSON(data);
                            if (status.status) {
                                toastr["success"](status.msg);
                                $("#areaUse_" + formID).append(status.data);
                                $("#sum_rai").html(status.sum_rai);
//                                GetSumRai();
                            } else {
                                swal({
                                    type: 'error',
                                    text: status.msg
                                });
                            }
                        },
                        error: function (request) {
                            nanobar.go(100);
                            jQuery.each(request.responseJSON, function (i, val) {
                                if (i == 'harvest_date') {
                                    toastr["error"]("ระบุวันที่");
                                    $("#datepicker_" + inputID).addClass("is-invalid");
                                }
                            });
                        }
                    });
                });
//                $("#idForm").serialize(),
            }

            $('body').on('click', (".DeleteData"), function () {
                nanobar.go(50);
                var id = $(this).attr('rnc-id');
                var national_id = $('input[name=national_id]').val().replace(/[^0-9]/g, '');
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
                        } else {

                        }
                    },
                    error: function (request) {
                        swal(request.getResponseHeader());
                    }
                });
            });

            function DatePicker() {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    language: "th"
                });
            }

            function Validator() {
//                $(".land").focusout(function () {
//
//                    var num = parseInt($(this).val());
//                    var max = parseInt($(this).attr('max'));
//                    var land_type = $(this).attr('land-type');
//                    if ((is.under(num, max)) || (is.equal(num, max))) {
//
//                    } else {
//                        if (isNaN(num)) {
//                        } else {
//                            swal({
//                                type: 'error',
//                                text: "ต้องน้อยกว่า หรือเท่ากับ " + max
//                            });
//                            $(this).val(max);
//                        }
//                    }
//                });
                $("input[name='harvest_date']").change(function () {
                    $(this).removeClass("is-invalid");
                });
            }


        });
    </script>
@endsection