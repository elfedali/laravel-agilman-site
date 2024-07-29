@extends('layouts.app')

@section('title', 'Sprint')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4">
                    Project <b>
                        <a href="{{ route('projects.show', $sprint->project) }}">{{ $sprint->project->title }}</a>
                    </b>
                    > Sprint <b>{{ $sprint->title }}</b>
                </div>

                @include('project._sprint')



                {{-- edit sprint modal --}}
                <section>
                    @include('sprint._modal', ['project' => $sprint->project])
                </section>
                {{-- add-comment  modal --}}
                <section class="my-3">
                    @include('sprint._modal_add_comment')
                </section>

                {{-- all comments --}}

                <section>
                    @include('sprint._comments')
                </section>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
