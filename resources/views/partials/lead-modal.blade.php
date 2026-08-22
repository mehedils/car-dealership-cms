<div class="modal fade" id="leadModal" tabindex="-1" aria-labelledby="leadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content rounded-16 border-0 shadow-lg background-card">
            <div class="modal-header border-0 pb-0 px-4 pt-4 position-relative">
                <div>
                    <h4 class="modal-title neutral-1000 heading-5" id="leadModalLabel">{{ __('Get in Touch') }}</h4>
                    <p class="text-sm neutral-500 mb-0 modal-lead-subtitle">{{ __('Fill in your details below and our sales team will reach out promptly.') }}</p>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div id="modalVehicleContext" class="alert alert-light border d-none align-items-center mb-3 p-2 rounded-8">
                    <i class="fi fi-rr-car-alt fs-4 text-brand-2 me-2"></i>
                    <div>
                        <div class="text-xs text-uppercase text-muted font-weight-bold">{{ __('Vehicle of Interest') }}</div>
                        <div class="text-sm-bold neutral-1000" id="modalVehicleName"></div>
                    </div>
                </div>
                <form action="{{ route('inquiries.store') }}" method="POST" class="form-lead-inquiry">
                    @csrf
                    <input type="hidden" name="car_id" id="modalCarId" value="">
                    <div class="form-group mb-3">
                        <label class="form-label text-sm-bold neutral-1000">{{ __('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-8" placeholder="{{ __('Your Name') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label text-sm-bold neutral-1000">{{ __('Phone') }} <span class="text-danger">*</span></label>
                        <input type="tel" name="phone" class="form-control rounded-8" placeholder="{{ __('Your Phone') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label text-sm-bold neutral-1000">{{ __('Email') }}</label>
                        <input type="email" name="email" class="form-control rounded-8" placeholder="{{ __('Your Email') }}">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label text-sm-bold neutral-1000">{{ __('Message') }}</label>
                        <textarea name="message" id="modalLeadMessage" class="form-control rounded-8" rows="3" placeholder="{{ __('Tell us what vehicle or service you are interested in...') }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-brand-2 w-100 py-3 text-md-bold d-flex align-items-center justify-content-center">
                        <i class="fi fi-rr-paper-plane me-2"></i>
                        <span>{{ __('Send Inquiry') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const leadModalEl = document.getElementById('leadModal');
    if (leadModalEl) {
        leadModalEl.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;

            const carId = button.getAttribute('data-car-id') || '';
            const carName = button.getAttribute('data-car-name') || '';
            const carPrice = button.getAttribute('data-car-price') || '';
            const subjectTitle = button.getAttribute('data-subject-title') || '';
            const subjectMessage = button.getAttribute('data-subject-message') || '';

            const modalCarId = document.getElementById('modalCarId');
            const modalVehicleContext = document.getElementById('modalVehicleContext');
            const modalVehicleName = document.getElementById('modalVehicleName');
            const modalLeadMessage = document.getElementById('modalLeadMessage');
            const modalTitle = document.getElementById('leadModalLabel');

            if (modalCarId) {
                modalCarId.value = carId;
            }

            if (carName) {
                if (modalVehicleName) {
                    modalVehicleName.innerText = carName + (carPrice ? ' (' + carPrice + ')' : '');
                }
                if (modalVehicleContext) {
                    modalVehicleContext.classList.remove('d-none');
                    modalVehicleContext.classList.add('d-flex');
                }
            } else {
                if (modalVehicleContext) {
                    modalVehicleContext.classList.add('d-none');
                    modalVehicleContext.classList.remove('d-flex');
                }
            }

            if (modalTitle) {
                modalTitle.innerText = subjectTitle || "{{ __('Get in Touch') }}";
            }

            if (modalLeadMessage) {
                if (subjectMessage) {
                    modalLeadMessage.value = subjectMessage;
                } else if (carName) {
                    modalLeadMessage.value = "{{ __('Hello, I am interested in') }}: " + carName + ". {{ __('Please contact me regarding pricing, financing, and a test drive.') }}";
                }
            }
        });
    }
});
</script>
