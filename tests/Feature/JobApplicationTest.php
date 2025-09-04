<?php

namespace Tests\Feature;

use App\Mail\JobApplicationReceived;
use App\Models\JobApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class JobApplicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_a_valid_application()
    {
        Mail::fake();
        Storage::fake('public');

        $file = UploadedFile::fake()->create('cv.pdf', 500, 'application/pdf');

        $response = $this->post(route('applications.store'), [
            'name' => 'Fulano',
            'email' => 'fulano@example.com',
            'phone' => '(11) 99999-9999',
            'desired_role' => 'Desenvolvedor PHP',
            'education' => 'superior',
            'notes' => null,
            'cv' => $file,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseCount('job_applications', 1);

        $app = JobApplication::first();
        $this->assertNotEmpty($app->ip);

        Storage::disk('public')->assertExists($app->cv_path);
        Mail::assertSent(JobApplicationReceived::class);
    }

    /** @test */
    public function it_rejects_large_files()
    {
        $file = UploadedFile::fake()->create('cv.pdf', 2000, 'application/pdf'); // 2MB

        $response = $this->post(route('applications.store'), [
            'name' => 'Fulano',
            'email' => 'fulano@example.com',
            'phone' => '123',
            'desired_role' => 'Dev',
            'education' => 'superior',
            'cv' => $file,
        ]);

        $response->assertSessionHasErrors('cv');
    }

    /** @test */
    public function it_rejects_invalid_extensions()
    {
        $file = UploadedFile::fake()->create('virus.exe', 100, 'application/octet-stream');

        $response = $this->post(route('applications.store'), [
            'name' => 'Fulano',
            'email' => 'fulano@example.com',
            'phone' => '123',
            'desired_role' => 'Dev',
            'education' => 'superior',
            'cv' => $file,
        ]);

        $response->assertSessionHasErrors('cv');
    }
}
