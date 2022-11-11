@extends('layouts.app')

@section('title', 'Appointments')


@section('main')
    <table class="ui large celled selectable stackable table max-w-[1400px]">
        <thead onclick="$('#appointment-modal').modal('show')">
            <th></th>
            <th>Name</th>
            <th>Appointment Date</th>
            <th class="collapsing right aligned">Status</th>
        </thead>
        <tbody>
            <tr onclick="$('#appointment-modal').modal('show')">
                <td>5</td>
                <td>Mariya Takeuchi</td>
                <td>Nov, 20, 2022 : 9AM - 4PM</td>
                <td class="collapsing right aligned">
                    <span class="ui yellow label">Pending</span>
                </td>
            </tr>
            <tr onclick="$('#appointment-modal').modal('show')">
                <td>4</td>
                <td>Bob Make</td>
                <td>Nov, 20, 2022 : 9AM - 4PM</td>
                <td class="collapsing right aligned"><span class="ui yellow label">Pending</span></td>
            </tr>
            <tr onclick="$('#appointment-modal').modal('show')">
                <td>3</td>
                <td>Dez Fafara</td>
                <td>Nov, 20, 2022 : 9AM - 4PM</td>
                <td class="collapsing right aligned"><span class="ui yellow label">Pending</span></td>
            </tr>
            <tr onclick="$('#appointment-modal').modal('show')">
                <td>2</td>
                <td>Que Tontu</td>
                <td>Nov, 20, 2022 : 9AM - 4PM</td>
                <td class="collapsing right aligned"><span class="ui yellow label">Pending</span></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Imanee D. Oat</td>
                <td>Nov, 20, 2022 : 9AM - 4PM</td>
                <td><span class="ui yellow label">Pending</span></td>
            </tr>
        </tbody>
    </table>

    <div id="appointment-modal" class="ui small modal">
        <div class="header">Appointment 59</div>
        <div class="content">
            <div class="grid grid-cols-3 portrait:grid-cols-1 gap-4">
                <div> 
                    <img src="https://i.picsum.photos/id/237/200/300.jpg?hmac=TmmQSbShHz9CdQm0NkEjx1Dyh_Y984R9LpNrpvH2D_U" alt="" class="ui rounded large image">
                </div>
                <div class="col-span-2">
                    <div>
                        <div class="font-medium text-xl">Patient: </div>
                        <span class="font-semibold text-3xl">Dez Fafara</span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Age: </div>
                        <span class="font-semibold text-3xl">45 years old</span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Service: </div>
                        <span class="font-semibold text-3xl">Tooth Extraction</span>
                    </div>
                    <div class="my-4">
                        <div class="font-medium text-xl">Notes: </div>
                        <span class="text-lg">Need extraction for a week now, but too shy to ask for help. </span>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="actions">
            <button class="ui large button" onclick="$('#appointment-modal').modal('hide')">Close</button>
        </div>
    </div>
@endsection
