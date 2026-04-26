@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/billing.css') }}">

    <div class="page-wrapper">

        <div class="billing-wrapper">


            <div class="row g-1">

                <div class="col-lg-5">
                    <div class="search-card">
                        <label>Search Product by Name or Code</label>
                        <div class="position-relative">
                            <input id="product_name" class="search-input" placeholder="Type product name or code..."
                                autocomplete="off">
                            <div id="productSuggestions" style="display:none;"></div>
                        </div>
                        <div id="product_info" class="alert mb-0" style="display:none;">
                            <strong id="p_name"></strong> | Price: ₹ <span id="p_price"></span> | GST: <span
                                id="p_gst"></span>% | Stock: <span id="p_stock"></span> <span id="stock_badge"></span>
                        </div>
                    </div>
                </div>

               
                <div class="col-lg-7">
                    <div class="manual-card">
                        <div class="row">
                            <div class="col-md-3 section-badge align-self-end py-3"><i class="bi bi-box"></i> Add Manually</div>
                            <div class="col-md-9">
                                <label>Product Name</label>
                                <input type="text" id="manual_name" class="form-control form-control-sm"
                                    placeholder="Product Name.....">
                            </div>
                        </div>
                        <div class="row g-1 align-items-end">

                            <div class="col-md-3">
                                <label>Price ₹</label>
                                <input type="number" id="manual_price" class="form-control form-control-sm"
                                    placeholder="0.00" step="0.01" min="0">
                            </div>
                            <div class="col-md-3">
                                <label>Qty</label>
                                <input type="number" id="manual_qty" class="form-control form-control-sm" placeholder="1"
                                    min="1" value="1">
                            </div>
                            <div class="col-md-3">
                                <label>GST %</label>
                                <input type="number" id="manual_gst_rate" class="form-control form-control-sm"
                                    placeholder="0" step="0.01" min="0" value="0">
                            </div>
                            <div class="col-md-3">
                                <button id="add_manual_btn" class="btn-manual-add btn">
                                    <i class="mdi mdi-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="invoice-table-card">
                <div class="table-header">
                    <span><i class="bi bi-receipt-cutoff"></i> Invoice Items</span>
                    <span class="item-count" id="item-count-badge">0 items</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm mb-0" id="items_table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Product Name</th>
                                <th>Price (₹)</th>
                                <th>Qty</th>
                                <th>GST (₹)</th>
                                <th>Total (₹)</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="invoiceItems">
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="mdi mdi-cart-outline"></i>
                                        <p>No items yet</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- â”€â”€ CUSTOMER + TOTALS SIDE BY SIDE â”€â”€ --}}
            <div class="row g-1">
                <div class="col-lg-8">
                    <div class="customer-card">
                        <div class="section-badge"><i class="bi bi-person-fill"></i> Customer & Payment</div>
                        <div class="row g-1">
                            <div class="col-md-4">
                                <label>Customer Name</label>
                                <input id="customer_name" class="form-control form-control-sm"
                                    placeholder="Walk-in Customer">
                            </div>
                            <div class="col-md-3">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input id="customer_phone" class="form-control form-control-sm" maxlength="10"
                                    placeholder="10-digit mobile" inputmode="numeric">
                            </div>
                            <div class="col-md-3">
                                <label>Payment Mode</label>
                                <select id="payment_mode" class="form-control form-control-sm">
                                    <option>Cash</option>
                                    <option>UPI</option>
                                    <option>Pay Later</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Discount (₹)</label>
                                <input id="invoice_discount" type="number" min="0" value="0"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="action-bar">
                            <button class="btn-clear-invoice" onclick="clearAll()">
                                <i class="mdi mdi-close-circle-outline"></i> Clear
                            </button>
                            <button id="save_btn" class="btn-save-invoice">
                                <i class="mdi mdi-printer"></i> Save & Print
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="totals-card">
                        <div class="totals-inner">
                            <div class="totals-row">
                                <span class="label">Subtotal</span>
                                <span class="value" id="subtotal">₹0.00</span>
                            </div>
                            <div class="totals-row">
                                <span class="label">Discount</span>
                                <span class="value discount-val" id="discounts">₹0.00</span>
                            </div>
                            <div class="totals-row">
                                <span class="label">GST</span>
                                <span class="value" id="gst_total">₹0.00</span>
                            </div>
                            <div class="totals-row grand">
                                <span class="label"><i class="bi bi-cash-stack"></i> Grand Total</span>
                                <span class="value" id="grand_total">₹0.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- /billing-wrapper --}}
    </div>{{-- /page-wrapper --}}

    {{-- Toast --}}
    <div id="toast"
        style="display:none; position:fixed; bottom:20px; right:20px;
     background:linear-gradient(135deg,#10b981,#059669); color:#fff;
     padding:10px 18px; border-radius:10px; font-weight:700; font-size:12px;
     box-shadow:0 6px 24px rgba(16,185,129,0.3); z-index:99999; letter-spacing:0.2px;">
    </div>
@endsection

@push('scripts')
    <script>
        const storeId = {{ $storeId }};
        const SEARCH_URL = "{{ route('billing.search') }}";
        const FETCH_URL = "{{ route('billing.fetch') }}";
        const SAVE_URL = "{{ route('billing.save') }}";
        const INVOICE_URL = "{{ url('billing/invoice') }}";
        const CSRF = "{{ csrf_token() }}";

        let items = [];
        let nameSuggestions = [];
        let nameSelectedIndex = -1;

        const money = v => parseFloat(v).toFixed(2);

        $(document).ready(function() {

            // Phone digits only
            $('#customer_phone').on('input', function() {
                $(this).val($(this).val().replace(/\D/g, '').slice(0, 10));
            });

            // Search
            const $nameInput = $('#product_name');
            const $suggestBox = $('#productSuggestions');

            $nameInput.on('input', function() {
                const q = $(this).val().trim();

                if (q.length < 2) {
                    $suggestBox.hide();
                    return;
                }

                $.ajax({
                    url: SEARCH_URL,
                    type: 'GET',
                    data: {
                        q: q,
                        store: storeId
                    },
                    success: function(data) {
                        console.log('Search success:', data);

                        nameSuggestions = Array.isArray(data) ? data : [];
                        showSuggestions();
                    },
                    error: function(xhr) {
                        console.log('Search error:', xhr.responseText);
                    }
                });
            });

            function showSuggestions() {
                $suggestBox.html('');
                nameSelectedIndex = -1;

                if (!nameSuggestions.length) {
                    $suggestBox.hide();
                    return;
                }

                $.each(nameSuggestions, function(i, p) {
                    const $div = $('<div></div>').html(`
                    <strong style="color:#4f46e5">${p.product_code}</strong> - ${p.name}
                    <small style="color:#94a3b8;float:right"> ₹ ${parseFloat(p.price).toFixed(2)} | Stock: ${p.stock}</small>
                `);

                    $div.on('mouseover', function() {
                        nameSelectedIndex = i;
                        highlight();
                    });

                    $div.on('click', function() {
                        chooseProduct(p);
                    });

                    $suggestBox.append($div);
                });

                $suggestBox.show();
                highlight();
            }

            function highlight() {
                $suggestBox.find('div').each(function(i) {
                    $(this).css('background', i === nameSelectedIndex ? '#ede9fe' : 'white');
                });
            }

            $nameInput.on('keydown', function(e) {
                if (!nameSuggestions.length) return;

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    nameSelectedIndex = Math.min(nameSelectedIndex + 1, nameSuggestions.length - 1);
                    highlight();
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    nameSelectedIndex = Math.max(nameSelectedIndex - 1, -1);
                    highlight();
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    if (nameSelectedIndex >= 0) {
                        chooseProduct(nameSuggestions[nameSelectedIndex]);
                    }
                }
            });

            $(document).on('click', function(e) {
                if (
                    !$(e.target).closest('#product_name').length &&
                    !$(e.target).closest('#productSuggestions').length
                ) {
                    $suggestBox.hide();
                }
            });

            function chooseProduct(p) {
                if (!p.source_table) p.source_table = 'products';

                showProductInfo(p);

                if (parseFloat(p.stock) <= 0) {
                    alert('Product out of stock.');
                    $nameInput.val('');
                    $suggestBox.hide();
                    return;
                }

                addOrIncrement(p);
                $nameInput.val('');
                $suggestBox.hide();
                $nameInput.focus();
            }

            function showProductInfo(p) {
                $('#p_name').text(p.name);
                $('#p_price').text(money(p.price));
                $('#p_gst').text(p.gst_rate || 0);
                $('#p_stock').text(p.stock);

                const stock = Number(p.stock);
                const $badge = $('#stock_badge');

                if (stock <= 0) {
                    $badge.html('<span class="stock-out">Out of Stock</span>');
                } else if (stock < 10) {
                    $badge.html('<span class="stock-low"><i class="bi bi-exclamation-triangle"></i> Low Stock</span>');
                } else {
                    $badge.html('<span class="stock-ok"><i class="bi bi-check-lg"></i> In Stock</span>');
                }

                $('#product_info').show();
            }

            function addOrIncrement(p) {
                const key = (p.source_table || 'products') + '_' + p.id;
                const existing = items.find(i => ((i.source_table || 'products') + '_' + i.product_id) === key);

                if (existing) {
                    if (existing.qty + 1 > Number(p.stock)) {
                        alert('Not enough stock.');
                        return;
                    }
                    existing.qty += 1;
                } else {
                    items.push({
                        product_id: p.id,
                        product_code: p.product_code,
                        product_name: p.name,
                        unit_price: parseFloat(p.price),
                        qty: 1,
                        gst_rate: parseFloat(p.gst_rate || 0),
                        source_table: p.source_table || 'products'
                    });
                }

                renderItems();
            }

            $('#add_manual_btn').on('click', function() {
                const name = $('#manual_name').val().trim();
                const price = parseFloat($('#manual_price').val()) || 0;
                const qty = parseInt($('#manual_qty').val()) || 1;
                const gst = parseFloat($('#manual_gst_rate').val()) || 0;

                if (!name) {
                    alert('Please enter product name.');
                    return;
                }

                if (price <= 0) {
                    alert('Price must be greater than 0.');
                    return;
                }

                const prefix = name.substring(0, 3).toUpperCase().replace(/[^A-Z]/g, '') || 'PRD';
                const code = prefix + Date.now().toString().slice(-4);

                items.push({
                    product_id: 0,
                    product_code: code,
                    product_name: name,
                    unit_price: price,
                    qty: qty,
                    gst_rate: gst,
                    source_table: 'manual'
                });

                $('#manual_name').val('');
                $('#manual_price').val('');
                $('#manual_qty').val('1');
                $('#manual_gst_rate').val('0');

                renderItems();
            });

            function renderItems() {
                const $tbody = $('#invoiceItems');
                $tbody.html('');

                let subtotal = 0,
                    gstTotal = 0;

                if (items.length === 0) {
                    $tbody.html(`
                            <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                <i class="mdi mdi-cart-outline"></i>
                                <p>No items yet<i class="bi bi-dash-lg"></i> search or add manually above</p>
                                </div>
                            </td>
                            </tr>
                        `);
                    updateBadge(0);
                    updateTotals(0, 0);
                    return;
                }

                $.each(items, function(idx, it) {
                    const base = it.unit_price * it.qty;
                    const gstAmt = base * (it.gst_rate / 100);
                    const lineTotal = base + gstAmt;

                    it.gst_amount = parseFloat(gstAmt.toFixed(2));
                    it.total_amount = parseFloat(lineTotal.toFixed(2));

                    subtotal += base;
                    gstTotal += it.gst_amount;

                    const row = `
                            <tr>
                            <td><span style="background:#ede9fe;color:#4f46e5;padding:1px 6px;border-radius:4px;font-size:11px;font-weight:700;">${it.product_code}</span></td>
                            <td style="font-weight:600;color:#1e293b;font-size:12px;">${it.product_name}</td>
                            <td style="color:#0891b2;font-weight:600;font-size:12px;">₹${money(it.unit_price)}</td>
                            <td><input type="number" class="form-control qty-input qty-change" min="1" data-index="${idx}" value="${it.qty}"></td>
                            <td style="color:#d97706;font-size:12px;">₹${money(it.gst_amount)}</td>
                            <td style="color:#059669;font-weight:700;font-size:12px;">₹${money(it.total_amount)}</td>
                            <td><button type="button" class="btn-remove-item remove-item" data-index="${idx}"><i class="mdi mdi-delete"></i></button></td>
                            </tr>
                        `;

                    $tbody.append(row);
                });

                updateBadge(items.length);
                updateTotals(subtotal, gstTotal);
            }

            function updateBadge(count) {
                const $badge = $('#item-count-badge');
                if ($badge.length) {
                    $badge.text(count + (count === 1 ? ' item' : ' items'));
                }
            }

            function updateTotals(subtotal, gstTotal) {
                const disc = Math.min(Math.max(parseFloat($('#invoice_discount').val()) || 0, 0), subtotal);
                const grand = (subtotal - disc) + gstTotal;

                $('#subtotal').text('₹' + money(subtotal));
                $('#discounts').text('₹' + money(disc));
                $('#gst_total').text('₹' + money(gstTotal));
                $('#grand_total').text('₹' + money(grand));
            }

            $(document).on('change', '.qty-change', function() {
                const idx = $(this).data('index');
                items[idx].qty = Math.max(1, parseInt($(this).val()) || 1);
                renderItems();
            });

            $(document).on('click', '.remove-item', function() {
                const idx = $(this).data('index');
                items.splice(idx, 1);
                renderItems();
            });

            $('#invoice_discount').on('input', function() {
                renderItems();
            });

            window.clearAll = function() {
                if (!confirm('Clear all items?')) return;

                items = [];
                renderItems();

                $('#product_info').hide();
                $('#customer_name').val('');
                $('#customer_phone').val('');
                $('#invoice_discount').val('0');
            };

            $('#save_btn').on('click', function(e) {
                e.preventDefault();

                if (!items.length) {
                    alert('Please add at least one product.');
                    return;
                }

                const phone = $('#customer_phone').val().trim();
                if (!/^[0-9]{10}$/.test(phone)) {
                    alert('Please enter a valid 10-digit phone number.');
                    return;
                }

                const payload = new FormData();
                payload.append('_token', CSRF);
                payload.append('invoice_items', JSON.stringify(items));
                payload.append('invoice_discount', parseFloat($('#invoice_discount').val() || 0));
                payload.append('customer_name', $('#customer_name').val() || '');
                payload.append('customer_phone', phone);
                payload.append('payment_mode', $('#payment_mode').val() || 'Cash');

                const win = window.open('', '_blank');

                $.ajax({
                    url: SAVE_URL,
                    type: 'POST',
                    data: payload,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status === 'success' && data.invoice_id) {
                            win.location = INVOICE_URL + '/' + data.invoice_id;
                            showToast('âœ… Invoice saved successfully!');
                            setTimeout(() => clearAll(), 1000);
                        } else {
                            try {
                                win.close();
                            } catch (e) {}
                            alert('Save failed: ' + (data.msg || 'Unknown error'));
                        }
                    },
                    error: function() {
                        try {
                            win.close();
                        } catch (e) {}
                        alert('Network error. Try again.');
                    }
                });
            });

            function showToast(msg) {
                const $t = $('#toast');
                $t.text(msg).show().css('opacity', 1);

                setTimeout(function() {
                    $t.css('opacity', 0);
                    setTimeout(function() {
                        $t.hide();
                    }, 300);
                }, 2800);
            }

            renderItems();
        });
    </script>
@endpush
