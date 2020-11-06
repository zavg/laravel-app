@extends('layouts.internal')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ __('Edit Github repo') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('Edit repository') }}</h4>
                        <p class="text-muted font-14">{{ __('You may change the comment to repo') }}.
                        </p>

                        <form method="POST" action="{{ route('repos.update', ['repo' => $repo->id]) }}">
                            @csrf

                            {{ method_field('PATCH') }}

                            <div class="form-group mb-3">
                                <label>{{ __('Repo URL') }}</label>
                                <input type="text" class="form-control" name="url" readonly="readonly"
                                       value="{{ $repo->url }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>{{ __('Comment') }} (optional)</label>
                                <textarea class="form-control" id="comment-textarea" name="comment" rows="5">{{ $repo->comment }}</textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                        </form>
                    </div> <!-- end tab-content-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    <!-- end row-->

    </div> <!-- container -->
@endsection
