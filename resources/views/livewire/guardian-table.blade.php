<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showFormAdd"
    type="button">{{ __('guardian.add_guardian') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr class="table-success">
                <th>#</th>
                <th>{{ __('guardian.email') }}</th>
                <th>{{ __('guardian.f_name') }}</th>
                <th>{{ __('guardian.f_nid') }}</th>
                <th>{{ __('guardian.f_pid') }}</th>
                <th>{{ __('guardian.f_phone') }}</th>
                <th>{{ __('guardian.f_job') }}</th>
                <th>{{ __('guardian.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($guardians as $guardian)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $guardian->email }}</td>
                <td>{{ $guardian->f_name }}</td>
                <td>{{ $guardian->f_nid }}</td>
                <td>{{ $guardian->f_pid }}</td>
                <td>{{ $guardian->f_phone }}</td>
                <td>{{ $guardian->f_job }}</td>
                <td>
                    <button wire:click="editForm({{ $guardian->id }})" title="{{ __('level.edit') }}"
                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $guardian->id }})"
                        title="{{ __('level.delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
    </table>
</div>