<form id="serverfrm" name="serverfrm" role="form">
    <input type="text" value="" id="server_form" name="server_form" hidden>

    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio"
               {{config('bbbController.server.server_enabled') == 'localhost' ? 'checked' : ''}} value="localhost"
               class="custom-control-input" id="l_server" name="server_enabled">
        <label class="custom-control-label" for="l_server">Localhost</label>
    </div>

    <!-- Default inline 2-->
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio"
               {{config('bbbController.server.server_enabled') == 'remote' ? 'checked' : ''}} value="remote"
               class="custom-control-input" id="r_server" name="server_enabled">
        <label class="custom-control-label" for="r_server">Remote Server</label>
    </div>

    <div id="local" class="card">
        <div class="card-header">
            <h3 class="text-muted">Localhost</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="sudo_username">Sudo Username</label>
                <input type="text" class="form-control" name="sudo_username" id="sudo_username"
                       value="{{$settings['server']['localhost']['sudo_username']}}">
            </div>

            <div class="form-group">
                <label for="sudo_pass">Sudo Password</label>
                <input type="password" class="form-control" name="sudo_password" id="sudo_password"
                       value="{{$settings['server']['localhost']['sudo_password']}}">
            </div>

        </div>
    </div>

    <div id="remote" class="card">
        <div class="card-header">
            <h3 class="text-muted">Remote Server</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="host_ip">Host IP</label>
                <input type="text" class="form-control" name="host_ip" id="host_ip"
                       value="{{$settings['server']['remote_server']['host_ip']}}">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username"
                       value="{{$settings['server']['remote_server']['username']}}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                       value="{{$settings['server']['remote_server']['password']}}">
            </div>

            <div class="form-group">
                <label for="private_key">Private Key</label>
                <input type="text" class="form-control" name="private_key" id="private_key"
                       value="{{$settings['server']['remote_server']['private_key']}}">
            </div>

            <div class="form-group">
                <label for="key_phrase">Key Phrase</label>
                <input type="text" class="form-control" name="key_phrase" id="key_phrase"
                       value="{{$settings['server']['remote_server']['key_phrase']}}">
            </div>

            <div class="form-group">
                <label for="root_path">Root Path</label>
                <input type="text" class="form-control" name="root_path" id="root_path"
                       value="{{$settings['server']['remote_server']['root_path']}}">
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-lg btn-primary">Save Settings</button>

</form>

<script>

    if ($('#r_server').is(':checked')) {

    } else {
        $('#remote').hide()
        $('#local').show();
    }
    $('input[type=radio][name=server_enabled]').on('change', function () {

        // $(this).closest('form').find("input[type=text], input[type=password]").val("");

        $('#server_form').trigger('reset');

        $(this).closest('form').each(function () {
            $(this).validate().resetForm();
        });
        $('.invalid').remove();

        switch ($(this).val()) {
            case 'localhost':
                $('#local').show();
                $('#remote').hide();
                $('#server_form').val('localhost');
                break;
            case 'remote':
                $('#local').hide();
                $('#remote').show();
                $('#server_form').val('remote');
                break;
        }
    })

</script>