<x-admin-app-layout title="Dashboard Post Show">
<div class="card">
    <div class="card-body">
            <article class="p-3">   
              <div class="imgDbPost">
                  @if ($post->thumbnail)
                    <img src="{{ asset('/storage/'  . $post->thumbnail) }}"> 
                  @else
                    <img src="https://source.unsplash.com/500x300?{{ $post->postCategory->name }}">
                  @endif
              </div>

                <h2 class="title" style="margin:15px; color:white;">{{ $post->title }}</h2>
                
              <div class="entry-content">
                <p>{!! $post->body !!}</p>
              </div>
            </article><!-- End blog entry -->   
    </div>
</div>
</x-admin-app-layout>