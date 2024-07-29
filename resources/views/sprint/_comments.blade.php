{{-- all $sprint comments --}}
<h3 class="mt-4">

    Les commentaires

</h3>
<div class="card my-3">
    <div class="card-body">
        @foreach ($sprint->comments as $comment)
            <b>{{ $comment->user->name }}</b> <br>
            <div class="text-muted">
                {{ $comment->body }}
                <div>

                    <small>
                        <small>
                            Créé le {{ $comment->created_at->diffForHumans() }}
                        </small>
                    </small>

                </div>
            </div>


            {{-- is not last --}}
            @if (!$loop->last)
                <hr>
            @endif
        @endforeach
    </div>

</div>
