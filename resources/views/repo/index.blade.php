@extends('layouts.internal')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ __('My repos') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-lg font-16 btn-primary" id="btn-new-event"
                                onclick="location.href='{{ route('repos.create') }}'">
                            <i class="mdi mdi-plus-circle-outline"></i>
                            {{ __('Add New repo') }}</button>
                        <br/><br/><br/>

                        @if(!$repos->isEmpty())
                            <h4 class="header-title">{{ __('List of github repositories') }}</h4>
                            <p class="text-muted font-14">
                                {{ __('If some repositories are in a "waiting" state, then please wait and refresh the page manually.') }}<br/>
                                {{ __('For huge repositories, it could take a long time.') }}
                            </p>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-centered mb-0">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Repository') }}</th>
                                        <th>{{ __('Files') }}</th>
                                        <th>{{ __('Lines') }}</th>
                                        <th>{{ __('Status') }}  </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($repos as $repo)
                                        <tr style="cursor:pointer"
                                            onclick="location.href='{{ route('repos.show', ['repo' => $repo->id]) }}'">
                                            <td>{{ $repo->url }}</td>
                                            <td>{{ $repo->files }}</td>
                                            <td>{{ $repo->lines }}</td>
                                            <td>
                                                @switch($repo->status)
                                                    @case('ready')
                                                    <i class="mdi mdi-circle text-success"></i> {{ __('Ready') }}
                                                    @break

                                                    @default
                                                    <i class="mdi mdi-circle text-warning"></i> {{ __('Waiting') }}...
                                                @endswitch

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        @endif

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection
