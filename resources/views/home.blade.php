@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @livewire('post')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@once
    @push('scripts')
        <script>
            window.addEventListener('closeModal', event => {
                $('#modal-create').modal('hide')
            })

            window.addEventListener('openModal', event => {
                $('#modal-create').modal('show')
            })
            window.addEventListener('openDeleteModal', event => {
                $('#modalFormDelete').modal('show')
            })
            window.addEventListener('closeDeleteModal', event => {
                $('#modalFormDelete').modal('hide')
            })
        </script>
    @endpush
@endonce
