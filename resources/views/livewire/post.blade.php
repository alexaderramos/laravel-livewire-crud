<div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create">
        Add Post
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('post-form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div><br>
        @if($posts->count())
            <table class="table table-bordered">
                <thead>
                <th>Title</th>
                <th>Description</th>
                </thead>
                <tbody>
                @foreach($posts as$post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $posts->links() }}
        @endif
    </div>

</div>
