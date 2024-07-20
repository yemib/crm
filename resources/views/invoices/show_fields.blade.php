<ul class="nav nav-tabs mb-3" role="tablist">
    <li class="nav-item">
        <a href="{{ route('invoices.show',['invoice' => $invoice->id, 'group' => 'invoice_details']) }}"
           class="nav-link {{ (isset($groupName) && $groupName == 'invoice_details' || !isset($groupName)) ? 'active' : ''}}">
            {{ __('messages.invoice.invoice_details') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('invoices.show',['invoice' => $invoice->id, 'group' => 'payments']) }}"
           class="nav-link {{ (isset($groupName) && $groupName == 'payments') ? 'active' : ''}}">
            {{ __('messages.invoice.payments') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('invoices.show',['invoice' => $invoice->id, 'group' => 'tasks']) }}"
           class="nav-link {{ (isset($groupName) && $groupName == 'tasks') ? 'active' : ''}}">
            {{ __('messages.tasks') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('invoices.show',['invoice' => $invoice->id, 'group' => 'reminders']) }}"
           class="nav-link {{ (isset($groupName) && $groupName == 'reminders') ? 'active' : ''}}">
            {{ __('messages.reminders') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('invoices.show',['invoice' => $invoice->id, 'group' => 'notes']) }}"
           class="nav-link {{ (isset($groupName) && $groupName == 'notes') ? 'active' : ''}}">
            {{ __('messages.notes') }}
        </a>
    </li>


    <?php

        $check  = false  ;
         foreach($invoice->salesItems    as $salesitem ){ 

                    //chenck if any of the sales item warranty is void or not
                // Get today's date as a Unix timestamp

                if($salesitem->warranty !=  NULL){ 
                $todayTimestamp = strtotime(date("Y-m-d"));

                // Get the timestamp of the other date you want to compare
                $otherDateTimestamp = strtotime($salesitem->warranty);

                // Compare the timestamps
                if ($todayTimestamp > $otherDateTimestamp) {
                    //echo "Today's date is greater than the other date.";

                    $check  =  true  ;
                } elseif ($todayTimestamp < $otherDateTimestamp) {
                   // echo "Today's date is less than the other date.";
                } else {
                    //echo "Today's date is equal to the other date.";
                }

            }

         }

?>

@if($check )
    <li class="nav-item">
        <a href="{{ route('invoices.show',['invoice' => $invoice->id, 'group' => 'aftersalerepair']) }}"
           class="nav-link {{ (isset($groupName) && $groupName == 'aftersalerepair') ? 'active' : ''}}">
           After sales repair
        </a>
    </li>

    @endif
</ul>
<br>
@yield('section')
