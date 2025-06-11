        @extends('layouts.app')


        @section('content')
            <div class="content">
                <div class="py-4 px-3 px-md-4">
                    <div class="card mb-3 mb-md-4">

                        <div class="card-body">
                            <!-- Breadcrumb -->
                            <nav class="d-none d-md-block" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Upload Audio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Upload New Audio</li>
                                </ol>
                            </nav>
                            <!-- End Breadcrumb -->

                            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                                <div class="h3 mb-0">Upload New Audio</div>
                            </div>


                            <!-- Form -->
                            <div>
                                <form action="{{ route('import.audio') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-12 col-md-12">
                                            <label for="Upload_excel_file">Upload Audio File</label>
                                            <input type="file" id="audio" name="audio[]" class="form-control"
                                                multiple accept="audio/*">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-left">Audio Data</button>
                                </form>
                            </div>
                            <!-- End Form -->
                        </div>
                    </div>


                </div>

                <!-- Footer -->
                <footer class="small p-3 px-md-4 mt-auto">
                    <div class="row justify-content-between">
                        <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                            <ul class="list-dot list-inline mb-0">
                                <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark"
                                        href="#">FAQ</a></li>
                                <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark"
                                        href="#">Support</a></li>
                                <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark"
                                        href="#">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="col-lg text-center mb-3 mb-lg-0">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i
                                            class="gd-twitter-alt"></i></a></li>
                                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i
                                            class="gd-facebook"></i></a></li>
                                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i
                                            class="gd-github"></i></a></li>
                            </ul>
                        </div>

                        <div class="col-lg text-center text-lg-right">
                            &copy; 2025 Riuman International.
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
        @endsection
