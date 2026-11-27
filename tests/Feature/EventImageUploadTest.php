<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class EventImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_uploaded_event_images_are_compressed_and_render_without_storage_paths(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $image = UploadedFile::fake()->image('event.jpg', 1200, 100);

        $this->actingAs($admin)
            ->post(route('events.store'), [
                'title' => 'Campus Event',
                'description' => 'An event description.',
                'date' => now()->addDay()->toDateString(),
                'time' => '18:30',
                'location' => 'Campus',
                'price' => 0,
                'capacity' => 100,
                'image' => $image,
            ])
            ->assertRedirect(route('events.index'));

        $event = Event::firstOrFail();

        $this->assertMatchesRegularExpression(
            '/\Adata:image\/(?:webp|jpeg);base64,/',
            $event->image_path
        );

        $imageData = base64_decode(substr($event->image_path, strpos($event->image_path, ',') + 1), true);
        $this->assertNotFalse($imageData);
        $dimensions = getimagesizefromstring($imageData);
        $this->assertSame(1080, $dimensions[0]);
        $this->assertSame(90, $dimensions[1]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('src="'.$event->image_path.'"', false)
            ->assertDontSee('storage/'.$event->image_path, false);
    }

    public function test_legacy_relative_image_paths_use_the_fallback_instead_of_storage_urls(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $event = Event::factory()->create([
            'created_by' => $admin->id,
            'image_path' => 'events/legacy-image.jpg',
        ]);

        $fallback = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80';

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('src="'.htmlspecialchars($fallback, ENT_QUOTES).'"', false)
            ->assertDontSee('storage/events/legacy-image.jpg', false);

        $event->update(['image_path' => 'https://example.com/event.jpg']);
        $this->assertSame('https://example.com/event.jpg', $event->fresh()->image_url);
    }
}
