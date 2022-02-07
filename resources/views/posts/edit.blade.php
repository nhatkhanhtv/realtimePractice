<x-custom-layout>
    <x-slot name="title">Update post</x-slot>
    <form action="{{route('post.update',$post)}}" method="POST">
    @csrf
    @method('PUT')
    <div>
    <label for="title">Title </label>
    <input type="text" name="title" id="title" value={{old('title',$post->title)}}>
    </div>
    <div>
        <label for="body">Body</label>
        <input type="text" name="body" id="body" value="{{old('body',$post->body)}}">
    </div>
    <button type="submit">Submit </button>
    </form>
   
</x-custom-layout>