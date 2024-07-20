@extends('invoices.show')
@section('section')
    <hr>
    <div class="row">
        <form method="POST" id="myForm" action="/admin/invoices/{{ $invoice->id }}/edit">

            {{ csrf_field() }}
            <input name="aftersale" type="hidden" value="aftersale" />
            <div align="right">
                <div id="alertContainer" style="color:white  !important"></div>
                <button class="btn btn-primary">After Sales Job</button>
                <br />
            </div>


            <table
                class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('messages.invoice.item') }}</th>
                        <th>{{ __('messages.common.description') }}</th>
                        @if ($invoice->unit == 1)
                            <th class="text-right">{{ __('messages.invoice.qty') }}</th>
                        @elseif($invoice->unit == 2)
                            <th class="text-right">{{ __('messages.invoice.hours') }}</th>
                        @else
                            <th class="text-right">{{ __('messages.invoice.qty/hours') }}</th>
                        @endif
                        <th class="text-right itemRate">{{ __('messages.products.rate') }}(<i
                                class="{{ getCurrencyClassFromIndex($invoice->currency) }}"></i>)
                        </th>
                        <th class="text-right itemTax">{{ __('messages.invoice.taxes') }}(<i class="fas fa-percentage"></i>)
                        </th>
                        <th class="text-right itemTotal">{{ __('messages.invoice.total') }}(<i
                                class="{{ getCurrencyClassFromIndex($invoice->currency) }}"></i>)
                        </th>
                    </tr>
                </thead>


                @foreach ($invoice->salesItems as $item)
                    <?php
                    
                    $check = false;
                    

                    if($item->warranty  !=  NULL){ 
                    //chenck if any of the sales item warranty is void or not
                    // Get today's date as a Unix timestamp
                    $todayTimestamp = strtotime(date('Y-m-d'));
                    
                    // Get the timestamp of the other date you want to compare
                    $otherDateTimestamp = strtotime($item->warranty);
                    
                    // Compare the timestamps
                    if ($todayTimestamp > $otherDateTimestamp) {
                        //echo "Today's date is greater than the other date.";
                    
                        $check = true;
                    } elseif ($todayTimestamp < $otherDateTimestamp) {
                        // echo "Today's date is less than the other date.";
                    } else {
                        //echo "Today's date is equal to the other date.";
                    }
                }
                    ?>


                    @if ($check == true)
                        <tr>
                            <td> <input id="check{{ $item->id }}" type="checkbox" name="product_check[]"
                                    value="{{ $item->id }}" style="width: 30px  ;" /> <label style="cursor: pointer"
                                    for="check{{ $item->id }}"> {{ html_entity_decode($item->item) }}</label></td>
                            <td class="table-data">{!! !empty($item->description) ? $item->description : __('messages.common.n/a') !!}</td>
                            <td class="text-right">{{ $item->quantity }}</td>
                            <td class="text-right"><i class="{{ getCurrencyClassFromIndex($invoice->currency) }}"></i>
                                {{ formatNumber($item->rate) }}</td>
                            <td class="text-right show-taxes-list">
                                @forelse($item->taxes as $tax)
                                    <span class="badge badge-light">{{ $tax->tax_rate }}%</span>
                                @empty
                                    {{ __('messages.common.n/a') }}
                                @endforelse
                            </td>
                            <td class="text-right"><i class="{{ getCurrencyClassFromIndex($invoice->currency) }}"></i>
                                {{ number_format($item->total, 2) }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>

        </form>



    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("myForm");

            form.addEventListener("submit", function(event) {
                // Get all checkboxes with name "checkbox"
                var checkboxes = document.querySelectorAll(
                'input[type="checkbox"][name="product_check[]"]');
                var isChecked = false;

                // Iterate through each checkbox
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isChecked = true;
                    }
                });

                // If none of the checkboxes are checked, prevent form submission
                if (!isChecked) {
                    event.preventDefault();
                    //alert("Please select at least one product before submitting the form.");
                    showAlert("Please select at least one product before submitting the form.",
                        "alert-danger");
                }
            });



            function showAlert(message, className) {
                var alertDiv = document.createElement("div");
                alertDiv.classList.add("alert", className);
                alertDiv.textContent = message;

                var container = document.getElementById("alertContainer");
                container.appendChild(alertDiv);

                setTimeout(function() {
                    alertDiv.remove();
                }, 4000);
            }

        });
    </script>

    <style>
        /* Alert box styles */
        .alert {
            padding: 15px;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
            color: #3c763d;
            background-color: #dff0d8;
            margin-bottom: 10px;
        }

        .alert-danger {
            color: black !important;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
@endsection
