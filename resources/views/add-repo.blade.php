@extends('layouts.internal')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Github repo</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Add repository</h4>
                        <p class="text-muted font-14">Please enter the URL to repo and optional comment.
                        </p>

                        <form method="POST" action="{{ route('repos.store') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="validationCustom01">Repo URL</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                       placeholder="https://github.com/laravel/framework" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-textarea">Comment (optional)</label>
                                <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div> <!-- end tab-content-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    </div> <!-- container -->
@endsection
