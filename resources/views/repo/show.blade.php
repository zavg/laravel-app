@extends('layouts.internal')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Repository info</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-sm-12">
                <!-- Profile -->
                <div class="card bg-primary">
                    <div class="card-body profile-user-box">

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="mt-1 mb-1 text-white"> {{ $repo->url }}</h4>

                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item mr-3">
                                                <h5 class="mb-1">100</h5>
                                                <p class="mb-0 font-13 text-white-50">Total files</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-1">54</h5>
                                                <p class="mb-0 font-13 text-white-50">Total lines</p>
                                            </li>
                                        </ul>

                                        @if( !empty( $repo->comment))
                                            <br/><br/><p class="font-15 text-white">Comment: {{ $repo->comment }}</p>
                                        @endif
                                    </div> <!-- end media-body-->
                                </div>
                            </div> <!-- end col-->

                            <div class="col-sm-4">
                                <div class="text-center mt-sm-0 mt-3 text-sm-right">
                                    <button type="button" class="btn btn-light"
                                            onclick="location.href='{{ route('repos.edit', ['repo' => $repo->id]) }}'">
                                        <i class="mdi mdi-file-edit-outline mr-1"></i> Edit
                                    </button>
                                    <!-- item-->

                                    <form action="{{ route('repos.destroy', ['repo' => $repo->id]) }}" method="POST"
                                          style="display:inline">
                                        @csrf

                                        {{ method_field('DELETE') }}

                                        <button  class="btn btn-light" type="submit">
                                            <i class="mdi mdi-delete mr-1"></i> Delete
                                        </button>
                                    </form>

                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row -->

                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection
