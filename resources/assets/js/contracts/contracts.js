'use strict';

$(document).ready(function () {
    $('#filterType').
        select2({
            width: '200px',
        });
    $('#contractFilterType').
        select2({
            width: '200px',
        });
});

$(document).on('change', '#filterType', function () {
    window.livewire.emit('filterType', $(this).val());
});

$(document).on('click', '.delete-btn', function () {
    let contractId = $(this).attr('data-id');
    deleteItemLiveWire(route('contracts.destroy', contractId), Lang.get('messages.contact.contract'));
});

$(document).on('mouseenter', '.livewire-card', function () {
    $(this).find('.action-dropdown').removeClass('d-none');
});

$(document).on('mouseleave', '.livewire-card', function () {
    $(this).find('.action-dropdown').addClass('d-none');
    $(this).parent().trigger('click');
});

$(document).on('change', '#contractFilterType', function () {
    window.livewire.emit('filterType', $(this).val());
});

document.addEventListener('DOMContentLoaded', function (event) {
    Livewire.hook('message.received', (message, component) => {
        setTimeout(function () {
            $(document).find('#contractFilterType').select2('destroy');
            $(document).find('#contractFilterType').select2();
            $(document).find('.select2').removeClass('opacity-0');
            $('#contractFilterType').
                select2({
                    width: '200px',
                });
        }, 200);
    });
});
