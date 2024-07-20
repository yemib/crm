<div>


    <div class="users-card">
        <div class="row">
            @forelse($addresses as $customer)
                <div class="col-xl-4 col-md-6">
                    <div class="hover-effect-users position-relative mb-5 users-card-hover-border users-border">
                        <div class="users-listing-details">
                            <div
                                    class="d-flex users-listing-description align-items-center justify-content-center flex-column">
                                <div class="pl-0 mb-2 users-avatar">
                                    <img src="{{ asset('assets/icons/male.png') }}" alt="user-avatar-img"
                                         class="img-responsive users-avatar-img users-img mr-2">
                                </div>
                                <div class="mb-auto w-100 users-data">
                                    <div class="d-flex justify-content-center align-items-center w-100">
                                        <div>
                                            <a href="/"
                                               class="users-listing-title text-decoration-none">Address  name </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between assigned-user pt-0 pl-3 px-5">
                            <div>
                                <div class="text-center badge badge-primary font-weight-bold" data-toggle="tooltip"
                                     data-placement="top"
                                     title="{{ __('messages.customer.total_contact') }}"></div>
                            </div>
                            <div>
                                <div class="text-center badge badge-success font-weight-bold" data-toggle="tooltip"
                                     data-placement="top"
                                     title="{{ __('messages.customer.total_project') }}">{{ $customer->project_count }}</div>
                            </div>
                        </div>

                        <div class="users-action-btn">
                            <a title="{{ __('messages.common.edit') }}"
                               class="action-btn edit-btn users-edit"
                               href="{{ route('customers.edit',$customer->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a title="{{ __('messages.common.delete') }}"
                               class="action-btn customer-delete-btn users-delete"
                               data-id="{{ $customer->id }}"
                               href="#">
                                <i class="fa fa-trash"></i>
                            </a>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 d-flex justify-content-center mt-3">
                 <a> Add Address </a>
                </div>
            @endforelse
        </div>
    </div>

</div>
