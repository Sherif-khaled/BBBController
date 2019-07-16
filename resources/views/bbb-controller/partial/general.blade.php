<form id="generalfrm" role="form" name="generalfrm">
    @csrf()
    <div class="form-group">
        <input name="general_form" hidden>
        <label for="country">Country</label>
        <select name="country" class="form-control">
            <option selected disabled>Select the Country</option>
            @foreach($countries as $country)
                <option value="{{ $country->name }}" {{ $country->name == config('bbbController.general_settings.country') ? 'selected' : '' }}>{{ $country->name }}</option>

            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="timezone">Time Zone</label>
        {!! $timezone_select !!}
    </div>
    <div class="form-group" hidden>
        <label for="ui-lang">UI Language</label>
        <input type="text" class="form-control" name="ui-lang" id="ui-lang">
        <div class="error text-danger">{{ $errors->first('ui-lang') }}</div>
    </div>
    <div class="form-group">
        <label for="records-path">Record Path</label>
        <input type="text" class="form-control" name="records-path" id="records-path"
               value="{{config('bbbController.general_settings.records-path')}}">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

