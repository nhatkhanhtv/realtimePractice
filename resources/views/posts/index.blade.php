<x-custom-layout>
    <x-slot name="title">Post list</x-slot>
    <ul id="post-list">
        
    </ul>
    
    <form action="{{url('post/6/delete')}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">DELETE 1</button>
    </form>
    @push('scripts')
    <script>
        window.axios.get('/api/posts')
            .then(response=>{
                const postElement = document.querySelector('#post-list');
                let posts = response.data;
                // console.log(response);
                posts.forEach((post,index)=>{
                    let element = document.createElement('li');
                    element.setAttribute('id','post-'+post.id);
                    element.innerText = post.title;

                    postElement.append(element);
                });
            });
    </script>

    <script>
        Echo.channel('posts')
            .listen('PostCreated',(e) => {
                const postElement = document.querySelector('#post-list');
                let element = document.createElement('li');
                    element.setAttribute('id','post-'+e.post.id);
                    element.innerText = e.post.title;

                    postElement.append(element);
            })
            .listen('PostUpdated', (e) => {
                let element = document.querySelector('#post-'+e.post.id);
                    element.innerText = e.post.title;
            })
            .listen('PostDeleted', (e) => {
                let element = document.querySelector('#post-'+e.post.id);
                element.parentNode.removeChild(element);
            });

    </script>
    @endpush
</x-custom-layout>