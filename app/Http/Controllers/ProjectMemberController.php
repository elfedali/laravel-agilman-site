<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Project;
use App\Models\ProjectInvitation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectMemberController extends Controller
{


    /**
     * invite member to the project.
     */
    public function store(Request $request, Project $project)
    {

        $request->validate([
            //'email' => 'required|email|exists:users,email'
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        $token = bin2hex(random_bytes(32));

        ProjectInvitation::create([
            'project_id' => $project->id,
            'email' => $request->email,
            'token' => $token,
            'expires_at' => Carbon::now()->addDays(7), // Set an expiration date (e.g., 7 days)
            'user_id' => $user ? $user->id : null,
        ]);


        Mail::to($request->email)->send(new InvitationMail($request->email, $project, $token));

        return back()->with('success', 'Une invitation a été envoyée à l\'utilisateur');
    }

    public function accept(Request $request, Project $project)
    {
        $token = $request->query('token');

        // Validate the token
        $invitation = ProjectInvitation::where('token', $token)
            ->where('project_id', $project->id)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$invitation) {
            return redirect()->route('home')->with('error', 'Le lien d\'invitation est invalide ou a expiré.');
        }

        // Attach the user to the project
        if (auth()->check()) {
            $project->members()->syncWithoutDetaching(auth()->id());
            $invitation->delete(); // Delete the token after use

            return redirect()->route('projects.show', $project)->with('success', 'You have joined the project.');
        }

        return redirect()->route('login')->with('error', 'Please log in to accept the invitation.');
    }
}
