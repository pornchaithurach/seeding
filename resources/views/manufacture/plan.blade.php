@extends('layouts.app')

@section('content')
    <div class="container" >
        <br>
        <div class="row">
            <div class="col-md-3">ข้อมูลการดำเนินงาน วางแผนการผลิต</div>
            <div class="col-md-1 ml-md-auto"> <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">สร้างแผน</a></div>
        </div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ปีงบประมาณ</th>
                <th scope="col">ประเภทสายการผลิต</th>
                <th scope="col">ชนิดพืช</th>
                <th scope="col">ช่วงเวลาการผลิต</th>
                <th scope="col">จำนวนที่ผลิต</th>
                <th scope="col">จัดการ</th>
            </tr>
            </thead>
            <tbody>
            @foreach ( $plans as $plan )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $plan['seed_year'] }}</td>
                    <td>{{ $seed_type[$plan['seed_type']] }}</td>
                    <td>{{ $plant_names[$plan['seed_plant']] }}</td>
                    <td>{{ $plan['date-produce-start'] }} - {{ $plan['date-produce-stop'] }}</td>
                    <td>{{ number_format($plan['seed_quantity'],0) }}</td>
                    <td>
                        <a href="{{ url('/produce/editPlan/') }}/{{ $plan['id'] }}"><i class="material-icons">edit</i></a>
                        <a href="{{ url('/produce/destroyPlan/') }}/{{ $plan['id'] }}"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <div id="Modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">สร้างแผนการผลิต ปี พ.ศ. {{ date("Y")+543 }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/produce/storePlan') }}">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="seed_type">ประเภทสายการผลิต</label>
                            <div class="col-md-9 ml-md-auto">
                                <select class="custom-select" id="seed_type" name="seed_type">
                                    <option selected>กรุณาเลือก...</option>
                                    <option value="1">ต้นพันธุ์</option>
                                    <option value="2">ท่อนพันธุ์</option>
                                    <option value="3">เนื้อเยื่อ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="seed_plant">ชนิดพืช</label>
                            <div class="col-md-9 ml-md-auto">
                                <select class="custom-select" id="seed_plant" name="seed_plant">
                                    <option selected>กรุณาเลือกชนิดพืช...</option>
                                    @foreach ( $plant_names as $plant_code => $plant_name )
                                        <option value="{{ $plant_code }}">{{ $plant_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="seed_cost">ต้นทุนการผลิต</label>
                            <div class="col-md-9 ml-md-auto">
                                <input type="number" id="seed_cost" name="seed_cost" class="form-control" placeholder="ต้นทุนการผลิต">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="date-produce">ช่วงเวลาการผลิต</label>
                            <div class="col-md-9 ml-md-auto">
                                <div class="row">
                                    <div class="col-6">
                                    <input type="text" class="form-control datetimepicker-input"
                                           id="date-produce-start" name="date-produce-start" data-toggle="datetimepicker"
                                           data-target="#date-produce-start"
                                           placeholder="เดือนเริ่มการผลิต"
                                    />
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control datetimepicker-input"
                                               id="date-produce-stop" name="date-produce-stop" data-toggle="datetimepicker"
                                               data-target="#date-produce-stop"
                                               placeholder="เดือนสิ้นสุดการผลิต"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="seed_quantity">จำนวนที่ผลิต(ต้น/ท่อน)</label>
                            <div class="col-md-9 ml-md-auto">
                                <input type="number" id="seed_quantity" name="seed_quantity" class="form-control" placeholder="จำนวนที่ผลิต(ต้น/ท่อน)">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="date-distribute">ช่วงเวลาการจำหน่าย</label>
                            <div class="col-md-9 ml-md-auto">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control datetimepicker-input"
                                               id="date-distribute-start" name="date-distribute-start" data-toggle="datetimepicker"
                                               data-target="#date-distribute-start"
                                               placeholder="เดือนเริ่มการจำหน่าย"
                                        />
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control datetimepicker-input"
                                               id="date-distribute-stop" name="date-distribute-stop" data-toggle="datetimepicker"
                                               data-target="#date-distribute-stop"
                                               placeholder="เดือนสิ้นสุดการจำหน่าย"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="distribute_quantity">จำนวนที่จำหน่าย(ต้น/ท่อน)</label>
                            <div class="col-md-9 ml-md-auto">
                                <input type="number" id="distribute_quantity" name="distribute_quantity" class="form-control" placeholder="จำนวนที่จำหน่าย(ต้น/ท่อน)">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="distribute_area">พื้นที่ตลาดรองรับผลผลิต</label>
                            <div class="col-md-9 ml-md-auto">
                                <input type="text" id="distribute_area" name="distribute_area" class="form-control" placeholder="พื้นที่ตลาดรองรับผลผลิต">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-right" for="materials">วัสดุปลูก</label>
                            <div class="col-md-9 ml-md-auto">
                                <input type="text" id="materials" name="materials" class="form-control" placeholder="วัสดุปลูก">
                            </div>
                        </div>
                        <input type="hidden" id="agency_code" name="agency_code" class="form-control" value="{{ Auth::user()->agency }}">
                        <input type="hidden" id="user_create" name="user_create" class="form-control" value="{{ Auth::user()->id }}">
                        <input type="hidden" id="user_update" name="user_update" class="form-control" value="{{ Auth::user()->id }}">
                        <input type="hidden" id="seed_year" name="seed_year" class="form-control" value="{{ date("Y")+543 }}">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <script type="text/javascript">

        $('#date-produce-start').datetimepicker({
            viewMode: 'months',
            format: 'MM/YYYY'
        });

        $('#date-produce-stop').datetimepicker({
            viewMode: 'months',
            format: 'MM/YYYY'
        });

        $('#date-distribute-start').datetimepicker({
            viewMode: 'months',
            format: 'MM/YYYY'
        });

        $('#date-distribute-stop').datetimepicker({
            viewMode: 'months',
            format: 'MM/YYYY'
        });

    </script>
@endsection

