@extends('layouts.app')

@section('content')
    <div id="app-body">
<div class="container">
    <div class="row justify-content-md-center" style="margin-top: 2em">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center"><h5>เข้าสู่ระบบ</h5></div>
                <div class="card-block" style="margin-top: 1em">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
                        {{csrf_field()}}
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                        <div class="form-group{{ $errors->has('national_id') ? ' has-error' : '' }}">
                            <label for="national_id" class="col-md control-label">ชื่อผู้ใช้งาน(เลขประจำตัวประชาชน)</label>

                            <div class="col-md">
                                <input id="national_id" type="text" class="form-control" name="national_id" placeholder="เลขประจำตัวประชาชน"
                                       value="{{ old('national_id') }}" required autofocus>

                                @if ($errors->has('national_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('national_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md control-label">รหัสผ่าน</label>

                            <div class="col-md">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="off" placeholder="รหัสผ่าน">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-1">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        จำเพื่อไม่ต้องล๊อกอินซ้ำ
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    ตกลง
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ลืมรหัสผ่าน ?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center"><h5>ติดต่อรายละเอียดโครงการ</h5></div>
                <div class="card-block" style="margin-top: 1em">
                    <div class="col-12">
                        <h5>- ติดต่อรายละเอียดโครงการ</h5>
                        กลุ่มยุทธศาสตร์ กองขยายเมล็ดพืชพันธุ์
                        <br>
                        คุณสัมฤทธิ์ เทวภูมิ
                        <br>
                        โทร. 02-
                        <br>
                        <br>
                        <br>
                        <h5>- ติดต่อการใช้งานระบบสารสนเทศ</h5>
                        กลุ่มฐานข้อมูลสารสนเทศ ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร
                        <br>

                        <br>
                        โทร. 02-940-6028
                        <br>
                        โทร. 02-940-6029

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center" style="margin-top: 1em">
        <div class="col-md-12">
            {{--Parkiiz--}}
            <div class="card">
                <div class="card-header text-center"><h5>ดาวน์โหลดเอกสาร</h5></div>
                <div class="card-block" style="margin-top: 1em">
                    <div class="col-12">
                        <a href="{{url('files/Manualrnc1other.pdf')}}" target="_blank">- คู่มือโครงการ</a>
                    </div>
                    <div class="col-12">
                        <a href="{{url('files/maize-confirm-form.docx')}}"
                           download="แบบยืนยันการปลูกข้าวโพดเลี้ยงสัตว์">-
                            แบบ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    </div>
@endsection
