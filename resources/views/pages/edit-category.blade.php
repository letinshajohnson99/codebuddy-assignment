<!-- Modal -->
<div id="category{{$cid}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Category</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('route' => array('update.category', $cid))) !!}
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('Title:') !!}
                    {!! Form::text('title', $ctitle, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Update</button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  onclick="$('#category{{$cid}}').modal('hide');">Close</button>
            </div>
        </div>

    </div>
</div>
