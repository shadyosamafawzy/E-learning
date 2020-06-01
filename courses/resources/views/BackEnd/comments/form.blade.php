<div class="col-md-12">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">{{isset($comment) && $comment != '' ? 'Update' : 'Add'}} Comment </label>
        <textarea cols="15" rows="5" name="comment"  class="form-control @error('comment') is-invalid @enderror">{{isset($comment) && $comment != '' ? $comment->comment : ''}}</textarea>
        @error('comment')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>