<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSV Export</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .inline-container {
                display: inline-block;
                vertical-align: top;
            }
            td {
                width: 135px;
            }
        </style>
    </head>
    <body>
            <div class="content">
                
                <h2>Employee Info Exporter</h2>

                @if (!empty($data))

                <div class="inline-container">
                    <table>
                        <tr>
                            <td>Employee ID</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Gender</td>
                            <td>DOB</td>
                            <td>Hire Date</td>
                            <td>Current Salary</td>
                        </tr>
                        
                        @foreach ($data as $emp)
                            <tr>
                                <td>{{ $emp->emp_no }}</td>
                                <td>{{ $emp->first_name }}</td>
                                <td>{{ $emp->last_name }}</td>
                                <td>{{ $emp->gender }}</td>
                                <td>{{ $emp->birth_date }}</td>
                                <td>{{ $emp->hire_date }}</td>
                                <td>${{ $emp->salaries[0]->salary }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="inline-container">
                    <button onclick="location.href='/csvexport'" type="button">CSV Export</button>
                </div>

                @endif

            </div>
        </div>
    </body>
</html>
