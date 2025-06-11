                        @extends('layouts.app')


                        @section('content')
                            <div class="main-content">
                                <section class="section">
                                    <div class="section-body">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>Audio Check</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <form id="get_audio" class="needs-validation" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Date</label>
                                                                        <input type="date" class="form-control"
                                                                            name="date_from" placeholder="Select Start Date"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Date</label>
                                                                        <input type="date" class="form-control"
                                                                            name="date_to" placeholder="Select End Date"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="card-footer text-left">
                                                        <button class="btn btn-primary mr-1" type="submit">Check</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table myDataTable" id="audio_table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">User ID</th>
                                                                    <th scope="col">User Name</th>
                                                                    <th scope="col">Date From</th>
                                                                    <th scope="col">Date To</th>
                                                                    <th scope="col">Recording</th>
                                                                    <th scope="col">Extension</th>
                                                                    <th scope="col">Audio Type</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>


                            </section>
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
