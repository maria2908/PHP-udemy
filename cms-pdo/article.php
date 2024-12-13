<?php
include "partials/header.php";
include "partials/navbar.php";
include "partials/hero.php";
?>


    <!-- Article Header -->
    <header class="bg-dark text-white py-5">
        <div class="container">
            <h1 class="display-4">Article Title</h1>
            <p class="lead">
                A brief subtitle or summary of the article.
            </p>
            <p>
                <small>
                    By <a href="#" class="text-white text-decoration-underline">Author Name</a> <!-- Add Author Name Here -->
                    |
                    <span>Published on January 1, 2045</span> <!-- Date Published -->
                </small>
            </p>
        </div>
    </header>


    <!-- Main Content -->
    <main class="container my-5">
        <!-- Featured Image -->
        <div class="mb-4">
            <img
                src="https://via.placeholder.com/1200x600"
                class="img-fluid w-100"
                alt="Featured Image"
            >
        </div>
        <!-- Article Content -->
        <article>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus feugiat elit vitae enim lacinia semper. 
                Sed sollicitudin, nunc at elementum luctus, quam urna dignissim ipsum, ac tristique sapien arcu non ligula.
            </p>
            <p>
                Quisque fermentum, nisl a pulvinar tincidunt, nunc purus laoreet massa, nec tempor arcu urna vel nisi. 
                Suspendisse potenti. Duis ornare, risus non commodo bibendum, sapien turpis feugiat ligula, ut aliquam sapien urna eget est.
            </p>
            <h2>Subheading 1</h2>
            <p>
                Maecenas non nunc nec nisi dignissim pretium. Curabitur ac sapien a tellus finibus suscipit. Nullam ac tortor vitae tortor 
                tempus placerat non a massa.
            </p>
            <h2>Subheading 2</h2>
            <p>
                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce id purus at risus consectetur 
                accumsan. Nam vitae aliquam sapien.
            </p>
            <ul>
                <li>Key point one</li>
                <li>Key point two</li>
                <li>Key point three</li>
            </ul>
            <p>
                In hac habitasse platea dictumst. Vivamus euismod, justo at pulvinar pharetra, nisl lorem lacinia lorem, ac bibendum sapien 
                lectus a nisi.
            </p>
        </article>

        <!-- Comments Section Placeholder -->
        <section class="mt-5">
            <h3>Comments</h3>
            <p>
                <!-- Placeholder for comments -->
                Comments functionality will be implemented here.
            </p>
        </section>

        <!-- Back to Home Button -->
        <div class="mt-4">
            <a href="index.html" class="btn btn-secondary">← Back to Home</a>
        </div>
    </main>
    
<?php
include "partials/footer.php";
?>