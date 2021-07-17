@extends("master")

@section("content")
<h1>Hello</h1>
    @component("components.alert")
        xxxx
        @slot("color")
            danger
        @endslot
    @endcomponent

    <x-alert>
        yy
    </x-alert>

    <x-alert>
       Hello
       <x-slot name="color">
           success
       </x-slot>
    </x-alert>

    <x-card-component>
        Our product xxx
        <x-slot name="title">
            Products
        </x-slot>
        <x-slot name="btn_msg">
            click me!
        </x-slot>
        <x-slot name="url">
           /home
        </x-slot>
    </x-card-component>
@endsection