@include('dashboard-part.header')
<div class="page-wrapper">
 @include('dashboard-part.nav')
    @include('dashboard-part.menu')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            @include('admin.notify')
            @yield('content')
            <style>
                .visitors-table tbody tr td:last-child {
                    display: flex;
                    align-items: center;
                }

                .visitors-table .progress {
                    flex: 1;
                }

                .visitors-table .progress-parcent {
                    text-align: right;
                    margin-left: 10px;
                }
            </style>

        </div>
@include('dashboard-part.footer')
    </div>
</div>
@include('dashboard-part.script')
