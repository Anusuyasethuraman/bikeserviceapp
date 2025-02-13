@component('mail::message')
# Booking Status Update

Dear {{ $booking->customer->name }},

Your booking for **{{ $booking->service->name }}** on **{{ $booking->booking_date }}**  
has been updated to **{{ ucfirst($booking->status) }}**.

@if ($booking->status == 'completed')
Your service is now **ready for pickup**. Please visit our service center.
@endif

Thanks,  
**Bike Service Center**  
Contact: +123-456-7890  
 [support@bikeservice.com](mailto:support@bikeservice.com)
@endcomponent
