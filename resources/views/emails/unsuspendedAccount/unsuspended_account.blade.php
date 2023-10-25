@extends('Layouts.mail.main')

@section('content')
    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#222222;">
        <tbody>
            <tr>
                <td style="padding: 30px 30px 15px 30px;">
                    <h2 style="font-size: 22px; color: #ffc952; font-weight: 600; margin: 0; text-align: center">
                        Dear User
                    </h2>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 30px 20px; color: #dae2f1">
                    <p style="margin-bottom: 10px;font-size: 22px; font-weight: bolder; text-transform: capitalize;  ">
                        hello {{ $first }} {{ $last }},
                    </p>
                    {{-- <p style="margin-bottom: 10px;">Welcome! <br> You are receiving this email because you want to
                        change your password.</p>
                    <p style="margin-bottom: 10px;">Click the link below to complete your registration.</p>
                    <p style="margin-bottom: 25px;">This link will expire in 15 minutes and can only be used
                        once.</p>
                    <a target="_blank" href="{{ config('app.frontend_url') }}/resetPassword?token={{ $token }}"
                        style="background-color:#ffc952;border-radius:4px;color:#222222;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px; display:flex; justify-content: center;   text-alig:center;">
                        Complete Registration
                    </a> --}}
                </td>
            </tr>
            <tr>
                <td style="padding: 0 30px">
                    <p>This is to bring to your notice that the restricting on your account has been lifted</p>
                    {{-- <h4
                        style="font-size: 15px; color: #9ea8bb; font-weight: 600; margin: 0; text-transform: uppercase; margin-bottom: 10px">
                        or</h4>
                    <p style="margin-bottom: 10px; color: #dae2f1">If the button above does not work, paste this
                        link into your
                        web browser:</p>
                    <span style="color: #ffc952 !important; text-decoration:none;word-break: break-all;">
                        {{ config('app.frontend_url') }}/resetPassword?token={{ $token }}
                    </span> --}}
                </td>
            </tr>
            {{-- <tr>
                <td style="padding: 20px 30px 40px">
                    <p style="color: #dae2f1">If you did not make this request, please contact us or ignore this
                        message.</p>
                    <p style="margin: 0; font-size: 13px; line-height: 22px; color:#9ea8bb;">This is an
                        automatically generated email please do not reply to this email. If you face any issues,
                        please contact us at <span style="color: #ffc952 !important;">help@goodpeople.com</span>
                    </p>
                </td>
            </tr> --}}
        </tbody>
    </table>
@endsection()
