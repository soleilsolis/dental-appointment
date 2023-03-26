<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">All Appointments</h2>
        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" onclick="window.print()">Export to PDF</a>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Service</th>
                    <th scope="col">Schedule</th>
                    <th scope="col">Dentist</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointment ?? '' as $data)
                <tr>
                    <th scope="row">{{ $data->id ?? $data['id']}}</th>
                    <td>{{ $data->patient->last_name }}, {{ $data->patient->first_name }}</td>
                    <td>{{ $data->service->name }}</td>
                    <td>{{ $data->date }}
                        : {{ $data->start_time }}
                        - {{ $data->end_time }}</td>
                    <td>   {{ $data->dentist ? "{$data->dentist->last_name}, {$data->dentist->first_name}" : 'TBA' }}</td>
                        <td>
                            @if ($data->accepted_at && !$data->cancelled_at)
                            <span class="ui green label">Accepted</span>
                        @elseif($data->cancelled_at)
                            <span class="ui red label">Cancelled</span>
                        @elseif($data->completed_at)
                            <span class="ui label">Complete</span>
                        @else
                            <span class="ui yellow label">Pending</span>
                        @endif
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>