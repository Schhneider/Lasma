<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/css/main.css">
<body>
    <h1>Plānotājs</h1>

    <table style="border: 1px solid black">
        <tr>
        <td> Uzdevuma nosaukums </td>
        <td> Uzdevuma apraksts </td>
        <td> Jaizpilda līdz </td>
        <td>  </td>
        <td>  </td>

        </tr>
        @foreach ($todo as $td)
        <tr>
        <td> {{ $td->task_name }} </td>
        <td> {{ $td->description }} </td>
        <td> {{ $td->end_date }} </td>
        <td><input type="button" value="Labot" onclick="edit( {{ $td->id }})"></td>
        <td>                
            <form method="POST" action="{{ route('todo.destroy', $td->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Dzēst" onclick="return confirm('Vai tiešām vēlaties dzēst šo ierakstu?')">
                </form>
        </td>

        @endforeach
    </table>
    <p><input type="button" value="Jauns uzdevums" onclick="add()"></p>
</body>
<script>
 function add() {
 window.location.href = "/add";
 }
 function edit(ID) {
 window.location.href = "/edit/" + ID;
 }
 </script>


</html>