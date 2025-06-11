        @extends('layouts.app')


        @section('content')
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Upload Audio</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('import.audio') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="Upload_excel_file">Upload Audio File</label>
                                                        <input type="file" id="audio" name="audio[]" class="form-control" multiple accept="audio/*">
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="card-footer text-left">
                                        <button class="btn btn-primary mr-1" type="submit">Audio Data</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            </section>
            </div>
        @endsection
