@php
    use App\Models\User;
@endphp

@extends('layouts.app')

@section('title', 'Users')


@section('main')
    <x-button class="blue w-auto" onclick="location.href = '/user/new'"><i class="plus icon"></i> New User</x-button>
    <table class="ui large padded celled selectable stackable table max-w-[1400px] border-0 shadow-md">
        <thead onclick="$('#appointment-modal').modal('show')">
            <th></th>
            <th>Username</th>
            <th>Type</th>
            <th class="collapsing right aligned">Status</th>
        </thead>
        <tbody>

            @foreach (User::all() as $user)
            <tr onclick="location.href = '/user/{{ $user->id }}'">
                <td class="collapsing">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->type }}</td>
                <td class="collapsing right aligned">
                    <span class="ui yellow label">Pending</span>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>


@endsection
