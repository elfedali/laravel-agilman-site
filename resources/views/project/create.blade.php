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
                    le titre
                    {{ html()->text('title')->placeholder('Title') }}
                </div>
                <div>
                    la description
                    {{ html()->textarea('description')->placeholder('Description') }}
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
