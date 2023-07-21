<table class="table table-bordered w-100 nowrap">
    <thead>
        <tr>
            <th width="30">S.No</th>
            <th>Property ID</th>
            <th>File Name</th>
            <th>Extension</th>
            <th>Uploaded On</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($property->documents as $k => $document)
        <tr>
            <td>
                <p class="m-0 text-center">{{ $k + 1 }}</p>
            </td>
            <td><small>{{ $property->property_id }}</small></td>
            <td><small>{{ $document->name }}</small></td>
            <td><small class="badge badge-blue">{{ $document->ext }}</small></td>
            <td>
                <p class="m-0"><small>{{ get_date($document->created_at) }}</small></p>
            </td>
            <td>
                <a href="{{ check_file($document->file, 'document') }}" download class="btn btn-success btn-xs">Download</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center"><h4 class="my-2">No Documents Found!</h4></td>
            </tr>
        @endforelse
    </tbody>
</table>