<div>
    Bonjour
</div>
<div>
    <p>
        Vous avez été invité à rejoindre le projet <b>{{ $project->title }}</b> sur la plateforme <a
            href="{{ route('home') }}">{{ config('app.name') }}</a>.
    </p>
    <p>
        Pour accepter l'invitation, veuillez cliquer sur le lien suivant:
    </p>
    <p>
        <a
            href="{{ route('projects.members.accept', [$project, 'token' => $token]) }}">{{ route('projects.members.accept', [$project, 'token' => $token]) }}</a>
    </p>

</div>
