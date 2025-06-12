                        @extends('layouts.app')


                        @section('content')
                            <div class="content">
                                <div class="py-4 px-3 px-md-4">
                                    <div class="card mb-3 mb-md-4">

                                        <div class="card-body">
                                            <!-- Form -->
                                            <div>
                                                <form id="get_audio" class="needs-validation" novalidate>
                                                    <div class="form-row">
                                                        <div class="form-group col-12 col-md-6">
                                                            <label for="date_from">Date From</label>
                                                            <input type="date" class="form-control"
                                                                id="date_from" name="date_from">
                                                        </div>
                                                        <div class="form-group col-12 col-md-6">
                                                            <label for="date_to">Date To</label>
                                                            <input type="date" class="form-control"
                                                                id="date_to" name="date_to">
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary float-left">Check</button>
                                                </form>
                                            </div>
                                            <!-- End Form -->
                                        </div>
                                    </div>


                                </div>

                                <div class="content">
                                    <div class="py-4 px-3 px-md-4">
                                        <div class="card mb-3 mb-md-4">

                                            <div class="card-body">
                                                <!-- Users -->
                                                <div class="table-responsive-xl">
                                                    {{-- <table class="table text-nowrap mb-0"> --}}
                                                        <table class="table myDataTable" id="audio_table">
                                                        <thead>
                                                            <tr>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">User ID
                                                                </th>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">User Name
                                                                </th>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">
                                                                    Date From</th>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">Date To
                                                                </th>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">Recording
                                                                </th>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">Extension
                                                                </th>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">Audio Type
                                                                </th>
                                                                <th class="font-weight-semi-bold border-top-0 py-2">Action
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>

                                                </div>
                                                <!-- End Users -->
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <!-- Footer -->
                                <footer class="small p-3 px-md-4 mt-auto">
                                    <div class="row justify-content-between">
                                        <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                                            <ul class="list-dot list-inline mb-0">
                                                <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a
                                                        class="link-dark" href="#">FAQ</a></li>
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

                                        <div class="col-lg text-left text-lg-right">
                                            &copy; 2025 Riuman International.
                                        </div>
                                    </div>
                                </footer>
                                <!-- End Footer -->
                            </div>
                        @endsection

                        @section('page-scripts')
                            <script>
                                const audioBaseUrl = "{{ asset('audios') }}"; // Path to audio files
                                let audioTable;

                                $(document).ready(function() {
                                    // Initialize DataTable
                                    audioTable = $('#audio_table').DataTable({
                                        responsive: true,
                                        autoWidth: false
                                    });

                                    $('#get_audio').on('submit', function(e) {
                                        e.preventDefault();

                                        const dateFrom = $('input[name="date_from"]').val();
                                        const dateTo = $('input[name="date_to"]').val();

                                        if (!dateFrom || !dateTo) {
                                            alert('Please select both "From" and "To" dates.');
                                            return;
                                        }

                                        $.ajax({
                                            url: "{{ route('user.get_audio') }}",
                                            method: 'GET',
                                            data: {
                                                date_to: dateTo,
                                                date_from: dateFrom,
                                                _token: "{{ csrf_token() }}"
                                            },
                                            beforeSend: function() {
                                                $('#loader').removeClass('d-none');
                                                $('#checkBtn').attr('disabled', true);
                                                audioTable.clear().draw();
                                            },
                                            complete: function() {
                                                $('#loader').addClass('d-none');
                                                $('#checkBtn').attr('disabled', false);
                                            },
                                            success: function(response) {
                                                if (!response || response.length === 0) {
                                                    audioTable.row.add([
                                                        '', '', '', '', '',
                                                        '<span class="text-danger">No audio records found.</span>',
                                                        '', '', ''
                                                    ]).draw();
                                                    return;
                                                }

                                                const rows = response.map(audio => {
                                                    const fileName = audio.recording ?? '';
                                                    const extension = audio.extension ?? 'mpeg';
                                                    const audioSrc = `${audioBaseUrl}/${fileName}`;
                                                    const audioElement = fileName ?
                                                        `<audio controls><source src="${audioSrc}" type="audio/mpeg"></audio>` :
                                                        `<span class="text-danger">No audio</span>`;
                                                    const downloadBtn = fileName ?
                                                        `<a href="${audioSrc}" download="${fileName}" class="btn btn-sm btn-primary">Download</a>` :
                                                        '';

                                                    return [
                                                        audio.id ?? '',
                                                        audio.user_id ?? '',
                                                        audio.user_name ?? '',
                                                        audio.date_from ?? '',
                                                        audio.date_to ?? '',
                                                        audioElement,
                                                        extension,
                                                        audio.audio_type ?? '',
                                                        downloadBtn
                                                    ];
                                                });

                                                audioTable.rows.add(rows).draw();
                                            },
                                            error: function(xhr) {
                                                console.error("Error fetching data:", xhr);
                                                alert('Something went wrong while fetching audio data.');
                                            }
                                        });
                                    });
                                });
                            </script>
                        @endsection
