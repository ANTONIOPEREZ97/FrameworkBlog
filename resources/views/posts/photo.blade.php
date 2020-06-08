<figure>
    <img src="{{ url($post->photos->first()->url) }}"
        class="img-responsive"
        width="450px"
        height="450px"
        alt="Foto: {{ $post->title }}"
    >
</figure>
