<div class="table-responsive">
    <table class="table" id="corrections-table">
        <thead>
        <tr>
            <th>Intitulet</th>
        <th>File</th>
        <th>Id User</th>
        <th>Id Epreuve</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($corrections as $correction)
            <tr>
                <td>{{ $correction->intitulet }}</td>
            <td>{{ $correction->file }}</td>
            <td>{{ $correction->id_user }}</td>
            <td>{{ $correction->id_epreuve }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['corrections.destroy', $correction->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('corrections.show', [$correction->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('corrections.edit', [$correction->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
