<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
        }
        .form-container {
            background: #fff;
            padding: 40px 32px 32px 32px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15);
            width: 100%;
            max-width: 370px;
            text-align: center;
        }
        .form-container h2 {
            margin-bottom: 24px;
            color: #764ba2;
            font-weight: 700;
        }
        .form-container input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border 0.2s;
        }
        .form-container input[type="password"]:focus {
            border: 1.5px solid #764ba2;
            outline: none;
        }
        .form-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }
        .form-container button:hover {
            background: linear-gradient(90deg, #764ba2 0%, #667eea 100%);
        }

        .form-container button:hover {
            background: linear-gradient(90deg, #764ba2 0%, #667eea 100%);
        }

        .form-container button:hover {
            background: linear-gradient(90deg, #764ba2 0%, #667eea 100%);
        }
        

        .status-message {
            color: #27ae60;
            margin-bottom: 16px;
            font-weight: 500;
        }
        .error-message {
            color: #e74c3c;
            margin-bottom: 16px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>🔒 Change Password</h2>
        @if(session('status'))
            <div class="status-message">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('password.submit') }}" id="passwordForm" autocomplete="off">
            @csrf
            <input type="password" name="current_password" placeholder="Current Password" required style="margin-bottom:12px;">
            <input type="password" name="new_password" id="new_password" placeholder="New Password" required oninput="checkStrength()" style="margin-bottom:6px;">
            <div id="strengthMessage" style="text-align:left; font-size:0.95em; margin-bottom:10px;"></div>
            <input type="password" name="retype_new_password" id="retype_new_password" placeholder="Retype New Password" required oninput="checkMatch()" style="margin-bottom:6px;">
            <div id="matchMessage" style="text-align:left; font-size:0.95em; margin-bottom:10px;"></div>
            <div style="margin-bottom:10px; text-align:left;">
                <label for="captcha" style="font-size:0.97em;">Enter captcha: <b>5g7h2</b></label>
                <input type="text" name="captcha" id="captcha" placeholder="Enter captcha" required style="margin-top:4px; width:100%;">
            </div>
            <button type="submit">Submit</button>
        </form>
        @if($errors->any())
            <div class="error-message">
                <ul style="margin:0; padding-left: 18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <script>
        function checkStrength() {
            const pwd = document.getElementById('new_password').value;
            let strength = 0;
            if (pwd.length >= 8) strength++;
            if (/[a-z]/.test(pwd)) strength++;
            if (/[A-Z]/.test(pwd)) strength++;
            if (/[0-9]/.test(pwd)) strength++;
            if (/[@$!%*#?&]/.test(pwd)) strength++;
            let msg = '';
            let color = '';
            if (pwd.length === 0) {
                msg = '';
            } else if (strength <= 2) {
                msg = 'Weak password';
                color = '#e74c3c';
            } else if (strength === 3 || strength === 4) {
                msg = 'Medium strength password';
                color = '#f39c12';
            } else if (strength === 5) {
                msg = 'Strong password';
                color = '#27ae60';
            }
            document.getElementById('strengthMessage').textContent = msg;
            document.getElementById('strengthMessage').style.color = color;
        }
        function checkMatch() {
            const pwd = document.getElementById('new_password').value;
            const repwd = document.getElementById('retype_new_password').value;
            let msg = '';
            let color = '';
            if (repwd.length === 0) {
                msg = '';
            } else if (pwd === repwd) {
                msg = 'Passwords match';
                color = '#27ae60';
            } else {
                msg = 'Passwords do not match';
                color = '#e74c3c';
            }
            document.getElementById('matchMessage').textContent = msg;
            document.getElementById('matchMessage').style.color = color;
        }
        </script>
    </div>
</body>
</html>
