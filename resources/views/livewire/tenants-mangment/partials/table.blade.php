<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header border-0 pt-6 d-flex align-items-center justify-content-between pe-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="bi bi-search position-absolute ms-3 fs-6"></i>
                        <input type="text" wire:model.live="search" class="form-control ps-10"
                            placeholder="Search Tenant" style="width: 250px; padding-left: 40px;">
                    </div>
                </div>

                <div class="card-toolbar ms-auto">
                        <button type="button" class="btn btn-primary" wire:click="openCreateModal">
                            <i class="bi bi-plus me-1 fs-6"></i> Add Tenant
                        </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Tenant Name</th>
                            <th>Domain Name</th>
                            <th style="width: 40px">Status</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge text-bg-danger">55%</span></td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-outline-primary btn-sm" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item">
                        <a class="page-link" href="#">&laquo;</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
