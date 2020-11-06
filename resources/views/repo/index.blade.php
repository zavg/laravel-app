@extends('layouts.internal')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">My repos</h4>
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
                            <h4 class="header-title">List of github repositories</h4>
                            <p class="text-muted font-14">
                                <!--Add <code>.table-hover</code> to enable a hover state on table rows within a <code>&lt;tbody&gt;</code>.-->
                            </p>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-centered mb-0">
                                    <thead>
                                    <tr>
                                        <th>Repository</th>
                                        <th>Files</th>
                                        <th>Lines</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($repos as $repo)
                                        <tr style="cursor:pointer"
                                            onclick="location.href='{{ route('repos.show', ['repo' => $repo->id]) }}'">
                                            <td>{{ $repo->url }}</td>
                                            <td>?</td>
                                            <td>?</td>
                                            <td><i class="mdi mdi-circle text-success"></i> Ready</td>
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
