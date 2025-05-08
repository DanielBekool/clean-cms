<x-layouts.app>
    <x-partials.header />
    <main>
        <article class="page about-page">
            <header>
                <h1>{{ $content->title ?? 'About Us' }}</h1>
            </header>
            <div class="page-content">
                {!! $content->content ?? 'About page content goes here.' !!}
            </div>
            
            <section class="team-section">
                <h2>Our Team</h2>
                <div class="team-grid">
                    <!-- Team members would be dynamically loaded here -->
                    <p>Meet our amazing team members.</p>
                </div>
            </section>
            
            <section class="company-history">
                <h2>Our History</h2>
                <div class="timeline">
                    <!-- Company timeline would be dynamically loaded here -->
                    <p>Learn about our company history and milestones.</p>
                </div>
            </section>
        </article>
    </main>
    <x-partials.footer />
</x-layouts.app>