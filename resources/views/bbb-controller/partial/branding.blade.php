<form method="post" action="{{route('options.save')}}" enctype="multipart/form-data">
    @csrf
    <input name="brand_form" hidden>
    <div class="form-group">
        <label for="company-name">Company Name</label>
        <input type="text" name="company-name" class="form-control" id="company-name" aria-describedby="companyHelp"
               placeholder="Company Name" value="{{old('company-name' ?? config('bbbcontroller.brand.company_name'))}}">
        <div class="error text-danger">{{ $errors->first('company-name') }}</div>
    </div>
    <div class="form-group">
        <label for="company-activity">Company Activity</label>
        <select name="activity" class="form-control">
            <option value="" disabled selected>Choose your option</option>
            @foreach($company_activities as $activity)
               <option value="{{$activity->id}}" {{old($activity->id) ?? 'selected'}}>{{$activity->activity}}</option>
            @endforeach
        </select>
        <div class="error text-danger">{{ $errors->first('activity') }}</div>
    </div>
    <div class="form-group">
        <label>Upload Company Logo</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="logo-path" name="logo-path">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <div class="error text-danger">{{ $errors->first('logo-path') }}</div>
        <img id='img-upload'/>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>


<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 100%;
    }
</style>
@section('script')
    <script>
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#logo-path").change(function(){
                readURL(this);
            });
        });
    </script>
@endsection