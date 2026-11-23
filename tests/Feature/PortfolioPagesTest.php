<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioPagesTest extends TestCase
{
    public function test_welcome_page_renders_owner_name_from_controller(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Kristoforus Serfus Ndak');
        $response->assertSee('Tersedia untuk kolaborasi');
        $response->assertViewHas('name', 'Kristoforus Serfus Ndak');
    }

    public function test_data_diri_page_renders_biodata_skills_and_hobbies(): void
    {
        $response = $this->get(route('about'));

        $response->assertOk();
        $response->assertSee('Data Diri');
        $response->assertSee('Nama Lengkap');
        $response->assertSee('HTML &amp; CSS', false);
        $response->assertSee('Ngoding');
        $response->assertViewHas('biodata');
    }

    public function test_gallery_page_renders_projects_and_stats(): void
    {
        $response = $this->get(route('gallery'));

        $response->assertOk();
        $response->assertSee('Gallery');
        $response->assertSee('Portfolio Pribadi');
        $response->assertSee('Featured');
        $response->assertViewHas('projects');
    }

    public function test_shared_header_and_footer_render_on_every_page(): void
    {
        foreach (['home', 'about', 'gallery'] as $routeName) {
            $response = $this->get(route($routeName));

            $response->assertOk();
            $response->assertSee('Kontak Saya');
            $response->assertSee('Personal Portfolio.');
        }
    }
}
