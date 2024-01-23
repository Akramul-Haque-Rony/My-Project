@include('includes.modal_head')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">
                <div class="content-wrapper">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('includes.modal_footer')
