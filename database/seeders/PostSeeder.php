<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $backendCategory = Category::where('slug', 'backend')->first();
        $careerCategory = Category::where('slug', 'career')->first();

        $posts = [
            [
                'category_id' => $backendCategory->id,
                'title' => 'Optimizing Django ORM for High Traffic',
                'slug' => 'optimizing-django-orm-for-high-traffic',
                'excerpt' => 'Deep dive into select_related, prefetch_related, and database indexes to improve your Django application performance.',
                'content' => '<p>When building high-traffic applications with Django, database optimization becomes crucial. In this article, we\'ll explore several techniques to optimize your Django ORM queries.</p><h2>Understanding QuerySets</h2><p>Django\'s QuerySets are lazy - they don\'t hit the database until you actually need the data. This is great for performance, but it can lead to unexpected N+1 query problems if you\'re not careful.</p><h2>Using select_related</h2><p>The <code>select_related</code> method follows foreign-key relationships and performs a SQL JOIN, pulling related objects in a single query. This is perfect for ForeignKey and OneToOneField relationships.</p><pre><code># Bad - N+1 queries\nfor book in Book.objects.all():\n    print(book.author.name)  # Extra query for each book!\n\n# Good - Single query with JOIN\nfor book in Book.objects.select_related("author").all():\n    print(book.author.name)  # No extra queries</code></pre><h2>Using prefetch_related</h2><p>For ManyToManyField and reverse ForeignKey relationships, use <code>prefetch_related</code>. It performs a separate lookup for each relationship and joins them in Python.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(30),
                'reading_time' => 8,
            ],
            [
                'category_id' => $careerCategory->id,
                'title' => 'Transitioning from Startup to Enterprise',
                'slug' => 'transitioning-from-startup-to-enterprise',
                'excerpt' => 'Lessons learned during my journey from a fast-paced startup environment to the structured world of enterprise software development.',
                'content' => '<p>After spending over 4 years in a startup environment, I made the transition to enterprise software development at a state university. Here are some key lessons I learned along the way.</p><h2>Pace of Development</h2><p>In startups, speed is everything. You ship fast, iterate fast, and sometimes break things. In enterprise, stability and reliability take precedence over speed.</p><h2>Documentation Matters</h2><p>In startups, documentation is often an afterthought. In enterprise, it\'s a requirement. Good documentation saves time and reduces misunderstandings in the long run.</p><h2>Process vs Agility</h2><p>Enterprise environments tend to have more processes and approvals. While this can feel slow, it\'s there for a reason - to ensure quality and compliance.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'reading_time' => 6,
            ],
            [
                'category_id' => $backendCategory->id,
                'title' => 'Building Scalable APIs with Laravel',
                'slug' => 'building-scalable-apis-with-laravel',
                'excerpt' => 'Best practices for designing and implementing RESTful APIs that can handle high traffic using Laravel.',
                'content' => '<p>Laravel provides excellent tools for building robust APIs. In this article, we\'ll explore best practices for creating scalable API architectures.</p><h2>API Resource Classes</h2><p>Laravel\'s API Resources provide a smooth transformation layer between your models and JSON responses. They give you full control over the structure of your API responses.</p><h2>Rate Limiting</h2><p>Protect your API from abuse by implementing rate limiting. Laravel makes this easy with built-in throttle middleware.</p><h2>Caching Strategies</h2><p>Implement caching at various levels - from database query caching to HTTP response caching - to improve API performance.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'reading_time' => 10,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
