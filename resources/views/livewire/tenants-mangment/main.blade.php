@push('styles')
    <style>
        /* Custom styles for the modal */
        .btn-close:focus {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
@endpush
<div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @include('livewire.tenants-mangment.partials.table')
    @include('livewire.tenants-mangment.partials.form')
</div>
@push('scripts')
    <script>
        // عشان لو عملت Submit المودال يقفل لوحده
        window.addEventListener('close-modal', event => {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('addTenantModal'));
            myModal.hide();
        });


        window.addEventListener('open-modal', event => {
            var myModal = new bootstrap.Modal(document.getElementById('addTenantModal'));
            document.querySelector('#addTenantModal input').focus();
            myModal.show();
        });
        // close when click outside modal
        document.getElementById('addTenantModal').addEventListener('click', function (
            event) {
            if (event.target === this) {
                var myModal = bootstrap.Modal.getInstance(document.getElementById('addTenantModal'));
                myModal.hide();
            }
        });
    </script>
@endpush
