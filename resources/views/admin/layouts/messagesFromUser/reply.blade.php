<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $details['subject'] }}</title>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color: #f7f7f7;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f7f7f7; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                    <!-- Header -->
                    <tr>
                        <td style="background:#007bff; padding:20px; text-align:center; color:#ffffff;">
                            <h1 style="margin:0; font-size:24px;">{{ $details['subject'] }}</h1>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding:30px; color:#333333; font-size:16px; line-height:1.6;">
                            <p>{{ $details['message'] }}</p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:14px; color:#555;">
                         <p> 
                            Thanks,
                            {{ config('app.name') }}
                        </p>  
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>