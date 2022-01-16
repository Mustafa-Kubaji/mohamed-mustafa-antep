<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<table id="customers">
    <tr>
        <th>adi</th>
        <th>resim</th>
        <th>işlem</th>
    </tr>

    @foreach($sliders as $slider)
        <tr>
            <td>{{$slider->name}}</td>
            <td>{{$slider->photo}}</td>
            <td><a href="{{route('delete.sliders',$slider->id)}}">Delete</a> </td>
        </tr>
    @endforeach

</table>

</body>
</html>
