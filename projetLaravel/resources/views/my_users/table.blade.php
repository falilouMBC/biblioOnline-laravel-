<div class="table-responsive">
    <table class="table" id="myUsers-table">
        <thead>
        <tr>
            <th>Email</th>
        <th>Is Fromesmt</th>
        <th>Is Newsletter</th>
        <th>Is Admin</th>
        <th>Is Active</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($myUsers as $myUser)
            <tr>
                <td>{{ $myUser->email }}</td>
            <td>{{ $myUser->is_fromEsmt }}</td>
            <td>{{ $myUser->is_newsletter }}</td>
            <td>{{ $myUser->is_admin }}</td>
            <td>{{ $myUser->is_active }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['myUsers.destroy', $myUser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('myUsers.show', [$myUser->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('myUsers.edit', [$myUser->id]) }}"
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
