<x-app-layout title="Single Post">
    <main id="main">

        <!-- ======= Blog Section ======= -->
        <section class="breadcrumbs">
          <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
              <h2>Blog</h2>
    
              <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li>{{ $post->title }}</li>
              </ol>
            </div>
    
          </div>
        </section><!-- End Blog Section -->
    
        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
          <div class="container" data-aos="fade-up">
    
            <div class="row">
    
              <div class="col-lg-8 entries">
    
                <article class="entry entry-single">
    
                  <div class="entry-img">
                    <img src="/img/blog/blog-1.jpg" alt="" class="img-fluid">
                  </div>
    
                  <h2 class="entry-title">
                    <a href="blog-single.html"></a>
                  </h2>
    
                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i><a href=""><time>{{ $post->created_at->diffForHumans() }}</time></a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="">{{ $post->PostCategory->name }}</a></li>
                    </ul>
                  </div>
    
                  <div class="entry-content">
                    <p>
                      {!! $post->body !!}
                    </p>
    
                    <blockquote>
                      <p>
                        Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                      </p>
                    </blockquote>
     
                    <h3>Et quae iure vel ut odit alias.</h3>
                    <p>
                      Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui.
                      Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea.
                      Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.
                    </p>
                    <img src="/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">
    
                    <h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>
                    <p>
                      Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel.
                      Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.
                    </p>
                    <p>
                      Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.
                    </p>
    
                  </div>
    
                  <div class="entry-footer">
                    <i class="bi bi-folder"></i>
                    <ul class="cats">
                      <li><a href="#">{{ $post->PostCategory->name }}</a></li>
                    </ul>
    
                    <i class="bi bi-tags"></i>
                    <ul class="tags">
                      <li><a href="#">Creative</a></li>
                      <li><a href="#">Tips</a></li>
                      <li><a href="#">Marketing</a></li>
                    </ul>
                  </div>
    
                </article><!-- End blog entry -->   
              </div><!-- End blog entries list -->
    
              <div class="col-lg-4">
    
                <div class="sidebar">
    
                  <h3 class="sidebar-title">Search</h3>
                  <div class="sidebar-item search-form">
                    <form action="">
                      <input type="text">
                      <button type="submit"><i class="bi bi-search"></i></button>
                    </form>
                  </div><!-- End sidebar search formn-->
    
                  <h3 class="sidebar-title">Categories</h3>
                  <div class="sidebar-item categories">
                    <ul>
                        @foreach ($category as $cat)
                        <li><a href="#">{{ $cat->name }}</a></li>
                        @endforeach
                      {{-- <li><a href="#">Educaion <span>(14)</span></a></li> --}}
                    </ul>
                  </div><!-- End sidebar categories-->
    
                </div><!-- End sidebar -->
    
              </div><!-- End blog sidebar -->
    
            </div>
    
          </div>
        </section><!-- End Blog Single Section -->
    
      </main><!-- End #main -->
</x-app-layout>