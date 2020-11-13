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
    <!-- modal -->
    <div class="modal fade" id="modalFormDelete" tabindex="-1" role="dialog" aria-labelledby="modalFormDelete"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Post?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Do you wish to continue</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button wire:click="delete" type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div><br>
        <p>{{ $selectedItem }}</p>
        <p>{{ $action }}</p>
        @if($posts->count())
            <table class="table table-bordered">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($posts as$post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <button wire:click="selectItem({{$post->id}},  'update')" class="btn btn-warning btn-sm">Update</button>
                            <button wire:click="selectItem({{$post->id}},  'delete')" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $posts->links() }}
        @endif
    </div>

</div>
