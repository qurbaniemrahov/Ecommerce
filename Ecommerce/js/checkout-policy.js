(function () {
    'use strict';

    var zone = document.getElementById('delivery-zone');
    var cod = document.getElementById('cash-on-delivery');
    var shippingEl = document.getElementById('shipping-total');
    var taxEl = document.getElementById('tax-total');
    var subtotalEl = document.getElementById('subtotal-total');
    var grandTotalEl = document.getElementById('grand-total');

    if (!zone || !shippingEl || !taxEl || !subtotalEl || !grandTotalEl) return;

    var shippingRates = { baku: 0, absheron: 3.99, regions: 6.99 };
    var vatRate = 0.18;
    var money = function (amount) { return amount.toFixed(2) + ' ₼'; };

    function updateTotals() {
        var subtotal = 0;
        document.querySelectorAll('.o-card[data-price]').forEach(function (item) {
            subtotal += Number(item.dataset.price) * Number(item.dataset.quantity || 1);
        });
        var shipping = shippingRates[zone.value] || 0;
        var tax = subtotal * vatRate;

        if (zone.value === 'regions') {
            cod.checked = false;
            cod.disabled = true;
            cod.closest('.u-s-m-b-10').classList.add('is-disabled');
        } else {
            cod.disabled = false;
            cod.closest('.u-s-m-b-10').classList.remove('is-disabled');
        }

        subtotalEl.textContent = money(subtotal);
        shippingEl.textContent = money(shipping);
        taxEl.textContent = money(tax);
        grandTotalEl.textContent = money(subtotal + shipping + tax);
    }

    zone.addEventListener('change', updateTotals);
    updateTotals();
}());
