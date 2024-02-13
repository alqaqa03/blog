<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

      <div class="text-center">
        <a href="{{ route('posts.creat') }}" class="btn btn-success">Creat Post</a>
      </div>

      <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $posts as $post )
          <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{$post->user ? $post->user->name : "not found"}}</td>
            <td>{{ $post->created_at->toDateString() }}</td>
            <td>
              <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a>
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
              <form style="display: inline;" method="POST" action="{{ route('posts.destroy',$post['id']) }}" onsubmit="return confirmSubmit()" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <script>
      function confirmSubmit() {
  return confirm("هل أنت متأكد من إرسال النموذج؟");
}
    </script>
</x-app-layout>
