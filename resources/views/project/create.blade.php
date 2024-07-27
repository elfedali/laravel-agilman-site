
    @extends('layouts.app')

    @section('content')
       <h1>
        Create new project
       </h1>

       {{ html()->form('POST', route('projects.store'))->open() }}
         {{ html()->text('title')->placeholder('Title') }}
         {{ html()->textarea('description')->placeholder('Description') }}
         {{ html()->submit('Create project') }}
         {{ html()->form()->close() }}

    @endsection



