
<div class="tab-pane fade in" id="tab-revision">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Last updated</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($node->revisions as $revision)
            <tr>
                <td>{!! Html::link('node/'.$revision->nid.'/revision/'.$revision->rid, $revision->title) !!}</td>
                <td>{{ $revision->editor()->first()->name }}</td>
                <td>{{ $revision->created_at->diffForHumans() }}</td>
                <td>
                    {!! Html::link('node/'.$revision->nid.'/revision/'.$revision->rid.'/delete', 'Delete', ['class' => 'btn btn-raised btn-danger']) !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>