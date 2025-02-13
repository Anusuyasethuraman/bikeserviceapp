-- Insert customer into the users table 
INSERT INTO users (name, email, phone_number, password, role) VALUES 
('John Doe', 'john@example.com', '1234567890', 'hashed_password_here', 'customer');

-- Insert available services into the services table (Sample data: these will be inserted if not using a serviceseeder)
INSERT INTO services (name, price , description	) VALUES 
('Oil Change', 500.00,'Engine oil replacement for smooth performance.'),
('Full Service', 1500.00, 'Full check-up and bike inspection.'),
('Tire Replacement', 800.00 , 'Chain lubrication, tyre pressure, and wheel alignment.');


-- Insert booking records into the booking_service table  
INSERT INTO bookings (user_id, service_id, booking_date, status) VALUES 
(2, 1, '2025-02-14', 'pending'),
(2, 2, '2025-02-15', 'In-progress');
