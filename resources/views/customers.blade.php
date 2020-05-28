@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Customer Form -->
        <form action="customer" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Customer Name -->
            <div class="form-group">
                <label for="customer" class="col-sm-3 control-label">Customer</label>

                <div class="col-sm-6">
                    <input type="text" name="username" id="customer-name" class="form-control">
                </div>
            </div>

            <!-- Add Customer Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Customer
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Customer -->

    @if (count($allCustomers) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Customers
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Customer</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($allCustomers as $oneCustomer)
                            <tr>
                                <!-- Customer Name -->
                                <td class="table-text">
                                    <div>{{ $oneCustomer->username }}</div>
                                </td>

                                <td>
                                    <form action="customer/{{ $oneCustomer->id }}" method="POST">
                                    <!-- <form action="customer/{{ $oneCustomer->customer_id }}" method="POST"> -->
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
