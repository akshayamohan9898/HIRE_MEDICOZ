<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Add styles to hide/show elements or to style the error messages */
        .error {
            color: red;
            font-size: 14px;
        }
        .otp-message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form id="verificationForm" action="{{ route('password.verify.option') }}" method="POST">
        @csrf
        <div>
            <label>
                <input type="radio" name="verification_type" value="email" required>
                Email Verification
            </label>
            <label>
                <input type="radio" name="verification_type" value="phone">
                Phone Verification
            </label>
        </div>

        <div id="emailField" style="display: none;">
            <label>Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div id="phoneField" style="display: none;">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" id="phonenumber" required>
        </div>

        <div>
            <button type="button" id="sendOtpBtn" style="display: none;">Send OTP</button>
        </div>

        <div id="otpField" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" id="otpInput" required>
            <button type="button" id="verifyOtpBtn">Verify OTP</button>
        </div>

        <div id="otpMessage" class="otp-message" style="display: none;"></div>

        <div id="errorMessage" class="error" style="display: none;"></div> <!-- Error Message Container -->
    </form>

    <script>
        $(document).ready(function () {
            // Show email or phone field based on radio selection
            $('input[name="verification_type"]').on('change', function () {
                const selectedType = $(this).val();
                $('#emailField').toggle(selectedType === 'email');
                $('#phoneField').toggle(selectedType === 'phone');
                $('#sendOtpBtn').show();
                $('#otpField').hide();
                $('#otpMessage').hide();
                $('#errorMessage').hide(); // Hide error message initially
            });

            // Send OTP when the button is clicked
            $('#sendOtpBtn').on('click', function () {
                const selectedType = $('input[name="verification_type"]:checked').val();
                let data = {};

                // Collect data based on selected type
                if (selectedType === 'email') {
                    data = {
                        _token: "{{ csrf_token() }}",
                        verification_type: 'email',
                        email: $('#email').val()
                    };
                } else {
                    data = {
                        _token: "{{ csrf_token() }}",
                        verification_type: 'phone',
                        phonenumber: $('#phonenumber').val()
                    };
                }

                // Send OTP request
                $.post("{{ route('password.verify.option') }}", data, function (response) {
                    $('#otpMessage').html(`Your OTP is: ${response.otp}`).show();
                    $('#otpField').show();
                    $('#errorMessage').hide(); // Hide error if successful
                }).fail(function (error) {
                    const errorMsg = error.responseJSON.message || 'Invalid data.';
                    $('#errorMessage').html(errorMsg).show();
                });
            });

            // Verify OTP when the button is clicked
            $('#verifyOtpBtn').on('click', function () {
                const otp = $('#otpInput').val();

                // Verify OTP request
                $.post("{{ route('password.verify.otp') }}", { _token: "{{ csrf_token() }}", otp: otp }, function (response) {
                    window.location.href = "{{ route('password.reset.form') }}"; // Redirect to reset password page
                }).fail(function (error) {
                    alert(error.responseJSON.message || 'Invalid OTP.');
                });
            });
        });
    </script>
</body>
</html>
