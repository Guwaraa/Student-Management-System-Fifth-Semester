<script src=
"https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js">
	</script>

<style>
    table,tr,th,td{
        border: 1px solid black;
        border-collapse: collapse;

    }
    table{
        width: 70%;
        margin: auto;
    }
    tr{
        height: 7vh;
    }
    td{
        text-align: center;
        font-size: 20px;
        font-weight: 500;
    }
    th{
        font-size:30px;
    }
    .day{
        font-weight: bold;
    }
</style>
<div id="photo">
    <div style="width: 10%;height: 10%;"></div>
<table id="schedule">

    <tr>
        <th style="text-align: center">Day</th>
        @foreach ($time as $data)
            @if ($data != '')
                    <th style="text-align: center">{{ date('h:i ', strtotime($data)) }}</th>
            @endif
        @endforeach
    </tr>
    <tr>
        <td class="day">Sunday</td>
        @foreach ($time as $data)
            @if ($data != '')
                @php
                    $temp = 0;
                @endphp
                @foreach ($classschedules as $dataday)
                    @if (strcmp($dataday->Time, $data) == 0)
                        @if (strcmp($dataday->Day, 'Sunday') == 0)
                            <td>{{ $dataday->Subject }}</td>
                            @php
                                $temp = 1;
                            @endphp
                        @endif
                    @endif
                @endforeach
                @if ($temp == 0)
                    <td></td>
                @endif
            @endif
        @endforeach
    </tr>
    <tr>
        <td class="day">Monday</td>
        @foreach ($time as $data)
            @if ($data != '')
                @php
                    $temp = 0;
                @endphp
                @foreach ($classschedules as $dataday)
                    @if (strcmp($dataday->Time, $data) == 0)
                        @if (strcmp($dataday->Day, 'Monday') == 0)
                            <td>{{ $dataday->Subject }}</td>
                            @php
                                $temp = 1;
                            @endphp
                        @endif
                    @endif
                @endforeach
                @if ($temp == 0)
                    <td></td>
                @endif
            @endif
        @endforeach
    </tr>
    <tr>
        <td class="day">Tuesday</td>
        @foreach ($time as $data)
            @if ($data != '')
                @php
                    $temp = 0;
                @endphp
                @foreach ($classschedules as $dataday)
                    @if (strcmp($dataday->Time, $data) == 0)
                        @if (strcmp($dataday->Day, 'Tuesday') == 0)
                            <td>{{ $dataday->Subject }}</td>
                            @php
                                $temp = 1;
                            @endphp
                        @endif
                    @endif
                @endforeach
                @if ($temp == 0)
                    <td></td>
                @endif
            @endif
        @endforeach

    </tr>
    <tr>
        <td class="day">Wednesday</td>
        @foreach ($time as $data)
            @if ($data != '')
                @php
                    $temp = 0;
                @endphp
                @foreach ($classschedules as $dataday)
                    @if (strcmp($dataday->Time, $data) == 0)
                        @if (strcmp($dataday->Day, 'Wednesday') == 0)
                            <td>{{ $dataday->Subject }}</td>
                            @php
                                $temp = 1;
                            @endphp
                        @endif
                    @endif
                @endforeach
                @if ($temp == 0)
                    <td></td>
                @endif
            @endif
        @endforeach

    </tr>
    <tr>
        <td class="day">Thursday</td>
        @foreach ($time as $data)
            @if ($data != '')
                @php
                    $temp = 0;
                @endphp
                @foreach ($classschedules as $dataday)
                    @if (strcmp($dataday->Time, $data) == 0)
                        @if (strcmp($dataday->Day, 'Thursday') == 0)
                            <td>{{ $dataday->Subject }}</td>
                            @php
                                $temp = 1;
                            @endphp
                        @endif
                    @endif
                @endforeach
                @if ($temp == 0)
                    <td></td>
                @endif
            @endif
        @endforeach

    </tr>
    <tr>
        <td class="day">Friday</td>
        @foreach ($time as $data)
            @if ($data != '')
                @php
                    $temp = 0;
                @endphp
                @foreach ($classschedules as $dataday)
                    @if (strcmp($dataday->Time, $data) == 0)
                        @if (strcmp($dataday->Day, 'Friday') == 0)
                            <td>{{ $dataday->Subject }}</td>
                            @php
                                $temp = 1;
                            @endphp
                        @endif
                    @endif
                @endforeach
                @if ($temp == 0)
                    <td></td>
                @endif
            @endif
        @endforeach

    </tr>


</table>
<div style="width: 10%;height: 10%;"></div>

</div>
<button onclick="takeshot()">
    Save
</button>

<div id="output"></div>

<script type="text/javascript">


    function takeshot() {
        let div =
            document.getElementById('photo');

        // Use the html2canvas
        // function to take a screenshot
        // and append it
        // to the output div
        html2canvas(div).then(
            function (canvas) {
                document
                .getElementById('output')
                .appendChild(canvas);
            })
    }
</script>

