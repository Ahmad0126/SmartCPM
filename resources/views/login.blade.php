<x-root>
    <x-slot:title>Login | Smart CPM</x-slot:title>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                Smart Complaintment
                            </div>
                            <h4>Silahkan Login</h4>
                            <div class="notify">
                                @foreach($errors->all() as $err)
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        {{ $err }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <form class="pt-3" action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- content-wrapper ends -->
        </div>
    <!-- page-body-wrapper ends -->
    </div>
</x-root>