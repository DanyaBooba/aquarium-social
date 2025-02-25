<div class="modal fade" id="modalLink" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header mb-0 pb-0">
                <h1 class="modal-title fs-5 mt-0" id="exampleModalLabel">{{ __('Перейти по ссылке?') }}</h1>
            </div>
            <div class="modal-body">
                <div>
                    {{ __('Вы пытаетесь открыть ссылку:') }}
                </div>
                <div id="modalLink_data">

                </div>
                <div class="mt-3 d-flex" style="gap: .5rem">
                    <button type="button" id="modalLinkButtonOpen" class="btn btn-primary"
                        style="flex: 1">{{ __('Открыть ссылку') }}</button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Отмена') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
