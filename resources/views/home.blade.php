@extends('layouts.app')

@section('title', 'Home')

@section('main')
    <div class="grid grid-cols-4 portrait:grid-cols-2 gap-5 portrait:gap-x-2">
        <div>
            <div class="ui segment p-6 portrait:p-5 border-0 bg-[#E9EDF1] shadow-sm">
                <div class="font-bold text-5xl portrait:text-4xl">100</div>
                <div class="mt-5 text-xl font-medium">Appointments</div>
            </div>
        </div>
        <div>
            <div class="ui segment p-6 portrait:p-5 border-0 bg-[#E9EDF1] shadow-sm">
                <div class="font-bold text-5xl portrait:text-4xl">5</div>
                <div class="mt-5 text-xl font-medium">New</div>
            </div>
        </div>
        <div>
            <div class="ui segment p-6 portrait:p-5 border-0 bg-[#E9EDF1] shadow-sm">
                <div class="font-bold text-5xl portrait:text-4xl">7</div>
                <div class="mt-5 text-xl font-medium">Scheduled</div>
            </div>
        </div>
        <div>
            <div class="ui pink inverted segment p-6 portrait:p-5 border-0 shadow-sm">
                <div class="font-bold text-5xl portrait:text-4xl">5</div>
                <div class="mt-5 text-xl font-medium">Canceled</div>
            </div>
        </div>



    </div>
    <div class="grid grid-cols-4 portrait:grid-cols-1 gap-5 portrait:gap-x-2 mt-10">
        <div class="col-span-3 ">
            <canvas id="myChart" height="150"></canvas>
        </div>

        <div>   
            <table class="ui stackable table w-full border-0 shadow-md">
                <thead>
                    <th>New Appointments</th>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            Mariya Takeuchi
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bob Make
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Dez Fafara
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Que Tontu
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Imanee D. Oat
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',

        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Appointments Monthly',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45, 9],
            },
            {
                label: 'Sales Monthly (K)',
                backgroundColor: 'rgb(5, 99, 132)',
                borderColor: 'rgb(5, 99, 132)',
                data: [30, 67, 14, 72, 43, 69, 52, 20],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };



        const myChart = new Chart(ctx, config);
    </script>
@endsection