<div>
    <label for="title">Title</label>
    <input wire:model="title" class="form-control" type="text" id="title">
    @if($errors->has('title'))
        <p style="color: red">{{ $errors->first('title') }}</p>
    @endif
    <label for="content">Content</label>
    <textarea wire:model="content" class="form-control" type="text" id="content"></textarea>
    @if($errors->has('content'))
        <p style="color: red">{{ $errors->first('content') }}</p>
    @endif
    <br>
    <button wire:click="save" class="btn btn-primary">Save</button>

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
