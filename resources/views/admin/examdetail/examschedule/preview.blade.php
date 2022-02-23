


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
        height: 13vh;
    }
    td{
        text-align: center;
        font-size: 20px;
        font-weight: 500;
    }
    th{
        font-size:30px;
    }
</style>
</head>

<body>
	<div id="photo">
        <div style="width: 10%;height: 10%;"></div>

        <table>
            <tr>
                <th>Date</th>
                <th>Day</th>
                <th>Subject</th>
            </tr>
            @php
                $j = 0;
                $i = 0;
            @endphp
            @for ($i = 0; $i <= $total; $i++)
                <tr>
                    @for ($j = 0; $j < 3; $j++)
                        <td>{{ $schedule[$i][$j] }}</td>
                    @endfor
                </tr>
            @endfor
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
