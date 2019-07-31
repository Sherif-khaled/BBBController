@include('development.models.role_form')
@include('development.models.permission_form')
@include('development.models.assignPermissions')

<div class="row">
    <div class="col-md-12">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-roles-tab" data-toggle="tab" href="#nav-roles"
                   role="tab" aria-controls="nav-roles" aria-selected="true">Roles</a>
                <a class="nav-item nav-link" id="nav-permissions-tab" data-toggle="tab" href="#nav-permissions"
                   role="tab"
                   aria-controls="nav-permissions" aria-selected="false">Permissions</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab">
                <div class="row">
                    <a id="createRole" class="btn btn-primary mt-4 mb-2" href="javascript:void(0)">New Role</a>
                    <div class="table-responsive">
                        <table id="roles_table" class="table table-hover table-striped">
                            <thead class="thead-dark">
                            <th>ID</th>
                            <th>Role Name</th>
                            <th>Guard Name</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                            </thead>

                        </table>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="nav-permissions" role="tabpanel" aria-labelledby="nav-permissions-tab">
                <div class="tab-pane fade show active" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab">
                    <div class="row">
                        <a id="createPermission" class="btn btn-primary mt-4 mb-2" href="javascript:void(0)">New
                            Permission</a>
                        <div class="table-responsive">
                            <table id="permissions_table" class="table table-hover table-striped">
                                <thead class="thead-dark">
                                <th>ID</th>
                                <th>Permission Name</th>
                                <th>Guard Name</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                                </thead>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .table td {
        text-align: center;
    }

    .table th {
        text-align: center;
    }
</style>


<script>
</script>

