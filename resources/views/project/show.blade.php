@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="row">
            <main class="col-lg-6">


                <h1>
                    Project title: {{ $project->title }}

                </h1>

                <p>
                    Project description: {{ $project->description }}
                </p>
                <hr>


                <div class="bg-light p-4">
                    <h2>
                        Ajouter une sprint
                    </h2>
                    {{-- create new sprint for this project  --}}
                    {{ html()->form('POST', route('sprints.store'))->open() }}
                    {{ html()->hidden('project_id', $project->id) }}
                    <div>
                        le titre
                        {{ html()->text('title')->placeholder('Title') }}
                    </div>
                    <div>
                        la description
                        {{ html()->textarea('description')->placeholder('Description') }}
                    </div>
                    {{-- start_date --}}
                    <div>
                        date de début
                        {{ html()->date('start_date')->placeholder('Start date') }}
                    </div>
                    {{-- end_date --}}
                    <div>
                        Date de fin
                        {{ html()->date('end_date')->placeholder('End date') }}
                    </div>
                    {{-- expected_end_date --}}
                    <div>
                        Date de fin prévue
                        {{ html()->date('expected_end_date')->placeholder('Expected end date') }}
                    </div>
                    {{ html()->submit('Create sprint') }}
                    {{ html()->form()->close() }}
                </div>
            </main>






            <section class="col-lg-6">
                {{-- get all the sprints --}}
                <h2>
                    Sprints
                </h2>
                @foreach ($project->sprints as $sprint)
                    <div class="card my-5">
                        <div class="card-header">
                            <h2>{{ $sprint->title }}</h2>
                        </div>
                        <div class="card-body">
                            <p>{{ $sprint->description }}</p>
                            <p>
                                <a href="{{ route('sprints.show', $sprint) }}" class="btn btn-primary">Voir le sprint</a>
                            </p>
                        </div>
                    </div>
                @endforeach

            </section>
            <!-- /.col-lg-6 -->
            <!-- /.row -->
        </section>
    </div>
    <!-- /.container -->
@endsection
