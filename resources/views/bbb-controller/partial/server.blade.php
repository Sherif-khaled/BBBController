<form id="serverfrm" name="serverfrm" role="form">


    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" checked value="local" class="custom-control-input" id="l_server" name="server_type">
        <label class="custom-control-label" for="l_server">Local Server</label>
    </div>

    <!-- Default inline 2-->
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" value="remote" class="custom-control-input" id="r_server" name="server_type">
        <label class="custom-control-label" for="r_server">Remote Server</label>
    </div>

    <div id="local" class="card">
        <div class="card-header">
            <h3 class="text-muted">Local Server</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="sudo_username">Sudo Username</label>
                <input type="text" class="form-control" name="sudo_username" id="sudo_username">
            </div>

            <div class="form-group">
                <label for="sudo_pass">Sudo Password</label>
                <input type="text" class="form-control" name="sudo_pass" id="sudo_pass">
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
                <input type="text" class="form-control" name="host" id="host_ip">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="private_key">Private Key</label>
                <input type="text" class="form-control" name="private_key" id="private_key">
            </div>

            <div class="form-group">
                <label for="key_phrase">Key Phrase</label>
                <input type="text" class="form-control" name="key_phrase" id="key_phrase">
            </div>

            <div class="form-group">
                <label for="root_path">Root Path</label>
                <input type="text" class="form-control" name="root_path" id="root_path">
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>

<script>
    $('#remote').hide();
    $('input[type=radio][name=server_type]').on('change', function () {
        switch ($(this).val()) {
            case 'local':
                $('#local').show();
                $('#remote').hide();
                break;
            case 'remote':
                $('#local').hide();
                $('#remote').show();
                break;
        }
    });
</script>