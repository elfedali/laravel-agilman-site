@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">


                <h1>
                    Create new project
                </h1>

                {{ html()->form('POST', route('projects.store'))->open() }}
                <div>
                    <label for="title">
                        {{ __('label.title') }}
                    </label>
                    {{ html()->text('title') }}
                </div>
                <div>
                    <label for="description">
                        {{ __('label.description') }}
                    </label>
                    {{ html()->textarea('description') }}
                </div>
                {{ html()->submit('Create project') }}
                {{ html()->form()->close() }}
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
