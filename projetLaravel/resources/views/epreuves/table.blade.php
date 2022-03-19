<div class="table-responsive">
    <table class="table" id="epreuves-table">
        <thead>
        <tr>
            <th>Intitulet</th>
        <th>Matiere</th>
        <th>Filiere</th>
        <th>Professeur</th>
        <th>File</th>
        <th>Id User</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($epreuves as $epreuve)
            <tr>
                <td>{{ $epreuve->intitulet }}</td>
            <td>{{ $epreuve->matiere }}</td>
            <td>{{ $epreuve->filiere }}</td>
            <td>{{ $epreuve->professeur }}</td>
            <td>{{ $epreuve->file }}</td>
            <td>{{ $epreuve->id_user }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['epreuves.destroy', $epreuve->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('epreuves.show', [$epreuve->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('epreuves.edit', [$epreuve->id]) }}"
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
