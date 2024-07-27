<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SprintController
 */
final class SprintControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $sprints = Sprint::factory()->count(3)->create();

        $response = $this->get(route('sprints.index'));

        $response->assertOk();
        $response->assertViewIs('sprint.index');
        $response->assertViewHas('sprints');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('sprints.create'));

        $response->assertOk();
        $response->assertViewIs('sprint.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SprintController::class,
            'store',
            \App\Http\Requests\SprintStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $project = Project::factory()->create();
        $title = $this->faker->sentence(4);
        $description = $this->faker->text();
        $status = $this->faker->word();
        $start_date = Carbon::parse($this->faker->date());
        $end_date = Carbon::parse($this->faker->date());
        $expected_end_date = Carbon::parse($this->faker->date());

        $response = $this->post(route('sprints.store'), [
            'project_id' => $project->id,
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'start_date' => $start_date->toDateString(),
            'end_date' => $end_date->toDateString(),
            'expected_end_date' => $expected_end_date->toDateString(),
        ]);

        $sprints = Sprint::query()
            ->where('project_id', $project->id)
            ->where('title', $title)
            ->where('description', $description)
            ->where('status', $status)
            ->where('start_date', $start_date)
            ->where('end_date', $end_date)
            ->where('expected_end_date', $expected_end_date)
            ->get();
        $this->assertCount(1, $sprints);
        $sprint = $sprints->first();

        $response->assertRedirect(route('sprints.index'));
        $response->assertSessionHas('sprint.id', $sprint->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $sprint = Sprint::factory()->create();

        $response = $this->get(route('sprints.show', $sprint));

        $response->assertOk();
        $response->assertViewIs('sprint.show');
        $response->assertViewHas('sprint');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $sprint = Sprint::factory()->create();

        $response = $this->get(route('sprints.edit', $sprint));

        $response->assertOk();
        $response->assertViewIs('sprint.edit');
        $response->assertViewHas('sprint');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SprintController::class,
            'update',
            \App\Http\Requests\SprintUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $sprint = Sprint::factory()->create();
        $project = Project::factory()->create();
        $title = $this->faker->sentence(4);
        $description = $this->faker->text();
        $status = $this->faker->word();
        $start_date = Carbon::parse($this->faker->date());
        $end_date = Carbon::parse($this->faker->date());
        $expected_end_date = Carbon::parse($this->faker->date());

        $response = $this->put(route('sprints.update', $sprint), [
            'project_id' => $project->id,
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'start_date' => $start_date->toDateString(),
            'end_date' => $end_date->toDateString(),
            'expected_end_date' => $expected_end_date->toDateString(),
        ]);

        $sprint->refresh();

        $response->assertRedirect(route('sprints.index'));
        $response->assertSessionHas('sprint.id', $sprint->id);

        $this->assertEquals($project->id, $sprint->project_id);
        $this->assertEquals($title, $sprint->title);
        $this->assertEquals($description, $sprint->description);
        $this->assertEquals($status, $sprint->status);
        $this->assertEquals($start_date, $sprint->start_date);
        $this->assertEquals($end_date, $sprint->end_date);
        $this->assertEquals($expected_end_date, $sprint->expected_end_date);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $sprint = Sprint::factory()->create();

        $response = $this->delete(route('sprints.destroy', $sprint));

        $response->assertRedirect(route('sprints.index'));

        $this->assertModelMissing($sprint);
    }
}
