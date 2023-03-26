@php
    use App\Models\Service;
@endphp

@extends('layouts.app')

@section('title', 'Services')


@section('main')

    <button class="ui bluerounded button" onclick="newService()">New Service</button>
    <table class="ui celled selectable stackable table max-w-[1400px]">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </thead>
        <tbody>

            @foreach (Service::all() as $service)
            <tr onclick="getService({{ $service->id }})">
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price }}</td>
            </tr>
            @endforeach
           
        </tbody>
    </table>

    <form id="get-service-form" class="submit-form hidden" data-action="/service" data-method="POST"
        data-callback="printService">
        @csrf
        <button type="submit"></button>
    </form>

    <div id="service-modal" class="ui basic small modal">


        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 id="service-label" class="mb-10 text-black text-3xl font-bold"></h1>
            <x-forms.service></x-forms.service>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function getService(id) {
            const form = document.querySelector('#get-service-form');
            form.dataset.action = `/service/get/${id}`;
            form.querySelectorAll('button')[0].click();
        }

        function printService(result) {
            const service = result.data;
            document.querySelector('#service-form').dataset.action = '/service/update/'+service.id;

            document.querySelector('#service-id').value = service.id;
            document.querySelector('#name').value = service.name;
            document.querySelector('#price').value = service.price;
            document.querySelector('#service-label').innerHTML = service.name;


            $('#service-modal').modal('show');
        }

        function newService() {
           
            document.querySelector('#service-form').dataset.action = '/services';

            document.querySelector('#service-id').value = '';
            document.querySelector('#name').value = '';
            document.querySelector('#price').value = '';
            document.querySelector('#service-label').innerHTML = 'New Service';


            $('#service-modal').modal('show');

        }

    </script>
@endsection

