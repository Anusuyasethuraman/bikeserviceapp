@extends('layouts.default')
@section('title',"Book a Service")
@section('content')
<div class="container">

  

    @if (!auth()->user()->isAdmin())  
        <h2>Book a Service</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('bookingservice') }}" method="POST">
            @csrf

            <!-- Service Selection -->
            <div class="mb-3">
                <label for="service_id" class="form-label">Select Service</label>
                <select name="service_id" class="form-control" required>
                    <option value="">-- Choose a Service --</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }} - ${{ $service->price }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Booking Date -->
            <div class="mb-3">
                <label for="booking_date" class="form-label">Select Date</label>
                <input type="date" name="booking_date" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
        <hr>
    @endif

   

    @if (auth()->user()->isAdmin())  
        <h2 class ="mt-3">Customer Booking Orders</h2>

        @if ($bookings->isEmpty())
            <p class="text-center">No bookings found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Booking No</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th>Actions</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{ $booking->service->price }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>
                                <span class="badge 
                                    @if($booking->status == 'completed') bg-success 
                                    @elseif($booking->status == 'In-progress') bg-primary 
                                    @else bg-warning  
                                    @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="In-progress" {{ $booking->status == 'In-progress' ? 'selected' : '' }}>In-Progress</option>
                                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-success mt-1">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    @else
        <h2>My Booking Orders</h2>

        @if ($bookings->isEmpty())
            <p class="text-center">No bookings found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Booking No</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{ $booking->service->price }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>
                                <span class="badge 
                                    @if($booking->status == 'completed') bg-success 
                                    @elseif($booking->status == 'In-progress') bg-primary 
                                    @else bg-warning  
                                    @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
@endsection
