<!DOCTYPE html>
<html>
<head>
    <title>New Booking Notification</title>
</head>
<body style=" padding: 20px;">

    <div style="max-width: 600px; margin: auto;  padding: 20px;border-radius: 8px; ">
        <h2 style="text-align: center;">New Booking Details</h2>

        <div style="border: 1px; padding: 15px; border-radius: 5px; margin-top: 10px;text-align: center;">
            <p><strong>Customer Name:</strong> {{Auth::user()->name}}</p>
            <p><strong>Service:</strong> {{ $booking->service->name }}</p>
            <p><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
        </div>

        <div style="margin-top: 10px; padding: 15px; text-align: center;color:rgb(30, 0, 255); border-radius: 5px;">
            <p><strong>Bike Service Center</strong></p>
            <p>Contact: +123-456-7890</p>
            <p>Need Help? <a href="mailto:support@bikeservice.com" style="color:rgb(30, 0, 255); text-decoration: none;">support@bikeservice.com</a></p>
        </div>
    </div>

</body>
</html>
