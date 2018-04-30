<div id="nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">หน้าหลัก <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            งบประมาณ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/invest') }}">งบลงทุน</a>
                            <a class="dropdown-item" href="{{ url('/operation') }}">งบดำเนินงาน</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            การผลิต
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/produce/indexPlan') }}">วางแผนการผลิต</a>
                            <a class="dropdown-item" href="{{ url('/produce/indexAction') }}">รายงานผลการผลิต</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            การกระจายพันธุ์พืช
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/selling') }}">จัดจำหน่าย</a>
                            <a class="dropdown-item" href="{{ url('/inventory') }}">ตรวจสอบสินค้าเหลือ</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            การศึกษาและพัฒนา
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/training') }}">ฝึกอบรม</a>
                            <a class="dropdown-item" href="{{ url('/developing') }}">พัฒนาแปลง</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

</div>